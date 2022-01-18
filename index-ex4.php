<?php
$ch=curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => "https://randomuser.me/api",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false
]);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);
print_r($response);

echo $response["results"][0]["gender"], "\n";