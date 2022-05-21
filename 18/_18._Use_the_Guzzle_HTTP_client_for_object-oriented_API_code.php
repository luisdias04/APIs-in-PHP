<?php

require __DIR__ . "/vendor/autoload.php";

/**
 * Não esta dando certo, esta dando erro na linha 212
 * PHP\18\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php on line 212
 * Foi realizado alguns testes sem solução.
 */

$client = new GuzzleHttp\Client;
//echo "<pre/>";
$response = $client->request("GET", "https://api.github.com/user/repos",
[
    "headers" => [
        "Authorization" => "token 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",
        "User-Agent"=> "luisdias04"
    ]
]);

//echo $response->getStatusCode(), "\n";
//echo $response->getHeader("content-type")[0], "\n";
//echo substr($response->getBody(),0,200), "...\n";

/**
 * Utilizado o composer para instalação de pacote guzzlehttp/guzzle
 */

 