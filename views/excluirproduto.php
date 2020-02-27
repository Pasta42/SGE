<?php 
   include_once('cabecalho.php');
   include_once('../class/produtos.class.php');

   $id = (int)$_GET['id'];
   $obj = NEW Produtos;
   $produto = $obj->retornarunico($id);
?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Excluir Produto </h2>
            <p> ATENÇÃO! Você deseja excluir o produto <strong><?php echo $produto['nome']; ?></strong>? </p>
            <div class="form-group row">
               <label for="login" class="col-sm-2 col-form-label">Ação</label>
               <div class="col-sm-10">
                  <a href="../function/excluirproduto_ok.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger"> Excluir </a> <a href="listarproduto.php" class="btn btn-warning"> Voltar </a>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>