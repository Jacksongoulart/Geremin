<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Geremin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse collapse" id="main-bar">
      <ul class="nav navbar-nav">
        <li class="home-menu active"><a href="#">Home</a></li>
        <li class="contact-menu"><a href="#contato">Contato</a></li>
        <li class="about-menu"><a href="#sobre">Sobre</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="loginForm"></div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="modal1"></div>

<div class="modal" id="perfil" tabindex="-1">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Perfil</h4>
        </div>
        <div class="modal-body">
          <form>
            <input type="text" placeholder="Nome completo" class="form-control" /><br>
            <input type="text" placeholder="Email" class="form-control" /><br>
            <input type="password" placeholder="Senha" class="form-control" /><br>
            <input type="password" placeholder="Confirme a senha" class="form-control" /><br>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Fechar</a>
          <a href="#" class="btn btn-primary">Salvar alterações</a>
        </div>
      </div>
    </div>
</div>
