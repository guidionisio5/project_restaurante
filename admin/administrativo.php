<?php
    session_start();
    echo "Usuario: ". $_SESSION['usuarioNome'];

    if($_SESSION['usuarioNome'] == ""){

        header('location: index.php');

        $_SESSION['loginErro'] = "Você não efetou o login!";
    }
?>
<br>
<a href="sair.php">Sair</a>