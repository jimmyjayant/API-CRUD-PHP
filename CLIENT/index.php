<?php
//$url = "/API%20CRUD%20PHP/API/getapidata.php";
$ch = curl_init();
$data = ['key' => 'asdfghjklzxcvbnm'];
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo $response;
?>
