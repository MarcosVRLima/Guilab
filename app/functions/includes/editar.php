<?php
    $conexao = conectar();
    if(isset($_POST["editaAmbiente"])){
        $id = filter_input(INPUT_POST, 'idAmbiente', FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, 'nomeAmbiente', FILTER_SANITIZE_STRING);
        $capacidade = (int) filter_input(INPUT_POST, 'capacidadeAmbiente', FILTER_SANITIZE_STRING);

        $attributes_ambiente = [
            "nome" => $nome,
            "capacidade" => $capacidade
        ];

        $_SESSION['mensagem'] = ["<h6 class='white-text'>Dados do ambiente alterados com sucesso!</h6>", "green darken-1"];

        $usuarioCadastrado = atualizar($id, "ambiente", $attributes_ambiente);
    } 

    //OLHAR
    if(isset($_POST["editaResponsavel"])) {
        $id = $_POST["idAmbiente"];
        $email = filter_input(INPUT_POST, 'responsavelAmbiente', FILTER_SANITIZE_STRING);
                
        $resultaDadosResponsavel = listarPorEmail($email);
        if(count($resultaDadosResponsavel) > 0){
            $attributes_responsavel = [
                "ambiente_id" => $id,
                "usuario_id" => $resultaDadosResponsavel[0]->{'id'}
            ];

            $resp = listarPorFK('responsavel', 'ambiente_id', $id);
            if(count($resp) > 0){
                foreach($resp as $r){
                    if($r->usuario_id != $resultaDadosResponsavel[0]->{'id'}){
                        $responsavelCadastrado = cadastrar("responsavel", $attributes_responsavel);
                        $_SESSION['mensagem'] = ["<h6 class='white-text'>Responsável cadastrado!<br></h6>", "green darken-1"];
                        break;
                    }else
                        $_SESSION['mensagem'] = ["<h6 class='white-text'>Responsável já está cadastrado!</h6>", "yellow darken-1"];
                }
            }else{
                $responsavelCadastrado = cadastrar("responsavel", $attributes_responsavel);
                $_SESSION['mensagem'] = ["<h6 class='white-text'>Responsável cadastrado!</h6>", "green darken-1"];
            }
        }else{
            $_SESSION['mensagem'] = ["<h6 class='white-text'>Responsável não cadastrado (Email não exite)</h6>!", "yellow darken-1"];
        }
    }
?>