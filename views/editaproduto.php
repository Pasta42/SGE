<?php 
   include_once('cabecalho.php');
   include_once("../class/produtos.class.php");
   $obj = NEW Produtos;
   $id = (int)$_GET['id'];
   $retorno = $obj->retornarunico($id);
   if($retorno != ''){
?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Cadastrar Produto </h2>
            <p> <small> Campos marcados com * são obrigatórios </small> </p>
            <form method="POST" action="../function/editaproduto_ok.php" class="" enctype="multipart/form-data">
               <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Nome *</label>
                <div class="col-sm-10">
                  <input type="text" name="nome" class="form-control" value="<?php echo $retorno['nome']; ?>" placeholder="Nome" required />
                </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Imagem</label>
                  <div class="col-sm-6">
                  <?php
                     if($retorno['imagem'] == "" OR $retorno['imagem'] == "sem-img.jpg"){
                     ?>
                        <input type="file" class="form-control" id="form-control-file" name="fileUpload"/>
                     <?php
                        }else{
                     ?>
                        <img src="../img/produtos/<?php echo $retorno['imagem'];?>" class="img_fluid" style="width: 320px; height: auto;"/>
                        <input type="hidden" value="<?php echo $retorno['imagem'];?>" name="imagem" />
                        <p><a href="removerimagem.php?id=<?php echo $id;?>">Remover Imagem</a></p>
                     <?php
                        }
                     ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="codigo" class="col-sm-2 col-form-label">Código</label>
                  <div class="col-sm-10">
                     <input type="text" name="codigo" class="form-control" value="<?php echo $retorno['codigo']; ?>" placeholder="Código" maxlength="40" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="referencia" class="col-sm-2 col-form-label">Referência</label>
                  <div class="col-sm-10">
                     <input type="text" name="referencia" class="form-control" value="<?php echo $retorno['referencia']; ?>" placeholder="Referência" maxlength="40" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Descrição</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" name="descricao" maxlength="250" rows="7"><?php echo $retorno['descricao']; ?></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Fornecedor</label>
                  <div class="col-sm-10">
                     <select name="id_fornecedor" class="form-control">
                        <?php
                           include_once("../class/fornecedores.class.php");
                           $obj = NEW Fornecedor;
                           $fornecedorAtual = $obj->retornarunico($retorno['id_fornecedor']);
                        ?>
                           <option value="<?php echo $fornecedorAtual['id']; ?>" selected> <?php echo $fornecedorAtual['nome']; ?> </option>
                        <?php
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
                     <input type="text" name="valcusto" value="<?php echo $retorno['valcusto']; ?>" class="form-control money3" placeholder="Custo" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Valor Venda</label>
                  <div class="col-sm-10">
                     <input type="text" name="valvenda" value="<?php echo $retorno['valvenda']; ?>" class="form-control money3" placeholder="Venda" />
                  </div>
               </div>
               <div class="form-group row">
                  <label for="login" class="col-sm-2 col-form-label">Ação</label>
                  <div class="col-sm-10">
                     <input type="hidden" name="id" value="<?php echo $retorno['id']; ?>" />
                     <button class="btn btn-warning" name="add"> Editar </button> <a href="listarproduto.php" class="btn btn-warning"> Voltar </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

<?php 
   }
   include_once('rodape.php'); 
?>