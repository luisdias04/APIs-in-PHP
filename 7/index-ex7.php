<?php
$ch=curl_init();
$headers = [
    "Authorization: Client-ID XXfoxNhqhFuqEI87YQ5sACRrN0OJwoWr31n5l956x6o"
    //este registro foi da api pelo site unsplash.com, foi passado pelo cabeçalho usando curlopt httpheader
];
curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.unsplash.com/photos/random",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTPHEADER=>$headers
]);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo $status_code,"<br>";
echo $response;