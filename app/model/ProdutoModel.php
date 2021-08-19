<?php

require_once("Model.php");

class ProdutoModel extends Model
{
    public function index()
    {
        $query = "SELECT * FROM Produto";

        return ($this->db->query($query))->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($nome)
    {
        $query = "SELECT * FROM Produto WHERE produto_nome = :nome";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue('nome', $nome);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo 'erro';
        }
    }
}
