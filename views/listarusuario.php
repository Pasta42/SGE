<?php include_once('cabecalho.php'); ?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Lista de Usuários </h2>
         </div>
         <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <a href="addusuario.php" class="btn btn-warning btn-block"><i class="far fa-plus-square"></i> Cadastrar Usuário </a>
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
                     <th>Nome</th>
                     <th>Login</th>
                     <th>Permissão</th>
                     <th colspan='2'>Ações</th>
                  </thead>
                  <tbody> 
                     <?php include_once('../function/listarusuario.php'); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>