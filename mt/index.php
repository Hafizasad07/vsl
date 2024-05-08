<?php

function getDeviceType() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    if (strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false) {
        return 'mobile';
    } else {
        return 'desktop';
    }
}

// Redirect based on device type
$deviceType = getDeviceType();
$queryString = http_build_query($_GET);

if ($deviceType === 'mobile') {
    
    header('Location: index-m.php' . (!empty($queryString) ? '?' . $queryString : ''));
    exit;
} else {
   
    header('Location: index-d.php' . (!empty($queryString) ? '?' . $queryString : ''));
    exit;
}





