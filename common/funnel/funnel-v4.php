<?php
require_once("./vendor/autoload.php");  //updated code
use GuzzleHttp\Client;

require_once("./campaign_pages.php");

require_once("../initialize.php");

require_once("./Offers.php");

require_once("./data/tags.php");

require_once("./classes/ActiveCampaign.php");

@require_once("./classes/FreshAddress.php");

@require_once("./../../secret/mm/classes/Sticky.php");


class Funnel
{
    private $username = null;
    private $password = null;
    private $ptype = "vsl";
    private $cId = null;
    public $nextUrl = null;
    protected $api_url = "https://limitlesslifellc.sticky.io";
    private $declined_redirect_campaign_id = 11;
    private $is_declined_redirect = 1;
    private $ip = null;
    private $purchased_product = null;
    private $purchased_product_id = null;
    private $reason = null;

    protected $otherOffer = null;

    private $failure_reasons = [
        "Pick up card - SF",
        "Insufficient Funds",
        "Do Not Honor",
        "This transaction has been declined",
        "Activity limit exceeded",
        "Pick up card - NF",
        "Pick up card - S",
        "Issuer Declined MCC"
    ];
    private $campaignPages = null;
    private $base_url = BASE_URL;
    private $dev_url = DEV_URL;
    private $shippingId = 2; //currently initialized as free shipping
    private $mode = "production";
    private $tags = [];

    public function containsFailureReason($reason) {
        foreach ($this->failure_reasons as $failure_reason) {
            if (strpos($reason, $failure_reason) !== false) {
                return true;
            }
        }
        return false;
    }


