<?php
session_start();
include('../includes/conexao.php');

if(isset($_GET['idprato']) && isset($_SESSION['usuarioNome'])){
    
$id = $_GET['idprato'];

$sql = "DELETE FROM tb_pratos WHERE id = $id";

$conexao->query($sql);
$conexao->close();

header('location: listar_pratos.php');
}else{
    $_SESSION['loginPermissao'] = 'Você não tem permissão para acessar!';

    header('location: listar_pratos.php');
}
?>