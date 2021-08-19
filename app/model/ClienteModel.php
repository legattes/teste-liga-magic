<?php

require_once("Model.php");

class ClienteModel extends Model
{
    public function validateToken($token)
    {
        $query = "SELECT * FROM Cliente WHERE cliente_token = :token";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('token', utf8_encode($token));

        $stmt->execute();

        if ($stmt->errorCode() > 0) {
            echo json_encode(['jsonError' => 'Erro no servidor']);
            http_response_code(404);
            die();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
