<main class="main mt-3">
    <div class="container ">
        <div class="row my-2">
            <div class="col-12 col-md-6 m-auto">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                        <?php
                            echo $_SESSION['success'] ." ". $_SESSION['user']['name'];
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
            <div class="col-lg-6 col-sm-12">
                <div class="card my-3">
                    <img src="img/card.jpg" style="max-height: 200px" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Name Article</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="read-article.php" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card my-3">
                    <img src="img/car-bg.jpg" style="max-height: 200px" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Name Article</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="read-article.php" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card my-3">
                    <img src="img/card-bg-2.jpg" style="max-height: 200px" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Name Article</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="read-article.php" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>