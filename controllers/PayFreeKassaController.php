<?php

namespace Controllers;

use Controllers\TempController as Temp;
use Controllers\RconController as Rcon;

class PayFreeKassaController
{
    

    public static function pay($data)
    {

        $kassa = settings();
        $merchant_id = $kassa['freekassa']['shop_id'];
        $merchant_secret = $kassa['freekassa']['key'];

        function getIP() {
        if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
        return $_SERVER['REMOTE_ADDR'];
        }
        if (!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '88.198.88.98'))) {
        die("hacking attempt!");
        }
        $sign = md5($merchant_id.':'.$data['AMOUNT'].':'.$merchant_secret.':'.$data['MERCHANT_ORDER_ID']);

        if ($sign != $data['SIGN']) {
            die('wrong sign');
        }else{

            $file = $data['MERCHANT_ORDER_ID'];

            $string = json_decode(Temp::openContent($file),true);

            Rcon::command($string['command']);

            die('yes');
        }
        //Так же, рекомендуется добавить проверку на сумму платежа и не была ли эта заявка уже оплачена или отменена
        //Оплата прошла успешно, можно проводить операцию.
        die('end block');
    }

}