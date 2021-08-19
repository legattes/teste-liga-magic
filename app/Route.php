<?php

require_once("../app/api/controller/ProdutoController.php");
require_once("../app/controller/SearchController.php");
require_once("../app/model/ProdutoModel.php");
require_once("../app/Database.php");

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
        $args = json_decode(file_get_contents('php://input'), true) ?? [];

        switch ($controller) {
            case '404':
                echo 'não suportado';
                break;
            default:
                if (empty($controller) || $controller == '') {
                    $controller = 'Search';
                }
                $controller = "{$controller}Controller";

                $fileController = "..\\app\\" . ($api ? 'api\\' : '') . "controller\\" . $controller . ".php";

                if (file_exists($fileController)) {
                    $controller = new $controller;
                } else {
                    self::errorPage();
                }
                if (is_object($controller)) {
                    return $controller->$method($args);
                } else {
                    self::errorPage();
                }
        }
    }

    public static function errorPage()
    {
        return header('Location: /404');
    }
}
