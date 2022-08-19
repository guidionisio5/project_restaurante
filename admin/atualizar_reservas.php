<?php

include_once('../includes/conexao.php');

$id = $_GET['idreserva'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$telefone = $_POST['telefone'];
$data = $_POST['data']; 
$pessoas = $_POST['pessoas'];

$sql = "UPDATE tb_reservas SET nome = '$nome', email = '$email', mensagem = '$mensagem', telefone = '$telefone', data_cadastro = '$data', numero_pessoas = '$pessoas' WHERE id = '$id' ";

$conexao->query($sql);

$conexao->close();

header('location: listar_reservas.php');

?>