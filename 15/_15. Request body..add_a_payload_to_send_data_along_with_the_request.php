<?php
/**
 * Metodo utilizado para criar um repositório no github.
 */

$ch = curl_init();

$headers = [
    "Authorization: token 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"    
];
$payload = json_encode([
    "name"=>"Created from API",
    "description"=>"an example API-Created repo"
]);

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/user/repos",
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT=>"luisdias04",    
    CURLOPT_CUSTOMREQUEST=>"POST",
    //PODE SER USADO CURLOPT_POST =>true
    CURLOPT_POSTFIELDS=>$payload   
]);

$response = curl_exec ($ch);
$status_code = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
echo $status_code, "<br>";
echo $response, "<br>";