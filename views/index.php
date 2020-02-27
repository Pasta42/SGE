<?php include_once('cabecalho.php'); ?>
   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <!--
         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-warning" role="alert">
               Um simples alerta danger com <a href="#" class="alert-link">um link de exemplo</a>. Clique nele, se quiser.
            </div>
         </div>
         -->
         <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                     <h5 class="card-title"><i class="fas fa-boxes fa-5x"></i></h5>
                     <p class="card-text">Cadastre, edite e apague produtos.</p>
                     <a href="listarproduto.php" class="btn btn-block btn-warning">Visitar</a>
                </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card text-center" >
                <div class="card-body">
                     <h5 class="card-title"><i class="fas fa-truck-loading fa-5x"></i></h5>
                     <p class="card-text">Cadastre, edite e apague fornecedores.</p>
                     <a href="listarfornecedor.php" class="btn btn-block btn-warning">Visitar</a>
                </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                     <h5 class="card-title"><i class="fas fa-users-cog fa-5x"></i></h5>
                     <p class="card-text">Cadastre, edite e apague usuários.</p>
                     <a href="listarusuario.php" class="btn btn-block btn-warning">Visitar</a>
                </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                     <h5 class="card-title"><i class="fas fa-chart-bar fa-5x"></i></h5>
                     <p class="card-text">Veja relatórios de venda e estoque.</p>
                     <a href="verrelatorios.php" class="btn btn-block btn-warning">Visitar</a>
                </div>
            </div>
         </div>
      </div>
   </div>
<?php include_once('rodape.php'); ?>