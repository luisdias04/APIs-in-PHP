<?php

declare(strict_types=1);

//ini_set("display_erros","on");

require dirname(__DIR__) . "/vendor/autoload.php";

set_error_handler("ErrorHandler::handleException");
set_exception_handler("ErrorHandler::handleException");

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

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
if(empty($_SERVER["HTTP_X_API_KEY"])){
    http_response_code(400);
    echo json_encode(["message"=>"missing API key"]);
}

$api_key = $_SERVER["HTTP_X_API_KEY"];
$database = new Database($_ENV["DB_HOST"],$_ENV["DB_NAME"],$_ENV["DB_USER"],$_ENV["DB_PASS"]);
$user_gateway = new UserGateway($database);
echo $api_key;
exit;

header("Content-Typer: application/json; charset = UTL-8");
$task_gateway = new TaskGateway($database);
$controller = new TaskController($task_gateway);
$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
