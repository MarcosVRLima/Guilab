<div class="indigo lighten-5 z-depth-4" style="padding: 0 10px 0 10px;">
  <div class="row">
    <div class="card material-table">
      <div class="col s12">
        <div class="table-header">
          <span class="table-title">Informações dos horários do <!-- FAZER --></span>
          <div class="actions">
            <a class="waves-effect btn-flat modal-trigger" href="home.php?p=horario"><i class="material-icons">keyboard_backspace</i></a>
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
      </div>
      <div class="col s12">
        <table id="datatable" class="mdl-data-table centered" style="width:100%">
          <thead>
            <tr>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Horario</th>
                <th>Ver</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //SQL para selecionar os registros
              $resultaHorarios = listarPorFK('horarios', 'responsavel_id', $_GET['resp']);
              if ($resultaHorarios != null) {
                foreach($resultaHorarios as $hora){
            ?>
            <tr>
              <td><?= inverteData($hora->dataInicial) ?></td>
              <td><?= inverteData($hora->dataFinal) ?></td>
              <td><?= tiraSegundos($hora->horarioInicial) . '<br>' . (date("H:i", (strtotime($hora->horarioFinal)+60))) ?></td>
              <td>
                <a class="waves-effect waves-light btn blue azul modal-trigger" href="home.php?p=usuariosAgendados&hora=<?= $hora->id?>">
                  <i class="material-icons white-text">assignment</i>
                </a>
              </td>
            </tr>
            <?php
                }
              }else{
            ?>
              <td colspan="4"><?php echo "<h6>Nenhum horário cadastrado</h6>"; ?></td>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>