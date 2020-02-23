<?php

namespace Controllers\panel;

use Flight;
use Models\Pay;

class PaymentController
{

    public function index(){

        Flight::render('panel/payment', [
            'freekassa' => Pay::getPayment('freekassa'),
            'unitpay' => Pay::getPayment('unitpay'),
        ]);

    }

    public function freekassa(){

        Pay::payment($_REQUEST);

    }

    public function unitpay(){

        Pay::payment($_REQUEST);

    }
}