<?php
include "../basedados/basedados.h";
session_start();

if (!isset($_SESSION['estaLogado']) || $_SESSION['nivel_acesso'] != 3) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Administrador</title>
    <link rel="stylesheet" href="bootstrap.min.css" media="screen">
    <style>
        body {
            background-color: #f3f3f3;
            padding-top: 50px;
        }
        .dashboard-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
        }
        .dashboard-welcome {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .dashboard-options {
            list-style: none;
            padding: 0;
        }
        .dashboard-options li {
            margin-bottom: 20px; /* Espaçamento entre as opções */
        }
        .dashboard-options a {
            display: block;
            background-color: #337ab7;
            color: #fff;
            padding: 20px; /* Aumento do padding */
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .dashboard-options a:hover {
            background-color: #23527c;
        }
        .logout-btn {
            text-align: center;
            margin-top: 30px;
        }
        .logout-btn a {
            background-color: #d9534f;
            color: #fff;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .logout-btn a:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-drop" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>FormaçõesEST</span></a>
            </div>

            <div class="collapse navbar-collapse" id="menu-drop">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Formações</a></li>
                    <li><a href="">Contactos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!isset($_SESSION['estaLogado'])){
                        echo ( '<li><a href="login.php">Login</a></li>');
                        echo('<li><a href="registrar.php">Registar-se</a></li>');
                    } else { 
                        echo '<li><a href="#">'.$_SESSION['nome'].'</a></li>';
                        echo ( '<li><a href="logout.php">Logout</a></li>');
                    } 
                    ?>
                    
                </ul>
            </div>

        </div>
    </nav>
    <div class="container">
        <div class="dashboard-container">
            <div class="dashboard-welcome">
                <h1 class="display-3">Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
            </div>
            <ul class="dashboard-options">
                <li><a href="gerir_utilizadores.php">Gerenciar Usuários</a></li>
                <li><a href="gerir_cursos.php">Gerenciar Cursos</a></li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>
