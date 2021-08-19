<?php

require_once("Model.php");

class ClienteModel extends Model
{
    //falta arrumar
    public function validateToken($token){
        $query = "SELECT * FROM Cliente WHERE cliente_token = :token";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue('token', $token);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo 'erro';
        }
    }
}
