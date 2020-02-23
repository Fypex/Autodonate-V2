<?php

use Symfony\Component\Dotenv\Dotenv;
use Models\DB;

$env = new Dotenv();
$env->load('../.env');

error_reporting($_ENV['SHOW_ERRORS']);
Flight::set('flight.log_errors', $_ENV['SHOW_ERRORS']);
Flight::set('flight.handle_errors', $_ENV['SHOW_ERRORS']);
Flight::set('flight.views.path', $_ENV['VIEW_FOLDER']);



if (!DB::testConnection()) {

    if (empty($_ENV['DB_BASE']) and empty($_ENV['DB_USER']) and empty($_ENV['DB_PASS'])) {

        Flight::render('panel/errors/no_сonnection.php', array(
            'error' => $_ENV['NO_CONNECT_ERROR'],
            'message' => $_ENV['NO_DATA_MESSAGE'],
        ));

    } else {

        Flight::render('panel/errors/no_сonnection.php', array(
            'error' => $_ENV['NO_CONNECT_ERROR'],
            'message' => $_ENV['NO_CONNECT_MESSAGE'],
        ));

    }
    exit;
}
