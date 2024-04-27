<?php
include '../basedados/basedados.h';
session_start();

if (!isset($_SESSION['estaLogado']) || !$_SESSION['estaLogado']) {
    $_SESSION['tentandoInscrever'] = true;
    header("location: ./login.php");
    exit; 
}


if (!isset($_SESSION['data_nascimento']) || !isset($_SESSION['idade_maxima'])) {
    echo "Informações de idade não disponíveis.";
    exit; 
}

// Obter a idade máxima permitida e a data de nascimento do usuário
$idade_maxima = $_SESSION['idade_maxima'];
$data_nascimento = $_SESSION['data_nascimento'];

// Criar objetos DateTime para a data de nascimento e a data de hoje
$data_nascimento_dt = new DateTime($data_nascimento);
$data_hoje = new DateTime();

// Calcular a idade do usuário
$idade = $data_hoje->diff($data_nascimento_dt)->y;


// Verificar se a idade é menor ou igual à idade máxima permitida
if ($idade>= 18 && $idade <= $idade_maxima) {
    echo "Você pode se inscrever.";
} else {
    echo "Desculpe, você excede a idade máxima permitida para se inscrever.";
}
?>