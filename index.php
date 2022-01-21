<?php require 'config.php'; ?>
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
      <div class="container blue-grey lighten-5 z-depth-4">
        <div class="row">
          <div class="col s12">
            <div class="carousel carousel-slider center contentCarousel z-depth-2">
              <div class="carousel-item white-text" href="#one!" id="imageCarousel1">
                <div class="container captionCarousel hoverable">
                  <h2>First Panel</h2>
                  <p class="white-text">
                    This is your first panel
                  </p>
                </div>
              </div>
              <div class="carousel-item white-text" href="#two!" id="imageCarousel2">
                <div class="container captionCarousel hoverable">
                  <h2>Second Panel</h2>
                  <p class="white-text">This is your second panel</p>
                </div>
              </div>
              <div class="carousel-item white-text" href="#three!" id="imageCarousel3">
                <div class="container captionCarousel hoverable">
                  <h2>Third Panel</h2>
                  <p class="white-text">This is your third panel</p>
                </div>
              </div>
              <div class="carousel-item white-text" href="#four!" id="imageCarousel4">
                <div class="container captionCarousel hoverable">
                  <h2>UFC - Informa</h2>
                  <p class="white-text">Mediante a pandemia causada pelo COVID-19, os laboratórios de informática do campus de Sobral permanecerão fechados até uma ordem superior. Ate lá, a UFC recomenda que os alunos tomem as devidas proteções definidas pelo Ministério da Saúde.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>
    <section>
      <div class="container z-depth-4">
        <div class="row">
          <div class="col s12 m6 l4">
            <div class="card z-depth-3">
              <div class="card-image hoverable">
                <img src="assets/img/perfil1.jpg">
                <span class="card-title">Laboratório de programação</span>
                <a class="btn-floating halfway-fab waves-effect waves-light blue azul2"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p>Laboratório destinado aos cursos de engenharia para fins práticos na área de programação computacional.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m6 l4">
            <div class="card z-depth-3">
              <div class="card-image hoverable">
                <img src="assets/img/perfil2.jpg">
                <span class="card-title">Laboratório de Simulações Numéricas</span>
                <a class="btn-floating halfway-fab waves-effect waves-light blue azul2"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p>Laboratório equipado com computadores e impressora, usado pelos cursos de engenharia para desenvolvimento de cálculos computacionais e simulações numéricas.</p>
              </div>
            </div>
          </div>
          <div class="col s12 m6 l4">
            <div class="card z-depth-3">
              <div class="card-image hoverable">
                <img src="assets/img/perfil3.jpg">
                <span class="card-title">Laboratório de Informática</span>
                <a class="btn-floating halfway-fab waves-effect waves-light blue azul2"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p>Laboratório equipado com computadores de uso livre. Tem por finalidade atender a demanda acadêmica de todos os alunos do campus.</p>
              </div>
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