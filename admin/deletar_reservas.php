<?php

include_once('../includes/conexao.php');
$id = $_GET['idreserva'];

$sql = "DELETE FROM tb_reservas WHERE id = $id";

$conexao->query($sql);
$conexao->close();

header('location: listar_reservas.php');

?>