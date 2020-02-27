<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="robots" content="noindex">
    <title>SiGE - Sistema de Gerenciamento de Estoque</title>
  </head>
  <body class="fundo-img">
    <main style="margin-top: 3%;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
          <div class="col-12 col-sm-12 col-md-8 col-lg-8 fundo-branco">
            <img src="img/logo_sge.png" class="img-fluid"/>
            <h1>Seja Bem-Vindo</h1>
            <p> Digite seu login e senha para entrar no sistema </p>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <?php
                if(isset($_GET['msg']) AND $_GET['msg']){
                    include_once('function/avisos_ok.php');
                    $msg = (int)$_GET['msg'];
              ?>
                    <div class="alert alert-warning" role="alert">
                      <?php echo pegarMensagem($msg); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
              <?php
                }
              ?>
            </div>
            <form method="POST" action="function/validacao_ok.php?page=val">
              <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Login</label>
                <div class="col-sm-10">
                  <input type="text" name="login" class="form-control" placeholder="Login"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="senha" placeholder="Senha" />
                </div>
              </div>
              <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-warning" name=""> Entrar </button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar fixed-bottom navbar-light bg-light">
              <a class="navbar-brand" href="http://www.pasta42.com.br">Desenvolvido por Pasta 42</a>
            </nav>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>