<?php

class ProdutoController
{
    public function get($args = [])
    {
        header('Content-Type: application/json; charset: utf-8');

        if (
            !isset($args['produto_nome']) || $args['produto_nome'] == ''
        ) {
            echo json_encode(['jsonError' => 'É necessário inserir um nome']);
            return http_response_code(404);
        }

        $nome = $args['produto_nome'];
        $produto = new ProdutoModel();

        $produto = $produto->get($nome);

        if (!$produto) {
            echo json_encode(['jsonError' => 'Não encontrada']);
            return http_response_code(404);
        }

        echo json_encode($produto);
    }

    public function post($args = [])
    {
        print_r($args);
        die();
    }
}
