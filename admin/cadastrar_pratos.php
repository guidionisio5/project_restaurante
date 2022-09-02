<?php
session_start();
include('../includes/conexao.php');

if(isset($_FILES['imagem']) && isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['categoria']) && isset($_POST['preco']) && isset($_POST['descricao']) && isset($_POST['calorias']) && isset($_POST['destaque']) && isset($_SESSION['usuarioNome'])){
$imagem = $_FILES['imagem'];
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$calorias = $_POST['calorias'];
$destaque = $_POST['destaque'];

$dir = "../img/cardapio/";

$imagem["name"] = $codigo.".jpg";

if(move_uploaded_file($imagem["tmp_name"], "$dir".$imagem["name"])) {
    echo "Arquivo enviado com sucesso";
}
else {
    echo "erro de cadastro";
}

$sql = "INSERT INTO tb_pratos(codigo,nome,categoria,descricao,preco,calorias,destaque)VALUES('$codigo','$nome','$categoria','$descricao','$preco','$calorias','$destaque')";

$conexao->query($sql);

$conexao->close();

header('location: listar_pratos.php');  
}else{
    $_SESSION['loginPermissao'] = 'Você não tem permissão para acessar!';

    header('location: cadastro_pratos.php');
}