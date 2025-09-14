<?php
require 'Autoload.php';

// Create instance
$ObjMail = new Mail();

$mailCnt = [
    'name_from' => 'Natalie Shalo',
    'mail_from' => 'nananatalie36@gmail.com',
    'name_to' => 'Neso',
    'mail_to' => 'neso8966@gmail',
    'subject' => 'HELLO!!!',
    'body' => 'WELCOME TO THE TASK APP!!'
];

$ObjMail->Send_Mail($config, $mailCnt);