<?php
include '../basedados/basedados.h';
<<<<<<< HEAD
session_start();

<<<<<<<< HEAD:paginas/curso.php
$nome = $_GET["nome"];
$descricao = $_GET["descricao"];
$preco =$_GET["preco"];
$duracao =$_GET["duracao"];
?>

<!DOCTYPE html>
<html lang="en">
=======
include 'navbar.php';
session_start();

$nome = $_GET["nome"];
$descricao = $_GET["descricao"];
$preco = $_GET["preco"];
$duracao = $_GET["duracao"];
$_SESSION['idade_maxima'] = $_GET["idade_maxima"];

?>

<!DOCTYPE html>
<html lang="pt">

>>>>>>> branch-joao
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
<<<<<<< HEAD
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
========
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
>>>>>>>> branch-joao:paginas/inscricao.php
=======
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
            <a href="inscricao.php" class="btn btn-inscrever">Inscreva-se Agora</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>
>>>>>>> branch-joao
