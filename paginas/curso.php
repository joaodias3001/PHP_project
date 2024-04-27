<?php
include '../basedados/basedados.h';
include 'navbar.php';
session_start();

$nome = $_GET["nome"];
$descricao = $_GET["descricao"];
$preco = $_GET["preco"];
$duracao = $_GET["duracao"];
$_SESSION['idade_maxima'] = $_GET["idade_maxima"];
$_SESSION['id_curso'] = $_GET["id_curso"];

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body {
            padding-top: 80px; 
            background-color: #f8f9fa; 
        }

        .container {
            max-width: 800px; 
            margin: auto;
            background-color: #fff; 
            padding: 30px;
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .curso-info {
            margin-bottom: 30px;
        }

        .curso-info h1 {
            color: #007bff; 
        }

        .curso-info p {
            font-size: 18px;
        }

        .btn-inscrever {
            font-size: 1.5rem;
            padding: 15px 40px;
            border-radius: 25px;
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        
    </style>
</head>

<body>
    <?php exibirNavbar(); ?>

    <div class="container">
        <div class="curso-info text-center">
            <h1><?php echo $nome; ?></h1>
            <p class="lead"><?php echo $descricao; ?></p>
            <p><strong>Duração:</strong> <?php echo $duracao; ?> horas</p>
            <p><strong>Preço:</strong> <?php echo $preco; ?>€</p>
        </div>

        <div class="text-center">
            <a href="inscricao.php" class="btn btn-inscrever">Inscreva-se Agora!</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>
