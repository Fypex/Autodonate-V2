<?php

namespace Models;

use PDOException;

class DB
{

    public static function pdo(){

        $opt = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        );
        $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_BASE'].';charset=utf8';
        return new \PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $opt);

    }

    public static function testConnection(){

        try {

            $opt = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            );
            $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_BASE'].';charset=utf8';
            new \PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $opt);

            return 1;
        } catch (PDOException $e){

            return 0;

        }

    }

}