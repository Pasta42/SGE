<?php 
   include_once('cabecalho.php');
   include_once("../class/relatorios.class.php");
   $obj = NEW Relatorio;
?>

   <div class="container fundo-branco" style="margin-top: 30px;">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h2> Relatório </h2>
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
               <div class="card-body">
                  <h5 class="card-title"><i class="fas fa-boxes fa-5x"></i></h5>
                  <h5 class="card-title">Produtos</h5>
                  <p class="card-text"><?php echo $obj->totalProdutos();?> Cadastrados</p>
                  <a href="listarproduto.php" class="btn btn-block btn-warning">Lista de Produtos</a>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card text-center" >
               <div class="card-body">
                  <h5 class="card-title"><i class="fas fa-truck-loading fa-5x"></i></h5>
                  <h5 class="card-title">Fornecedores</h5>
                  <p class="card-text"><?php echo $obj->totalFornecedores();?> Cadastrados</p>
                  <a href="listarfornecedor.php" class="btn btn-block btn-warning">Lista de Fornecedores</a>
               </div>
            </div>
         </div>

         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
               <div class="card-body">
                  <h5 class="card-title"><i class="fas fa-money-bill fa-5x"></i></h5>
                  <h5 class="card-title">Valores de Custo</h5>
                  <p class="card-text"> R$ 
                  <?php
                     $valorCusto = 0;
                     $resultCusto = $obj->totalValores(1);
                     if($resultCusto !=""){
                        foreach($resultCusto as $custo){
                           $valorCusto += $custo->valcusto;
                        }
                     }
                     echo $valorCusto;
                  ?> 
                  </p>
                  <a href="listarproduto.php" class="btn btn-block btn-warning">Lista de Produtos</a>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
               <div class="card-body">
                  <h5 class="card-title"><i class="fas fa-money-bill fa-5x"></i></h5>
                  <h5 class="card-title">Valores de Venda</h5>
                  <p class="card-text"> R$
                     <?php
                        $valorVenda = 0;
                        $resultVenda = $obj->totalValores(2);
                        if($resultVenda !=""){
                           foreach($resultVenda as $venda){
                              $valorVenda += $venda->valvenda;
                           }
                        }
                        echo $valorVenda;
                     ?> 
                  </p>
                  <a href="listarproduto.php" class="btn btn-block btn-warning">Lista de Produtos</a>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php 
   include_once('rodape.php'); 
?>