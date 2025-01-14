<?php
session_start();
$title = 'Create Article';

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/view/incs/header.tpl.php";



?>
    <main class="main mt-3">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6 m-auto">
                    <div class="alert alert-warning alert-danger alert-dismissible fade show" role="alert">
                        Errors
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <div class="col-12 ">
                    <h2 class="text-center mb-5">Create article</h2>
                    <form method="post" class="text-center">
                        <div class="form-floating mb-3">
                            <input type="text" name="title-article" class="form-control" id="floatingInput"
                                   placeholder="title">
                            <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating ">
                            <label for="floatingTextarea"></label>
                            <textarea class="form-control mt-5 " placeholder="Leave a comment here"
                                      id="floatingTextarea"
                                      name="editor"></textarea>
                        </div>
                        <div class="form-check text-start mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Publication
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 px-5 ">Create article</button>
                    </form>

                </div>
            </div>

            <div class="row my-2 mt-5">
                <div class="col-12">
                    <hr>
                    <h1 class="text-center ">Hot Topics</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card my-3">
                        <img src="img/card.jpg" style="max-height: 200px" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Name Article</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the
                                card's content.</p>
                            <a href="read-article.php" class="btn btn-primary">Read</a>
                            <a href="edit-article.php" class="btn btn-primary">Edit</a>
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


<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>