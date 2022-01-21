<div class="indigo lighten-5 z-depth-4" style="padding: 10px;">
  <div class="row">
    <div class="col s12">
      <h6 class="textTitle borderTitle"><?=ucfirst($_GET['p'])?></h6>
    </div>
    <div class="col s12 center-align">
      <form action="" method="GET">
        <input type="text" value="agendar" name="p" hidden>
        <div class="input-field col s6">
          <select required name="amb" id="ambId" class="validate">
            <option value="" disabled selected>Escolha</option>
            <?php
              //SQL para selecionar os registros
              $result = listar('ambiente');
              foreach ($result as $ambiente): 
            ?>
            <option value="<?= $ambiente->id ?>"><?= $ambiente->nome ?></option>
            <?php endforeach; ?>
          </select>
          <label for="ambId">Ambientes</label>
        </div>
        <div class="input-field col s4">
          <input id="data" name="data" type="text" class="datepicker" required>
          <label for="data">Data</label>
        </div>
        <div class="input-field col s2">
          <button class="waves-effect waves-light btn blue azul" type="submit" name="buscaHorarios"><i class="material-icons">search</i></button>
        </div>
      </form>
    </div>
    <div class="col s12">
      <div class="card material-table yellow lighten-5">
        <div class="table-header">
          <span class="table-title">
            <?php
              if(isset($_GET['buscaHorarios'])){
                $ramb = listarPorId($_GET['amb'], 'ambiente');
                echo "Busca: " . $ramb[0]->{'nome'} . " em " . $_GET['data'];
              }     
            ?>
          </span>
          <div class="actions">
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <table id="datatable" class="mdl-data-table centered" style="width:100%">
          <thead>
            <tr>
                <th>Horário</th>
                <th>Vagas</th>
                <th>Reservar</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //SQL para selecionar os registros
              if(isset($_GET['buscaHorarios'])) {
                $exibe = true;
                $result3 = listarPorFK('responsavel', 'ambiente_id', $_GET['amb']);
                //echo "<script>alert('" . $_GET['data'] ."')</script>";
                if(strtotime(inverteData($_GET['data'])) >= strtotime(date("Y-m-d"))){
                  foreach($result3 as $resp){
                    $result2 = listarPorDataId($resp->id, inverteData($_GET['data']));
                    foreach($result2 as $hora){
                      $exibe = false;              
            ?>
            <tr>
              <td><?= tiraSegundos($hora->horarioInicial) ?> <br> <?= tiraSegundos(date("H:i:s", (strtotime($hora->horarioFinal)+60))) ?></td>
              <td>
              <?php
                  $result5 = listarPorId($_GET['amb'], 'ambiente');
                  $result4 = listarPorFK('agendamento', 'horarios_id', $hora->id);
                  $vagas = $result5[0]->{'capacidade'};
                  foreach($result4 as $agenda){
                    if($agenda->data == inverteData($_GET['data'])){
                      $vagas--;
                    }
                  }
                  echo $vagas;
              ?>
              </td> 
              <td>
                <a class="waves-effect waves-light btn blue azul modal-trigger" href="#modalAddAgenda<?= $hora->id ?>" <?= $vagas == 0 ? "disabled" : ""?>>
                  <i class="material-icons white-text">check</i>
                </a>
              </td>
            </tr>
            <?php
                    }
                  }  
                }
                if(count($result3) < 1 || $exibe){
                  ?>
                  <tr><td colspan="3"><?php echo (isset($mensagem)) ? $mensagem : "<h6>Nenhum horário disponível nesta data</h6>"; ?></td></tr>
                  <?php
                }
              } else{
            ?>
              </tr><td colspan="3"><?php echo (isset($mensagem)) ? $mensagem : "<h6>Nenhuma busca realizada</h6>"; ?></td></tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <br>
  </div>  
</div>

<?php 
  echo (isset($_SESSION['mensagem'])) ? "<div class='card-panel " . $_SESSION['mensagem'][1] . "' id='fecharDiv'><div class='row valign-wrapper'><div class='col s10'>" . $_SESSION['mensagem'][0] . "</div><div class='col s2'><button id='fechar' class='btn blue azul btn-small'><i class='material-icons'>close</i></button></div></div></div>" : ""; 
  unset($_SESSION['mensagem']);
?>

<!-- Modal Structure -->

<?php
  if(isset($_GET['buscaHorarios'])){
    $result6 = listarPorData(inverteData($_GET['data']));
    foreach($result6 as $hora){
      $result5 = listarPorId($_GET['amb'], 'ambiente');
      $result4 = listarPorFK('agendamento', 'horarios_id', $hora->id);   
      $vagas = $result5[0]->{'capacidade'};
      foreach($result4 as $agenda){
        if($agenda->data == inverteData($_GET['data'])){
          $vagas--;
        }
      }
      if($vagas > 0){
?>
<div id="modalAddAgenda<?= $hora->id ?>" class="modal modal-fixed-footer">
  <form action="" method="POST">
    <div class="modal-content">
      <h4>Confirmar agendamento</h4> <br>
      <input name="horarioId" id="idhorarioId" type="text" value="<?= $hora->id ?>" hidden>
      <input name="usuarioId" id="idusuarioId" type="text" value="<?= $_SESSION['id'] ?>" hidden>
      <input name="data" id="iddata" type="text" value="<?= inverteData($_GET['data']) ?>" hidden>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn blue azul"><i class="material-icons">clear</i></a>
      <button class="waves-effect waves-light btn blue azul" type="submit" name="cadastraAgendamento"><i class="material-icons">save</i></button>
    </div>
  </form>
</div>
<?php
      }
    }
  }
?>