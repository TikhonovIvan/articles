<?php

function create_article(array $data): bool
{
    global $db;
    global $isPublic;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }
    $stmt = $db->prepare("INSERT INTO article_text(user_id, title, article_body, status) VALUE (?,?,?,?)");
    $stmt->execute([$data['user_id'], $data['title-article'], $data['editor'], $isPublic]);
    $_SESSION['success'] = 'Article added';
    return true;
}

//Количество статей
function get_count_articles(): int
{
    global $db;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }
    $stmt = $db->query("SELECT COUNT(*) FROM article_text");
    return (int)$stmt->fetchColumn();
}

//Вывод статей через пагинацию
function get_articles(int $id_user, int $start, int $per_page): array
{
    global $db;

    $stmt = $db->prepare("
        SELECT * FROM article_text 
        WHERE user_id = :id_user 
        ORDER BY id DESC 
        LIMIT :start, :per_page
    ");

    $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':per_page', $per_page, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll();
}



//Чтение статьи
function read_article(int $id_article): array
{
    global $db;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }
    $stmt = $db->prepare("SELECT * FROM article_text WHERE id = $id_article");
    $stmt->execute();
    return $stmt->fetchAll();

}

function edit_article(int $id_article): array
{
    global $db;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }
    $stmt = $db->prepare("SELECT * FROM article_text WHERE id = $id_article");
    $stmt->execute();
    return $stmt->fetchAll();
}

function edit_article_text(int|string $id_article, array $data): bool
{
    global $db;
    global $isPublic;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }

    $stmt = $db->prepare("UPDATE article_text SET title = ?, article_body = ?, status = ? WHERE id = ?");
    $stmt->execute([$data['title-article'], $data['editor'], $isPublic, $id_article]);
    $_SESSION['success'] = 'Article edit';
    return true;
}

function limit_articles(): bool|array
{
    global $db;
    if (!check_auth()) {
        $_SESSION['errors'] = 'Login is required';
        redirect('login.php');
    }
    $stmt = $db->prepare("SELECT * FROM article_text ORDER BY id DESC LIMIT 4");
    $stmt->execute();
    return $stmt->fetchAll();
}


function home_articles(int $start, int $per_page): array
{
    global $db;

    // Формируем условие WHERE
    $where = '';
    if (!check_auth()) {
        $where = 'WHERE status = 1';
    }

    // SQL-запрос с динамическим условием
    $sql = "SELECT * FROM article_text $where ORDER BY id DESC LIMIT :start, :per_page";

    $stmt = $db->prepare($sql);

    // Привязываем параметры
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':per_page', $per_page, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll();
}

