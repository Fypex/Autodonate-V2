<?php

use \RedBeanPHP\R;
use Symfony\Component\Dotenv\Dotenv;

$env = new Dotenv();
$env->load('../.env');

Flight::set('flight.views.path', $_ENV['VIEW_FOLDER']);

R::setup( 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_BASE'].'',$_ENV['DB_USER'],$_ENV['DB_PASS']);

if (!R::testConnection()){

    if (empty($_ENV['DB_BASE']) and empty($_ENV['DB_USER'])and empty($_ENV['DB_PASS'])){

        Flight::render($_ENV['VIEW_FOLDER'].'/errors/no_сonnection.php',array(
            'error' => $_ENV['NO_CONNECT_ERROR'],
            'message' => $_ENV['NO_DATA_MESSAGE'],
        ));

    }else{

        Flight::render($_ENV['VIEW_FOLDER'].'/errors/no_сonnection.php',array(
            'error' => $_ENV['NO_CONNECT_ERROR'],
            'message' => $_ENV['NO_CONNECT_MESSAGE'],
        ));

    }



    exit();
}

