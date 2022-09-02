<?php
session_start();
include_once('../includes/conexao.php');

if(isset($_GET['idreserva']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem']) && isset($_POST['telefone']) && isset($_POST['data']) && isset($_POST['pessoas']) && isset($_SESSION['usuarioNome'])){


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
}else{
    $_SESSION['loginPermissao'] = 'Você não tem permissão para acessar!';

    header('location: listar_reservas.php');
}
