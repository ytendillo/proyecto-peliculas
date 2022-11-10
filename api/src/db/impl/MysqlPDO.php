<?php

namespace App\db\impl;
use App\db\IPDOConnection;


class MysqlPDO implements IPDOConnection {

    public static function connect() : \PDO {
        try {
            //$pdo = new \PDO('mysql:host=localhost;dbname=peliculas', 'root', '1201');
            $pdo = new \PDO($_ENV['DDBB_CONNECTION'] . ':host='. $_ENV['HOST'] . ';dbname=' . $_ENV['TABLA'], $_ENV['DDBB_USER'], $_ENV['DDBB_PASSWORD']);
            $pdo->exec("set names utf8");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException("Error en conexion a la BBDD", 500); 
        }

    }
}

