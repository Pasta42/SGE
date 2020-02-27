<?php include_once('cabecalho.php'); ?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Cadastrar Fornecedor </h2>
            <p> <small> Campos marcados com * são obrigatórios </small> </p>
            <form method="POST" action="../function/addfornecedor_ok.php" class="">
               <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Nome*</label>
                <div class="col-sm-10">
                  <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="70"  required />
                </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">CNPJ</label>
                  <div class="col-sm-10">
                     <input type="text" name="cnpj" class="form-control cnpj" placeholder="CNPJ" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Telefone</label>
                  <div class="col-sm-10">
                     <input type="text" name="telefone" class="form-control phone" placeholder="Telefone" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">E-Mail</label>
                  <div class="col-sm-10">
                     <input type="text" name="email" class="form-control" maxlength="70" placeholder="E-Mail" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Ação</label>
                  <div class="col-sm-10">
                     <button class="btn btn-warning" name="add"> Adicionar </button> <a href="listarfornecedor.php" class="btn btn-warning"> Voltar </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>