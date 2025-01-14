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
                <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                    Success
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="alert alert-warning alert-danger alert-dismissible fade show" role="alert">
                    Errors
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <div class="col-12 text-center">
        <h3 class="mb-4">User account</h3>
        <hr>
    </div>
        <div class="col-6 d-flex mt-5" >
            <div class="me-5">
                <img src="./img/user.png" alt="user-img" class="user-img">
                <h4 class="ms-5">Name user</h4>
            </div>


            <div class="col-6 ms-5">
                <form method="post" class="my-auto">
                    <p>Change password</p>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" placeholder="password">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password-2" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password 2</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 px-5 ">Change password</button>

                </form>
            </div>

        </div>

    </div>
</main>

<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>


