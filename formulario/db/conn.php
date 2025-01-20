<?php 

try {
    $pdo = new PDO('mysql:dbname=formularioDB;host=localhost;charset=utf8', 
    'root', 
    '', 
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} CATCH (PDOException $e) {
    die('Erro na conexão com o banco de dados: '. $e);
}