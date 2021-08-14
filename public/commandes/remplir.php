<?php
require '../../vendor/autoload.php';

use Faker\Factory;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$pdo->exec('SET FOREIGN_KEY_CHECKS = 0 ');
$pdo->exec('TRUNCATE TABLE 	post_category');
$pdo->exec('TRUNCATE TABLE 	category ');
$pdo->exec('TRUNCATE TABLE post	 ');
$pdo->exec('TRUNCATE TABLE users	 ');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1 ');

$pdo->exec('TRUNCATE TABLE users');
$categories = [];
$posts = [];
for ($i = 0; $i < 30; $i++) {
    $faker = Faker\Factory::create();
    $pdo->exec("INSERT INTO  post SET name= '{$faker->sentence()}' ,slug ='{$faker->slug}' , content= '{$faker->sentence(300)}',created_at='{$faker->date} {$faker->time}' ");
    $posts[] = $pdo->lastInsertId();
}
for ($i = 0; $i < 30; $i++) {
    $pdo->exec("INSERT INTO  category SET name= '{$faker->sentence()}' ,slug ='{$faker->slug}' ");
    $categories[] = $pdo->lastInsertId();
}

foreach ($posts  as $post) {
    $randomCategorie = $faker->randomElements($categories, rand(0, count(($categories))));
    foreach ($randomCategorie as $categorie) {
        $pdo->exec(" INSERT INTO post_category SET post_id = $post , category_id =$categorie");
    }
}
for ($i = 0; $i < 30; $i++) {
    $pass = (string)password_hash($faker->name(), PASSWORD_BCRYPT);
    $pdo->exec("INSERT INTO  users SET username= '{$faker->name()}', password = '$pass'  ");
}
