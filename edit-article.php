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
            <div class="col-6 m-auto">
                <div class="alert alert-warning alert-danger alert-dismissible fade show" role="alert">
                    Errors
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="col-12 ">
                <h2 class="text-center mb-5">Edit article</h2>
                <form method="post" class="text-center">
                    <div class="form-floating mb-3">
                        <input type="text" name="title-article" class="form-control" id="floatingInput"
                               placeholder="title">
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating ">
                        <label for="floatingTextarea"></label>
                        <textarea class="form-control mt-5 " placeholder="Leave a comment here" id="floatingTextarea"
                                  name="editor"></textarea>
                    </div>
                    <div class="form-check text-start mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Publication
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 px-5 ">Edit article</button>
                </form>

            </div>
        </div>
    </div>
</main>


<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>
