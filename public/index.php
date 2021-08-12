<?php require '../vendor/autoload.php';



define('TEMPLATES', dirname(__DIR__) . '/templates');

$router = new AltoRouter();

$router->map('GET', '/blog', function () {
    require TEMPLATES . '/post/index.php';
});
$router->map('GET', '/blog/category', function () {
    require TEMPLATES . '/categories/show.php';
});
$match = $router->match();
$match['target']();
