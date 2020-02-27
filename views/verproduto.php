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
         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h2> Detalhes do Produto </h2>
         </div>
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Nome </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> <?php echo $retorno['nome']; ?> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Imagem </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> <img src="../img/produtos/<?php echo $retorno['imagem'];?>" class="img_fluid" style="width: 320px; height: auto;"/> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
          <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Código </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> <?php echo $retorno['codigo']; ?> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Referência </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> <?php echo $retorno['referencia']; ?> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Descrição </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> <?php echo $retorno['descricao']; ?> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Fornecedor </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <?php echo $obj->pegarFornecedor($retorno['id_fornecedor']); ?>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Valor de Custo </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> R$ <?php echo $obj->pegarValor($retorno['valcusto']); ?>  </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Valor de Venda </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> R$ <?php echo $obj->pegarValor($retorno['valvenda']); ?> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Lucro Estimado </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <p> R$ <?php $lucro = $retorno['valvenda'] - $retorno['valcusto'];
               echo $obj->pegarValor($lucro); ?> </p>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2">
            <p> <strong> Últimas Movimentações</strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10">
            <?php
               $movimentacao = $obj->ultimasMovimentacoes($retorno['id']);
               if($movimentacao != ""){
                  foreach($movimentacao as $movimento){
                     $data = date('d/m/Y', strtotime($movimento->data));
                     if($movimento->movimentacao == 1){
                        echo "&bull; Entrada de {$movimento->quantidade} itens pelo preço de R$ ".$obj->pegarValor($movimento->valcusto)." no dia {$data} <br>";
                     }else{
                        echo "&bull; Venda de {$movimento->quantidade} itens pelo preço de R$ ".$obj->pegarValor($movimento->valvenda)." no dia {$data} <br>";
                     }
                  }
               }else{
                  echo "Produto sem movimentação.";
               }
            ?>
         </div>
         <!-- ./Campo -->
         <!-- Campo -->
         <div class="col-12 col-sm-12 col-md-4 col-lg-2"  style="margin-top: 40px;">
            <p> <strong> Ações </strong> </p>
         </div>
         <div class="col-12 col-sm-12 col-md-8 col-lg-10"  style="margin-top: 40px;">
            <input type="hidden" name="id" value="<?php echo $retorno['id']; ?>" />
            <a href='editaproduto.php?id=<?php echo $retorno['id'];?>' class="btn btn-warning" name="add"> Editar </a> <a href="listarproduto.php" class="btn btn-warning"> Voltar </a>
         </div>
         <!-- ./Campo -->
      </div>
   </div>

<?php 
   }
   include_once('rodape.php'); 
?>