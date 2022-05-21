<?php
/**
 * Acess a restful API in PHP with CURL
 * https://api.github.com/gists =>usanso foreach nos comentários recebe uma lista de códigos. 
 * Copiando e colando o código depois no endpoint gists  * 
 * 
 */

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/gists/b1737b98219592fbfadb9efef1ca5dd4",
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_RETURNTRANSFER => true,    
    CURLOPT_USERAGENT=>"luisdias04",    
    ]);

$response = curl_exec ($ch);
curl_close ($ch);
$data = json_decode($response,true);
echo "<pre>";
print_r($data);
/* 
foreach($data as $gist){
    echo $gist["id"]," - ", $gist['description'], "<br/>";
}
 */