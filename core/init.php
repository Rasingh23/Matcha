<?php
	require_once "config/database.php";
	session_start();

	$GLOBALS['config'] = array(
		'mysql' => array(
			'host' => $DB_DNS,
			'user' => $DB_USER,
			'password' => $DB_PASSWORD,
			'db' => "matcha"
		),
		'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => 604800,
		),
		'session' => array(
			'session_name' => 'user',
			'token_name' => 'token',
		),
	);

	spl_autoload_register(function($class){
		require_once 'classes/' . $class .'.class'. '.php';
	});

	require_once 'functions/sanitize.php';
	require_once 'functions/email.php';
	require_once 'functions/age.php';

 	 if(cookie::exists(config::get('remember/cookie_name')) && !session::exists(config::get('session/session_name')))
	{
		$hash = cookie::get(config::get('remember/cookie_name'));
		$hashcheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
		if($hashcheck->count())
		{
			$user = new user($hashcheck->first()->user_id);
			$user->login();
		}
	}  

?>
