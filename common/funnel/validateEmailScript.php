<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/common/funnel/classes/FreshAddress.php");

$email = $_GET["email"];

if(FreshAddress::isValidEmail($email))
{
    echo json_encode([
        "valid" => 1
    ]);
}else{
    echo json_encode([
        "valid" => 0
    ]);
}