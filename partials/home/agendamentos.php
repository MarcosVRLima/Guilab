<div class="indigo lighten-5 z-depth-4" style="padding: 0 10px 0 10px;">
  <div class="row">
    <div class="card material-table">
      <div class="col s12">
        <div class="table-header">
          <span class="table-title">Agendamentos</span>
          <div class="actions">
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
      </div>
      <div class="col s12">
        <table id="datatable" class="mdl-data-table centered" style="width:100%">
          <thead>
            <tr>
                <th>Ambiente</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Responsável</th>
                <th>Opções</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //SQL para selecionar os registros
              $resultaAgenda = listarPorFK('agendamento', 'usuario_id', $_SESSION['id']);
              foreach($resultaAgenda as $agenda){
                if(strtotime($agenda->data) >= strtotime(date("Y-m-d"))){
                  $resultaHorario = listarPorId($agenda->horarios_id, 'horarios');
                  $resultaResp = listarPorId($resultaHorario[0]->{'responsavel_id'}, 'responsavel');
                  $resultaAmb = listarPorId($resultaResp[0]->{'ambiente_id'}, 'ambiente');
                  $resultaInfoResp = listarPorId($resultaResp[0]->{'usuario_id'}, 'usuario');
            ?>
            <tr>
              <td>
                <?= $resultaAmb[0]->{'nome'} ?>
              </td>
              <td>
                <?= inverteData($agenda->data) ?>
              </td>
              <td>
                <?= tiraSegundos($resultaHorario[0]->{'horarioInicial'}) . "<br>" . date("H:i", (strtotime($resultaHorario[0]->{'horarioFinal'})+60))?>
              </td>
              <td style="word-wrap: break-word;">
                <?= $resultaInfoResp[0]->{'email'} ?>
              </td>
              <td>
                <a class="waves-effect waves-light btn blue azul" href="">
                    <i class="material-icons white-text">delete</i>
                </a>
              </td>
            </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php 
  echo (isset($_SESSION['mensagem'])) ? "<div class='card-panel " . $_SESSION['mensagem'][1] . "' id='fecharDiv'><div class='row valign-wrapper'><div class='col s10'>" . $_SESSION['mensagem'][0] . "</div><div class='col s2'><button id='fechar' class='btn blue azul btn-small'><i class='material-icons'>close</i></button></div></div></div>" : ""; 
  unset($_SESSION['mensagem']);
?>