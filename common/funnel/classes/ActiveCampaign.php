<?php
class ActiveCampaign{
    
     private $api_url = "https://infoupllc.api-us1.com/api/3/";
     private $api_token = "519079f92fee8c12126dbaa2ac289cbba3f16c4c63826bf3862f1e33dd45f707b5d3f250";
     private $api_url_v1 = "https://infoupllc.api-us1.com";
    
    public function updateEmailOfContact($oldEmail,$newEmail){

        $contact = $this->getContactByEmail($oldEmail);
        
        if(isset($contact["id"]) && $contact["id"] > 0){
            $url = $this->api_url_v1;

            $params = array(
                'api_key' => $this->api_token,
                'api_action' => 'contact_edit',
                'api_output' => 'serialize',
                'email' => $oldEmail,
                'id' => $contact["id"],
                'overwrite' => 0
            );
    
            $query = "";
            foreach ($params as $key => $value) $query .= urlencode($key) . '=' . urlencode($value) . '&';
            $query = rtrim($query, '& ');
            echo $query;
            die;
    
            $url = rtrim($url, '/ ');
            $api = $url . '/admin/api.php?' . $query;
            $result = $this->acm_post_request($api);
            var_dump($result);
            die;
        }
    }


    public function updateList($old_list,$new_list,$email){
     
        $url = $this->api_url . "contactLists";
        $contact = $this->getContactByEmail($email);
        if(isset($contact['id']) && $contact['id'] > 0){
            $contact_id = $contact['id'];
            $headers = [
                'Api-Token' => $this->api_token,
            ];

            $data2 = [
                "contactList" => [
                    "list" =>  $old_list,
                    "contact" =>  $contact_id,
                    "status" => 2
                ]
            ];

            $data = [
                "contactList" => [
                    "list" =>  $new_list,
                    "contact" =>  $contact_id,
                    "status" => 1
                ]
            ];

            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);

            
          
            try {
               
                //subscribing to new list
                $string_json = json_encode($data);
                $options = array(
                    'headers' => $headers,
                    'body' => $string_json
        
                );

                $res = $client->post($url, $options);
                
                //unsubscriving from old list
                $string_json = json_encode($data2);
                $options = array(
                    'headers' => $headers,
                    'body' => $string_json
        
                );

                $res = $client->post($url, $options);

            } catch (Exception $e) {
                
            }

        }else{
            //adding contact to active campaign with updated list
            $activeCampaign = new ActiveCampaign();
            $data = [
                
                    "email" => $email,
                    "p[3]" => $new_list
                
                ];
                try{
                    $info = $activeCampaign->syncContact($data);
                   
                  
                }catch(Exception $ex){

                }
           
        
        }
    }

    public function getContactByEmail($email)
    {
       
        $url = $this->api_url_v1;

        $params = array(
            'api_key' => $this->api_token,
            'api_action' => 'contact_view_email',
            'api_output' => 'serialize',
            'email' => $email,
        );

        $query = "";
        foreach ($params as $key => $value) $query .= urlencode($key) . '=' . urlencode($value) . '&';
        $query = rtrim($query, '& ');


        $url = rtrim($url, '/ ');
        $api = $url . '/admin/api.php?' . $query;
        
        return $this->acm_post_request($api);
    }


    public function syncContact($post)
    {
      
        $url = $this->api_url_v1;

        $params = array(
            'api_key' => $this->api_token,
            'api_action' => 'contact_sync',
            'api_output' => 'serialize',
        );

        $query = "";
        foreach ($params as $key => $value) $query .= urlencode($key) . '=' . urlencode($value) . '&';
        $query = rtrim($query, '& ');

        $data = "";
        foreach ($post as $key => $value) $data .= urlencode($key) . '=' . urlencode($value) . '&';
        $data = rtrim($data, '& ');

        $url = rtrim($url, '/ ');
        $api = $url . '/admin/api.php?' . $query;
        return $this->acm_post_request($api, $data);
    }

    private function acm_post_request($api, $data = null)
    {
     
        $result = array();
        try {
            $request = curl_init($api);
            curl_setopt($request, CURLOPT_HEADER, 0);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            if ($data != null) {
                curl_setopt($request, CURLOPT_POSTFIELDS, $data);
            }
            curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

            $response = (string)curl_exec($request);
            curl_close($request);
            $result = unserialize($response);
            return $result;
        } catch (Exception $e) {
          
        }

        return $result;
    }


    public  function addUpdateContacts($contactData)
    {
       
        $string_json = json_encode($contactData);
        $accessToken = $this->api_token;
        $headers = [
            'Api-Token' => $accessToken,
        ];
        $url = $this->api_url . "contact/sync";
        $options = array(
            'headers' => $headers,
            'body' => $string_json

        );
       
        $response = array();
        try {
            $client = new GuzzleHttp\Client([
                'verify' => false, // Set 'verify' to false here
            ]);
            $res = $client->post($url, $options);
            $data = $res->getBody()->getContents();
            $response = json_decode($data, true);
        } catch (\Exception $e) {
            echo $ex->getMessage();
            die;
            
        }
        return $response;
    }





}