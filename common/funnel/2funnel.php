<?php
require_once("./vendor/autoload.php");
use GuzzleHttp\Client;

require_once("./campaign_pages.php");

require_once("../initialize.php");
require_once("./Offers.php");
require_once("./data/tags.php");
require_once("./classes/ActiveCampaign.php");

class Funnel
{
    private $username = null;
    private $password = null;
    private $ptype = "vsl";
    private $cId = null;
    public $nextUrl = null;
    protected $api_url = "https://limitlesslifellc.sticky.io";
    private $ip = null;
    private $campaignPages = null;
    private $base_url = BASE_URL;
    private $dev_url = DEV_URL;
    private $shippingId = 2;
    private $mode = "production";
    private $tags = [];

    public function __construct($ptype, $cId, $campaignPages, $tags)
    {
        if ($this->mode == "development") {
            $this->base_url = $this->dev_url;
        }
        $this->username = "dev-cs-testing";
        $this->password = "j37fmqChMB9sfc";
        $this->ptype = $ptype;
        $this->cId = $cId;
        $this->campaignPages = $campaignPages;
        $this->tags = $tags;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
        $this->processPage();

    }
    //to process every funnel page
    protected function processPage()
    {

        switch ($this->ptype) {
            case 'landing':
                $this->nextUrl = $this->processLandingPage();
                break;
            case 'vsl':
                $this->nextUrl = $this->processVslPage();
                break;
            case 'checkout':
                $this->nextUrl = $this->processCheckoutPage();
                break;
            case 'upsell1':
            case 'upsell2':
            case 'upsell3':
            case 'upsell4':
                $this->nextUrl = $this->processUpsellPage();
                break;
            case 'step-1':
            case 'step-2':
                $this->nextUrl = $this->processStepPage();
                break;
        }

    }

    public function processStepPage()
    {

        return $this->getNextUrl($_POST["ptype"], null);
    }

    protected function getRequestBody($response)
    {
        // Get the request body as a string
        $requestBody = $response->getBody()->getContents();

        // If the request body is in JSON format, you can decode it to an array or object
        $requestData = json_decode($requestBody, true); // For an associative array
        return $requestData;
    }

    //for upsell pages
    protected function processUpsellPage()
    {

        $offerClass = new Offers();
        $offers = $offerClass->fetchOfferData($_POST["offer"], $this->cId);

        $upsellData = [
            "previousOrderId" => $_POST["orderId"],
            "shippingId" => $this->shippingId,
            "ipAddress" => $this->ip,
            "campaignId" => $this->cId,
            "offers" => $offers,
            "notes" => "Upsell added to previous order"
        ];


        $api_url = $this->api_url . "/api/v1/new_upsell";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);


        $response = $client->request("post", $api_url, [
            "json" => ($upsellData),
            "auth" => [$this->username, $this->password],
        ]);

