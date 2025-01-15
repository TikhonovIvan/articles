<?php
session_start();
$title = 'User Account';

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/view/incs/header.tpl.php";
require_once __DIR__ . "/controller/func_article.php";

$id_user = isset($_GET['id']);
$articles = edit_article($id_user);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isPublic = (int)isset($_POST['publication']);
    $data = load(['user_id', 'title-article', 'editor', 'publication']);

    $v = new Valitron\Validator($data);
    $v->rules([
        'required' => ['title-article', 'editor'],
        'integer' => ['user_id'],
    ]);

    if ($v->validate()) {
        if (edit_article_text($id_user, $data)) {
            redirect("read-article.php?id=$id_user");
        } else {
            redirect("edit-article.php?id=$id_user");

        }
    } else {
        $_SESSION['errors'] = get_errors($v->errors());
    }
}

?>

<main class="main mt-3">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 m-auto">
                <?php if (isset($_SESSION['errors'])): ?>
                    <div class="alert alert-warning alert-danger alert-dismissible fade show" role="alert">
                        <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 ">
                <h2 class="text-center mb-5">Edit article</h2>
                <form method="post" class="text-center">
                    <?php foreach ($articles as $article): ?>
                        <input type="hidden" name="user_id" value="<?= $article['id'] ?>">
                        <div class="form-floating mb-3">
                            <input type="text" name="title-article" class="form-control" id="floatingInput"
                                   placeholder="title" value="<?= $article['title'] ?>">
                            <label for="floatingInput"></label>
                        </div>
                        <div class="form-floating ">
                            <label for="floatingTextarea"></label>
                            <textarea class="form-control mt-5 " placeholder="Leave a comment here"
                                      id="floatingTextarea"
                                      name="editor"><?= $article['article_body'] ?></textarea>
                        </div>
                        <div class="form-check text-start mt-3">
                            <?php if ($article['status'] == 1): ?>
                                <input class="form-check-input" name="publication" type="checkbox" value="" id="flexCheckChecked" checked>
                            <?php else: ?>
                                <input class="form-check-input" name="publication" type="checkbox" value="" id="flexCheckChecked">
                            <?php endif; ?>
                            <label class="form-check-label" for="flexCheckChecked">
                                Publication
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary mt-3 px-5 ">Edit article</button>
                </form>

            </div>
        </div>
    </div>
</main>


<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>
