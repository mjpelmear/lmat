<?php

require_once( 'include/common.php' );

header('Content-type: application/json');

$query = LRI_REBOOT_APP_PATH . '/learningmaps';

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, LRI_REBOOT_SERVER . $query);

$response = json_decode(curl_exec($curl));

curl_close($curl);

print json_encode($response);

?>
