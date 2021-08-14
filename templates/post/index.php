<?php
$title = 'welcome to our blog';
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$posts = $pdo->query("SELECT * FROM post ORDER BY created_at LIMIT 12")->fetchAll(PDO::FETCH_OBJ); ?>
<div class="container">
    <div class="row">
        <?php foreach ($posts as $post) : ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p>Creé le :<?= nl2br(htmlentities($post->created_at)) ?></p>
                        <h5 class="card-title">
                            <?= nl2br(htmlentities($post->name)) ?>

                        </h5>
                        <p><?= nl2br(htmlentities($post->content)) ?></p>
                        <p><a href="" class='btn'>voir plus</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>