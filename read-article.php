<?php
session_start();
$title = 'User Account';

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/view/incs/header.tpl.php";
?>

<main class="main mt-3">
    <div class="container mt-5">
        <div class="row">

            <div class="col-9 ">
                <div class="col-6 m-auto">
                    <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                        Success
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="mt-5">
                    <img src="./img/card.jpg" style="max-height: 200px; width: 50%" alt="">
                    <h2 class="mt-4">Tittle article</h2>
                    <div class="mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque et facere in laboriosam placeat
                        quaerat quas quidem ratione ullam voluptatum! Ab architecto assumenda eveniet, fugit incidunt
                        libero rem reprehenderit rerum?
                    </div>
                </div>
            </div>
            <div class="col-3">
                <h4>Hot Topics</h4>
                <div>
                    <hr>
                </div>
                <div class="card-body border-bottom mb-2 p-2 bg-article">
                    <a href="read-article.php" class="mb-2 text-black text-decoration-none">
                        <h5 class="card-title mb-2">Name Article</h5>
                        <p>Lorem ipsum dolor sit amet...</p>
                    </a>
                </div>
                <div class="card-body border-bottom mb-2 p-2 bg-article">
                    <a href="read-article.php" class="mb-2 text-black text-decoration-none">
                        <h5 class="card-title mb-2">Name Article</h5>
                        <p>Lorem ipsum dolor sit amet...</p>
                    </a>
                </div>
                <div class="card-body border-bottom mb-2 p-2 bg-article">
                    <a href="read-article.php" class="mb-2 text-black text-decoration-none">
                        <h5 class="card-title mb-2">Name Article</h5>
                        <p>Lorem ipsum dolor sit amet...</p>
                    </a>
                </div>
                <div class="card-body border-bottom mb-2 p-2 bg-article">
                    <a href="read-article.php" class="mb-2 text-black text-decoration-none">
                        <h5 class="card-title mb-2">Name Article</h5>
                        <p>Lorem ipsum dolor sit amet...</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>

