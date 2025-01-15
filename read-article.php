<?php
session_start();
$title = 'User Account';

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/view/incs/header.tpl.php";
require_once __DIR__ . "/controller/func_article.php";

$id = $_GET['id'];
$article_reads = read_article($id);
$limit_articles = limit_articles();
?>

<main class="main mt-3">
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-9 col-12 ">
                <div class="col-12 col-md-9 m-auto">
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="my-5">
                    <img src="./img/card.jpg" style="max-height: 200px; width: 50%" alt="">
                    <?php foreach ($article_reads as $article_read):?>
                    <h2 class="mt-4"><?= $article_read['title']?></h2>
                    <div class="mt-3">
                        <?= $article_read['article_body']?>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-3 d-none d-md-block">
                <h4>Hot Topics</h4>
                <div>
                    <hr>
                </div>
                <?php foreach ($limit_articles as $limit_article):?>
                <div class="card-body border-bottom mb-2 p-2 bg-article">
                    <a href="read-article.php?id=<?= $limit_article['id']?>" class="mb-2 text-black text-decoration-none">
                        <h6 class="card-title mb-2"><?= mb_strimwidth($limit_article['title'], 0 , 85, "...")?></h6>

                    </a>
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>

