<?php
$ch=curl_init();
$headers= [
    "Authorization: token YOUT_ACESS_KEY",    
];

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/user/starred/httpie/httpie",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTPHEADER=>$headers,
    CURLOPT_USERAGENT=> "daveh",
    CURLOPT_CUSTOMREQUEST => "DELET"//PUT GET POST TEX...
]);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo"<pre>";

echo $status_code,"<br>";
echo $response;