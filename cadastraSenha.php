<?php 
  session_start();
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
                        <li class="tab"><a class="active" href="cadSenha">Cadastrar a senha</a></li>
                    </ul>
                </div>
                <div class="card-content lighten-5 z-depth-1">
                    <div id="cadSenha"><?php include("partials/cadastraSenha/telaCadSenha.php"); ?></div>
                    <div class='card-panel yellow amarelo' id='fecharDiv'>
                        <div class='row'>
                            <div class='col s10 valign-wrapper'>
                              <?php
                                if(isset($_SESSION['mensagem']))
                                  echo $_SESSION['mensagem'];
                                else{ 
                                  echo "<h6>Senha já cadastrada</h6>";
                                  header("Refresh: 3, login.php"); 
                                }
                              ?>
                             </div>
                            <div class='col s2'><button id='fechar' class='btn blue azul btn-small'><i class='material-icons'>close</i></button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>  
        </div>
    </section>
    <br>
    <footer class="page-footer blue azul">
      <?php
        unset($_SESSION['mensagem']); 
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