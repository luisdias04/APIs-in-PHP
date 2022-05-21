<?php

declare(strict_types=1);

//ini_set("display_erros","on");

require dirname(__DIR__) . "/vendor/autoload.php";

set_exception_handler("ErrorHandler::handleException");



$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$parts = explode("/", $path);
 
$resource = $parts[3] ?? null; 

$id = $parts[4] ?? null;
 
if($resource != "tasks"){
    //header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    //ou pode usar 
    http_response_code(404);

    exit;    
}
header("Content-Typer: application/json; charset = UTL-8");
$database = new Database("localhost","api_db","root","123");
$database->getConnection();

$controller = new TaskController;
$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
