<div class="indigo lighten-5 z-depth-4" style="padding: 0 10px 0 10px;">
  <div class="row">
    <div class="card material-table">
      <div class="col s12">
        <div class="table-header">
          <span class="table-title">Ambientes</span>
          <div class="actions">
            <a class="waves-effect btn-flat modal-trigger" href="#modalAddAmbiente"><i class="material-icons">add</i></a>
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
                <th>Responsáveis</th>
                <th>Opções</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //SQL para selecionar os registros
              $resultaAmbientes = listar('ambiente');
              if ($resultaAmbientes != null) {
                  foreach($resultaAmbientes as $ambiente){
            ?>
            <tr>
              <td><?= $ambiente->nome ?></td>
              <td><?= $ambiente->capacidade ?></td>
              <td>
                <a class="waves-effect waves-light btn blue azul modal-trigger" href="#modalEditRespAmb<?= $ambiente->id?>" style="margin:2px;">
                  <i class="material-icons white-text">assignment_ind</i>
                </a>
              </td>
              <td>
                <a class="waves-effect waves-light btn blue azul modal-trigger" href="#modalEditAmb<?= $ambiente->id?>" style="margin:2px;">
                  <i class="material-icons white-text">edit</i>
                </a>
                <a class="waves-effect waves-light btn blue azul modal-trigger" href="#modalDeleteAmb<?= $ambiente->id?>" style="margin:2px;">
                  <i class="material-icons white-text">delete</i>
                </a>
              </td>
            </tr>
            <?php
                  }
              }else{
            ?>
            <td colspan="4"><?php echo "<h6>Nenhum ambiente cadastrado</h6>"; ?></td>
            <?php
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

<!-- Modal Structure -->
<div id="modalAddAmbiente" class="modal modal-fixed-footer">
  <form action="" method="POST">
    <div class="modal-content">
      <h4>Informações do ambiente</h4>
      <div class="row">
        <div class="input-field col s12">
          <input name="nomeAmbiente" id="nomeAmbienteId" type="text" class="validate" required>
          <label for="nomeAmbienteId">Nome do ambiente</label>
        </div>
        <div class="input-field col s12">
          <input name="capacidadeAmbiente" id="capacidadeAmbienteId" type="number" class="validate" min="0" max="50" required>
          <label for="capacidadeAmbienteId">Capacidade Máxima</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn blue azul"><i class="material-icons">clear</i></a>
      <button class="waves-effect waves-light btn blue azul" type="submit" name="cadastraAmbiente"><i class="material-icons">save</i></button>
    </div>
  </form>
</div>

<?php 
    foreach($resultaAmbientes as $ambiente){
?>
<div id="modalEditAmb<?= $ambiente->id?>" class="modal modal-fixed-footer">
    <form action="" method="POST">
    <input name="idAmbiente" type="text" value="<?= $ambiente->id?>" hidden>
    <div class="modal-content">
      <h4>Informações do ambiente</h4>
      <div class="row">
        <div class="input-field col s12">
            <input name="nomeAmbiente" id="nomeAmbienteId" type="text" class="validate" required value="<?= $ambiente->nome?>">
            <label for="nomeAmbienteId">Nome do ambiente</label>
        </div>
        <div class="input-field col s12">
            <input name="capacidadeAmbiente" id="capacidadeAmbienteId" type="number" class="validate" min="0" max="50" required value="<?= $ambiente->capacidade?>">
            <label for="capacidadeAmbienteId">Capacidade Máxima</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn blue azul"><i class="material-icons">clear</i></a>
      <button class="waves-effect waves-light btn blue azul" type="submit" name="editaAmbiente"><i class="material-icons">save</i></button>
    </div>
    </form>
</div>

<!-- Modal Structure Add Responsavel-->
<div id="modalEditRespAmb<?= $ambiente->id?>" class="modal modal-fixed-footer">
  <form action="" method="POST">
    <input name="idAmbiente" type="text" value="<?= $ambiente->id?>" hidden>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <h4>Informações do Responsável</h4>
        </div>
        <div class="input-field col s12">
          <input name="responsavelAmbiente" id="responsavelAmbienteId" type="email" class="validate">
          <label for="responsavelAmbienteId">Adicionar responsável (E-mail)</label>
        </div>
        <div class="col s12">
          <h6><strong>Responsáveis</strong></h6>
          <table class="centered indigo lighten-5" id="tabelaList">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //SQL para selecionar os registros
                $resultaResponsaveis = listarPorFK('responsavel', 'ambiente_id', $ambiente->id);
                if ($resultaResponsaveis != null) {
                    foreach($resultaResponsaveis as $responsavel){
                      $resultaDadosResponsavel = listarPorId($responsavel->usuario_id, 'usuario');
              ?>
              <tr>
                <td><?= $resultaDadosResponsavel[0]->{'nome'} ?></td>
                <td><?= $resultaDadosResponsavel[0]->{'email'} ?></td>
                <td>
                  <a class="waves-effect waves-light btn blue azul" href="home.php?p=ambiente&delResponsavel=<?= $responsavel->id ?>">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
              <?php
                    }
                }else{
              ?>
              <td colspan="3"><?php echo "<h6>Nenhum responsável cadastrado</h6>"; ?></td>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn blue azul"><i class="material-icons">clear</i></a>
      <button class="waves-effect waves-light btn blue azul" type="submit" name="editaResponsavel"><i class="material-icons">save</i></button>
    </div>
  </form>
</div>

<!-- Modal Structure Delete-->
<div id="modalDeleteAmb<?= $ambiente->id?>" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h3>Apagar ambiente</h3><br>
        <h5>Tem certeza que deseja apagar o ambiente?</h5> <br> 
        <h5 class="red-text">(Apagará todas as informações!)</h5>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn blue azul"><i class="material-icons">clear</i></a>
        <a class="waves-effect waves-light btn amarelo yellow" href="home.php?p=ambiente&delAmbiente=<?= $ambiente->id ?>">
            <i class="material-icons">check</i>
        </a>
    </div>
</div>
<?php }?>


