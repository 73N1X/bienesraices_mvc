<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
require 'funciones.php';
require 'database.php';


//Conectar a DB
$db = conDB();

use Model\ActiveRecord;
ActiveRecord::setDB($db);