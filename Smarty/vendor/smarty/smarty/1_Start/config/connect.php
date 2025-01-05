<?php
function connectDB(): PDO
{
    $dsn = 'mysql:host=localhost;dbname=Gachora';
    $username = 'root';
    $password = '';
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
        // echo 'DB Connect Success';
    } catch (PDOException $e) {
        echo 'DB Connect Failed: ' . $e->getMessage();
        exit;
    }
}
?>