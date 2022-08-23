<?php

include_once('../includes/conexao.php');

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

?>