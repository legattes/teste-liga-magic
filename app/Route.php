<?php

require_once("../app/Database.php");
require_once("../app/model/ClienteModel.php");
require_once("../app/model/ProdutoModel.php");
require_once("../app/api/controller/ProdutoController.php");
require_once("../app/controller/SearchController.php");

class Route
{
    public static function handle()
    {
        $url = explode("/", $_SERVER['REQUEST_URI']);
        $method = $_SERVER["REQUEST_METHOD"];
        $args = [];
        array_shift($url);

        $api = false;

        if (strtolower($url[0]) == 'api') {
            $api = true;
            array_shift($url);
        }

        $controller = ucwords(array_shift($url));
        $args = array_merge($_POST ?? [], $_GET ?? [], json_decode(file_get_contents('php://input'), true) ?? []);

        switch ($controller) {
            case '404':
                header('Content-Type: application/json; charset: utf-8');
                echo json_encode('não suportado');
                return http_response_code(404);
                break;
            default:
                if ($api) {
                    header('Content-Type: application/json; charset: utf-8');
                    $token = $args['user_token'];

                    if (!$token) {
                        echo json_encode(['jsonError' => 'É necessário autorizar utilizando um token']);
                        return http_response_code(404);
                    }

                    $clienteApi = new ClienteModel();
                    $valid = $clienteApi->validateToken($token);

                    if (!$valid) {
                        echo json_encode(['jsonError' => 'Token inválido']);
                        return http_response_code(404);
                    }
                }

                if (empty($controller) || $controller == '') {
                    $controller = 'Search';
                }

                if (strpos($controller, '?') > 0) {
                    $controller = explode('?', $controller)[0];
                }

                $controller = "{$controller}Controller";
                $fileController = "..\\app\\" . ($api ? 'api\\' : '') . "controller\\" . $controller . ".php";

                if (file_exists($fileController)) {
                    $controller = new $controller;
                } else {
                    self::errorPage();
                }

                if (is_object($controller)) {
                    if (method_exists($controller, $method)) {
                        return $controller->$method($args);
                    }
                } 

                return self::errorPage();
        }
    }

    protected static function errorPage()
    {
        return header('Location: /404');
    }
}
