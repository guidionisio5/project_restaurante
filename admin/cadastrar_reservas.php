<?php
session_start();
include_once('../includes/conexao.php');

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem']) && isset($_POST['telefone']) && isset($_POST['data']) && isset($_POST['pessoas']) && isset($_SESSION['usuarioNome'])){

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
}else{
    $_SESSION['loginPermissao'] = 'Você não tem permissão para acessar!';

    header('location: listar_reservas.php');
}
