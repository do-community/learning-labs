<?php

require __DIR__ . '/../vendor/autoload.php';

use Minicli\App;
use Librarian\Provider\TwigServiceProvider;
use Librarian\Provider\RouterServiceProvider;
use Librarian\Exception\RouteNotFoundException;
use Librarian\Provider\ContentServiceProvider;
use Librarian\Provider\DevtoServiceProvider;
use Librarian\Provider\LibrarianServiceProvider;
use Librarian\Response;
use App\Parser\TutorialTagParser;
use App\Parser\UserTagParser;
use App\Parser\SlideTagParser;

$app = new App(require __DIR__ . '/../config.php');

$app->addService('twig', new TwigServiceProvider());
$app->addService('router', new RouterServiceProvider());
$app->addService('content', new ContentServiceProvider());
$app->addService('librarian', new LibrarianServiceProvider());
$app->addService('devto', new DevtoServiceProvider());

$app->librarian->boot();

$app->content->registerTagParser('tutorial', new TutorialTagParser());
$app->content->registerTagParser('user', new UserTagParser());
$app->content->registerTagParser('slide', new SlideTagParser());

try {
    /** @var RouterServiceProvider $router */
    $route = $app->router->getCallableRoute();
    $app->runCommand(['minicli', 'web', $route]);
} catch (RouteNotFoundException $e) {
    Response::redirect('/notfound');
}