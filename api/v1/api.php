<?php
require_once("/home/cabox/workspace/constants.php");
require_once(API_BASE . "/v1/api_v1.php");
require_once(UTILITIES);

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
	//Process the request according to the API
    $API = new API_V1($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('ERROR' => $e->getMessage()));
}
