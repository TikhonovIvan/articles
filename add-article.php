<?php
session_start();
$title = 'Create Article';

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/controller/func_article.php";
require_once __DIR__ . "/view/incs/header.tpl.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isPublic = (int)isset($_POST['publication']);
    $data = load(['user_id', 'title-article', 'editor','publication']);

    $v = new Valitron\Validator($data);
    $v->rules([
        'required' => ['user_id', 'title-article', 'editor'],
    ]);

    if ($v->validate()) {
        if (create_article($data)) {
            redirect('add-article.php');
        } else {
            redirect('add-article.php');
        }

    } else {
        $_SESSION['errors'] = get_errors($v->errors());
    }
}
$id_user = $_SESSION['user']['id'];
var_dump($id_user);
$articles = get_articles($id_user);


?>
    <main class="main mt-3">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6 m-auto">
                    <?php if (isset($_SESSION['errors'])): ?>
                        <div class="alert alert-warning alert-danger alert-dismissible fade show" role="alert">
                            <?php
                            echo $_SESSION['errors'];
                            unset($_SESSION['errors']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
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
                <div class="col-12 ">
                    <h2 class="text-center mb-5">Create article</h2>
                    <form method="post" class="text-center">
                        <input type="hidden" name="user_id" value="<?= $id_user ?>">
                        <div class="form-floating mb-3">
                            <input type="text" name="title-article" class="form-control" id="floatingInput"
                                   placeholder="title" value="<?= old('name') ?>">
                            <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating ">
                            <label for="floatingTextarea"></label>
                            <textarea class="form-control mt-5 " placeholder="Leave a comment here"
                                      id="floatingTextarea"
                                      name="editor"><?= old('editor') ?></textarea>
                        </div>
                        <div class="form-check text-start mt-3">
                            <input class="form-check-input" name="publication" type="checkbox"
                                   id="flexCheckChecked" value="<?= $isPublic?>" >
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
                <?php foreach ($articles as $article): ?>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card my-3">
                            <img src="img/card.jpg" style="max-height: 200px" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $article['title']?></h5>
                                <p class="card-text"><?= $article['article_body']?></p>
                                <a href="read-article.php" class="btn btn-primary">Read</a>
                                <a href="edit-article.php" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

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