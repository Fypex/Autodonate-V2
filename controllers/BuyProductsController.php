<?php

namespace Controllers;

use Controllers\TempController as Temp;
use Flight;

class BuyProductsController
{

    public static function order($name,$id_privilege)
    {
        $product = products()[$id_privilege];
        $kassa = settings()['freekassa'];
        $id = uniqid();
        self::isEmpty($name,$id_privilege);

        new Temp($id,[
            'id' => $id,
            'user' => $name,
            'command' => str_replace('[nick]', $name, $product['command']),
            'price' => $product['price'],
            'time' => date('d/m/Y H:i:s',time())
        ]);


        $hash = md5($kassa['shop_id'].":".$product['price'].":".$kassa['key'].":".$id);
        Flight::json([
            'status' => 'success',
            'message' => 'http://www.free-kassa.ru/merchant/cash.php?m='.$kassa['shop_id'].'&oa='.$product['price'].'&s='.$hash.'&o='.$id
        ]);

    }

    private static function isEmpty($name,$id_privilege)
    {
        if (empty($name))
        {
            Flight::json([
                'status' => 'error',
                'message' => 'Введите свой ник',
            ]);
            exit();
        }
        if (empty($id_privilege))
        {
            Flight::json([
                'status' => 'error',
                'message' => 'Такой привилегии нету',
            ]);
            exit();
        }
    }

}