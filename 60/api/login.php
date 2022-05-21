<?php

declare (strict_types=1);

require __DIR__ . "/bootstrap.php";

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    http_response_code(405);
    header("Allow: POST");
    exit;
}

$data = (array) json_decode(file_get_contents("php://input"), true);

if( ! array_key_exists("username", $data) ||
    ! array_key_exists("password", $data)){

    http_response_code(400);
    echo json_encode(["message"=>"missing login credentials"]);
    exit;
}
echo json_encode ($data);