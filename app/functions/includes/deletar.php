<?php
    $conexao = conectar();

    if (isset($_GET["delResponsavel"])) {
        $id = $_GET["delResponsavel"];
        
        $deletarResponsavel = deletar("id", $id, "responsavel");
        $_SESSION['mensagem'] = ["<h6 class='white-text'>Responsável retirado do ambiente selecionado!</h6>", "green darken-1"];
        header("Location: home.php?p=ambiente");
    }
    if (isset($_GET["delAmbiente"])) {
        $id = $_GET["delAmbiente"];
        
        $resp = listarPorFK('responsavel', 'ambiente_id', $id);
        foreach($resp as $r){
            $deletarResponsavel = deletar("id", $r->id, "responsavel");
        }
        $deletarAmbiente = deletar("id", $id, "ambiente");
        $_SESSION['mensagem'] = ["<h6 class='white-text'>Ambiente excluído com sucesso!</h6>", "green darken-1"];
        header("Refresh:2, home.php?p=ambiente");
    }
    
?>