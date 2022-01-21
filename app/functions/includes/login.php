<?php
    $conexao = conectar();

    if (isset($_POST['logar'])) {
        $email = trim(strip_tags($_POST['email']));
        $senha = trim(strip_tags($_POST['senha']));;

        $resultaDadosUsuario = listarPorEmail($email);
        if(count($resultaDadosUsuario) > 0){
            foreach($resultaDadosUsuario as $usuario){
                if(password_verify($senha, $usuario->senha)){
                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['email'] = $email;
                    $_SESSION['nome'] = $usuario->nome;
                    $_SESSION['matricula'] = $usuario->matricula;
                    $_SESSION['adm'] = $usuario->admin;
                    
                    $mensagem = ["<h6 class='white-text'>Bem Vindo, " . $usuario->nome . "!</h6>", "green darken-1"];
                    header("Refresh: 1, home.php?p=agendar");
                }else{
                    $mensagem = ["<h6 class='white-text'>Senha errada!</h6>", "yellow darken-1"];
                }
            }
        }else{
            $mensagem = ["<h6 class='white-text'>Email errado!</h6>", "yellow darken-1"];
        }
    }
    
    //Função sair
    if (isset($_GET["sair"])) {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['nome']);
        unset($_SESSION['matricula']);
        unset($_SESSION['adm']);
        header("Location: login.php");
    }
?>