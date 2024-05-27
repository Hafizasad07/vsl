<?php
@include_once("../vendor/autoload.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/common/funnel/vendor/autoload.php");
use GuzzleHttp\Client;

class FreshAddress {
    private static $base_url = "https://rt.freshaddress.biz/v7.2?service=react&company=12829&contract=5588&email=";

    public static function isValidEmail($email)
    {
        return true;
        $client = new GuzzleHttp\Client([
            'verify' => false, // Set 'verify' to false here
        ]);

        try{
            $response = $client->request("get", self::$base_url . $email);
            $response = self::getRequestBody($response);
            if(isset($response["COMMENT"]) && $response["COMMENT_CODE"] == "VS")
            {
                self::logFreshAddressMessage($email . " is valid");
                return true;
            }else{
                self::logFreshAddressMessage($email . " is invalid");
                return false;

            }
        }catch(ex)
        {
            return false;
        }
    }

    protected static function logFreshAddressMessage($msg){
        if(!is_dir("./logs/")){
            mkdir("./logs/");
        }
        $filename = "./logs/" . date("Y-m-d")  . "-fresh-address.log";
       if(!file_exists($filename))
        {
            touch($filename);
        }
    
        $fh = fopen($filename,'a');
        fwrite($fh, date("Y-m-d H:i:s") . ":: " . $msg . "\n");
        fclose($fh);
    }

    protected static function getRequestBody($response)
    {
        // Get the request body as a string
        $requestBody = $response->getBody()->getContents();

        // If the request body is in JSON format, you can decode it to an array or object
        $requestData = json_decode($requestBody, true); // For an associative array
        return $requestData;
    }
}

//FreshAddress::isValidEmail("rehan5383@gmail.com");