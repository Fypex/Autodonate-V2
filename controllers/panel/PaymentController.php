<?php

namespace Controllers\panel;

use Flight;
use Models\Pay;
use Models\Users;

class PaymentController
{

    public function index(){

        Flight::render('panel/payment', [
            'freekassa' => Pay::getPayment('freekassa'),
            'unitpay' => Pay::getPayment('unitpay'),
        ]);

    }

    public function freekassa(){

        function getIP() {
            if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
            return $_SERVER['REMOTE_ADDR'];
        }
        if (!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '136.243.38.108'))) {
            die("hacking attempt!");
        }
        $freekassa = Pay::getPayment('freekassa');
        $sign = md5($freekassa['public'].':'.$_REQUEST['AMOUNT'].':'.$freekassa['secret_key'].':'.$_REQUEST['MERCHANT_ORDER_ID']);

        if ($sign != $_REQUEST['SIGN']) {
            die('wrong sign');
        }else{

            $id = $_REQUEST['MERCHANT_ORDER_ID'];
            $purchase = Pay::getPurchase($id);
            if (!empty($purchase)){
                Pay::updatePurchase($purchase['id'], 1);
                $user = Users::get_user_login($purchase['login']);
                Users::update_money($user['id'], $purchase['amount']);
                echo 'yes';
            }else{
                echo 'Purchase not found';
            }

        }
    }

    public function unitpay(){

        Pay::payment($_REQUEST);

    }
}