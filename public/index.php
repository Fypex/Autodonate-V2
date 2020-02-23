<?php
session_start();
require '../vendor/autoload.php';
use Controllers\Auth\AuthController;
AuthController::auth();

Flight::start();