<?php

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

// Create App
$app = AppFactory::create();

// Create Twig
$twig = Twig::create(__DIR__ . '/../templates', ['cache' => false]);

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));


$app->get('/', function ($request, $response) {
    $view = Twig::fromRequest($request);
    
    return $view->render($response, 'home.html.twig', [
        'name' => 'John Doe',
    ]);
});

// Run app
$app->run();
