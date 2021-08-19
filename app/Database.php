<?php

class Database
{
    public function connect()
    {
        //pega LOGIN e PASS do arquivo .env
        $file = file("../.env");
        $user = trim(explode('LOGIN=', $file[0])[1]);
        $pass = trim(explode('PASS=', $file[1])[1]);

        //realiza a conexão com o db
        try {
            $db = new PDO('mysql:dbname=ligamagic;host=127.0.0.1;charset=utf8', $user, $pass);
        } catch (Exception $e) {
            echo json_encode(['jsonError' => 'Erro no servidor']);
            http_response_code(500);
            die();
        }

        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}
