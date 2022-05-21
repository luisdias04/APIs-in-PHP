<?php

$ch = curl_init();

$headers = [
    "Authorization: token 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"    
];

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/user/starred/luisdias04/APIs-in-PHP",
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT=>"luisdias04",    
    CURLOPT_CUSTOMREQUEST=>"DELETE",
    //Se a requisição é metodo post, irá executar uma ação. Assim os outros metodos 
    //podem ser configurados para receber ou executar coisas diferentes na mesma url      
]);

$response = curl_exec ($ch);
$status_code = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
echo $status_code, "<br>";
echo $response, "<br>";