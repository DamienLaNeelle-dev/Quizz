<?php

// public/index.php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\ErrorHandler\Debug;

require dirname(__DIR__).'/vendor/autoload.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

// Rediriger toutes les requêtes vers l'application React
if (preg_match('/\.(?:css|js|jpg|png|gif|ico|json)$/', $_SERVER['REQUEST_URI'])) {
    return false; // Laisser Symfony servir les fichiers statiques
}

// Rediriger toutes les autres requêtes vers l'application React
include_once 'index.html';

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);


