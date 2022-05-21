<?php


//echo $_SERVER["REQUEST_URI"]; Resultado é a Url e tudo que contiver nela e depois dela. 
//echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),"<br/>" recebe somente a URL sem os dados;

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);//Resultado da Url antes do interrogação. 


$parts = explode("/", $path); // onde haver barra, iniciara outro array com a suas pastas raíz

print_r($parts);
 
$resource = $parts[3] ?? null; //indíca a pasta raíz o qual esteja trabalhando

$id = $parts[4] ?? null; // indica se tem uma id caso não tem é nulo
echo"<br/>". $resource, ", ", $id;

echo $_SERVER['REQUEST_METHOD']; // Retorna Metodo de requisição do servidor
 

