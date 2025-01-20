<?php 

require_once '../db/conn.php';
require_once '../validations/validations.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

$name = htmlspecialchars($name);
$phone = htmlspecialchars($phone);
$email = htmlspecialchars($email);

validateName($name);
$phone = validateNumber($phone);
validateEmail($email);

try {
    $sql = 'INSERT INTO registro (nome, email, telefone) VALUES (:nome, :email, :telefone)';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':nome', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':telefone', $phone, PDO::PARAM_STR);

    $stmt->execute();
    header('Location: ../view/index.html');
} catch(PDOException $e){
    die('Erro ao inserir no banco de dados: '. $e);
}