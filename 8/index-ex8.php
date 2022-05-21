<?php
$ch=curl_init();
$headers= [
    "Authorization: Client-ID YOUR_ACCESS_KEY"
];
$response_headers=[];
$header_callback=function($ch, $header) use (&$response_headers){
    $len = strlen($header);
    $response_headers[]= $header;
    return $len;
};

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.unsplash.com/photos/random",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTPHEADER=>$headers,
    CURLOPT_HEADERFUNCTION => $header_callback
]);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo"<pre>";

echo $status_code,"<br>";
print_r($response_headers);
echo $response;