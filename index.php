<?php
use PWD3\Autoloader;
use PWD3\Bibliotheque;

require_once("class/Autoloader.class.php");

Autoloader::register();
$livre = new Bibliotheque;

echo "Hello world";