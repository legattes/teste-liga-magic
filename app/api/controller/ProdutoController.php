<?php

class ProdutoController
{
    public function get($args = [])
    {
        if (
            !isset($args['produto_nome'])
        ) {
            header('HTTP/1.1 404 NOT FOUND');
            die();
        }

        $nome = $args['produto_nome'];
        $produto = new ProdutoModel();

        header('Content-Type: application/json');
        echo json_encode(($produto->get($nome)) ? $produto->get($nome) : 'nao encontrado');
    }

    public function post($args = [])
    {
        print_r($args);
        die();
    }
}
