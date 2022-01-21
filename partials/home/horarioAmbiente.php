<div class="indigo lighten-5 z-depth-4" style="padding: 10px;">
    <div class="row">
        <form action="" method="POST">
            <div class="col s12"><h6 class="textTitle borderTitle">Adicionar Horário</h6></div>
             
            <div class="col s12">    
                <div class="row">
                    <?php
                    //SQL para selecionar os registros
                    $resultRespHora = listarPorId($_GET['resp'], 'responsavel');
                    foreach ($resultRespHora as $idResp):
                        if($_SESSION['id'] == $idResp->usuario_id){
                            $amb = listarPorId($idResp->ambiente_id, 'ambiente');
                    ?>
                    <input type="text" name="ambiente" id="ambienteId" value="<?= $idResp->id ?> <?= $amb[0]->{'id'} ?>" hidden>
                    <?php         
                        }
                    endforeach; 
                    ?>
                    
                    <div class="input-field col s6">
                        <input type="text" name="horarioInicial" id="idhorarioI" class="timepicker">
                        <label for="idhorarioI">Horário inicial</label>
                    </div>

                    <div class="input-field col s6">
                        <input type="text" name="horarioFinal" id="idhorarioF" class="timepicker">
                        <label for="idhorarioF">Horário final</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="dataInicialId" name="dataInicial" type="text" class="datepicker" required>
                        <label for="dataInicialId">Data</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="dataFinalId" name="dataFinal" type="text" class="datepicker" required>
                        <label for="dataFinalId">Data</label>
                    </div>
                </div>
                <div class="modal-footer center-align">
                    <button class="waves-effect waves-light btn blue azul" onClick="history.go(-1)"><i class="material-icons">keyboard_backspace</i></button>
                    <button class="waves-effect waves-light btn blue azul" type="submit" name="cadastraHorario"><i class="material-icons">save</i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
<?php 
  echo (isset($_SESSION['mensagem'])) ? "<div class='card-panel " . $_SESSION['mensagem'][1] . "' id='fecharDiv'><div class='row valign-wrapper'><div class='col s10'>" . $_SESSION['mensagem'][0] . "</div><div class='col s2'><button id='fechar' class='btn blue azul btn-small'><i class='material-icons'>close</i></button></div></div></div>" : ""; 
  unset($_SESSION['mensagem']);
?>
<br>