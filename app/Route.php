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
        //organiza a url
        $url = self::parseUrl();

        //verifica se a chamada é feita via API
        $api = self::checkAPI($url);

        //verifica o método da requisição
        $method = $_SERVER["REQUEST_METHOD"];

        //recebe os parâmetros enviados na requisição
        $args = array_merge($_POST ?? [], $_GET ?? [], json_decode(file_get_contents('php://input'), true) ?? []);

        //valida o token da api
        if ($api) {
            $token = $args['user_token'];
            self::validateToken($token);
        }

        //define qual vai ser o controller
        $controller = self::findController($url, $api);

        //verifica se instanciou corretamente o controller e se o método existe
        if (is_object($controller)) {
            if (method_exists($controller, $method)) {
                return $controller->$method($args);
            }
        }

        return self::errorPage();
    }

    protected static function parseUrl()
    {
        $url = explode("/", $_SERVER['REQUEST_URI']);
        array_shift($url);
        return $url;
    }

    protected static function checkAPI(&$url)
    {
        if (strtolower($url[0]) == 'api') {
            array_shift($url);
            return true;
        }

        return false;
    }

    protected static function validateToken($token)
    {
        header('Content-Type: application/json; charset: utf-8');

        //valida se o token veio vazio
        if (!$token) {
            echo json_encode(['jsonError' => 'É necessário autorizar utilizando um token']);
            http_response_code(404);
            die();
        }
        
        if(base64_decode($token, true)){
            $token = base64_decode($token);
        }

        //valida se o token existe
        if (!(new ClienteModel())->validateToken($token)) {
            echo json_encode(['jsonError' => 'Token inválido']);
            http_response_code(404);
            die();
        }
    }

    protected static function findController($url, $api = false)
    {
        $controller = ucwords(array_shift($url));

        if (empty($controller) || $controller == '') {
            $controller = 'Search';
        }

        if (strpos($controller, '?') > 0) {
            $controller = explode('?', $controller)[0];
        }

        $controller = "{$controller}Controller";
        $fileController = "..\\app\\" . ($api ? 'api\\' : '') . "controller\\" . $controller . ".php";

        //verifica se o controller existe
        if (!file_exists($fileController)) {
            return self::errorPage();
        }

        return new $controller;
    }

    protected static function errorPage()
    {
        header('Content-Type: application/json');
        echo json_encode(['jsonError' => 'Não suportado']);
        return http_response_code(404);
    }
}
