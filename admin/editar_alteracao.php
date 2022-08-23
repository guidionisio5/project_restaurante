<?php
include_once('../includes/conexao.php');
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Código fonte formulario php"/>
        <meta name="keywords" content="formulario php, bootstrap, bootstrap validator"/>
        <title>Alterar Site</title>

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
        <main class="container">
            <h1>Formulário de Alteração</h1>
            <p>Acrescente um email válido para receber o email teste!</p>
            <br>
            <form class="form-horizontal" action="atualizar_alteracao.php" method="post" role="form" data-toggle="" enctype="multipart/form-data">
                <?php
                    $sql = "SELECT * FROM tb_alteracao";

                    $res = $conexao->query($sql);
                    $d = mysqli_fetch_assoc($res);
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-3">Titulo:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="<?php echo $d['titulo']?>" >
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Descrição:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea" rows="6" 
                                  id="descricao" name="descricao" placeholder="<?php echo $d['descricao']?>" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Imagem Do Prato:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="imagem" id="imagem" placeholder="100" required>
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
                <a href="" target="_blank">Bistrô</a>
            </div>  
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    </body>
</html>
