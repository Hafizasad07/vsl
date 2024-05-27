<?php
    $campaign_id = "";
    $ad_id = "";
    $utm_campaign = isset($_GET["utm_campaign"]) ? $_GET["utm_campaign"] : "";
    if(isset($_GET["utm_campaign_id"]))
    {
        $utm_campaign = $_GET["utm_campaign_id"];
    }
    if(isset($_GET["utm_campaign"]))
    {
        $tokens = explode("-",$_GET["utm_campaign"]);
        $campaign_id = isset($tokens[0]) ? $tokens[0] : "";
    }

    if(isset($_GET["h_ad_id"]))
    {
        $ad_id = $_GET["h_ad_id"];
    }

    if(empty($campaign_id) && !empty($utm_campaign))
    {
        $campaign_id = explode("-",$utm_campaign)[0];
    }

?>