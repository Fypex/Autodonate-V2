<?php 


Flight::route('/', function(){
	Flight::render('index', array(
	    'title' => settings()['site']['title'],
      'description' => settings()['site']['description'],
      'keywords' => settings()['site']['keywords'],
      'server_ip' => settings()['server']['ip'],
      'links' => settings()['links'],
      'widget' => settings()['widget'],
      'contacts' => settings()['contacts'],
      'products' => products(),
  ));
});

//Flight::route('POST /order', function(){
//    BuyProduct::order($_POST['name'],$_POST['id']);
//});
//
//Flight::route('POST /pay/success', function(){
//    PayFreeKassa::pay($_POST);
//});


Flight::route('GET /dashboard', array(new Controllers\dashboard\DashboardController(), 'index'));
Flight::route('GET /login', array(new Controllers\auth\AuthController(), 'login_page'));
Flight::route('GET /register', array(new Controllers\auth\AuthController(), 'register_page'));
Flight::route('GET /logout', array(new Controllers\auth\AuthController(), 'logout'));
Flight::route('POST /login', array(new Controllers\auth\AuthController(), 'login'));
Flight::route('POST /register', array(new Controllers\auth\AuthController(), 'register'));


Flight::route('/success', function(){
    Flight::render('success');
});
Flight::route('/error', function(){
    Flight::render('error');
});

Flight::map('notFound', function(){
    Flight::render('errors/404');
});