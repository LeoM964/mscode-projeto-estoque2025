<?php


use App\Controller\AppController;
use App\Controller\AutenticarController;
use App\Controller\Category\ReadController;
use App\Controller\Category\SaveController;
use App\Controller\Category\DeleteController;
use App\Controller\Category\UpdateController;
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\PainelController;
use App\Controller\Produtos\EditarProdutoController;
use App\Controller\Produtos\ListarProdutosController;
use App\Controller\Produtos\ShowEditarProdutoController;


$router = [
        'routes' => [
        '/' => AppController::class,
        '/error' => ErrorController::class,
        '/login' => LoginController::class,
        '/logout' => LogoutController::class,
        '/tela-inicial' => PainelController::class,
        '/categories/read' => ReadController::class,
        '/categories/create' => SaveController::class,
        '/categories/delete' => DeleteController::class,
        '/categories/update' => UpdateController::class,
        '/categories/save' => SaveController::class,
        '/produtos' => ListarProdutosController::class,
        '/produtos/editar' => ShowEditarProdutoController::class,
        'produtos/editar/salvar' => EditarProdutoController::class,
        
        
    ],
    'default' => NotFoundController::class
];
