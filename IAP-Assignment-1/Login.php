<?php
require 'Autoload.php';

$ObjPageBuilder = new PageBuilder();
$formObj = new AuthForms();

$ObjPageBuilder->Head($config);
$ObjPageBuilder->Navbar($config);
$ObjPageBuilder->Banner($config);
$ObjPageBuilder->FormSection($config, $formObj);
$ObjPageBuilder->Footer($config);