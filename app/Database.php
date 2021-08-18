<?php

class Database
{
    public function connect(){
        $file = file("../.env");

        $user = trim(explode('LOGIN=', $file[0])[1]);
        $pass = trim(explode('PASS=', $file[1])[1]);

        $db = new PDO('mysql:dbname=ligamagic;host=127.0.0.1;charset=utf8', $user, $pass);

        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }


}
