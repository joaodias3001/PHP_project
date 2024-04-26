<?php
session_start();
include 'navbar.php';
include '../basedados/basedados.h';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    
</head>

<body>
<?php exibirNavbar(); ?>

<div class="container-fluid" style="margin-top: 50px;">
    <div class="row">
        <!-- Informações da Empresa -->
        <div class="col-md-6">
            <h2>Informações da Empresa</h2>
            <h4>Endereço: Rua da Empresa, 12345, Cidade, Estado</h4>
            <h4>Telefone: (00) 1234-5678</h4>
            <h4>Email: empresa@example.com</h4>
        </div>

        <!-- Formulário de Contato -->
        <div class="col-md-6">
            <h2 class="text-center">Fale Conosco</h2>
            <form role="form" class="form-horizontal" method="post" action="#">
                <div class="form-group">
                    <label for="input-nome" class="col-lg-2 control-label">Nome</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="" id="input-nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required="required" name="nome_contacto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">E-mail</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email_contacto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Mensagem</label>
                    <div class="col-lg-10">
                        <input placeholder="Mensagem..." id="message" class="form-control" name="texto_contacto" rows="6"></input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                </div>
            </form>
            <?php 
                if(isset($_POST['nome_contacto']) && isset($_POST['email_contacto'])  && isset($_POST['texto_contacto'])){
                    $nome_contacto = $_POST['nome_contacto'];
                    $email_contacto = $_POST['email_contacto'];
                    $texto = $_POST['texto_contacto'];

                    $sql = "INSERT into MENSAGEM (nome,email,mensagem) VALUES ('$nome_contacto','$email_contacto',' $texto')";
                    $res = mysqli_query($conn,$sql);

                    if($res) {
                        echo '<div class="text-center"><h5> Mensagem enviada com sucesso!</h5></div>';
                    } else {
                        echo '<div class="text-center"><h5> Não foi possivel enviar!</h5></div>';
                    }
                }
            ?>
        </div>
    </div>

    <!-- Mapa Google -->
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h1 class="text-center">Localização da Empresa</h1>
            <iframe
                width="100%"
                height="450"
                style="border:0"
                loading="lazy"
                allowfullscreen
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3064.441627579968!2d-7.514954223928567!3d39.81951509177132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d5ea6bb2280e1%3A0x1c460157bc4b46c8!2sEscola%20Superior%20de%20Tecnologia%20-%20Instituto%20Polit%C3%A9cnico%20de%20Castelo%20Branco!5e0!3m2!1spt-PT!2spt!4v1714139099724!5m2!1spt-PT!2spt"
            ></iframe>
        </div>
    </div>
</div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>