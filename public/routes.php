<?php


use App\Controller\AppController;
use App\Controller\Category\ReadController;
use App\Controller\Category\SaveController;
use App\Controller\Category\DeleteController;
use App\Controller\Category\UpdateController;
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;
use App\Controller\LoginController;
use App\Controller\PainelController;


$router = [
        'routes' => [
        '/' => AppController::class,
        '/error' => ErrorController::class,
        '/login' => LoginController::class,
        '/tela-inicial' => PainelController::class,
        '/categories/read' => ReadController::class,
        '/categories/create' => SaveController::class,
        '/categories/delete' => DeleteController::class,
        '/categories/update' => UpdateController::class,
        '/categories/save' => SaveController::class,
        
    ],
    'default' => NotFoundController::class
];
