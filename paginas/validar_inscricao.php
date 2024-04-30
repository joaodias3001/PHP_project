<?php
include "../basedados/basedados.h";

if(isset($_GET['id_inscricao'])) {
    $id_inscricao = $_GET['id_inscricao'];

    $sql = "UPDATE inscricao SET esta_ativa = 1 WHERE id_inscricao = $id_inscricao";

    if (mysqli_query($conn, $sql)) {
        echo "Inscrição validada com sucesso!";
    } else {
        echo "Erro ao validar inscrição: " . mysqli_error($conn);
    }

} else {
    echo "ID de inscrição não fornecido.";
}
?>

