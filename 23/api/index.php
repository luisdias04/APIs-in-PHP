<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$parts = explode("/", $path);
 
$resource = $parts[3] ?? null; 

$id = $parts[4] ?? null; 

echo"<br/>". $resource, ", ", $id;

echo $_SERVER['REQUEST_METHOD']; 
 
if($resource != "tasks"){
    //header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    //ou pode usar 
    http_response_code(404);

    exit;    
}
