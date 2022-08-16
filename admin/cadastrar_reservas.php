<?php

include_once('../includes/conexao.php');

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data = $_POST['data'];
$mensagem = $_POST['mensagem'];
$pessoas = $_POST['pessoas'];

$sql = "INSERT INTO tb_reservas(`nome`,`telefone`,`email`,`data_cadastro`,`mensagem`,`numero_pessoas`)VALUES('$nome','$telefone','$email','$data','$mensagem','$pessoas')";

$conexao->query($sql);

$conexao->close();

header('location: ../index.php');  
