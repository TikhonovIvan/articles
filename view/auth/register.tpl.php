<?php
require_once __DIR__ . "/../incs/header.tpl.php";
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
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center mb-5"> Register on Article-X </h2>
                    <form method="post" class="text-center">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="name@example.com" value="<?= old('name') ?>">
                            <label for="name">Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="name@example.com" value="<?= old('email') ?>">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" value="<?= old('password') ?>">
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 px-5 ">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </main>

<?php
require_once __DIR__ . "/../incs/footer.tpl.php";
?>