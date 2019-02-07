<?php


$nowInPHP = $_GET["theData"];
// $nowInPHP = "2";
$baseURL = "https://superheroapi.com/api.php/10218406907863622/";
$baseURL = "https://api.darksky.net/forecast/33f04cae19d269f690b892deaa90f918/37.8267,-122.4233";

$combo = $baseURL . $nowInPHP;
echo 'The combo is ' . $combo;


$curl = curl_init();

//listener to take that variable and tack it on.

curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://superheroapi.com/api.php/10218406907863622/2',
  CURLOPT_URL => $combo,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
// $response = json_decode($response);

//how to pick apart what is in the curl here?

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}