<?php

function create_article(array $data): bool
{
    global $db;
    global $isPublic;
    if(!check_auth()){
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }
    $stmt = $db->prepare("INSERT INTO article_text(user_id, title, article_body, status) VALUE (?,?,?,?)");
    $stmt->execute([$data['user_id'],$data['title-article'],$data['editor'],$isPublic]);
    $_SESSION['success'] = 'Article added';
    return true;
}

function get_articles(int $id): array
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM article_text WHERE user_id = $id");
    $stmt->execute();
    return $stmt->fetchAll();
}