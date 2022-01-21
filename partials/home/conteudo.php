<?php 
    if($_GET["p"] == "agendar"){
        include("agendar.php");
    }else if($_GET["p"] == "agendamentos"){
        include("agendamentos.php");
    }else if($_GET["p"] == "ambiente" & $_SESSION["adm"] == 1){
        include("ambientes.php");
    }else if($_GET["p"] == "horario" & count($responsavel) > 0){
        include("horario.php");
    }else if($_GET["p"] == "horarioAmbiente" & count($responsavel) > 0){
        include("horarioAmbiente.php");
    }else if($_GET["p"] == "horariosAgendados" & count($responsavel) > 0){
        include("horariosAgendados.php");
    }else if($_GET["p"] == "usuariosAgendados" & count($responsavel) > 0){
        include("usuariosAgendados.php");
    }else{
        echo "<h2>Página não encontrada</h2>";
    }
?>