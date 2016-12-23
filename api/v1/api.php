<?php
require_once("/home/cabox/workspace/constants.php");
require_once(API_PATH . "/v1/api_v1.php");
require_once(UTILITIES);

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
	$_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

//Create a generic API Error in case anything goes wrong and isn't caught
$apiResponse = new ApiResponse(1, "General API Error");

//Process the API request and handle any general exceptions
try {
	//Process the request according to the API
	$API = new API_V1($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
	$apiResponse = $API->processAPI();
} catch (Exception $e) {
	$apiResponse =  new ApiResponse(1, "SERVER ERROR: " . $e->getMessage());
	$apiResponse->httpCode = 500;
}

//Set HTTP status header
$apiResponse->setResponseHeader();

//Output the JSON formatted API response
echo json_encode($apiResponse);
