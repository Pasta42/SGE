<?php include_once('cabecalho.php'); ?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-3 col-lg-4">
            <h2> Lista de Produtos </h2>
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-5">
            <form method="POST" action="buscaproduto.php">
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Buscar</label>
                  <div class="col-sm-8 col-md-7">
                     <input type="text" class="form-control" name="buscar" placeholder="Buscar Produto">
                  </div>
                  <div class="col-sm-2 col-md-3 ">
                     <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-search"></i></a>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <a href="addproduto.php" class="btn btn-warning btn-block"><i class="far fa-plus-square"></i> Cadastrar Produtos </a>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <?php
               if(isset($_GET['msg']) AND $_GET['msg']){
                  include_once('../function/avisos_ok.php');
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
         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class='table-responsive'>
               <table class='table table-bordered'>
                  <thead class='bg-dark text-light'>
                     <th>Imagem</th>
                     <th>Nome e Descrição</th>
                     <th style="min-width: 10%;">Qtd.</th>
                     <th style="min-width: 10%;">Val. Custo</th>
                     <th style="min-width: 10%;">Val. Venda</th>
                     <th colspan='3'>Ações</th>
                  </thead>
                  <tbody> 
                     <?php include_once('../function/listarproduto.php'); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>