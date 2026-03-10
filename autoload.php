<?php

spl_autoload_register(function ($class) { 
    $file = __DIR__ . '/classes/' . $class . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("La classe $class est introuvable dans le dossier classes/.");
    }
});