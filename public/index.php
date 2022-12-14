<?php

use App\Router;
use RedBeanPHP\R;
use Symfony\Component\ErrorHandler\Debug;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Router.php';

Debug::enable();

R::setup('mysql:host=localhost;dbname=links-handler', 'root', '');



session_start();

try {
    Router::route();
}
catch (ReflectionException $e) {
    echo "Une erreur est survenu avec le rooter";
}