<?php
session_start();

$title = 'Home';

require_once __DIR__ . "/database/db.php";
require_once __DIR__ . "/controller/functions.php";
require_once __DIR__ . "/view/incs/header.tpl.php";


require_once __DIR__ ."/view/index.tpl.php";

require_once __DIR__ . "/view/incs/footer.tpl.php";

