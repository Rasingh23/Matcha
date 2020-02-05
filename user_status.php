<?php
	require_once 'core/init.php';

	$user = new user;
	$profile = json_decode($user->data()->profile);
	if(input::exists('request'))
	{
		if (input::get('action') == 'login') {
			if($user->isloggedin())
				echo 1;
			else
				echo $profile->last_login;
		}
		else if(input::get('action') == 'p.p')
		{
			if (isset($profile->dp))
				echo 1;
			else
				echo 0;
		}
		else if(input::get('action') == 'online')
		{
			$profile->last_login = "online";
			$user->update(array('profile' => json_encode($profile)));
		}
	}
?>