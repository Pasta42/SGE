<?php 
   include_once('cabecalho.php');
   include_once('../class/produtos.class.php');

   $obj = NEW Produtos;
   $id = (int)$_GET['id'];
   $produto = $obj->retornarunico($id);
?>
   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <h2> Excluir Imagem </h2>
            <p> ATENÇÃO! Você deseja excluir a imagem do produto <strong><?php echo $produto['nome']; ?></strong>? </p>
            <img src="../img/produtos/<?php echo $produto['imagem'];?>" class="img_fluid" style="width: 320px; height: auto;"/>
            <div class="form-group row">
               <label for="login" class="col-sm-2 col-form-label">Ação</label>
               <div class="col-sm-10">
                  <a href="../function/removerimagem_ok.php?id=<?php echo $produto['id']; ?>&img=<?php echo $produto['imagem'];?>" class="btn btn-warning"> Excluir </a> <a href="listarproduto.php" class="btn btn-warning"> Voltar </a>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php include_once('rodape.php'); ?>
