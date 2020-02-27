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
               <h2> Editar Usuário </h2>
               <p> <small> Campos marcados com * são obrigatórios </small> </p>
               <form method="POST" action="../function/editausuario_ok.php" class="">
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Nome</label>
                     <div class="col-sm-10">
                        <input type="text" name="nome" value="<?php echo $retorno['nome']; ?>" class="form-control" placeholder="Nome"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Login*</label>
                     <div class="col-sm-10">
                        <input type="text" name="login" value="<?php echo $retorno['login']; ?>"  class="form-control" placeholder="Login" required readonly />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Senha</label>
                     <div class="col-sm-10">
                        <a href="alterasenha.php?id=<?php echo $id; ?>"> Redefinir Senha </a>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Permissão*</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="permissao" required>
                           <option value="<?php echo $retorno['permissao']; ?>" ><?php echo $obj->pegarPermissao($retorno['permissao']); ?> </option> 
                           <option value="1"> Moderador </option>
                           <option value="2"> Administrador </option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Ativo*</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="ativo" required>
                           <option value="<?php echo $retorno['ativo']; ?>" ><?php echo $obj->pegarAtivo($retorno['ativo']); ?> </option> 
                           <option value="0"> Não </option>
                           <option value="1"> Sim </option>
                        </select>
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