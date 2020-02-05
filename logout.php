<?php
require_once 'core/init.php';

$user = new user();
$profile = json_decode($user->data()->profile);
if (!$user->isloggedin()) {
    redirect::to('index.php');
}
date_default_timezone_set('Africa/Johannesburg');
$profile->last_login = date("jS \of F h:i A");
$user->update(array('profile' => json_encode($profile)));
$user->logout();
echo 1;

?>