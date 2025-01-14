<?php
require_once __DIR__ . "/../incs/header.tpl.php";
?>

    <main class="main mt-3">
        <div class="container mt-5">
            <div class="row">
                <div class="col-6 m-auto">
                    <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

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
                <div class="col-md-6 offset-md-3">

                    <h2 class="text-center mb-5"> Welcome to Article-X </h2>
                    <form method="post" class="text-center">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                   placeholder="name@example.com" value="<?= old('email') ?>">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                   placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 px-5 ">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </main>


<?php
require_once __DIR__ . "/../incs/footer.tpl.php";
?>