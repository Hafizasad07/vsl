<?php
if($_SERVER['HTTP_HOST'] == "localhost"){
    
    require_once($_SERVER["DOCUMENT_ROOT"] . "/creditsecrets/wp-content/root/common/funnel/vendor/autoload.php");
}else if($_SERVER['HTTP_HOST'] == "creditsecrets.local"){
   
    require_once($_SERVER["DOCUMENT_ROOT"] . "/wp-content/root/common/funnel/vendor/autoload.php");
}else{
    require_once($_SERVER["DOCUMENT_ROOT"] . "/common/funnel/vendor/autoload.php");
}
 //updated code
use GuzzleHttp\Client;


class MemberMouse {
    private static $membermouseUrl = "https://members.creditsecret.org/wp-content/plugins/membermouse/api/request.php";

    public static function addBundle($bundle_id,$email)
    {
        
        $endpoint = self::$membermouseUrl . "?q=/addBundle";
        $memberInfo = self::getMember($email);
        $member_id = null;
        
        if(isset($memberInfo["response_data"]["member_id"]))
        {
            $member_id = $memberInfo["response_data"]["member_id"];
        }
        if($member_id != null)
        {
            $data = [
                "apikey" => "u63i449xd0",
                "apisecret" => "ome21xq85n",
                "member_id" => $member_id,
                "bundle_id" => $bundle_id
            ];
            try{
            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);

            $response = $client->request("post", $endpoint, [
                "form_params" => $data
            ]);

            return true;
            }catch(Exception $ex){
               return null;
            }
        }else{
            return null;
        }
    }

    public static function getMember($email)
    {
        try{
            $api_url = self::$membermouseUrl ."?q=/getMember";
            $data = [
                "apikey" => "u63i449xd0",
                "apisecret" => "ome21xq85n",
               "email" => $email
            ];
    
            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);
    
            $response = $client->request("post", $api_url, [
                "form_params" => $data
            ]);
    
            $response = self::getRequestBody($response);
            return $response;
        }catch(Exception $e)
        {
            return null;
        }
    }


    public static function isBundleApplied($bundle_id,$email)
    {
        try{
        $api_url = self::$membermouseUrl ."?q=/getMember";
        $data = [
            "apikey" => "u63i449xd0",
            "apisecret" => "ome21xq85n",
           "email" => $email
        ];

        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        $response = $client->request("post", $api_url, [
            "form_params" => $data
        ]);

        $response = self::getRequestBody($response);
       
        foreach($response["response_data"]["bundles"] as $bundle)
        {
           if($bundle_id == $bundle["id"]){
            return true;
           }
        }
    }catch(Exception $ex)
    {
        
    }
        return false;
    }
    public static function getRequestBody($response)
    {
        // Get the request body as a string
        $requestBody = $response->getBody()->getContents();

        // If the request body is in JSON format, you can decode it to an array or object
        $requestData = json_decode($requestBody, true); // For an associative array
        return $requestData;
    }
}