<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=file-upload-2awm', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
$pdo->query('SET NAMES UTF8');
