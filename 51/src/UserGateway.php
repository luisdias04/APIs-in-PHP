<?php

class UserGateway
{
    private PDO $conn;

    public function __construct(Database $database){
        $this->conn = $database->getConnection();
    }

    public function getByAPIKey(string $key) : array | false{
        $sql = "SELECT *
        FROM use
        WHERE api_key = :api_key
        ";
        $stmt = $this->conn->preprare($sql);
        $stmt->bindValue(":api_key", $key, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
