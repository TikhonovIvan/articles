<?php
global $articles
?>
<main class="main mt-3">
    <div class="container">
        <div class="row my-2">
            <div class="col-12 col-md-6 m-auto">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                        <?php
                        echo $_SESSION['success'] . " " . $_SESSION['user']['name'];
                        unset($_SESSION['success']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12">

                <h1 class="text-center ">Hot Topics</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="row" id="article-results">
                <?php foreach ($articles as $article): ?>
                    <?php if ($article['status'] == 1): ?>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card my-2">
                                <img src="img/car-bg.jpg" style="max-height: 200px" class="card-img-top img-fluid"
                                     alt="...">
                                <div class="card-body" style="height: 280px">

                                    <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                    <p class="card-text mt-2"><?= htmlspecialchars(mb_strimwidth(strip_tags($article['article_body']), 0, 100, "...")) ?></p>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <div>User: <?= ($article['author_name']) ?></div>
                                        <div>Data:<?= ($article['formatted_date']) ?></div>
                                    </div>
                                    <hr>
                                    <a href="read-article.php?id=<?= $article['id'] ?>" class="btn btn-primary px-5">Read</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>


        <?php if (!empty($articles)): ?>
            <div class="row">
                <div class="col-12">
                    <?= $pagination ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>