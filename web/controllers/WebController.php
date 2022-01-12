<?php

namespace app\controllers;

use app\core\Application;

class WebController 
{

    public function home()
    {
        $params = [
            'name' => "st-service"
        ];

        return Application::$app->route->renderView('home', $params);
    }

    public function contact()
    {
        return 'contact';
    }

    public function handleContact()
    {
        return 'test';
    }
}