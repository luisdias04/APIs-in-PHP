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
               $errors = $this->getValidationErrors($data);
               if(!empty($errors)){
                   $this->respondUnprocessableEntity($errors);
                   return;
               }
               
               $id = $this->gateway->create($data);
               $this->respondCreated($id);
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
                    $data = (array) json_decode (file_get_contents("php://input"), true);
                    $errors = $this->getValidationErrors($data, false);
                    if(!empty($errors)){
                        $this->respondUnprocessableEntity($errors);
                        return;
                    }
                    $rows = $this->gateway->update($id, $data);
                    echo json_encode(["message"=>"Task updated", "rows"=>$rows]);
                    break;

                case "DELETE":
                    echo "delette $id";
                    break;  
            }
        }
    }

    private function respondUnprocessableEntity(array $errors) : void{
        http_response_code(422);
        echo json_encode(["errors"=>$errors]);
    }

    private function respondMethodNotAllowed(string $alowed_methods):void{
        http_response(405);
        header("Allow: $allowed_methods");    
    }

    private function respondNotFound(string $id):void {
        http_response_code(404);
        echo json_encode(["message" => "Task with ID $id not found"]);
    }
    private function respondCreated(string $id) : void{
        http_response_code(201);
        echo json_encode(["message"=>"Task created", "id" => $id]);
    }
    
    private function getValidationErrors(array $data, bool $is_new = true) :array{
        $errors = [];
        if($is_new && empty($data["name"])){
            $errors[] = "name is required";
        }

        if(!empty($data["priority"])){
            if(filter_var($data["priority"], FILTER_VALIDATE_INT) === false){
                $errors[] = "priority must be an integer";                
            }                        
        }
        return $errors;
    }
}