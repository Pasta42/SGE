<?php
include_once "../views/cabecalho.php";
include_once "../class/usuarios.class.php";

$obj = new Usuarios();
	$obj->id = $_GET['id'];
    $resultado = $obj->Excluir($obj->id);
    var_dump($resultado);
	if($resultado > 0){
        echo "<div style='text-align:center;' class='alert alert-success'> 
        <strong>Excluído com sucesso!</strong>
        </div>";
        header("Refresh:3; url=../views/listarusuario.php");
    }
    else{
        echo "<div style='text-align:center;' class='alert alert-danger'>
        <strong>Usuário não pode ser excluído!</strong>
        </div>";
        header("Refresh:3; url=../views/excluirusuario.php?id={$obj->id}");
    }
        
include_once "../views/rodape.php";
?>