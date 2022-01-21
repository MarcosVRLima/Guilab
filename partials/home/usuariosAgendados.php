<div class="indigo lighten-5 z-depth-4" style="padding: 10px;">
  <div class="row">
    <div class="col s12">
      <h6 class="textTitle borderTitle">Usuários agendados</h6>
    </div>
    <div class="col s12 center-align">
      <form action="" method="GET">
        <input type="text" value="usuariosAgendados" name="p" hidden>
        <input type="text" value="<?= $_GET['hora'] ?>" name="hora" hidden>
        <div class="input-field col s2">
          <button class="waves-effect waves-light btn blue azul" onClick="history.go(-1)"><i class="material-icons">keyboard_backspace</i></a>
        </div>
        <div class="col s4">
          <br>Selecione uma data entre: <br>
          <strong>
          <?php 
            $resultaHora = listarPorId($_GET['hora'], 'horarios');
            echo inverteData($resultaHora[0]->{'dataInicial'}) . " - " . inverteData($resultaHora[0]->{'dataFinal'});
          ?> 
          </strong>
        </div>
        <div class="input-field col s4">
          <input id="data" name="data" type="text" class="datepickerAgendado" required>
          <label for="data">Data</label>
        </div>
        <div class="input-field col s2">
          <button class="waves-effect waves-light btn blue azul" type="submit" name="buscaAgendados"><i class="material-icons">search</i></button>
        </div>
      </form>
    </div>
    <div class="col s12">
      <div class="card material-table yellow lighten-5">
        <div class="table-header">
          <span class="table-title">Usuarios agendados em: <?= isset($_GET['buscaAgendados']) ? $_GET['data'] : ""?></span>
          <div class="actions">
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <table id="datatable" class="mdl-data-table centered" style="width:100%">
          <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Email</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //SQL para selecionar os registros
              if(isset($_GET['buscaAgendados'])) {
                $resultaAgendados = listarPorDataAgendado(inverteData($_GET['data']), $_GET['hora']);
                if(count($resultaAgendados) == 0)
                  echo "<td colspan='3'><strong>Nenhum usuário agendado para esta data e horário</strong></td>";
                foreach($resultaAgendados as $agenda){
                  $resultaUsuarios = listarPorId($agenda->usuario_id, 'usuario');
            ?>
            <tr>
              <td><?= $resultaUsuarios[0]->{'nome'} ?></td>
              <td><?= $resultaUsuarios[0]->{'matricula'} ?></td> 
              <td><?= $resultaUsuarios[0]->{'email'} ?></td> 
            </tr>
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