<?php
include '../basedados/basedados.h';
include 'navbar.php';
session_start();


$nome = $_GET["nome"];
$descricao = $_GET["descricao"];
$preco = $_GET["preco"];
$duracao = $_GET["duracao"];
$_SESSION['idade_maxima'] = $_GET["idade_maxima"]

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
    <?php exibirNavbar() ?>
    <div class="container" style="margin-top: 80px;">
        <div class="text-center">
            <h1 class="display-3"><?php echo $nome ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h4><?php echo $descricao ?></h4>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h4>Duração em horas: <?php echo $duracao ?></h4>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h4>Preço: <?php echo $preco ?>€</h4>
        </div>
    </div>

    <div class="container text-center" style="margin-top: 20px;">
        <a href="inscricao.php" class="btn btn-primary btn-lg">Inscreva-se</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>

    
</body>
</html>