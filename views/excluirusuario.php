<?php 
   include_once('cabecalho.php');
   include_once('../class/usuarios.class.php');

   $id = (int)$_GET['id'];
   $obj = NEW Usuarios;
   $usuario = $obj->retornarunico($id);
?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Excluir Usuário </h2>
            <p> ATENÇÃO! Você deseja excluir o usuário <strong><?php echo $usuario['nome']; ?></strong>? </p>
            <div class="form-group row">
               <label for="login" class="col-sm-2 col-form-label">Ação</label>
               <div class="col-sm-10">
                  <a href="../function/excluirusuario_ok.php?id=<?php echo $usuario['id']; ?>" class="btn btn-danger"> Excluir </a> <a href="listarusuario.php" class="btn btn-warning"> Voltar </a>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>