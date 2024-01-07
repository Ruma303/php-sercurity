<?php
const DB_HOST = "127.0.0.1";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "php_mysql";
const CHARSET = "utf8mb4";

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . CHARSET . ";";

//? (opzionale) Impostare attributi PDO per gli errori in modalità eccezione
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
} catch(PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}