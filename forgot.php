<?php
require_once 'core/init.php';

$usercheck = new user();
$db = DB::getInstance();

if ($usercheck->isloggedin()) {
    redirect::to('index.php');
}

function activeEmail($mail)
{
    $message = '
    Click on link below to reset your password:
    http://localhost:8080/camagru/reset.php?email=' . $mail;
    $message = wordwrap($message, 100, "\r\n");
    mail($_POST['email'], 'Activation link', $message);
    echo '<script>alert("Pls check email.")</script>';
}

if (input::exists('request')) {
    $validate = new validate();
    $validation = $validate->check($_POST, array(
        'email' => array('required' => true,
            'valid_email' => 1),
    ));
    if ($validation->passed()) {
        $db->query("SELECT `user_id` FROM `users` WHERE `email` = ?", array('email' => escape(input::get('email'))));
        if ($db->count() > 0) {
            activeEmail(escape(input::get('email')));
            echo 1;
        } else {
            echo 'Email does not exist';
        }
    } else {
        $display = "";
        foreach ($validate->errors() as $error) {
            $display .= $error . "<br>";
        }
        echo $display;
    }
}
