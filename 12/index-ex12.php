<?php
$ch=curl_init();
$headers= [
    "Authorization: token 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"    
];
$payload = json_encode([
    "name" => "Created from API",
    "description" => "an example API-created repo"

]);

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/user/repo",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTPHEADER=>$headers,
    CURLOPT_USERAGENT=> "luisdias04",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $payload
    // PODERÁ USAR CURLOPT_POSTFIELD=>$payload
]);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo"<pre>";

echo $status_code,"<br>";
echo $response;