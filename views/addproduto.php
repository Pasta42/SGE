<?php include_once('cabecalho.php'); ?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Cadastrar Produto </h2>
            <p> <small> Campos marcados com * são obrigatórios </small> </p>
            <form method="POST" action="../function/addproduto_ok.php" class="" enctype="multipart/form-data">
               <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Nome *</label>
                <div class="col-sm-10">
                  <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="70" required />
                </div>
               </div>
               <div class="form-group row">
                  <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                  <div class="col-sm-6">
                     <input type="file" class="form-control" id="form-control-file" name="fileUpload"/>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="codigo" class="col-sm-2 col-form-label">Código</label>
                  <div class="col-sm-10">
                     <input type="text" name="codigo" class="form-control" placeholder="Código" maxlength="40" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="referencia" class="col-sm-2 col-form-label">Referência</label>
                  <div class="col-sm-10">
                     <input type="text" name="referencia" class="form-control" placeholder="Referência" maxlength="40" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Descrição</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" name="descricao" maxlength="250" rows="7"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Fornecedor</label>
                  <div class="col-sm-10">
                     <select name="id_fornecedor" class="form-control">
                        <?php
                           include_once("../class/fornecedores.class.php");
                           $obj = NEW Fornecedor;
                           $consulta = $obj->Listar();
                           foreach($consulta as $fornecedor){
                              echo "<option value='{$fornecedor->id}'>{$fornecedor->nome}</option>";
                           }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Valor Custo</label>
                  <div class="col-sm-10">
                     <input type="text" name="valcusto" class="form-control money3" placeholder="Custo" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Valor Venda</label>
                  <div class="col-sm-10">
                     <input type="text" name="valvenda" class="form-control money3" placeholder="Venda" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Ação</label>
                  <div class="col-sm-10">
                     <button class="btn btn-warning" name="add"> Adicionar </button> <a href="listarproduto.php" class="btn btn-warning"> Voltar </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>