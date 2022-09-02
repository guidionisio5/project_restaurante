<?php
session_start();
include_once('../includes/conexao.php');

if(isset($_GET['idreserva']) && isset($_SESSION['usuarioNome'])){
$id = $_GET['idreserva'];

$sql = "DELETE FROM tb_reservas WHERE id = $id";

$conexao->query($sql);
$conexao->close();

header('location: listar_reservas.php');
}else{

    header('location: listar_reservas.php');
}
?>