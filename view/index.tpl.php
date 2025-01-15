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
            <?php foreach ($articles as $article): ?>
                <div class="col-lg-6 col-sm-12">
                    <input type="hidden" name="page" value="<?= $_GET['page'] ?? 1 ?>">
                    <div class="card my-2">
                        <img src="img/car-bg.jpg" style="max-height: 200px" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article['title'] ?></h5>
                            <p class="card-text"><?= htmlspecialchars(mb_strimwidth($article['article_body'], 0, 200, "...")) ?></p>
                            <a href="read-article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Read</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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