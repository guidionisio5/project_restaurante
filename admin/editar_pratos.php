<?php
include('../includes/conexao.php');

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
        $id = $_GET['idprato'];
        $sql = "SELECT * FROM tb_pratos WHERE id = $id";
        $res = $conexao->query($sql);
        $dados = mysqli_fetch_array($res); 
        //     echo '<pre>';
        // var_dump($dados['categoria']);
        //     exit;
        ?>

        <main class="container">
        <h1>Edição do prato</h1>
        <br>
        <form class="form-horizontal" action="atualizar_pratos.php?idprato=<?php echo $id?>" method="post" role="form" data-toggle="validator" enctype = "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3">Nome do Prato*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nome" id="nprato" value="<?php echo $dados['nome']?>" placeholder="Nome do prato">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Código*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $dados['codigo']?>" placeholder="Insira o código">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-sm-3">Categoria*:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="categoria" id="categoria">

                            <option value="entrada" <?php if($dados['categoria'] == 'entrada'){echo 'selected';}  ?>>Entrada</option>
                            <option value="prato_principal" <?php if($dados['categoria'] == 'prato-principal'){echo 'selected';}  ?>>Prato principal</option>
                            <option value="sobremesa" <?php if($dados['categoria'] == 'sobremesa'){echo 'selected';} ?>>Sobremesa</option>
|
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Preço*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="preco" id="preco" value="<?php echo $dados['preco']?>" placeholder="Insira o preço">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-3">Descrição*:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="exampleTextarea" rows="6" 
                              id="descricao" name="descricao" placeholder="<?php echo $dados['descricao']?>" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Caloria*:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="calorias" id="calorias" value="<?php echo $dados['calorias']?>" placeholder="Insira a caloria">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Imagem Do Prato*:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="imagem" id="imagem"  placeholder="escolha a imagem">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-sm-3">Destaque*:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="destaque" >
                            <option value="" disabled="disabled">Quer o prato em destaque?</option>
                            <option value="0" <?php if($dados['destaque'] == 0){echo 'selected';}?>>Não</option>
                            <option value="1" <?php if($dados['destaque'] == 1){echo 'selected';}?>>Sim</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
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