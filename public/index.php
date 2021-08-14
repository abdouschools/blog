<?php
require '../vendor/autoload.php';

define('DEBUG', microtime(true)); //hadi bah njibou lwa9at ta ki tchargat la page hadi w fi default.php nzido njiboha bah ncopariwha m3a lwacat li tchargat fiha default.php bah nchoufo gadah hakmat
//hna ltahta bah ykhargana les erreur b format mliha 
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use App\Router;

$router = new Router(dirname(__DIR__) . '/templates');
$router->get('/', 'post/index', 'home')
    ->get('/blog/category', 'categories/show', 'category')
    ->run();
