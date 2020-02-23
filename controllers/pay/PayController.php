<?php

namespace Controllers\pay;

use Flight;
use Models\Pay;

class PayController
{

    public function pay(){

        switch ($_REQUEST['payment']) {
            case 'freekassa':
                    $this->freekassa($_REQUEST);
                break;
            case 'unitpay':
                    $this->unitpay($_REQUEST);
                break;
            default:
                return 0;
        }

    }



    private function freekassa($request){
        $id = uniqid(time());
        $freekassa = Pay::getPayment($request['payment']);

        Pay::addPurchase($id, $freekassa['id'], $_SESSION['user']['login'], $request['amount'], time());
        $hash = md5($freekassa['public'].":".$request['amount'].":".$freekassa['secret_key'].":".$id);

        Flight::json([
            'status' => 'success',
            'message' => 'http://www.free-kassa.ru/merchant/cash.php?m='.$freekassa['public'].'&oa='.$request['amount'].'&s='.$hash.'&o='.$id
        ]);
    }

    private function unitpay($request){

    }
}