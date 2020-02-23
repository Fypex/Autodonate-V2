<?php

Flight::route('GET /', array(new Controllers\IndexController(), 'index'));

//Flight::route('POST /order', function(){
//    BuyProduct::order($_POST['name'],$_POST['id']);
//});
//
//Flight::route('POST /pay/success', function(){
//    PayFreeKassa::pay($_POST);
//});


Flight::route('GET /dashboard', array(new Controllers\dashboard\DashboardController(), 'index'), 'user|admin');
Flight::route('POST /dashboard/pay', array(new Controllers\pay\PayController(), 'pay'), 'user|admin');


Flight::route('GET /login', array(new Controllers\auth\AuthController(), 'login_page'));
Flight::route('GET /register', array(new Controllers\auth\AuthController(), 'register_page'));
Flight::route('POST /login', array(new Controllers\auth\AuthController(), 'login'));
Flight::route('POST /register', array(new Controllers\auth\AuthController(), 'register'));

Flight::route('GET /logout', array(new Controllers\auth\AuthController(), 'logout'), 'user|admin');

Flight::route('GET /panel', array(new Controllers\panel\PanelController(), 'index'), 'admin');
Flight::route('GET /panel/payment', array(new Controllers\panel\PaymentController(), 'index'), 'admin');

Flight::route('POST /freekassa/payment/confirmation', array(new Controllers\panel\PaymentController(), 'freekassa'), 'admin');
Flight::route('POST /panel/payment/unitpay', array(new Controllers\panel\PaymentController(), 'unitpay'), 'admin');

Flight::route('GET /panel/privileges', array(new Controllers\panel\PrivilegesController(), 'index'), 'admin');
Flight::route('POST /panel/privilege/create', array(new Controllers\panel\PrivilegesController(), 'create'), 'admin');
Flight::route('POST /panel/privilege/get', array(new Controllers\panel\PrivilegesController(), 'get'), 'admin');
Flight::route('POST /panel/privilege/delete', array(new Controllers\panel\PrivilegesController(), 'delete'), 'admin');
//Flight::route('GET /panel/cases', array(new Controllers\panel\PrivilegesController(), 'index'), 'admin');
//Flight::route('GET /panel/currency', array(new Controllers\panel\CurrencyController(), 'index'), 'admin');
//Flight::route('GET /panel/discounts', array(new Controllers\panel\DiscountsController(), 'index'), 'admin');

Flight::route('/success', function(){
    Flight::render('success');
});

Flight::route('/error', function(){
    Flight::render('error');
});

Flight::map('notFound', function(){
    Flight::render('errors/404');
});