<?php
require_once 'core/init.php';
$user = new user();
/* function activeEmail($token, $mail)
{
$message = '
Click on link below to activate account:
http://localhost:8080/camagru/active.php?token=' . $token . '&email=' . $mail;
$message = wordwrap($message, 100, "\r\n");
mail(escape($_REQUEST['email']), 'Activation link', $message);
} */

if (!$user->isloggedin()) {
    if (Input::exists('request')) {
        $validate = new Validate();
        $validate = $validate->check($_REQUEST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users',
            ),
            'first_name' => array(
                'required' => true,
            ),
            'last_name' => array(
                'required' => true,
            ),
            'passwd' => array(
                'required' => true,
                'min' => 6,
                'ascii' => true,
            ),
            'passwd_again' => array(
                'required' => true,
                'matches' => 'passwd',
                'ascii' => true,
            ),
            'email' => array(
                'required' => true,
                'unique' => 'users',
                'valid_email' => 1,
            ),
            'gender' => array(
                'required' => true,
            ),
        ));

        if ($validate->passed()) {
            try
            {
                $test = array('gender' => input::get('gender'), 'DOB' => input::get('age') , 'age' => age(input::get('age')),'location' => input::get('location'),'lat' => input::get('lat'),'lng' => input::get('lng'), 'preference' => 'BI-SEXUAL', 'fame' => 0);
                $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890!$()*";
                $token = str_shuffle($token);
                $token = substr($token, 0, 10);
                $user->create(array(
                    'username' => escape(trim(input::get('username'))),
                    'first_name' => escape(trim(input::get('first_name'))),
                    'last_name' => escape(trim(input::get('last_name'))),
                    'passwd' => hash::make(escape(trim(input::get('passwd')))),
                    'email' => escape(trim(input::get('email'))),
                    'active' => 1,
                    'ver_code' => '',
                    'profile' => json_encode($test),
                ));
                /* $message = '
		        Click on link below to activate account:
		        http://localhost:8080/camagru/active.php?token=' . $token . '&email=' . escape(input::get('email'));
                Email(escape(input::get('email')), 'Account Activation', message); */

                echo 1;

            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            $display = "";
            foreach ($validate->errors() as $error) {
                $display .= $error . "<br>";
            }
            echo $display;
        }
    }
} else {
    redirect::to('index.php');
}
