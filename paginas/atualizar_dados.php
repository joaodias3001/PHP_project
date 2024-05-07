<?php
include "../basedados/basedados.h";
session_start();
if(!isset($_SESSION['estaLogado']) || !$_SESSION['estaLogado'] || $_SESSION['nivel_acesso']==4  || $_SESSION['nivel_acesso']==5){
    header("location: ./login.php");
    exit;
}
$query = "SELECT password FROM utilizador WHERE id_utilizador = ".$_SESSION['id_utilizador']."";
$res =  mysqli_query($conn,$query);
if($res && mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    $pass_utilizador = $row['password'] ;
}


// Verifica se os dados do formulário foram enviados
if (isset($_POST['user_email']) || isset ($_POST['user_nome']) || isset ($_POST['user_pass']) || isset ($_POST['user_data_nascimento'])) {
    // Recebe os dados do formulário
    $nome = $_POST['user_nome'];
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $data_nascimento = $_POST['user_data_nascimento'];

    if($pass == $pass_utilizador){
        $sql = "UPDATE utilizador SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento' WHERE id_utilizador = ".$_SESSION['id_utilizador']."";
    } else {
        $sql = "UPDATE utilizador SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento', password = md5('$pass') WHERE id_utilizador = ".$_SESSION['id_utilizador']."";
    }

    $resultado = mysqli_query($conn,$sql);
    if($resultado && mysqli_affected_rows($conn)>0){
        //atualiza as variaveis de sessão
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['data_nascimento'] = $data_nascimento;

        echo "<script>alert('Alteração realizada com sucesso')</script>";
        echo "<script>window.location.href = './gerir_utilizadores.php';</script>";
    } 
} else {
        // Se o formulário não foi submetido via POST, redireciona para a página de dados pessoais
        header("Location: dados_pessoais.php");
        exit();
}
?>
