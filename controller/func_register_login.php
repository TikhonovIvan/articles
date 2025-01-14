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
