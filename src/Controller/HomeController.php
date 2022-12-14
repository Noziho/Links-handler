<?php

namespace App\Controller;

use RedBeanPHP\R;

class HomeController extends AbstractController
{

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            self::render('home/home');
            exit();
        }

        $user = R::findOne('user', 'id=?', [$_SESSION['user']->id]);
        self::render('home/home', [
            'user' => $user,
        ]);

    }
}