<?php
  session_start();
	if(!isset($_SESSION["email"])){
        header('Location: login.php');
  }
  require 'config.php'; 
?>
<!DOCTYPE html>
<html>
  <head>
    <?php 
      include("partials/links.php");
    ?>
  </head>

  <body>
    <!-- header -->
    <div class="navbar blue azul">
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo center"><img src="assets/img/logo.png" alt="" class="responsive-img" width="130px"></a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
    </div>

    <ul class="sidenav" id="mobile-demo">
      <li>
        <a href="home.php?p=agendar" class="waves-effect waves-light blue-text text-azul hoverable">
          <i class="material-icons left yellow-text text-amarelo">assignment</i>Agendar
        </a>
      </li>
      <li>
        <a href="home.php?p=agendamentos" class="waves-effect waves-light blue-text text-azul hoverable">
          <i class="material-icons left yellow-text text-amarelo">assignment_turned_in</i>Meus agendamentos
        </a>
      </li>
      <?php
        if($_SESSION['adm'] == 1){
      ?>  
      <li>
        <a href="home.php?p=ambiente" class="waves-effect waves-light blue-text text-azul hoverable">
          <i class="material-icons left yellow-text text-amarelo">room_preferences</i>Ambientes
        </a>
      </li>
      <?php
        }
      ?>
      <?php
        $r = false;
        $responsavel = listarPorFK('responsavel', 'usuario_id', $_SESSION['id']);
        if(count($responsavel) > 0){
      ?>  
      <li>
        <a href="home.php?p=horario" class="waves-effect waves-light blue-text text-azul hoverable">
          <i class="material-icons left yellow-text text-amarelo">schedule</i>Horarios
        </a>
      </li>
      <?php
        }
      ?>
      <li>
        <a href="home.php?sair=true" class="waves-effect waves-light blue-text text-azul hoverable">
          <i class="material-icons left yellow-text text-amarelo">keyboard_backspace</i>Sair
        </a>
      </li>
    </ul>
    <!-- fim header -->
    <!-- Page Layout here -->
    <div>
    <div class="row">

      <div class="col s12 m12 l3 hide-on-med-and-down" style="border-style: none solid none none;border-width: 1px;border-color: grey;height:600px;">
          <div class="container left-align">
            <ul>
              <li>
                <a href="home.php?p=agendar" class="waves-effect waves-light blue-text text-azul hoverable <?= $_GET['p'] == 'agendar' ? "z-depth-2" : ""?> ">
                  <i class="material-icons left yellow-text text-amarelo">assignment</i>Agendar
                </a>
              </li>
              <li>
                <a href="home.php?p=agendamentos" class="waves-effect waves-light blue-text text-azul hoverable <?= $_GET['p'] == 'agendamentos' ? "z-depth-2" : ""?> ">
                  <i class="material-icons left yellow-text text-amarelo">assignment_turned_in</i>Meus agendamentos
                </a>
              </li>
              <?php
                if($_SESSION['adm'] == 1){
              ?>  
              <li>
                <a href="home.php?p=ambiente" class="waves-effect waves-light blue-text text-azul hoverable <?= $_GET['p'] == 'ambiente' ? "z-depth-2" : ""?> ">
                  <i class="material-icons left yellow-text text-amarelo">room_preferences</i>Ambientes
                </a>
              </li>
              <?php
                }
              ?>
              <?php
                $r = false;
                $responsavel = listarPorFK('responsavel', 'usuario_id', $_SESSION['id']);
                if(count($responsavel) > 0){
              ?>  
              <li>
                <a href="home.php?p=horario" class="waves-effect waves-light blue-text text-azul hoverable <?= $_GET['p'] == 'horario' ? "z-depth-2" : ""?> ">
                  <i class="material-icons left yellow-text text-amarelo">schedule</i>Horarios
                </a>
              </li>
              <?php
                }
              ?>
              <li>
                <a href="home.php?sair=true" class="waves-effect waves-light blue-text text-azul hoverable">
                  <i class="material-icons left yellow-text text-amarelo">keyboard_backspace</i>Sair
                </a>
              </li>
            </ul>
          </div>
      </div>
      <br>
      <div class="col s12 m12 l9">
        <div class="container">
          <nav>
            <div class="nav-wrapper light-blue darken-3">
              <div class="col s12">
                <a href="#!" class="breadcrumb">Inicio</a>
                <a href="home.php?p=agendar" class="breadcrumb"><?= ucfirst($_GET['p']) ?></a>
              </div>
            </div>
          </nav>
          <br>
          <?php if(isset($_GET['p'])){ require 'partials/home/conteudo.php';}?>
        </div>
      </div>
    </div>
    </div>
    <footer class="page-footer blue azul">
      <?php 
        include("partials/footer.php");
      ?>
    </footer>
    <!--JavaScript at end of body for optimized loading-->
    <?php 
      include("partials/scripts.php");
    ?>
  </body>
</html>