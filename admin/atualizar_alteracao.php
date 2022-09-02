<?php

session_start();

include_once('../includes/conexao.php');

if(isset($_FILES['imagem']) && isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_SESSION['usuarioNome'])){
    


$imagem = $_FILES['imagem'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$dir = "../img/alteracao/";
$hash = md5(uniqid(rand(), true));
$imagem['name'] = $hash.".jpg";

if(move_uploaded_file($imagem["tmp_name"], "$dir".$imagem["name"])) {
    echo "Arquivo enviado com sucesso";
}
else {
    echo "erro de cadastro";
}

$sql = "UPDATE tb_alteracao SET titulo = '$titulo', descricao = '$descricao', imagem = '".$imagem['name']."'";
$conexao->query($sql);
$conexao->close();

header('location: ../index.php');

}else{
    $_SESSION['loginPermissao'] = 'Você não tem permissão para acessar!';

    header('location: editar_alteracao.php');

}

?>