    public function __construct($ptype, $cId, $campaignPages, $tags)
    {
        if ($this->mode == "development") {
            $this->base_url = $this->dev_url;
        }
        $this->username = "api-user";
        $this->password = "QUZHrw97CRuevk";
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
        $decline_upsell_products = [
            90,91,92
        ];

        $cId = $this->cId;
      
        $offerToUpsell = json_decode(base64_decode($_POST["offer"]),true);
        if(in_array($offerToUpsell["product_id"],$decline_upsell_products)){
            $cId = $this->declined_redirect_campaign_id;
            $this->is_declined_redirect = 1; 
        }
        

        $offerClass = new Offers();
        $offers = $offerClass->fetchOfferData($_POST["offer"], $cId);
        
        $this->purchased_product = $offers[0]["product_name"];
        $this->purchased_product_id = $offers[0]["product_id"];


        $upsellData = [
            "previousOrderId" => $_POST["orderId"],
            "shippingId" => $this->shippingId,
            "ipAddress" => $this->ip,
            "campaignId" => $cId,
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
         //$response = [];
        $result = isset($response["response_code"]) && $response["response_code"] == 100;
        
        if ($result) {

            //purchasing bundle
            $this->purchaseBundle($_POST["offer"], $_POST["mmId"]);
            $this->addOrderCustomFields($response["order_id"],"no");
            return $this->getNextUrl($_POST["ptype"], $response);
        } else {
            //on decline need to get declined product if previous campaign was not declined
            $reason = (isset($response["error_message"])) ? $response["error_message"] : "something not working correctly during making checkout";
            $reason = "Insufficient Funds";
           
            if($this->containsFailureReason($reason) && $cId != $this->declined_redirect_campaign_id)
            {
                
                //check if automator lifetime tried to bought
               $newProduct = $this->getDeclinedProduct($offerToUpsell["product_id"],$this->cId,$_POST["ptype"],$_POST["fname"]);
               if(!empty($newProduct))
               {
                    $newProduct = base64_encode(json_encode($newProduct));
                    $_POST["offer"] = $newProduct;  //updating offer so that pixel updated with new value
                    $offerClass = new Offers();
                    $offers = $offerClass->fetchOfferData($newProduct, $this->declined_redirect_campaign_id);
                    $upsellData = [
                        "previousOrderId" => $_POST["orderId"],
                        "shippingId" => $this->shippingId,
                        "ipAddress" => $this->ip,
                        "campaignId" => $this->declined_redirect_campaign_id,
                        "offers" => $offers,
                        "notes" => "Upsell added to previous order afer declining due to insufficient balance"
                    ];
                     $response = $client->request("post", $api_url, [
                        "json" => ($upsellData),
                        "auth" => [$this->username, $this->password],
                    ]);

                    $response = $this->getRequestBody($response);
                    $result = isset($response["response_code"]) && $response["response_code"] == 100;
                    if($result){
                        return $this->getNextUrl($_POST["ptype"], $response);
                    }else{
                        return "/error?reason=" . $reason;
                    }
                    
               }
            }
            return "/error?reason=" . $reason;
        }
    }

    protected function getDeclinedProduct($oldProductId,$cId,$ptype,$fname)
    {
        $currentCampaign = null;
        $offers = [];
        foreach ($this->campaignPages as $campaign) {
            if ($campaign["cId"] == $this->cId && $campaign["fname"] == $fname) {
                $currentCampaign = $campaign;
                break;
            }
        }

       

        if ($currentCampaign !== null) {
            $founded = 0;
            for ($i = 0; $i < count($currentCampaign["pages"]); $i++) {
                if ($currentCampaign["pages"][$i]["type"] == $ptype && isset($currentCampaign["pages"][$i]["decline-redirect"])){
                    //checking offer that contains old product to $oldProductId
                    foreach($currentCampaign["pages"][$i]["decline-redirect"] as $key => $info)
                    {
                        if(in_array($oldProductId,$info["previous_product_id"]))
                        {
                            $offers = $info;
                            unset($offers["previous_product_id"]);
                            $founded = 1;
                            break;
                        }
                    }

                }
                if($founded == 1){
                    break;
                }
            }
        }

        return $offers;
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
        //checking if sticky has that customer previously
        $sticky = new Sticky;
        $customerInfo = $sticky->getCustomerInfo($_POST["email"]);
        if($customerInfo != null)
        {
            $_POST["first_name"] = $customerInfo["first_name"];
            $_POST["last_name"] = $customerInfo["last_name"];
        }
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

        if(isset($_POST["campaign_id"]) && !empty($_POST["campaign_id"]))
        {
            $prospectData["AFID"] = $_POST["campaign_id"];
        }

        if(isset($_POST["ad_id"]) && !empty($_POST["ad_id"]))
        {
            $prospectData["SID"] = $_POST["ad_id"];
        }

        if(isset( $_POST["utm_campaign_id"]) && !empty($_POST["utm_campaign_id"])){
            $prospectData["utm_campaign"] = $_POST["utm_campaign_id"];
        }

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

    protected function addOrderCustomFields($order_id,$is_book="no")
    {
       
        $fields = [];
        
         //attaching google ga4 field with prospect
         if(isset($_POST["ga4_client_id"]) && !empty($_POST["ga4_client_id"])){
           $fields[] = ["id" => 14, "value" => $_POST["ga4_client_id"]];
        }

        //ga4_session_id
        if(isset($_POST["ga4_session_id"]) && !empty($_POST["ga4_session_id"])){
            $fields[] = ["id" => 15, "value" => $_POST["ga4_session_id"]];
        }

        //rt_variation_id
        if(isset($_POST["rt_variation_id"]) && !empty($_POST["rt_variation_id"]))
        {
            $fields[] = ["id" => 13, "value" => str_replace("#","",$_POST["rt_variation_id"])];
        }

        //rt_rotator_id
        if(isset($_POST["rt_rotator_id"]) && !empty($_POST["rt_rotator_id"]))
        {
            $fields[] = ["id" => 16, "value" => str_replace("#","",$_POST["rt_rotator_id"])];
        }

        //rt_rotator_id
        if(isset($_POST["utm_campaign_id"]) && !empty($_POST["utm_campaign_id"]))
        {
            $fields[] = ["id" => 22, "value" => $_POST["utm_campaign_id"]];
        }

        //adding is_book field
        if(isset($_POST["isbook"]) && $_POST["isbook"] == "no")
        {
            $is_book = "no";
        }
        $fields[] = ["id" => 17, "value" => $is_book];

        if(isset($_POST["device"]))
        {
            $fields[] = ["id" => 40, "value" => $_POST["device"]];
        }

        if(isset($_POST["rt_funnel_id"]))
        {
            $fields[] = ["id" => 50, "value" => $_POST["rt_funnel_id"]];
        }

        if(isset($_POST["rt_step_id"]))
        {
            $fields[] = ["id" => 51, "value" => $_POST["rt_step_id"]];
        }

        if(isset($_POST["rt_variation_path"]))
        {
            $fields[] = ["id" => 52, "value" => $_POST["rt_variation_path"]];
        }

  

            $additional_info = [
                "tags" => isset($_POST["tags"]) ? implode("***",$_POST["tags"]) : ''
            ];

            if($is_book == "yes")
            {
                $additional_info["upsell_info"] = $this->otherOffer;
                $additional_info["remove_ac_list_id"] = 3;
                $additional_info["new_ac_list_id"] = 4;
            }

            $fields[] = ["id" => 54, "value" => base64_encode(json_encode($additional_info))];

            $this->addOrderCustomField($fields,$order_id);

        // if(count($fields) >= 1){
        //     $this->addOrderCustomField($fields,$order_id);
        // }
    }

    protected function addOrderCustomField($fields,$order_id){
        //$fields = json_decode('[{"id":14,"value":"1388411904.1701234254"},{"id":15,"value":"1701234253"}]',true);
        $url =   $this->api_url . "/api/v2/orders/$order_id/custom_fields";
       
      
        $data = [
            "custom_fields" => $fields
        ];

        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $response = $client->request("post", $url, [
            "json" => $data,
            "auth" => [$this->username, $this->password],
        ]);
    }

    //for processing checkout page
    protected function processCheckoutPage()
    {
        //if user came directly to checkout page
        // if (!isset($_POST["prospectId"]) || empty($_POST["prospectId"])) {
        //     //creating prospect first
        //     $_POST["prospectId"] = $this->makeProspect();
        // }
        //collecting data to update prospect
       

        // $prospectData = [
        //     "prospect_id" => [
        //         $_POST["prospectId"] => [
        //             // "first_name" => $nameTokens[0],
        //             // "last_name" => $nameTokens[1],
        //             //"zip" => $_POST["billing_zip"],
        //             "email" => $_POST["email"],
        //             // "address" => $_POST["billing_address"],
        //             // "address2" => $_POST["billing_address"],
        //             "country" => "US",
        //             // "city" => $_POST["billing_city"],
        //             // "state" => $_POST["billing_state"],
        //             "notes" => "Updated during checkout"
        //         ]
        //     ]
        // ];

        //     if(isset($_POST["billing_zip"]) && !empty($_POST["billing_zip"]))
        //     {
        //         $prospectData["prospect_id"][$_POST["prospectId"]]["zip"] = $_POST["billing_zip"];
        //     }

           

        



        // $api_url = $this->api_url . "/api/v1/prospect_update";
        // $client = new GuzzleHttp\Client([
        //     'verify' => false, // Set 'verify' to false here
        // ]);

        // $response = $client->request("post", $api_url, [
        //     "json" => $prospectData,
        //     "auth" => [$this->username, $this->password],
        // ]);

        // $response = $this->getRequestBody($response);
        //attaching google ga4 field with prospect
        // if(isset($_POST["ga4_client_id"]) && !empty($_POST["ga4_client_id"])){
        //     $this->addCustomFieldWithoutAC(["prospectId" => $_POST["prospectId"]],9,$_POST["ga4_client_id"]);
        // }

        // //ga4_session_id
        // if(isset($_POST["ga4_session_id"]) && !empty($_POST["ga4_session_id"])){
        //     $this->addCustomFieldWithoutAC(["prospectId" => $_POST["prospectId"]],10,$_POST["ga4_session_id"]);
        // }

        // //rt_variation_id
        // if(isset($_POST["rt_variation_id"]) && !empty($_POST["rt_variation_id"]))
        // {
        //     $this->addCustomFieldWithoutAC(["prospectId" => $_POST["prospectId"]],12,$_POST["rt_variation_id"]);
        // }

            // $this->addProspectCustomFields($_POST["prospectId"]);

        $offerClass = new Offers();
        $otherOffers = $_POST["offers"];
        $otherOffers = explode(",", $otherOffers);

        //$_POST["offers"]
        $offers = json_decode(base64_decode($otherOffers[0]),true);//$offerClass->fetchOfferData($otherOffers[0], $this->cId); //testing
        
        $is_trial = 0;
        if(isset($offers[0]) && isset($offers[0]['trial'])){
            $is_trial = 1;
        }
        $key = array_search(18, $otherOffers); // Find the key of value 18

        if ($key !== false) {
            unset($otherOffers[$key]); // Unset the value at the found key
        }
        //replacing 18 as it is already set
        if (count($otherOffers) >= 2) {
            //$otherOffers = $offerClass->fetchOfferData($otherOffers[1], $this->cId);
            $this->otherOffer = $otherOffers[1];
            $otherOffers = [];  //removing other offers to check if it effects the checkout time
        }

        if($is_trial == 0 && isset($otherOffers[0]) && isset($otherOffers[0]['trial'])){
            $is_trial = 1;
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
        $credit_card_number = isset($_POST['credit_card_number']) ? str_replace(" ", "", $_POST["credit_card_number"]) : '';
        $credit_card_expiry_month = isset($_POST['credit_card_expiry_month']) ? $_POST['credit_card_expiry_month'] : '';
        $credit_card_expiry_year = isset($_POST['credit_card_expiry_year']) ? $_POST['credit_card_expiry_year'] : '';
        $cvc = isset($_POST['cvc']) ? trim($_POST['cvc']) : '';

        $creditCard = isset($_POST['credit_card']) ? str_replace(" ", "", $_POST["credit_card"]) : $credit_card_number;
        $expirationDate = $credit_card_expiry_month . substr($credit_card_expiry_year, -2);
        $CVV = isset($_POST['cvv']) ? trim($_POST['cvv']) : $cvc;
        $this->purchased_product = $offers[0]["product_name"];
        unset($offers[0]["product_name"]);
        $this->purchased_product_id = $offers[0]['product_id'];
        $checkoutData = [
           // "prospectId" => $_POST["prospectId"],
            "creditCardNumber" => !empty($creditCard) ? $creditCard : $credit_card_number,
            "expirationDate" => $expirationDate,
            "CVV" => "OVERRIDE",//$CVV,
            "creditCardType" => $this->getCardType($creditCard),
            "shippingId" => $this->getShippingId($this->cId),
            "tranType" => "Sale",
            "ipAddress" => $this->ip,
            "campaignId" => $this->cId,
            "offers" => $offers,
            "email" => $_POST["email"]
           
        ];

         $nameTokens = [];
        if (isset($_POST["name"]) && $_POST["name"] != null) {
            $tokens = explode(" ", $_POST["name"]);
            $nameTokens[] = $tokens[0];
            $nameTokens[] = isset($tokens[1]) ? $tokens[1] : "Not Available";
        }
        $billing_address = isset($_POST["billing_address"]) ? $_POST["billing_address"] : "";
        $billing_zip = isset($_POST["billing_zip"]) ? $_POST["billing_zip"] : "";
        $billing_city = isset($_POST["billing_city"]) ? $_POST["billing_city"] : "";
        $billing_state = isset($_POST["billing_state"]) ? $_POST["billing_state"] : "";

        $info = [
            "first_name" => isset($nameTokens[0]) ? $nameTokens[0] : "",
            "last_name" => isset($nameTokens[1]) ? $nameTokens[1] : "",
            "zip" => $_POST["billing_zip"],
            "email" => $_POST["email"],
        ];

    

        if(isset($_POST["tags"]) && !empty($_POST['tags'])){
          
           // $this->syncTagsWithAC($_POST["email"],$_POST["tags"]);
           
        }

        if(isset($_POST["first_name"]) && !empty($_POST["first_name"]))
        {
            $info["first_name"] =  $_POST["first_name"];
        }

        if(isset($_POST["last_name"]) && !empty($_POST["last_name"]))
        {
            $info["last_name"] =  $_POST["last_name"];
        }


       $info["postData"] = $_POST;
        $info["dbemail"] = $_POST["email"];
        $info["billing_country"] = "United States";
        
        $info["dbpamount"] = 39;

        if (isset($nameTokens[0]) && !empty($nameTokens[0])) {
            $checkoutData["firstName"] = $nameTokens[0];
            $checkoutData["billingFirstName"] = $nameTokens[0];
        }

        if (isset($nameTokens[1]) && !empty($nameTokens[1])) {
            $checkoutData["lastName"] = $nameTokens[1];
            $checkoutData["billingLastName"] = $nameTokens[0];

        }

        if (isset($_POST["billing_address"]) && !empty($_POST["billing_address"])) {
            $checkoutData["address"] = $_POST["billing_address"];
            $checkoutData["address2"] = $_POST["billing_address"];
            $checkoutData["billingAddress"] = $_POST["billing_address"];
        }

        if (isset($_POST["billing_city"]) && !empty($_POST["billing_city"])) {
            $checkoutData["city"] = $_POST["billing_city"];
            $checkoutData["billing_city"] = $_POST["billing_city"];
        }

        if (isset($_POST["billing_state"]) && !empty($_POST["billing_state"])) {
            $checkoutData["state"] = $_POST["billing_state"];
           $checkoutData["billing_state"] = $_POST["billing_state"];
        }
       
        $checkoutData["shippingCountry"] = "US";

        if(isset($_POST["utm_campaign_id"]) && !empty($_POST["utm_campaign_id"]))
        {
            $checkoutData["utm_campaign"] = $_POST["utm_campaign_id"];
        }
        
        if (isset($_POST["discount"]) && !empty($_POST["discount"]) && $_POST["discount"] != 0) {
            $checkoutData["promoCode"] = $_POST["discount"];
        }
        $info["mainProduct"] = count($offers) > 0 ? $offers[0]['product_id']:18;
        $info["campaignId"] = $this->cId;
        $info["shippingId"] = $this->shippingId;
        $info["is_trial_checked"] = $is_trial;
        $info["dbpamount"] = $offers[0]['product_id'] == 67 ? 39.95 : 39;
        $infoToSend = $info;


        $api_url = $this->api_url . "/api/v1/new_order";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

      

        $response = $client->request("post", $api_url, [
            "json" => $checkoutData,
            "auth" => [$this->username, $this->password],
        ]);
       $response = $this->getRequestBody($response);
        //$response = [];
        
        $result = isset($response["response_code"]) && $response["response_code"] == 100;

        if ($result) {
            //adding custom fields with order
            $this->addOrderCustomFields($response["order_id"],"yes");
            
            sleep(3);
            //removing contact from cs vsl partial
            $info["dbtid"] = $response["order_id"];
            $info["purchased_product"] = $this->purchased_product;
            $info["purchased_product_id"] = $this->purchased_product_id;
            $info = json_encode($info);
            $info = base64_encode($info);
            if(FreshAddress::isValidEmail($_POST["email"])){
               // $activeCampaign = new ActiveCampaign();
               // $activeCampaign->updateList(3, 4, $_POST["email"]); //unsubscrive from cs vsl partial and subscription to credit secret customers
            }
            $alreadyExists = $this->checkEmailAlreadyExists($_POST["email"]);
            if (!$alreadyExists) {
                //adding custom password field to order
                $mmId = $this->createMemberMouseMembership($response["customerId"], $_POST["email"], $infoToSend);
            } else {
                $mmId = $alreadyExists;
            }
            $response["mmId"] = $mmId;
            //creating upsell with this order
            $otherOffers = [];
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
                if(isset($response2["order_id"]))
                {
                    $this->addOrderCustomFields($response2["order_id"],"no");
                }
            }


            //attaching scb offer
            //$this->purchaseBundle(null,$mmId);
            //end of adding custom password field to order

            return $this->getNextUrl("checkout", $response, $info);
        } else {
          // $reason =   "Insufficient Funds";  //will be commented after testing
            $reason = (isset($response["error_message"])) ? $response["error_message"] : "something not working correctly during making checkout";
            
            if($this->containsFailureReason($reason)){
                //decline redirect funnel 
                //getting decline redirect offers (if available)
                $declinedOffers = $this->getDeclineRedirectOffer();
                if(!empty($declinedOffers) && isset($declinedOffers["required_offer"])){
                    $required_offer = base64_encode(json_encode($declinedOffers["required_offer"]));
                    //checkout now making for decline redirect required offer
                    $offers = $offerClass->fetchOfferData($required_offer, $this->declined_redirect_campaign_id);
                    $checkoutData = [
                        "prospectId" => $_POST["prospectId"],
                        "creditCardNumber" => $creditCard,
                        "expirationDate" => $expirationDate,
                        "CVV" => "OVERRIDE",//$CVV,
                        "creditCardType" => $this->getCardType($creditCard),
                        "shippingId" => $this->getShippingId($this->declined_redirect_campaign_id),
                        "tranType" => "Sale",
                        "ipAddress" => $this->ip,
                        "campaignId" => $this->declined_redirect_campaign_id,
                        "offers" => $offers
                    ];
                    $api_url = $this->api_url . "/api/v1/new_order_with_prospect";
                    $client = new GuzzleHttp\Client([
                        'verify' => false, // Set 'verify' to false here
                    ]);
            
                    $response = $client->request("post", $api_url, [
                        "json" => $checkoutData,
                        "auth" => [$this->username, $this->password],
                    ]);
                    $response = $this->getRequestBody($response);
                    //$response = [];
                    if(isset($response["response_code"]) && $response["response_code"] == 100){
                        $this->addOrderCustomFields($response["order_id"],isset($declinedOffers["required_offer"]["is_book"]) && $declinedOffers["required_offer"]["is_book"] == "yes" ? "yes":"no");
                        $this->is_declined_redirect = 1;
                        sleep(3);
                        //removing contact from cs vsl partial
                        $info["dbtid"] = $response["order_id"];
                        $info["is_declined_redirect"] = $this->is_declined_redirect;
                        $info["dbpamount"] = 19.97;
                        $info = json_encode($info);
                        $info = base64_encode($info);
                        if(FreshAddress::isValidEmail($_POST["email"])){
                            $activeCampaign = new ActiveCampaign();
                            $activeCampaign->updateList(3, 4, $_POST["email"]); //unsubscrive from cs vsl partial and subscription to credit secret customers
                        }
                        $alreadyExists = $this->checkEmailAlreadyExists($_POST["email"]);
                        if (!$alreadyExists) {
                            //adding custom password field to order
                            $mmId = $this->createMemberMouseMembership($response["customerId"], $_POST["email"], $infoToSend);
                        } else {
                            $mmId = $alreadyExists;
                        }
                        $response["mmId"] = $mmId;
                        //creating upsell with this order
                        
                        if (count($otherOffers) >= 1) { //if user checks bump offer then replaced with its decline offer
                            
                            $upsellData = [
                                "previousOrderId" => $response["order_id"],
                                "shippingId" => $this->shippingId,
                                "ipAddress" => $this->ip,
                                "campaignId" => $this->declined_redirect_campaign_id,
                                "offers" => $otherOffers,
                                "notes" => "SMC Purchased on decline"
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
                            $this->addOrderCustomFields($response2["order_id"]);
                        }
            
            
                        //attaching scb offer
                        //$this->purchaseBundle(null,$mmId);
                        //end of adding custom password field to order
            
                        return $this->getNextUrl("checkout", $response, $info);
                    }else{
                        
                        $reason = (isset($response["error_message"])) ? $response["error_message"] : "something not working correctly during making checkout";
                        //third retry code
                        //$reason = "Insufficient Funds";  //will be commented after testing
                        if($this->containsFailureReason($reason)){
                            
                            $declinedOffers = $this->getDeclineRedirectOffer("second-decline");
                          
                            if(!empty($declinedOffers) && isset($declinedOffers["required_offer"])){
                                $required_offer = base64_encode(json_encode($declinedOffers["required_offer"]));
                                //checkout now making for decline redirect required offer
                                $offers = $offerClass->fetchOfferData($required_offer, $this->declined_redirect_campaign_id);
                                $checkoutData = [
                                    "prospectId" => $_POST["prospectId"],
                                    "creditCardNumber" => $creditCard,
                                    "expirationDate" => $expirationDate,
                                    "CVV" => "OVERRIDE",//$CVV,
                                    "creditCardType" => $this->getCardType($creditCard),
                                    "shippingId" => $this->getShippingId($this->declined_redirect_campaign_id),
                                    "tranType" => "Sale",
                                    "ipAddress" => $this->ip,
                                    "campaignId" => $this->declined_redirect_campaign_id,
                                    "offers" => $offers
                                ];
                                $api_url = $this->api_url . "/api/v1/new_order_with_prospect";
                                $client = new GuzzleHttp\Client([
                                    'verify' => false, // Set 'verify' to false here
                                ]);
                        
                                $response = $client->request("post", $api_url, [
                                    "json" => $checkoutData,
                                    "auth" => [$this->username, $this->password],
                                ]);
                                $response = $this->getRequestBody($response);
                                if(isset($response["response_code"]) && $response["response_code"] == 100){
                                    $this->is_declined_redirect = 1;
                                    //adding custom fields with order
                                    $this->addOrderCustomFields($response["order_id"],isset($declinedOffers["required_offer"]["is_book"]) && $declinedOffers["required_offer"]["is_book"] == "yes" ? "yes":"no");
                                    sleep(3);
                                    //removing contact from cs vsl partial
                                    $info["dbtid"] = $response["order_id"];
                                    $info["is_declined_redirect"] = $this->is_declined_redirect;
                                    $info["dbpamount"] = 19.97;
                                    $info = json_encode($info);
                                    $info = base64_encode($info);
                                    if(FreshAddress::isValidEmail($_POST["email"])){
                                        $activeCampaign = new ActiveCampaign();
                                        $activeCampaign->updateList(3, 4, $_POST["email"]); //unsubscrive from cs vsl partial and subscription to credit secret customers
                                    }
                                    $alreadyExists = $this->checkEmailAlreadyExists($_POST["email"]);
                                    if (!$alreadyExists) {
                                        //adding custom password field to order
                                        $mmId = $this->createMemberMouseMembership($response["customerId"], $_POST["email"], $infoToSend);
                                    } else {
                                        $mmId = $alreadyExists;
                                    }
                                    $response["mmId"] = $mmId;
                                    //creating upsell with this order
                                    
                                    if (count($otherOffers) >= 1) { //if user checks bump offer then replaced with its decline offer
                                        
                                        $upsellData = [
                                            "previousOrderId" => $response["order_id"],
                                            "shippingId" => $this->shippingId,
                                            "ipAddress" => $this->ip,
                                            "campaignId" => $this->declined_redirect_campaign_id,
                                            "offers" => $otherOffers,
                                            "notes" => "SMC Purchased on decline"
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
                                        $this->addOrderCustomFields($response2["order_id"]);
                                    }
                        
                        
                                    //attaching scb offer
                                    //$this->purchaseBundle(null,$mmId);
                                    //end of adding custom password field to order
                        
                                    return $this->getNextUrl("checkout", $response, $info); //third retry succeeded
                                }
                            }
                        }
                        
                    }
                }
                
            }

            return "/error?reason=" . $reason;
        }
    }

    protected function getDeclineRedirectOffer($retry="decline-redirect"){
       
        $offers = [];
        $ptype = $_POST["ptype"];
        $cId = $_POST["cId"];
        $fname = $_POST["fname"];
        $currentCampaign = null;
        foreach ($this->campaignPages as $campaign) {
            if ($campaign["cId"] == $this->cId && $campaign["fname"] == $fname) {
                $currentCampaign = $campaign;
                break;
            }
        }

       

        if ($currentCampaign !== null) {

            for ($i = 0; $i < count($currentCampaign["pages"]); $i++) {
                if ($currentCampaign["pages"][$i]["type"] == $ptype && isset($currentCampaign["pages"][$i][$retry])){
                    $offers = $currentCampaign["pages"][$i][$retry];
                }
            }
        }

        return $offers;
    }

    protected function getShippingId($cId)
    {
        if (isset($_POST['free_shipping']) && $_POST['free_shipping'] == 1) {
           
            return $this->shippingId;
        }
        
       
        $api_url = $this->api_url . "/api/v1/campaign_view";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $data = [
            "campaign_id" => $cId
        ];

        $response = $client->request("post", $api_url, [
            "json" => $data,
            "auth" => [$this->username, $this->password],
        ]);
        $response = $this->getRequestBody($response);
        
        if ($response["response_code"] == 100) {

            if (isset($response["shipping"]) && count($response["shipping"]) >= 1) {
                for ($i = 0; $i < count($response["shipping"]); $i++) {
                    if ($response["shipping"][$i]["shipping_id"] != $this->shippingId) {
                      
                        return $response["shipping"][$i]["shipping_id"];
                    }
                }
                
            } else {
                
                return $this->shippingId;
            }

        } else {
            
            return $this->shippingId; //default free shipping
        }
        return $this->shippingId; //
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

            if(isset($_POST["campaign_id"]) && !empty($_POST["campaign_id"]))
            {
                $prospectData["AFID"] = $_POST["campaign_id"];
            }

            if(isset($_POST["ad_id"]) && !empty($_POST["ad_id"]))
            {
                $prospectData["SID"] = $_POST["ad_id"];
            }

           
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
                $this->reason = isset($_POST["reason"]) ? $_POST["reason"] : "Not provided.";
                $this->addCustomField(["prospectId" => $prospectId, "email" => $_POST["email"]], 7, $this->reason);
                $this->addProspectCustomFields($prospectId);

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

    protected function addProspectCustomFields($prospectId)
    {
        $fields = [];
        if(isset($_POST["rt_rotator_id"]))
        {
              //      $this->addCustomFieldWithoutAC(["prospectId" => $prospectId],21,$_POST["rt_rotator_id"]);
              $fields[] = ["id" => 21, "value" => $_POST["rt_rotator_id"]];
        }

        if(isset($_POST["rt_variation_id"]))
        {
            // $this->addCustomFieldWithoutAC(["prospectId" => $prospectId],12,$_POST["rt_variation_id"]);
            $fields[] = ["id" => 12, "value" => $_POST["rt_variation_id"]];
        }

        if(isset($_POST["device"]))
        {
           // $this->addCustomFieldWithoutAC(["prospectId" => $prospectId],39,$_POST["device"]);
            $fields[] = ["id" => 39, "value" => $_POST["device"]];
        }

        if(isset($_POST["ga4_client_id"]))
        {
            //$this->addCustomFieldWithoutAC(["prospectId" => $prospectId],9,$_POST["ga4_client_id"]);
            $fields[] = ["id" => 9, "value" => $_POST["ga4_client_id"]];
        }

        if(isset($_POST["ga4_session_id"]))
        {
           // $this->addCustomFieldWithoutAC(["prospectId" => $prospectId],10,$_POST["ga4_session_id"]);
           $fields[] = ["id" => 10, "value" => $_POST["ga4_session_id"]];
        }

        if(isset($_POST["rt_funnel_id"]))
        {
            $fields[] = ["id" => 47, "value" => $_POST["rt_funnel_id"]];
        }

        if(isset($_POST["rt_variation_path"]))
        {
            $fields[] = ["id" => 49, "value" => $_POST["rt_variation_path"]];
        }

        if(isset($_POST["rt_step_id"]))
        {
            $fields[] = ["id" => 48, "value" => $_POST["rt_step_id"]];
        }

        //adding quiz custom field values
        if(isset($_POST["quiz_answers"]))
        {
            $quiz_answers = json_decode($_POST["quiz_answers"],true);
            foreach($quiz_answers as $answer)
            {
                $fields[] = ["id" => $answer["id"], "value" => $answer["value"]];
            }
        
        }

     
        
        //storing the custom fields
        $api_url = $this->api_url . "/api/v2/prospects/$prospectId/custom_fields";

        $data = [
            "custom_fields" => $fields
        ];
        if(!empty($fields)){
            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);

            $response = $client->request("post", $api_url, [
                "json" => $data,
                "auth" => [$this->username, $this->password],
            ]);
         }
    }

    protected function addCustomFieldWithoutAC($data,$field,$value)
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


        

        if(isset($data2["email"]) && !FreshAddress::isValidEmail($data2["email"]))
        {
            return false;   //as email is invalid so no need to send email info to AC
        }
       

       
        //checking if value is within active campaign tag range
        $foundedTag = null;
        foreach ($this->tags as $tag) {
            if ($value == $tag["tag_name"]) {
                $foundedTag = $tag;
                break;
            }
        }
        if(FreshAddress::isValidEmail($_POST["email"])){    //validation added during prospect submission to AC
        if ($foundedTag != null) {
            
            $activeCampaign = new ActiveCampaign();
            $data = [

                "email" => $data2["email"],
                "p[3]" => 3,
                //assigning to list id 3 that is partials
                "tags" => $foundedTag["ac_tag_name"],
                "field[47,0]" => uniqid()

            ];

            if(isset($_POST["tags"]))
            {
                foreach($_POST["tags"] as $tag)
                {
                    $data["tags"] .= "," . $tag;
                }
            }

            if (isset($_POST["name"]) && $_POST["name"] != null) {
                $tokens = explode(" ", $_POST["name"]);
                $nameTokens[] = $tokens[0];
                $nameTokens[] = isset($tokens[1]) ? $tokens[1] : "Not Available";
                $data["firstName"] = $nameTokens[0];
                if($nameTokens[1] != "Not Available"){
                    $data["lastName"] = $nameTokens[1];
                }
            }

           

            try {
                $info = $activeCampaign->syncContact($data);


            } catch (Exception $ex) {

            }

        }else{
            //assigning to partials but without any tag
            $activeCampaign = new ActiveCampaign();
            $data = [

                "email" => $data2["email"],
                "p[3]" => 3,
                "field[47,0]" => uniqid()
                //assigning to list id 3 that is partials
                //"tags" => $foundedTag["ac_tag_name"]

            ];
            if (isset($_POST["name"]) && $_POST["name"] != null) {
                $tokens = explode(" ", $_POST["name"]);
                $nameTokens[] = $tokens[0];
                $nameTokens[] = isset($tokens[1]) ? $tokens[1] : "Not Available";
                $data["firstName"] = $nameTokens[0];
                if($nameTokens[1] != "Not Available"){
                    $data["lastName"] = $nameTokens[1];
                }
            }
            try {
                $info = $activeCampaign->syncContact($data);


            } catch (Exception $ex) {

            }
        }
    }

    }

    protected function syncTagsWithAC($email,$tags)
    {
      
        try{    
        $activeCampaign = new ActiveCampaign();
            
            $data = [

                "email" => $email,
                //assigning to list id 3 that is partials
                //"tags" => $foundedTag["ac_tag_name"]
                
            ];
             
              foreach( $tags as $tag ) {
                $data["tags"] = $tag;
                
                $info = $activeCampaign->syncContact($data);
              }
        }catch(Exception $ex)
        {
            echo $ex->getMessage();
            die;
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

        $utm_campaign = isset($_POST["campaign_id"]) ? $_POST["campaign_id"] : "";
        $utm_campaign_id = isset($_POST["utm_campaign_id"]) ? $_POST["utm_campaign_id"] : "";
        $h_ad_id = isset($_POST["h_ad_id"]) ? $_POST["h_ad_id"] : "";
        if(isset($_POST["ad_id"]) && !empty($_POST["ad_id"]))
        {
            $h_ad_id = $_POST["ad_id"];
        }
        $device = isset($_POST["device"]) ? $_POST["device"] : "";

        $newUrl = null;
        $currentCampaign = null;
        $fname = $_POST["fname"];
        $is_upsell_bought = 0;
        $upsell_price = 0;
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
                    if($this->reason != null)
                    {
                        $_POST["reason_for_buying"] =  $this->reason;
                    }
                    $newUrl = $this->base_url . $newUrl . "?prospectId=" . $response["prospectId"] . "&campaignId=" . $this->cId . "&email=" . base64_encode($_POST["email"]) . "&mmid=" . $mmId . "&info=" . base64_encode(json_encode($_POST)) . "&utm_campaign_id=$utm_campaign_id&h_ad_id=$h_ad_id&device=$device";
                    return $newUrl . $funnelInfo;
                } else if ($ptype == "checkout") {
                    if(isset($_POST["old_info"])){
                        $old_info = json_decode(base64_decode($_POST["old_info"]),true);
                        $info = json_decode(base64_decode($info),true);
                        if(isset($old_info["reason_for_buying"])){
                            $info["reason_for_buying"] = $old_info["reason_for_buying"];
                        }
                        $info = base64_encode(json_encode($info));
                    }
                    $newUrl = $this->base_url . $newUrl . "?customerId=" . $response["customerId"] . "&orderId=" . $response["order_id"] . "&mmid=" . $mmId . "&info=" .  $info. "&utm_campaign=$utm_campaign&h_ad_id=$h_ad_id&utm_campaign_id=$utm_campaign_id&h_ad_id=$h_ad_id&device=$device";
                    return $newUrl . $funnelInfo;
                } else if ($ptype == "upsell1" || $ptype == "upsell2" || $ptype == "upsell3" || $ptype == "upsell4") {
                    $is_upsell_bought = 1;
                    $product_price_mapping = [
                        13 => 33,
                        14 => 49,
                        11 => 149,
                        90 => 19.97,
                        92 => 19.97,
                        91 => 67,
                        26 => 49,
                        69 => 97,
                        71 => 33,
                        72 => 67,
                        66 => 47,
                        45 => 67
                    ];
                    
                    if(isset($_POST["offer"])){
                        $offerInfo = json_decode(base64_decode($_POST["offer"]),true);
                    }
                    
                    

                    if(isset($offerInfo["product_id"])){
                        foreach($product_price_mapping as $key => $price){
                            if($key == $offerInfo["product_id"]){
                                $upsell_price = $price;
                                break;
                            }
                        }
                    }else{
                        $upsell_price = 49;
                    }
                    if (isset($_POST["info"])) {
                        $info = $_POST["info"];
                        $info = base64_decode($info);
                        $info = json_decode($info,true);
                        $info["is_upsell_bought"] = $is_upsell_bought;
                        $info["upsell_price"] = $upsell_price;
                        $info["purchased_product_id"] = $this->purchased_product_id;
                        $info["purchased_product"] = $this->purchased_product;
                        if($this->reason != null){
                            $info["reason_for_buying"] = $this->reason;
                        }
                        if(isset($response["order_id"]))
                        {
                            $info["upsell_order_id"] = $response["order_id"];  //new upsell order id 
                        }
                        $info = json_encode($info);
                        $info = base64_encode($info);
                    }

                  

                    $newUrl = $this->base_url . $newUrl . "?customerId=" . $response["customerId"] . "&contact_id=".$response["customerId"]."&orderId=" . $_POST["orderId"] . "&mmid=" . $mmId . "&info=" . $info . "&utm_campaign=$utm_campaign&h_ad_id=$h_ad_id&utm_campaign_id=$utm_campaign_id&device=$device";
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
            $newUrl = $this->base_url . $newUrl . "?customerId=" . $_POST["customerId"] . "&orderId=" . $_POST["orderId"] . "&info=" . $info. "&utm_campaign=$utm_campaign&h_ad_id=$h_ad_id&utm_campaign_id=$utm_campaign_id&device=$device";
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