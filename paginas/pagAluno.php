
<?php
ob_start();
include "../basedados/basedados.h";
session_start();
if (!isset($_SESSION['estaLogado']) || $_SESSION['nivel_acesso'] != 1) {
    header("Location: login.php");
    exit;
}
    $nome_aluno = $_SESSION['nome'];

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
    <title>Área do Aluno</title>
</head>
<style>
     .dashboard-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            
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
   <div class="container dashboard-container" style="margin-top: 60px;">
        <div class="text-center">
            <h1 class="display-3">Bem-vindo à Área do Aluno, <?php echo $_SESSION['nome']; ?>!</h1>
            <h3>Seus cursos inscritos:</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome do Curso</th>
                        <th>Duração (horas)</th>
                        <th>Data de Inscrição</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $id_aluno = $_SESSION['id_utilizador'];
                    $sql = "SELECT c.nome AS nome_curso, c.descricao, c.duracao, c.preco, i.data_inscricao 
                            FROM curso c
                            INNER JOIN inscricao i ON c.id_curso = i.id_curso
                            WHERE i.id_utilizador = $id_aluno";
                    $resultado = mysqli_query($conn, $sql);
                    // Listar os cursos inscritos pelo aluno
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>".$row['nome_curso']."</td>";
                            echo "<td>".$row['duracao']."</td>";
                            echo "<td>".$row['data_inscricao']."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Você ainda não se inscreveu em nenhum curso.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
  
</body>
</html>
