<?php

require_once("./vendor/autoload.php");
use GuzzleHttp\Client;
require_once("./campaign_pages.php");

class Offers{
    private $base_url = "https://limitlesslifellc.sticky.io";
    private $username = "api-user";
    private $password = "QUZHrw97CRuevk";

    protected function getRequestBody($response){
        // Get the request body as a string
        $requestBody = $response->getBody()->getContents();

        // If the request body is in JSON format, you can decode it to an array or object
        $requestData = json_decode($requestBody, true); // For an associative array
        return $requestData;
    }

    public function fetchOfferData($offerInfo,$campaign_id){
        $offerInfo = json_decode(base64_decode($offerInfo),true);
       
        $api_url = $this->base_url . "/api/v1/offer_view";
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);
        $data = [
            "campaign_id" => $campaign_id
        ];
        $response = $client->request("post", $api_url, [
            "json" => $data,
            "auth" => [$this->username, $this->password],
        ]);
        $response = $this->getRequestBody($response);
        $offersRequired = [];
        if(isset($response["data"])){
            foreach($response["data"] as $offer){
                if($offer["id"] == $offerInfo["offer_id"]){
                    $offersRequired[] = $offer;
                }
            }
        }
        
        
       
        

        $offers = [];
        foreach($offersRequired as $offer){
             
          foreach($offer["products"] as $product_id => $product){
            
                if($product_id == $offerInfo["product_id"]){
                    $offerToSend = [
                        "offer_id" => $offer["id"],
                        "step_num" => $offer["id"] == 18 ? 1 : 3,
                        "product_id" => $product_id,
                        "product_name" => $product,
                        "billing_model_id" => $offer["billing_models_detail"][0]["id"],
                    ];
                    if(isset($offer["prepaid"]) && isset($offer["prepaid"]["terms"]) && isset($offer["prepaid"]["terms"][0]["cycles"])){
                        $offerToSend["prepaid_cycles"] = $offer["prepaid"]["terms"][0]["cycles"];
                    }

                    if(isset($offer["trial_flag"]) && $offer["trial_flag"] == 1){
                        $offerToSend["trial"] = ["product_id" => $product_id];
                    }
                    $offers[] = $offerToSend;
                }
            }
        }
       
        return $offers;
    }


}


// $offer = new Offers();
// $offer->fetchOfferData("17,19",4);