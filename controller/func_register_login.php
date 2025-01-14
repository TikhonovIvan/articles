<?php

function register(array $data): bool
{
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    if ($stmt->fetchColumn()) {
        $_SESSION['errors'] = 'This email address is already in use';
        return false;
    }

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUE (:name, :email, :password)");
    $stmt->execute($data);
    $_SESSION['success'] = 'You are registered';
    return true;
}

function login(array $data): bool
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    if ($row = $stmt->fetch()) {
        if (!password_verify($data['password'], $row['password'])) {
            $_SESSION['errors'] = 'Wrong email or password';
            return false;
        }
    } else {
        $_SESSION['errors'] = 'Wrong email or password';
        return false;
    }
    foreach ($row as $key => $value) {
        if ($key != 'password') {
            $_SESSION['user'][$key] = $value;
        }
    }
    $_SESSION['success'] = 'Welcome';
    return true;
}


function change_password(array $data): bool
{
    global $db;
    $stmt =$db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$data['user_id']]);
    $row = $stmt->fetch();
    if (!$row ) {
        $_SESSION['errors'] = 'User not found';
        return false;
    }

    if (!password_verify($data['password'], $row['password'])) {
        $_SESSION['errors'] = 'Wrong current password';
        return false;
    }
    if($data['password-new'] !==  $data['password-new2']){
        $_SESSION['errors'] = 'Wrong password_new and Repeat new password';
        return false;
    }

    // Хэширование нового пароля
    $hashedPassword = password_hash($data['password-new'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    if($stmt->execute([$hashedPassword, $data['user_id']])){
        $_SESSION['success'] = 'Password successfully changed';
        return true;
    }
    $_SESSION['errors'] = 'Failed to update password';
    return false;
}