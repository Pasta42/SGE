<?php include_once('cabecalho.php'); ?>
<?php
   include_once("../class/produtos.class.php");
   $obj = NEW Produtos;
   $id = (int)$_GET['id'];
   $retorno = $obj->retornarunico($id);
   if($retorno != ''){
?>
      <div class="container fundo-branco" style="margin-top: 30px;">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">
               <h2> Cadastrar Movimentação </h2>
               <p> <small> Campos marcados com * são obrigatórios </small> </p>
               <form method="POST" action="../function/addmovimento_ok.php" class="">
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Produto</label>
                     <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control" value="<?php echo $retorno['nome']; ?>" required readonly/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Quantidade *</label>
                     <div class="col-sm-10">
                        <input type="number" name="quantidade" class="form-control" min="0" max="99999" placeholder="Quantidade" required />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Tipo *</label>
                     <div class="col-sm-10">
                        <select name="movimentacao" class="form-control" required>
                           <option value="1"> Entrada </option>
                           <option value="2"> Saída </option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Dia *</label>
                     <div class="col-sm-10">
                        <input type="date" class="form-control" name="data" value="<?php echo date('Y-m-d'); ?>" required />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="login" class="col-sm-2 col-form-label">Ação</label>
                     <div class="col-sm-10">
                        <input type="hidden" name="id_produto" value="<?php echo $retorno['id']; ?>" />
                        <input type="hidden" name="valvenda" value="<?php echo $retorno['valvenda']; ?>" />
                        <input type="hidden" name="valcusto" value="<?php echo $retorno['valcusto']; ?>" />
                        <button class="btn btn-warning" name="add"> Adicionar </button> <a href="listarproduto.php" class="btn btn-warning"> Voltar </a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
<?php } ?>
<?php include_once('rodape.php'); ?>