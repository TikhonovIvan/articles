<?php
session_start();
$title = 'User Account';

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/view/incs/header.tpl.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = load(['user_id', 'password','password-new','password-new2' ]);

    $v = new Valitron\Validator($data);
    $v->rules([
        'required' => ['user_id','password','password-new','password-new2'],
        'lengthMin' => [
            ['password', 6]
        ],
    ]);

    if($v->validate()){
        if(change_password($data)){
            redirect('profile-user.php');
        }else{
            redirect('profile-user.php');
        }

    }else{
        $_SESSION['errors'] = get_errors($v->errors());
    }
}
?>



<main class="main mt-3">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <?php if(isset($_SESSION['success'])):?>
                <div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif;?>
                <?php if(isset($_SESSION['errors'])):?>
                <div class="alert alert-warning alert-danger alert-dismissible fade show" role="alert">
                    <?php
                    echo $_SESSION['errors'];
                    unset($_SESSION['errors']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif;?>
            </div>
        </div>
    <div class="col-12 text-center">
        <h3 class="mb-4">User account</h3>
        <hr>
    </div>
        <div class=" col-12 col-md-6 d-flex justify-content-center flex-md-nowrap flex-wrap mt-5" >
            <div class="me-md-5  text-center">
                <img src="./img/user.png" alt="user-img" class="user-img">
                <h4 >User: <?= $_SESSION['user']['name']?></h4>
                <p><?= $_SESSION['user']['email']?></p>

            </div>


            <div class="col-md-6 col-12 ms-md-5">
                <form method="post" class="my-auto">
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
                    <p>Change password</p>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password_old" placeholder="password">
                        <label for="password_old">Old Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password-new" class="form-control" id="password_new" placeholder="password_new">
                        <label for="password_new">New Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password-new2" class="form-control" id="password_tow" placeholder="password_tow">
                        <label for="password_tow">Repeat new password</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 px-md-2 ">Change password</button>
                </form>
            </div>
        </div>

    </div>
</main>

<?php
require_once __DIR__ . "/view/incs/footer.tpl.php";
?>


