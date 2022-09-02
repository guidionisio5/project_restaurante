<?php

include_once ('../includes/conexao.php');
session_start();
echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){

    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetou o login!";
}
?>
<p class="text-center text-danger">
  <?php if(isset($_SESSION['loginPermissao'])){
      echo $_SESSION['loginPermissao'];
      unset($_SESSION['loginPermissao']);
    }
  ?>
</p>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
    <div class="row centered-form">
        <div class="col-lg-12 ">
            <p><a href="index.php">Add New Record</a></p>
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">CRUD Operation Using PHP PDO</h3> </div>
            <div class="panel-body">
            <?php
                $sql = "SELECT * FROM tb_reservas";

                $result = mysqli_query($conexao,$sql);

                $total = mysqli_num_rows($result);

            ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Telefone</th>
                        <th>Data do Cadastro</th>
                        <th>Número de pessoas</th>
                    </tr>
                </thead>
            <tbody>
            <?php
                while($dados = mysqli_fetch_array($result)){
                    $id = $dados['id'];
            ?>
                    <tr>
                        <td><?php echo $dados['id']?></td>
                        <td><?php echo $dados['nome']?></td>
                        <td><?php echo $dados['email']?></td>
                        <td><?php echo $dados['mensagem']?></td>
                        <td><?php echo $dados['telefone']?></td>
                        <td><?php echo $dados['data_cadastro']?></td>
                        <td><?php echo $dados['numero_pessoas']?></td>
                        <td><button><a href="editar_reservas.php?idreserva=<?php echo $id?>">Alterar</a></button></td>
                        <td><button><a href="deletar_reservas.php?idreserva=<?php echo $id?>">Excluir</a></button></td>
                    </tr>
                    <?php } ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
  body {
    background-color: #fff;
  }
  
  .centered-form {
    margin-top: 60px;
  }
  
  .centered-form .panel {
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
  }
  </style>

