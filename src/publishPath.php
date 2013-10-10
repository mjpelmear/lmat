<?php

require_once( 'include/common.php' );

header('Content-type: application/json');

//query string parameters
$learningPathJSON = $HTTP_RAW_POST_DATA;

//$accessToken = $_GET['token'];

$query = LRI_REBOOT_APP_PATH . '/learningmaps';

$curl = curl_init();
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($curl, CURLOPT_POSTFIELDS, $learningPathJSON);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  'Content-Type:application/json',
  'Content-Length: ' . strlen($learningPathJSON))
);
curl_setopt($curl, CURLOPT_URL, LRI_REBOOT_SERVER . $query);

$response = curl_exec($curl);
$responseInfo = curl_getinfo($curl);

http_response_code($responseInfo['http_code']);
print json_encode(array('status' => $responseInfo['http_code']));
curl_close($curl);

?>
