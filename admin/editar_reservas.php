<?php 

include_once ('../includes/conexao.php');
session_start();
echo "Usuario: ". $_SESSION['usuarioNome'];

if($_SESSION['usuarioNome'] == ""){

    header('location: index.php');

    $_SESSION['loginErro'] = "Você não efetou o login!";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Código fonte formulario php"/>
        <meta name="keywords" content="formulario php, bootstrap, bootstrap validator"/>
        <meta name="author" content="Cristiane Faria"/>

        <title>Hora de Trabalhar | Formulário PHP</title>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
        <style>
            main, footer, .mensagem-alerta{
                text-align: center; 
            }
            form{
                max-width: 800px;
                padding-top: 30px;
                display: block;
                margin: 0 auto;
            }
            .mensagem-alerta{
                max-width: 500px;
                margin: 20px auto;
            }
        </style>

    </head>
    <body>
        <p class="text-center text-danger">
            <?php if(isset($_SESSION['loginPermissao'])){
            echo $_SESSION['loginPermissao'];
            unset($_SESSION['loginPermissao']);
            }
            ?>
	    </p>
        <?php
        $id = $_GET['idreserva'];
        $sql = "SELECT * FROM tb_reservas WHERE id = $id";
        $result = $conexao->query($sql);
        $dados = mysqli_fetch_array($result); 
        // echo '<pre>';
        // var_dump($dados);
        // exit;
        ?>

        <main class="container">
        <h1>Edição da reserva</h1>
        <br>
        <form class="form-horizontal" action="atualizar_reservas.php?idreserva=<?php echo $id?>" method="post" role="form" data-toggle="validator" enctype = "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3">Nome*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados['nome']?>" placeholder="Insira o nome">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Email*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $dados['email']?>" placeholder="Insira o email">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Mensagem*:</label>
                <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea" rows="6" id="mensagem" name="mensagem" placeholder="<?php echo $dados['mensagem']?>" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-3">Telefone*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $dados['telefone']?>" placeholder="Insira o telefone">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Data de cadastro*:</label>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" name="data" id="data" value="<?php echo $dados['data_cadastro']?>" placeholder="Insira a data e hora">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Numero de pessoas*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pessoas" id="pessoas" value="<?php echo $dados['numero_pessoas']?>" placeholder="Insira o número de pessoas">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-right">
                    <input class = "btn btn-primary" id="submit" name="btnSend" type="submit" value="ENVIAR">
                    <a name="formulario"></a>
                    <div class="mensagem-alerta"></div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <hr>
        <div class="copyright">Desenvolvido com ❤ por
            <a href="" target="_blank"></a>
        </div>  
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    </body>
</html>