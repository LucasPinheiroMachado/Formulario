<?php 

function formatNumber($number) {
    $number = preg_replace('/\D/', '', $number);

    if (strlen($number) == 11) {
        return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $number);
    } elseif (strlen($number) == 10) {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $number);
    }

    return $number;
}

function validateNumber($number) {
    if (strlen($number) < 10 || strlen($number) > 11){
        die('Numero deve ter 10 ou 11 digitos.');
    }

    $number = formatNumber($number);
    return $number;
}

function validateEmail($email) {
    if (empty($email)) {
        die("Erro: O campo de e-mail não pode estar vazio.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Erro: O formato do e-mail é inválido.");
    }

    if (!preg_match('/@[\w.-]+\.[a-zA-Z]{2,}$/', $email)) {
        die("Erro: O domínio do e-mail deve ter uma extensão válida.");
    }
}

function validateName($name){
     if (empty($name)) {
        die("Erro: O nome não pode estar vazio.");
    }

    if (preg_match('/\d/', $name)) {
        die("Erro: O nome não pode conter números.");
    }

}