        $response = $this->getRequestBody($response);
        if (isset($response["response_code"]) && $response["response_code"] == 100) {

            //purchasing bundle
            $this->purchaseBundle($_POST["offer"], $_POST["mmId"]);

            return $this->getNextUrl($_POST["ptype"], $response);
        } else {

            $reason = (isset($response["error_message"])) ? $response["error_message"] : "something not working correctly during making checkout";
            return "/error?reason=" . $reason;
        }
    }

    protected function purchaseBundle($offer, $mmId)
    {
        $bundles = [
            ["offer_id" => 20, "bundle_id" => 1],
            ["offer_id" => 21, "bundle_id" => 1],
            ["offer_id" => 22, "bundle_id" => 7],
            ["offer_id" => 24, "bundle_id" => 5],
            ["offer_id" => null, "bundle_id" => 6]
        ];

        return null; //no need to call this as bundles autmatically adding by member mouse

        $bundleToPurchase = null;
        foreach ($bundles as $bundle) {
            if ($bundle["offer_id"] == $offer) {
                $bundleToPurchase = $bundle;
                break;
            }
        }

        if ($bundleToPurchase !== null) {

            //adding bundle with member
            $membermouseUrl = "https://staging.creditsecret.org/wp-content/plugins/membermouse/api/request.php?q=/addBundle";
            $data = [
                "apikey" => "u63i449xd0",
                "apisecret" => "ome21xq85n",
                "member_id" => $mmId,
                "bundle_id" => $bundleToPurchase["bundle_id"]
            ];

            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);

            $response = $client->request("post", $membermouseUrl, [
                "form_params" => $data
            ]);

            $response = $this->getRequestBody($response);

        }

    }

    public function checkEmailAlreadyExists($email)
    {
        return false;
        $membermouseUrl = "https://staging.creditsecret.org/wp-content/plugins/membermouse/api/request.php?q=/getMember";
        $data = [
            "apikey" => "u63i449xd0",
            "apisecret" => "ome21xq85n",
            "email" => $email,
        ];


        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
        try {
            $response = $client->request("post", $membermouseUrl, ["form_params" => $data]);
        } catch (\Exception $ex) {
            return false;
        }


        $response = $this->getRequestBody($response);

        if ($response["response_code"] == 200 && $response["response_data"]["membership_level"] == 2) {
            return $response["response_data"]["member_id"];
        } else {
            return false;
        }
    }

    //prospect making method
    protected function makeProspect()
    {
        $billing_address = isset($_POST["billing_address"]) ? $_POST["billing_address"] : "";
        $billing_zip = isset($_POST["billing_zip"]) ? $_POST["billing_zip"] : "";
        $billing_city = isset($_POST["billing_city"]) ? $_POST["billing_city"] : "";
        $billing_state = isset($_POST["billing_state"]) ? $_POST["billing_state"] : "";
        $prospectData = [
            "campaignId" => $this->cId,
            "email" => $_POST["email"],
            "firstName" => isset($_POST["first_name"]) ? $_POST["first_name"] : "",
            "lastName" => isset($_POST["last_name"]) ? $_POST["last_name"] : "",
            "phone" => isset($_POST["phone"]) ? $_POST["phone"] : "",
            "city" => isset($_POST["city"]) ? $_POST["city"] : $billing_city,
            "zip" => isset($_POST["zip"]) ? $_POST["zip"] : $billing_zip,
            "state" => isset($_POST["state"]) ? $_POST["state"] : $billing_state,
            "address1" => $billing_address,
            "country" => "US",
            "ipAddress" => $this->ip ? $this->ip : '127.0.0.1',
        ];

        //sending data to sticky.io
        $api_url = $this->api_url . "/api/v1/new_prospect";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $response = $client->request("post", $api_url, [
            "json" => $prospectData,
            "auth" => [$this->username, $this->password],
        ]);

        $response = $this->getRequestBody($response);
        $prospectId = null;
        if (isset($response["response_code"]) && $response["response_code"] == 100) {
            //adding custom field and posting to active campaign
            $prospectId = $response["prospectId"];
        }
        return $prospectId;
    }

    protected function getProspectData($id)
    {
        $api_url = $this->api_url . "/api/v1/prospect_view";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);
        $prospectData = [
            "prospect_id" => $id
        ];

        $response = $client->request("post", $api_url, [
            "json" => $prospectData,
            "auth" => [$this->username, $this->password],
        ]);

        $response = $this->getRequestBody($response);
        return $response;
    }

    //for processing checkout page
    protected function processCheckoutPage()
    {
        //if user came directly to checkout page
        if (!isset($_POST["prospectId"]) || empty($_POST["prospectId"])) {
            //creating prospect first
            $_POST["prospectId"] = $this->makeProspect();
        }
        //collecting data to update prospect
        $nameTokens = ["Not Provided", "Not Provided"];
        if (isset($_POST["name"]) && $_POST["name"] != null) {
            $tokens = explode(" ", $_POST["name"]);
            $nameTokens[0] = $tokens[0];
            $nameTokens[1] = isset($tokens[1]) ? $tokens[1] : "Not Available";
        }
        $billing_address = isset($_POST["billing_address"]) ? $_POST["billing_address"] : "";
        $billing_zip = isset($_POST["billing_zip"]) ? $_POST["billing_zip"] : "";
        $billing_city = isset($_POST["billing_city"]) ? $_POST["billing_city"] : "";
        $billing_state = isset($_POST["billing_state"]) ? $_POST["billing_state"] : "";

        $prospectData = [
            "prospect_id" => [
                $_POST["prospectId"] => [
                    "first_name" => $nameTokens[0],
                    "last_name" => $nameTokens[1],
                    "zip" => $_POST["billing_zip"],
                    "email" => $_POST["email"],
                    // "address" => $_POST["billing_address"],
                    // "address2" => $_POST["billing_address"],
                    "country" => "US",
                    // "city" => $_POST["billing_city"],
                    // "state" => $_POST["billing_state"],
                    "notes" => "Updated during checkout"
                ]
            ]
        ];

        $info = [
            "first_name" => $nameTokens[0],
            "last_name" => $nameTokens[1],
            "zip" => $_POST["billing_zip"],
            "email" => $_POST["email"],
        ];

        $info["dbemail"] = $_POST["email"];
        $info["billing_country"] = "United States";
        $info["dbpamount"] = 39;

        if (isset($_POST["billing_address"]) && !empty($_POST["billing_address"])) {
            $prospectData["prospect_id"][$_POST["prospectId"]]["address"] = $_POST["billing_address"];
            $prospectData["prospect_id"][$_POST["prospectId"]]["address2"] = $_POST["billing_address"];
            $info["billing_address"] = $_POST["billing_address"];
        }

        if (isset($_POST["billing_city"]) && !empty($_POST["billing_city"])) {
            $prospectData["prospect_id"][$_POST["prospectId"]]["city"] = $_POST["billing_city"];
            $info["billing_city"] = $_POST["billing_city"];
        }

        if (isset($_POST["billing_state"]) && !empty($_POST["billing_state"])) {

            $prospectData["prospect_id"][$_POST["prospectId"]]["state"] = $_POST["billing_state"];
            $info["billing_state"] = $_POST["billing_state"];
        }



        $api_url = $this->api_url . "/api/v1/prospect_update";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $response = $client->request("post", $api_url, [
            "json" => $prospectData,
            "auth" => [$this->username, $this->password],
        ]);

        $response = $this->getRequestBody($response);
        $offerClass = new Offers();
        $otherOffers = $_POST["offers"];
        $otherOffers = explode(",", $otherOffers);

        //$_POST["offers"]
        $offers = $offerClass->fetchOfferData($otherOffers[0], $this->cId); //testing

        $key = array_search(18, $otherOffers); // Find the key of value 18

        if ($key !== false) {
            unset($otherOffers[$key]); // Unset the value at the found key
        }
        //replacing 18 as it is already set
        if (count($otherOffers) >= 2) {
            $otherOffers = $offerClass->fetchOfferData($otherOffers[1], $this->cId);
        }
        // $offers[] = [
        //     "product_id" => 47,
        //     "step_num" => 3,
        //     "offer_id" => 18
        // ];
        // foreach(explode(",",$_POST["products"]) as $product){
        //     $offers[] = [
        //         "offer_id" => $_POST["offers"],
        //         "product_id" => $product,
        //         "step_num" => 3,
        //         "trials" => ["product_id" => $product],
        //         "prepaid_cycles" => 1,
        //         "billing_model_id" => 3
        //     ];
        // }
        //checkout starting
        $credit_card_number = isset($_POST['credit_card_number'])?str_replace(" ", "", $_POST["credit_card_number"]):'';
        $credit_card_expiry_month = isset($_POST['credit_card_expiry_month'])?$_POST['credit_card_expiry_month']:'';
        $credit_card_expiry_year = isset($_POST['credit_card_expiry_year'])?$_POST['credit_card_expiry_year']:'';
        $cvc = isset($_POST['cvc'])?trim($_POST['cvc']):'';
        
        $creditCard = isset($_POST['credit_card'])?str_replace(" ", "", $_POST["credit_card"]):$credit_card_number;
        $expirationDate = $credit_card_expiry_month . substr($credit_card_expiry_year, -2);
        $CVV = isset($_POST['cvv'])?trim($_POST['cvv']):$cvc;
        $checkoutData = [
            "prospectId" => $_POST["prospectId"],
            "creditCardNumber" => $creditCard,
            "expirationDate" =>$expirationDate,
            "CVV" => $CVV,
            "creditCardType" => $this->getCardType($creditCard),
            "shippingId" => $this->shippingId,
            "tranType" => "Sale",
            "ipAddress" => $this->ip,
            "campaignId" => $this->cId,
            "offers" => $offers
        ];

        if (isset($_POST["discount"]) && !empty($_POST["discount"]) && $_POST["discount"] != 0) {
            $checkoutData["promoCode"] = $_POST["discount"];
        }

        $info["campaignId"] = $this->cId;
        $info["shippingId"] = $this->shippingId;
        $infoToSend = $info;


        $api_url = $this->api_url . "/api/v1/new_order_with_prospect";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $response = $client->request("post", $api_url, [
            "json" => $checkoutData,
            "auth" => [$this->username, $this->password],
        ]);
        $response = $this->getRequestBody($response);
        if (isset($response["response_code"]) && $response["response_code"] == 100) {
            sleep(3);
            //removing contact from cs vsl partial
            $info["dbtid"] = $response["order_id"];
            $info = json_encode($info);
            $info = base64_encode($info);
            $activeCampaign = new ActiveCampaign();
            $activeCampaign->updateList(3, 4, $_POST["email"]); //unsubscrive from cs vsl partial and subscription to credit secret customers

            $alreadyExists = $this->checkEmailAlreadyExists($_POST["email"]);
            if (!$alreadyExists) {
                //adding custom password field to order
                $mmId = $this->createMemberMouseMembership($response["customerId"], $_POST["email"], $infoToSend);
            } else {
                $mmId = $alreadyExists;
            }
            $response["mmId"] = $mmId;
            //creating upsell with this order
            if (count($otherOffers) >= 1) {
                $upsellData = [
                    "previousOrderId" => $response["order_id"],
                    "shippingId" => $this->shippingId,
                    "ipAddress" => $this->ip,
                    "campaignId" => $this->cId,
                    "offers" => $otherOffers,
                    "notes" => "SMC Purchased"
                ];


                $api_url = $this->api_url . "/api/v1/new_upsell";
                $client = new GuzzleHttp\Client([
                    'verify' => false, // Set 'verify' to false here
                ]);


                $response2 = $client->request("post", $api_url, [
                    "json" => ($upsellData),
                    "auth" => [$this->username, $this->password],
                ]);

                $response2 = $this->getRequestBody($response2);
            }


            //attaching scb offer
            //$this->purchaseBundle(null,$mmId);
            //end of adding custom password field to order

            return $this->getNextUrl("checkout", $response, $info);
        } else {

            $reason = (isset($response["error_message"])) ? $response["error_message"] : "something not working correctly during making checkout";
            return "/error?reason=" . $reason;
        }
    }
    protected function getCardType($cardNumber)
    {
        // Regular expressions to match Visa, MasterCard, and other card types
        $patterns = array(
            'visa' => '/^4\d{12}(?:\d{3})?$/',
            'master' => '/^5[1-5]\d{14}$/',
            'amex' => '/^3[47]\d{13}$/',
            'discover' => '/^(?:6011|65\d{2}|64[4-9]\d)\d{12}$/'
            // Add more patterns for other card types if needed
        );

        foreach ($patterns as $cardType => $pattern) {
            if (preg_match($pattern, $cardNumber)) {
                return $cardType;
            }
        }

        return "unknown"; // If no card type pattern matches
    }


    //for processing of vsl page (prospects)
    protected function processVslPage()
    {
        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            //creating prospect data
            $billing_address = isset($_POST["billing_address"]) ? $_POST["billing_address"] : "";
            $billing_zip = isset($_POST["billing_zip"]) ? $_POST["billing_zip"] : "";
            $billing_city = isset($_POST["billing_city"]) ? $_POST["billing_city"] : "";
            $billing_state = isset($_POST["billing_state"]) ? $_POST["billing_state"] : "";

            $prospectData = [
                "campaignId" => $this->cId,
                "email" => $_POST["email"],
                "ipAddress" => $this->ip ? $this->ip : '127.0.0.1',
                "firstName" => isset($_POST["first_name"]) ? $_POST["first_name"] : "",
                "lastName" => isset($_POST["last_name"]) ? $_POST["last_name"] : "",
                "phone" => isset($_POST["phone"]) ? $_POST["phone"] : "",
                "city" => isset($_POST["city"]) ? $_POST["city"] : $billing_city,
                "zip" => isset($_POST["zip"]) ? $_POST["zip"] : $billing_zip,
                "state" => isset($_POST["state"]) ? $_POST["state"] : $billing_state,
                "address1" => $billing_address,
                "country" => "US"
            ];

            //sending data to sticky.io
            $api_url = $this->api_url . "/api/v1/new_prospect";
            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);

            $response = $client->request("post", $api_url, [
                "json" => $prospectData,
                "auth" => [$this->username, $this->password],
            ]);

            $response = $this->getRequestBody($response);

            if (isset($response["response_code"]) && $response["response_code"] == 100) {
                //adding custom field and posting to active campaign
                $prospectId = $response["prospectId"];
                $this->addCustomField(["prospectId" => $prospectId, "email" => $_POST["email"]], 7, isset($_POST["reason"]) ? $_POST["reason"] : "Not provided.");
                return $this->getNextUrl("vsl", $response);
            } else {
                $reason = (isset($response["decline_reason"])) ? $response["decline_reason"] : "something not working correctly during making prospect";
                return "/error?reason=" . $reason;
            }
        }
    }
    protected function processLandingPage()
    {
        return $this->getNextUrl("landing", []);

    }

    protected function addCustomField($data, $field, $value)
    {
        $prospectId = $data["prospectId"];
        $data2 = $data;
        $api_url = $this->api_url . "/api/v2/prospects/$prospectId/custom_fields";

        $data = [
            "custom_fields" => [
                ["id" => $field, "value" => $value],
            ]
        ];

        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $response = $client->request("post", $api_url, [
            "json" => $data,
            "auth" => [$this->username, $this->password],
        ]);

        //checking if value is within active campaign tag range
        $foundedTag = null;
        foreach ($this->tags as $tag) {
            if ($value == $tag["tag_name"]) {
                $foundedTag = $tag;
                break;
            }
        }

        if ($foundedTag != null) {

            $activeCampaign = new ActiveCampaign();
            $data = [

                "email" => $data2["email"],
                "p[3]" => 3, //assigning to list id 3 that is partials
                "tags" => $foundedTag["ac_tag_name"]

            ];
            try {
                $info = $activeCampaign->syncContact($data);


            } catch (Exception $ex) {

            }

        }

    }


    // protected function createMemberMouseFreeMember($email){
    //     //checking if already exists
    //     $membermouseUrl = "https://staging.creditsecret.org/wp-content/plugins/membermouse/api/request.php?q=/getMember";
    //     $data = [
    //         "apikey" => "u63i449xd0",
    //         "apisecret" => "ome21xq85n",
    //         "email" => $email
    //     ];
    //     $client = new GuzzleHttp\Client([
    //         'verify' => false, // Set 'verify' to false here
    //     ]);

    //     $response = $client->request("post", $membermouseUrl, [
    //         "form_params" =>   $data
    //     ]);

    //     $response = $this->getRequestBody($response);
    //     if(isset($response["response_code"]) && $response["response_code"] == 200){

    //     }

    //     // 

    // }

    protected function createMemberMouseMembership($customer_id, $email, $info = [])
    {

        // $newpassword = uniqid();
        // //creating member mouse user
        // $membermouseUrl = "https://staging.creditsecret.org/wp-content/plugins/membermouse/api/request.php?q=/createMember";
        // $data = [
        //     "apikey" => "u63i449xd0",
        //     "apisecret" => "ome21xq85n",
        //     "membership_level_id" => 1,
        //     "email" => $email,
        //     "password" => $newpassword
        // ];

        // $client = new GuzzleHttp\Client([
        //     'verify' => false, // Set 'verify' to false here
        // ]);

        // $response = $client->request("post", $membermouseUrl, [
        //     "form_params" =>   $data
        // ]);

        // $response = $this->getRequestBody($response);

        // if(isset($response["response_code"]) && $response["response_code"] == 200)
        // {
        //     $memberId = $response["response_message"]["member_id"];
        //     //upgrading membership
        //     $membermouseUrl = "https://staging.creditsecret.org/wp-content/plugins/membermouse/api/request.php?q=/updateMember";
        //     $data = [
        //         "apikey" => "u63i449xd0",
        //         "apisecret" => "ome21xq85n",
        //         "member_id" => $memberId,
        //         "membership_level_id" => 2
        //     ];

        //     if(isset($info["first_name"])){
        //         $data["first_name"] = $info["first_name"];
        //     }

        //     if(isset($info["last_name"])){
        //         $data["last_name"] = $info["last_name"];
        //     }


        //     $client = new GuzzleHttp\Client([
        //         'verify' => false, // Set 'verify' to false here
        //     ]);

        //     $response = $client->request("post", $membermouseUrl, [
        //         "form_params" =>   $data
        //     ]);


        // }else{
        //     $memberId = "not available";
        // }


        // //end of creation of member mouse user


        // $api_url = $this->api_url . "/api/v2/customers/$customer_id/custom_fields";

        // $data = [
        //     "custom_fields" => [
        //         ["id" => 3,"value" => $newpassword],
        //         ["id" => 4,"value" => "$memberId"]
        //     ]
        // ];

        // $client = new GuzzleHttp\Client([
        //     'verify' => false, // Set 'verify' to false here
        // ]);

        // $response = $client->request("post", $api_url, [
        //     "json" =>   $data,
        //     "auth" => [$this->username, $this->password],
        // ]);

        $memberId = "not available";

        return $memberId;
    }


    protected function getNextUrl($ptype, $response, $info = null)
    {

        $newUrl = null;
        $currentCampaign = null;
        $fname = $_POST["fname"];


        foreach ($this->campaignPages as $campaign) {
            if ($campaign["cId"] == $this->cId && $campaign["fname"] == $fname) {
                $currentCampaign = $campaign;
                break;
            }
        }


        if ($currentCampaign !== null) {

            for ($i = 0; $i < count($currentCampaign["pages"]); $i++) {
                if ($currentCampaign["pages"][$i]["type"] == $ptype && isset($currentCampaign["pages"][$i]["onbuy"])) {

                    //if on buy available
                    for ($k = 0; $k < count($currentCampaign["pages"]); $k++) {
                        if ($currentCampaign["pages"][$k]["type"] == $currentCampaign["pages"][$i]["onbuy"]) {
                            $newUrl = $currentCampaign["pages"][$k]["page"];
                            break;
                        }
                    }
                    if ($newUrl != null) {
                        break;
                    }
                } else if ($currentCampaign["pages"][$i]["type"] == $ptype && !isset($currentCampaign["pages"][$i]["onbuy"])) {

                    if (isset($currentCampaign["pages"][$i + 1])) {
                        $newUrl = $currentCampaign["pages"][$i + 1]["page"];

                        break;
                    }
                }
            }

        }


        $mmId = isset($response["mmId"]) ? $response["mmId"] : "";
        if ($mmId == "" && isset($_POST["mmId"])) {
            $mmId = $_POST["mmId"];
        }

        if ($response !== null) {

            if ($newUrl !== null) {
                $funnelInfo = '';
                if (isset($_POST['cId'])) {
                    $funnelInfo .= '&cId=' . trim($_POST['cId']);
                }
                if (isset($_POST['fname'])) {
                    $funnelInfo .= '&fname=' . trim($_POST['fname']);
                }
                // if(isset($_POST['ptype'])){
                //     $funnelInfo .= '&ptype='.trim($_POST['ptype']);
                // }
                if ($ptype == "vsl") {
                    $newUrl = $this->base_url . $newUrl . "?prospectId=" . $response["prospectId"] . "&campaignId=" . $this->cId . "&email=" . base64_encode($_POST["email"]) . "&mmid=" . $mmId . "&info=" . base64_encode(json_encode($_POST));
                    return $newUrl . $funnelInfo;
                } else if ($ptype == "checkout") {

                    $newUrl = $this->base_url . $newUrl . "?customerId=" . $response["customerId"] . "&orderId=" . $response["order_id"] . "&mmid=" . $mmId . "&info=" . $info;
                    return $newUrl . $funnelInfo;
                } else if ($ptype == "upsell1" || $ptype == "upsell2" || $ptype == "upsell3" || $ptype == "upsell4") {
                    if (isset($_POST["info"])) {
                        $info = $_POST["info"];
                    }
                    $newUrl = $this->base_url . $newUrl . "?customerId=" . $response["customerId"] . "&orderId=" . $_POST["orderId"] . "&mmid=" . $mmId . "&info=" . $info;
                    return $newUrl . $funnelInfo;
                }

            } else {
                return "/error?reason=next page not found";
            }

        } else {
            //step pages
            $funnelInfo = '';
            if (isset($_POST['cId'])) {
                $funnelInfo .= '&cId=' . trim($_POST['cId']);
            }
            if (isset($_POST['fname'])) {
                $funnelInfo .= '&fname=' . trim($_POST['fname']);
            }
            $info = "";
            if (isset($_POST["info"])) {
                $info = $_POST["info"];
            }
            $newUrl = $this->base_url . $newUrl . "?customerId=" . $_POST["customerId"] . "&orderId=" . $_POST["orderId"] . "&info=" . $info;
            return $newUrl . $funnelInfo;
        }
    }
}


//entry point of the request
if (isset($_POST["ptype"]) && isset($_POST["cId"])) {
    $funnel = new Funnel($_POST["ptype"], $_POST["cId"], $campaign_pages, $tagsMapping);
    echo json_encode([
        "next_url" => $funnel->nextUrl
    ]);
}


// $funnel = new Funnel($_POST["ptype"],$_POST["cId"],$campaign_pages);
// var_dump($funnel->checkEmailAlreadyExists($_POST["email"]));