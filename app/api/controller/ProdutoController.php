<?php

class ProdutoController
{
    public function get($args = [])
    {
        header('Content-Type: application/json; charset: utf-8');

        if (!$args['produto_nome']) {
            echo json_encode(['jsonError' => 'É necessário inserir um nome']);
            http_response_code(404);
            die();
        }

        $produto = (new ProdutoModel())->get($args['produto_nome']);

        if (!$produto) {
            echo json_encode(['jsonError' => 'Não encontrada']);
            http_response_code(404);
            die();
        }

        echo json_encode($produto);
    }
}
