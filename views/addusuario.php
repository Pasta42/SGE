<?php include_once('cabecalho.php'); ?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Cadastrar Usuário </h2>
            <p> <small> Campos marcados com * são obrigatórios </small> </p>
            <form method="POST" action="../function/addusuario_ok.php" class="">
               <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                  <input type="text" name="nome" class="form-control" placeholder="Nome"/>
                </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Login*</label>
                  <div class="col-sm-10">
                     <input type="text" name="login" class="form-control" placeholder="Login" required/>
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
                <label for="login" class="col-sm-2 col-form-label">Permissão*</label>
                <div class="col-sm-10">
                  <select class="form-control" name="permissao" required>
                     <option value="1"> Moderador </option>
                     <option value="2"> Administrador </option>
                  </select>
                </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Ativo*</label>
                  <div class="col-sm-10">
                     <select class="form-control" name="ativo" required>
                        <option value="0"> Não </option>
                        <option value="1"> Sim </option>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Ação</label>
                  <div class="col-sm-10">
                     <button class="btn btn-warning" name="add"> Adicionar </button> <a href="listarusuario.php" class="btn btn-warning"> Voltar </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>