<?php
include_once "../class/movimentos.class.php";

$obj = new Movimentos();
	$obj->id = $_GET['id'];
    $resultado = $obj->Excluir($obj->id);
    //var_dump($resultado);
	if($resultado > 0){
        echo "<div style='text-align:center;' class='alert alert-success'> 
        <strong>Excluído com sucesso!</strong>
        </div>";
        header("Refresh:3; url=../views/listarmovimento.php");
    }
    else{
        echo "<div style='text-align:center;' class='alert alert-danger'>
        <strong>Movimento não pode ser excluído!</strong>
        </div>";
        header("Refresh:3; url=../views/excluirmovimento.php?id={$obj->id}");
    }
        
?>