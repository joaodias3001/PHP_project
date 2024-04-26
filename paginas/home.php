<?php
include '../basedados/basedados.h';
include 'navbar.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link bootstrap-->
    <link rel="stylesheet" href="bootstrap.min.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <title>Home</title>
</head>
<style>
    body {
      padding-top: 50px;
      background-color: #f0f6fc; 
    }
    .jumbotron {
        background-image: url(main_banner.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 400px;
        padding-top: 100px;
    }
    #main-banner> p{
        color: whitesmoke;
    }
</style>

<body>
    <?php exibirNavbar()?>
    
    <div class="jumbotron">
        <div class="container" id="main-banner">
            <h1 style="color: black;">Bem-vindo à Empresa de Formações</h1>
            <p>A melhor escolha para sua formação profissional.</p>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <h1 class="display-3">Conheça nossos cursos</h1>
        </div>
    </div>

    <div class="container">
        <hr>
        <div class="row">
            <?php 
                $sql="select * from curso";
                $result = mysqli_query($conn,$sql);
                //buscar os cursos a base de dados e listar
                if($result){
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo ( 
                                "<div class='col-md-4'>
                                    <div class='thumbnail'>
                                        <div class='caption'>
                                            <h3>".$row['nome'] ."</h3>
                                            <p>".$row['descricao']."</p>
                                            <p><a href='curso.php?nome=".$row['nome']."&descricao=".$row['descricao'].
                                            "&preco=".$row['preco']."&duracao=".$row['duracao']."&idade_maxima=".$row['idade_maxima'].
                                            "'class='btn btn-primary' role='button'>Mais detalhes</a></p>
                                        </div>
                                    </div>
                                </div>"
                            );
                        }
                      
                    }
                }
            
            ?>
          
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>