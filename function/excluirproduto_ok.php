<?php
include_once "../views/cabecalho.php";
include_once "../class/produtos.class.php";

$obj = new Produtos();
	$obj->id = $_GET['id'];
    $resultado = $obj->Excluir($obj->id);
    //var_dump($resultado);
	if($resultado > 0){
        echo "<div style='text-align:center;' class='alert alert-success'> 
        <strong>Produto excluído com sucesso!</strong>
        </div>";
        header("Refresh:3; url=../views/listarproduto.php");
    }
    else{
        echo "<div style='text-align:center;' class='alert alert-danger'>
        <strong>Produto não pode ser excluído!</strong>
        </div>";
        header("Refresh:3; url=../views/excluirproduto.php?id={$obj->id}");
    }
        
include_once "../views/rodape.php";
?>