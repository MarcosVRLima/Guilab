<?php
  session_start();
	if(isset($_SESSION["email"])){
    header('Location: home.php?p=agendar');
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
    <header>
      <?php 
        include("partials/header.php");
      ?>
    </header>
    <br>

    <section>
      <div class="container">
        <div class="row">
            <div class="container">
            <div class="card">
                <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab"><a class="active" href="#login">Login</a></li>
                        <li class="tab"><a href="#cadastrar">Cadastrar-se</a></li>
                    </ul>
                </div>
                <div class="card-content lighten-5 z-depth-1">
                    <div id="login"><?php include("partials/login/telaLogin.php"); ?></div>
                    <div id="cadastrar"><?php include("partials/login/telaCadastrar.php"); ?></div>
                    <?php echo (isset($mensagem)) ? "<div class='card-panel " . $mensagem[1] . "' id='fecharDiv'><div class='row valign-wrapper'><div class='col s10'>" . $mensagem[0] . "</div><div class='col s2'><button id='fechar' class='btn blue azul btn-small'><i class='material-icons'>close</i></button></div></div></div>" : ""; ?>
                </div>
            </div>
            </div>  
        </div>
    </section>
    <br>
    <footer class="page-footer blue azul">
      <?php 
        include("partials/footer.php");
      ?>
    </footer>
    <?php 
      include("partials/pushpin.php");
    ?>
    <!--JavaScript at end of body for optimized loading-->
    <?php 
      include("partials/scripts.php");
    ?>
  </body>
</html>