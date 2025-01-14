<?php
session_start();

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/controller/func_register_login.php";

$title = 'Register';
if(check_auth()){
    redirect('index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = load(['name', 'email', 'password']);

    $v = new \Valitron\Validator($data);
    $v->rules([
        'required' => ['name', 'email', 'password'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6]
        ],
        'lengthMax' => [
            ['name', 255],
            ['email', 255],
        ]
    ]);
    if ($v->validate()) {
        if(register($data)){
            redirect('login.php');
        }
    } else {
        $_SESSION['errors'] = get_errors($v->errors());
    }
}
require_once __DIR__ . "/view/auth/register.tpl.php";


