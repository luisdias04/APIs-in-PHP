<?php

class TaskController
{
    public function processRequest(string $method, ?string $id):void{
        
        if($id === null){
            if ($method == "GET"){
                echo "index";
            } elseif ($method == "POST"){
                echo "create";
            } else{
                /* http_response_code(405);
                header("Allow: GET, POST"); */
                $this->respondMethodNotAllowed("GET,POST");
            }
        }else{
            switch($method){
                case "GET":
                    echo "show $id";
                    break;

                case "PATCH":
                    echo "update $id";
                    break;

                case "DELETE":
                    echo "delette $id";
                    break; 
                default: 
                $this->respondMethodNotAllowed("GET, PATCH, DELETE");
            }
        }
    }
    private function respondMethodNotAllowed(string $allowed_method):void
    {
        http_response_code(405);
        header("Allow: $allowed_method");
    }
}