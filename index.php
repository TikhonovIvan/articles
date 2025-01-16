<?php
session_start();

$title = 'Home';

require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/controller/func_article.php";
require_once __DIR__ . "/view/incs/header.tpl.php";
require_once __DIR__ . "/controller/Pagination.php";


$page = $_GET['page'] ?? 1;
$per_page = 6; // Количество статей на странице
$total = get_count_articles();
$pagination = new Pagination((int)$page, $per_page, $total);
$start = $pagination->getStart();
$articles = home_articles($start, $per_page);


require_once __DIR__ ."/view/index.tpl.php";

require_once __DIR__ . "/view/incs/footer.tpl.php";

