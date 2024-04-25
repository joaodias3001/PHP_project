<?php
include '../basedados/basedados.h';
session_start();

$nome = $_GET["nome"];
$descricao = $_GET["descricao"];
$preco =$_GET["preco"];
$duracao =$_GET["duracao"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="bootstrap.min.css" media="screen">
</head>
<style>
    html, body {
        height: 100%;
    }


    
    .inscricao-container {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        transform: translate(-50%, -50%);
        position: absolute;
        top: 50%;
        left: 50%;
    }

    .inscricao-container > h2 {
        font-weight: bold;
        
    }

    

</style>

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
                <a class="navbar-brand" href="home.php"><span>FormaçõesEST</span></a>
            </div>

            <div class="collapse navbar-collapse" id="menu-drop">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="">Formações</a></li>
                    <li><a href="">Contactos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!isset($_SESSION['estaLogado'])){
                        echo ( '<li><a href="login.php">Login</a></li>');
                        echo('<li><a href="registrar.php">Registar-se</a></li>');
                    } else { 
                        echo '<li><a>Ola '.$_SESSION['nome'].'</a></li>';
                        echo ( '<li><a href="logout.php">Logout</a></li>');
                    } 
                    ?>
                    
                </ul>
            </div>
        </div>
</nav>
    <div class="container curso" style="margin-top: 200px;">
            <div class="text-center">
                <h1 class="display-3"><?php echo "$nome" ?></h1>
            </div>
            <div class="text-center">
                <h4 class="display-3"><?php echo "$descricao" ?></h4>
            </div>
            <div class="text-center">
                <h4 class="display-3">Duração em horas: <?php echo "$duracao" ?></h4>
             </div>
            <div class="text-center">
                 <h4 class="display-3"> Preço: <?php echo "$preco" ?>€</h4>
            </div>
            <div class="text-center">
                <a href=""class='btn btn-primary' role='button'>Inscreva-se</a>
            </div>
    </div>
    
  
    
   


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>

    
</body>
</html>