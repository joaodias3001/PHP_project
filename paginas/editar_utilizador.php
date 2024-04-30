<?php
ob_start();
session_start();
include "../basedados/basedados.h";
include 'navbar.php';

if (!isset($_SESSION['estaLogado']) || $_SESSION['nivel_acesso'] != 3) {
    header("Location: login.php");
    exit;
}
if (!isset($_GET['id_utilizador'])) {
    echo "Parâmetro id_utilizador não foi fornecido.";
    exit; 
}

$id_utilizador = $_GET['id_utilizador'];


$sql = "SELECT * FROM utilizador WHERE id_utilizador=$id_utilizador";

$resultado = mysqli_query($conn,$sql);

if($resultado && mysqli_num_rows($resultado)){
    while($row = mysqli_fetch_assoc($resultado)){
        $nome_utilizador = $row['nome'];
        $email_utilizador = $row['email'];
        $pass_utilizador = $row['password'];
        $data_nascimento_utilizador = $row['data_nascimento'];
    }

} else {
    echo "erro ao deletar utilizador";
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados Pessoais</title>
    <link rel="stylesheet" href="bootstrap.min.css">
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
            max-width: 600px;
            margin-top: 50px;
        }
        .dashboard-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .dados-pessoais {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php exibirNavbar() ?>
    <div class="container" >
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="dashboard-container">
                    <h1>Editar Dados Pessoais</h1>
                    <form action="atualizar_dados.php" method="POST">
                        <div class='dados-pessoais'>
                            <div class="form-group">
                                <label for="">Nome:</label>
                                <input type="text" id="nome" name="user_nome" class="form-control" value="<?php echo $nome_utilizador; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" id="email" name="user_email" class="form-control" value="<?php echo $email_utilizador; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Data Nascimento:</label>
                                <input type="date" id="data_nasc" name="user_data_nascimento" class="form-control" value="<?php echo  $data_nascimento_utilizador; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" id="data_nasc" name="user_pass" class="form-control" value="<?php echo  $pass_utilizador; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nivel de acesso:</label>
                                <input type="" id="data_nasc" name="user_pass" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group logout-btn">
                            <input type="submit" value="Salvar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>