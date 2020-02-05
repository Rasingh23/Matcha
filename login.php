<?php
require_once 'core/init.php';

$usercheck = new user();
$db = DB::getInstance();

if ($usercheck->isloggedin()) {
    redirect::to('index.php');
}

if (input::exists('request')) {
    $validate = new validate();
    $validation = $validate->check($_POST, array(
        'username' => array('required' => true),
        'passwd' => array('required' => true),
    ));
    if ($validation->passed()) {
        $user = new user(escape(trim(input::get('username'))));
        if($user->data() != NULL)
        {
            if ($user->data()->active === '1') {
                $login = $user->login(escape(trim(input::get('username'))), escape(input::get('passwd')));
                if ($login) {
                    echo 1;
                } else {
                    echo "Login Failed! Please try again";
                }
            } else {
                echo "Please activate your account";
            }
        }
        else{
            echo "Username and/or Password is incorrect";
        }
    } else {
        $display = "";
        foreach ($validation->errors() as $error) {
            $display .= $error . "<br>";
        }
        echo $display;
    }
}
