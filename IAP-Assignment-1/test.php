<?php
require 'Autoload.php';

// Create instance
$ObjMail = new Mail();

$mailCnt = [
    'name_from' => 'Alex Okama',
    'mail_from' => 'aokama@yahoo.com',
    'name_to' => 'Mazzic Studios',
    'mail_to' => 'west@gmail.com',
    'subject' => 'Hello From ICS B',
    'body' => 'Welcome to ICS B! <br> This is a new semester. Let\'s have fun together.'
];

$ObjMail->Send_Mail($config, $mailCnt);