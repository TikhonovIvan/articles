<?php
require_once __DIR__ . "/../controller/func_register_login.php";

function dump(array|object $date) : void
{
    echo "<pre>" . print_r($date, 1) . "</pre>";
}

function redirect(string $url = ''): never
{
    header("Location: {$url}");
    die;
}
function load(array $fillable, $post = true): array
{
    $load_date = $post ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $field) {
        if (isset($load_date[$field])) {
            $data[$field] = trim($load_date[$field]);
        } else {
            $data[$field] = '';
        }
    }
    return $data;
}

function get_errors(array $errors)
{
    $html = '<ul class="list-unstyled">';
    foreach ($errors as $error_group) {
        foreach ($error_group as $error) {
            $html .= "<li>{$error}</li>";
        }
    }
    $html .= '</ul>';
    return $html;
}

function old(string $name, $post = true): string
{
    $load_date = $post ? $_POST : $_GET;
    return isset($load_date[$name]) ? h($load_date[$name]) : '';
}

function h($s): string
{
    return htmlspecialchars($s, ENT_QUOTES);
}

// Функция для проверки авторизован пользователь или нет
function check_auth(): bool
{
    return isset($_SESSION['user']);
}

function do_exit($do)
{
    if (isset($do) && $do == 'logout') {
        unset($_SESSION['user']);
        redirect('login.php');
    }

}

