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

$id_curso = $_SESSION['id_curso'];
$id_utilizador = $_SESSION['id_utilizador'];

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
    $data_inscricao = $data_hoje->format('Y-m-d');
    $sql = "INSERT INTO INSCRICAO (id_utilizador, id_curso, data_inscricao) VALUES ('$id_utilizador', '$id_curso', '$data_inscricao')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "deu bosta!";
    } else{
        echo "deu bom";
    }
} else {
    echo "Desculpe, para inscrever-se a este curso deves ter entre 18 e $idade_maxima !";
}
?>