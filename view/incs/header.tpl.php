<?php
do_exit($_GET['do'] ?? null);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Article-X : <?= $title ?></title>

    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<header class="header" id="header">
    <nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Article-X</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <?php if ($_SERVER['PHP_SELF'] !== '/register.php' && $_SERVER['PHP_SELF'] !== '/login.php' && $_SERVER['PHP_SELF'] !== '/profile-user.php'): ?>
                    <form class="d-none d-lg-block" role="search">
                        <div class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>

                <?php endif; ?>


                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if (!check_auth()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Hello, <?= $_SESSION['user']['name'] ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="add-article.php">Create article </a></li>
                                <li><a class="dropdown-item" href="profile-user.php">Profile</a></li>
                                <li><a class="dropdown-item" href="?do=logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if ($_SERVER['PHP_SELF'] !== '/register.php' && $_SERVER['PHP_SELF'] !== '/login.php' && $_SERVER['PHP_SELF'] !== '/profile-user.php'): ?>
    <form class="m-3 d-lg-none d-md-block" role="search">
        <div class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </form>
    <?php endif; ?>
</header>
