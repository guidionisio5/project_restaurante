<?php

include('../includes/conexao.php');

$id = $_GET['idprato'];

$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$caloria = $_POST['calorias'];
$destaque = $_POST['destaque'];

$sql = "UPDATE tb_pratos set nome = '$nome', codigo = '$codigo', categoria = '$categoria',
descricao = '$descricao', preco = '$preco', calorias = '$caloria' ,destaque = '$destaque' where id = '$id' ";

$conexao->query($sql);

$conexao->close();

header('location: listar_pratos.php');