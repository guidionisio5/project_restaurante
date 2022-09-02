<?php

session_start();

include('../includes/conexao.php');

if(isset($_GET['idprato']) && isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['categoria']) && isset($_POST['preco']) && isset($_POST['descricao']) && isset($_POST['calorias']) && isset($_POST['destaque']) && isset($_SESSION['usuarioNome'])){

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
}else{
    $_SESSION['loginPermissao'] = 'Você não tem permissão para acessar!';

    header('location: listar_pratos.php');

}