<?php

class Auth
{
    private int $user_id;
    public function __construct(private UserGateway $user_gateway)
    {
    }
        
    public function authenticateAPIKey(): bool
    {
        if (empty($_SERVER["HTTP_X_API_KEY"])) {
            
            http_response_code(400);
            echo json_encode(["message" => "missing API key"]);
            return false;
        }

        $api_key = $_SERVER["HTTP_X_API_KEY"];  
        
        $user = $this->user_gateway->getByAPIKey($api_key);
        if($user === false) {            
            http_response_code(401);
            echo json_encode(["message" => "invalid API key"]);
            return false;
        }
        $this->user_id = $user["id"];        
        return true;    
    }

    public function getUserID() : int
    {
        return $this->user_id;
    }
}










