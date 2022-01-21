<div class="indigo lighten-5 z-depth-4" style="padding: 0 10px 0 10px;">
  <div class="row">
    <div class="card material-table">
      <div class="col s12">
        <div class="table-header">
          <span class="table-title">Ambientes</span>
          <div class="actions">
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
      </div>
      <div class="col s12">
        <table id="datatable" class="mdl-data-table centered" style="width:100%">
          <thead>
            <tr>
                <th>Nome</th>
                <th>Cap. Máxima</th>
                <th>Agendar</th>
                <th>Agendados</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //SQL para selecionar os registros
              foreach($responsavel as $resp){
                $resultaAmbientes = listarPorId($resp->ambiente_id, 'ambiente');
                foreach($resultaAmbientes as $ambiente){
            ?>
            <tr>
              <td><?= $ambiente->nome ?></td>
              <td><?= $ambiente->capacidade ?></td>
              <td>
                <a class="waves-effect waves-light btn blue azul" href="home.php?p=horarioAmbiente&resp=<?= $resp->id?>">
                  <i class="material-icons white-text">alarm</i>
                </a>
              </td>
              <td>
                <a class="waves-effect waves-light btn blue azul modal-trigger" href="home.php?p=horariosAgendados&resp=<?= $resp->id?>">
                  <i class="material-icons white-text">assignment</i>
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
<br>
