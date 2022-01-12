<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\WebController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [WebController::class, 'home']);

$app->router->get('/contact', [WebController::class, 'contact']);
$app->router->post('/contact', [WebController::class, 'handleContact']);

$app->run();

?>