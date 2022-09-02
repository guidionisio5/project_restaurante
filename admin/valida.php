<?php
    session_start();
    
    include_once("../includes/conexao.php");
 
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
         
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

        $result_usuario = "SELECT * FROM tb_usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result_usuario = mysqli_query($conexao, $result_usuario);
        $resultado = mysqli_fetch_assoc($result_usuario);

        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                header("Location: administrativo.php");
            }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                header("Location: colaborador.php");
            }else{
                header("Location: cliente.php");
            }
        }else{
            $_SESSION['loginErro'] = "Usuário ou senha inválido!";
            header("Location: index.php");
        }
    }else{
            $_SESSION['loginErro'] = "Usuário ou senha inválido!";
            header("Location: index.php");
    }
?>