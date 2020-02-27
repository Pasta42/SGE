<?php include_once('cabecalho.php'); ?>
<?php 
   include_once('../class/usuarios.class.php');
   $id = (int) $_GET['id'];
   $obj = New Usuarios;
   $retorno = $obj->retornarunico($id);
   if($retorno != ''){
?>

      <div class="container fundo-branco" style="margin-top: 30px;">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">
               <h2> Alterar Senha </h2>
               <p> <small> Campos marcados com * são obrigatórios </small> </p>
               <form method="POST" action="../function/alterasenha_ok.php" class="">
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Nome</label>
                     <div class="col-sm-10">
                        <input type="text" name="nome" value="<?php echo $retorno['nome']; ?>" class="form-control" placeholder="Nome" readonly/>
                     </div>
                  </div>   
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Senha*</label>
                     <div class="col-sm-5">
                        <input type="password" name="senha1" class="form-control" placeholder="Senha" required/>
                     </div>
                     <div class="col-sm-5">
                        <input type="password" name="senha2" class="form-control" placeholder="Repetir" required/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Ação</label>
                     <div class="col-sm-10">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <button class="btn btn-warning" name="edit"> Editar </button> <a href="listarusuario.php" class="btn btn-warning"> Voltar </a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
<?php
      }
?>
<?php include_once('rodape.php'); ?>