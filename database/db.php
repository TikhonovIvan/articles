<?php

const DB_HOST = "articles-project";
const DB_USER = "root";
const DB_PASSWORD = "root";
const DB_DATABASE = "articles";
const DB_PORT = 3306;



const DB_OPTIONS = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

const DNS = "mysql:dbname=" . DB_DATABASE . ";host=" . DB_HOST . ";port=". DB_PORT . ";charset=utf8";

try {
    $db = new PDO(DNS, DB_USER, DB_PASSWORD, DB_OPTIONS);
//    echo "Successful connection to the database";
}catch (PDOException $e){
    error_log("DB connection error:" . $e->getMessage());
    die("An error occurred while connecting to the database.");
}
