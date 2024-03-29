<?php
include "../basedados/basedados.h";
session_start();
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css" media="screen">
</head>
<style>
    /* Estilos para centralizar o conteúdo */
    html, body {
        height: 100%;
    }
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:#3aa7d0;
    }
    .login-container {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .login-container > h2 {
        font-weight: bold;
        
    }

</style>
<body>
    <div class="login-container">
        <h2 class="text-center">Sign-Up</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" id="email" name="user_email" placeholder="Digite seu e-mail" required >
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="user_password" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>
        <p class="text-center" style="margin-top: 10px;"><a href="#">Esqueceu sua senha?</a></p>
       <?php
        if(isset($_POST['user_email']) && isset ($_POST['user_password'])){
        $email = $_POST['user_email'];
        $password = $_POST['user_password']; 
        $query = "select nome,email from utilizador where email = '$email' and password = md5('$password')";

        $resultado = mysqli_query($conn,$query);

        if(mysqli_num_rows($resultado)>0){
            $dados_user = mysqli_fetch_assoc($resultado);
            $_SESSION['nome'] = $dados_user['nome'];
            $_SESSION['email'] = $dados_user['email'];
            $_SESSION['nivel_acesso'] = $dados_user['nivel_acesso'];
            $_SESSION['estaLogado'] = true;

            header("location: ./home.php");
        } else {
            echo '<div class="text-center"><h5> E-mail e/ou password inválidos!</h5></div>'; 
        }
    }
    
    ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
