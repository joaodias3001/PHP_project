<?php
include '../basedados/basedados.h';
session_start();

if(!isset($_SESSION['estaLogado'])){
    $_SESSION['tentandoInscrever']=true;
    header("location: ./login.php");
    
}




?>