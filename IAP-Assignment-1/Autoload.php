<?php
require __DIR__ . '/plugins/vendor/autoload.php'; 
require 'Configuration.php';

// Add 'Database' to the directories array
$directories = ['Layout', 'Authorization', 'Mailer', ''];

spl_autoload_register(function ($class_name) use ($directories) {
    foreach ($directories as $directory) {
        $file = __DIR__ . '/' . $directory . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});