<?php
session_start();

if(!isset($_GET['user_email'])|| !isset($_GET['user_password'])){
    header("location: ./login.html");
    
echo '<script type="text/javascript">
       window.onload = function () { alert("Welcome"); } 
</script>'; 

    exit;
}

echo"se chegou aqui esta num bom caminho";



?>