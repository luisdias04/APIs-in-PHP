<?php

class TaskController
{
    public function __construct(private TaskGateway $gateway){


    }

    public function processRequest(string $method, ?string $id):void{
        
        if($id === null){
            if($method == "GET"){                       
                echo json_encode($this->gateway->getAll());                
            }elseif ($method == "POST"){
                echo "create";
               $data = (array) json_decode (file_get_contents("php://input"), true);
               var_dump($data);
            }
        }else{
            $task = $this->gateway->get($id);
            if($task === false){
                $this->respondNotFound($id);
                return;
            }


            switch($method){
                case "GET":
                    echo "show $id \n";
                    echo json_encode($task);
                    break;

                case "PATCH":
                    echo "update $id";
                    break;

                case "DELETE":
                    echo "delette $id";
                    break;  
            }
        }
    }

    private function respondMethodNotAllowed(string $alowed_methods):void{
        http_response(405);
        header("Allow: $allowed_methods");    
    }

    private function respondNotFound(string $id):void {
        http_response_code(404);
        echo json_encode(["message" => "Task with ID $id not found"]);
    }



}