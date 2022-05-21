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

    /*
    Documentação dos metodos:
    https://docs.github.com/en/rest/reference/activity#unstar-a-repository-for-the-authenticated-user--code-samples

    Listar repositórios marcados com estrela pelo usuário autenticado
    GET /user/starred ->referência de como o endereço deverá estar para requisição bem como o methodo.
    
    Verifique se um repositório está marcado com estrela pelo usuário autenticado
    GET /user/starred/{owner}/{repo}

    Estrelar um repositório para o usuário autenticado
    PUT /user/starred/{owner}/{repo}

    Remover a estrela de um repositório para o usuário autenticado
    DELETE /user/starred/{owner}/{repo}

    Listar repositórios marcados com estrela por um usuário
    GET /users/{username}/starred
    etc...      
   */
]);

$response = curl_exec ($ch);
$status_code = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
echo $status_code, "<br>";
echo $response, "<br>";

