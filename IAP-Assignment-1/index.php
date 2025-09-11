<?php
require 'Autoload.php';

$ObjLayout = new PageBuilder();
$formObj = new AuthForms();

$ObjLayout->Head($config);
$ObjLayout->Navbar($config);
$ObjLayout->Banner($config);
$ObjLayout->Content($config);
$ObjLayout->FormSection($config, $formObj);


$ObjLayout->displayUsers($config);

$ObjLayout->Footer($config);