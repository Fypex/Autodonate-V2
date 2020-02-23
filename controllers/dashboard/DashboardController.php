<?php

namespace Controllers\dashboard;

use Controllers\auth\AuthController;
use Controllers\Controller;
use Flight;
use Models\Users;
use Models\Pay;

class DashboardController extends AuthController
{

    public function index(){

        Flight::render('dashboard/index', [
            'user' => Users::get_user_login($_SESSION['user']['login']),
            'payments' => Pay::getPayments()
        ]);

    }

}