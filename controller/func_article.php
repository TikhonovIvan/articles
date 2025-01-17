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
    $where = 'WHERE status = 1'; // Добавлено явно, так как нужны только статьи со статусом 1
    $stmt = $db->query("SELECT COUNT(*) FROM article_text {$where}");
    return (int)$stmt->fetchColumn();
}

function get_count_articles_2(int $id_user): int
{
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM article_text WHERE user_id = :id_user");
    $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    return (int)$stmt->fetchColumn();
}

//Вывод статей через пагинацию
function get_articles(int $id_user, int $start, int $per_page): array
{
    global $db;

    // Условие WHERE: выбираем статьи текущего пользователя без фильтрации по статусу
    $stmt = $db->prepare("
        SELECT * FROM article_text 
        WHERE user_id = $id_user 
        ORDER BY id DESC 
        LIMIT $start, $per_page
    ");

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
    $stmt = $db->prepare("SELECT * FROM article_text WHERE id = $id_article ");
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
    $where = 'WHERE article_text.status = 1'; // Используем фильтр для выборки только опубликованных статей
    $sql = "
   SELECT 
    article_text.*, 
    DATE_FORMAT(article_text.created_at, '%d.%m.%Y %H:%i') AS formatted_date,
    users.name AS author_name 
FROM 
    article_text 
JOIN 
    users 
ON 
    article_text.user_id = users.id 
{$where} 
ORDER BY article_text.id DESC 
LIMIT $start, $per_page
";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function delete_articles(array $delete):void
{
    global $db;

    $stmt = $db->prepare("DELETE FROM article_text WHERE id = ?");
    $stmt->execute($delete);
    $_SESSION['success'] = 'Article(s) deleted successfully.';
    redirect('add-article.php');
}

