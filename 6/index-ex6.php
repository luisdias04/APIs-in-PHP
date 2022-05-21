<?php
$ch=curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=London&appid=bf7ee438ec9c531d801f0f3c44d96b6a",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER=>false
]);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo $status_code,"<br>";
echo $response;

/* https://home.openweathermap.org/api_keys
ai ir no site ascima, registrado ir na chave da api e cola no navegador, terá o resultado ou premissão de acesso.  */