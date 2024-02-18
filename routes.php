<?php

use Acer\MvcoopVer2\Controllers\Admin\DashboardController;
use Acer\MvcoopVer2\Controllers\Admin\PostController;
use Acer\MvcoopVer2\Controllers\Admin\UserController;
use Acer\MvcoopVer2\Controllers\Admin\CategoriController;
use Acer\MvcoopVer2\Controllers\Admin\AuthenticateController;
use Bramus\Router\Router;
use Acer\MvcoopVer2\Controllers\Client\HomeController;
use Acer\MvcoopVer2\Controllers\Client\PostController as ClientPostController;
use Acer\MvcoopVer2\Controllers\Client\CategoryController as ClientCategoryController;
// Create Router instance
$router = new Router();

// Define routes
$router->get('/', HomeController::class . '@index');
$router->get('/post/{id}', ClientPostController::class . '@show');
$router->get('/categori/{id}', ClientCategoryController::class . '@showPosts');

$router->match('GET|POST', '/auth/login' ,          AuthenticateController::class . '@login');

$router->mount('/admin', function () use ($router) {
    
    $router->get('/',                               DashboardController::class . '@index');
    $router->get('/logout',                         AuthenticateController::class . '@logout');

    $router->mount('/users', function () use ($router) {
        $router->get('/',                           UserController::class . '@index');
        $router->get('/{id}/show',                  UserController::class . '@show');
        $router->get('/{id}/delete',                UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
        $router->match('GET|POST', '/create',       UserController::class . '@create');

    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/',                           CategoriController::class . '@index');
        $router->get('/{id}/show',                  CategoriController::class . '@show');
        $router->get('/{id}/delete',                CategoriController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  CategoriController::class . '@update');
        $router->match('GET|POST', '/create',       CategoriController::class . '@create');

    });

    $router->mount('/posts', function () use ($router) {
        $router->get('/',                           PostController::class . '@index');
        $router->get('/{id}/show',                  PostController::class . '@show');
        $router->get('/{id}/delete',                PostController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  PostController::class . '@update');
        $router->match('GET|POST', '/create',       PostController::class . '@create');

    });

});

$router->before('GET|POST', '/admin/*',  function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});
$router->before('GET|POST', '/admin/.*',  function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});
// Run it!
$router->run();
