<?php

namespace Controllers\dashboard;

use Controllers\Controller;
use Flight;
use Models\Users;

class DashboardController
{

    public function index(){
        if (empty($_SESSION['user'])){
            Flight::redirect('/login');
        }else{
            Flight::render('dashboard/index');
        }
    }

}