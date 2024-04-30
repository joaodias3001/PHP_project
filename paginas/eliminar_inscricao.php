<?php
include "../basedados/basedados.h";

if(isset($_GET['id_inscricao'])) {
    $id_inscricao = $_GET['id_inscricao'];

    $sql = "DELETE FROM inscricao WHERE id_inscricao = $id_inscricao";

    if (mysqli_query($conn, $sql)) {
        echo "Inscrição eliminada com sucesso!";
        
    } else {
        echo "Erro ao eliminar inscrição: " . mysqli_error($conn);
    }

} else {
    echo "ID de inscrição não fornecido.";
}

?>

