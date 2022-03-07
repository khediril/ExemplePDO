<?php
#Exemple d'utilisation d'une biblio externe 
namespace App;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//echo __DIR__;
require '../vendor/autoload.php';

use SebastianBergmann\Timer\Timer;

$timer = new Timer;

$timer->start();

foreach (\range(0, 100000) as $i) {
    // ...
}

$duration = $timer->stop();

var_dump(get_class($duration));
var_dump($duration->asString());
var_dump($duration->asSeconds());
var_dump($duration->asMilliseconds());
var_dump($duration->asMicroseconds());
var_dump($duration->asNanoseconds()); 


