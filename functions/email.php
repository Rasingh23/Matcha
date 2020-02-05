<?php

function Email($email, $subject, $message)
{
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <mbond@student.wethinkcode.co.za>' . "\r\n";

    $message = wordwrap($message, 100, "\r\n");
    mail($email, $subject, $message, $headers);
}
