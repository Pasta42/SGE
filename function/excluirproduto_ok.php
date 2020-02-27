<?php
    include_once("../class/produtos.class.php");

    if(isset($_GET['id']) AND $_GET['id'] != ""){
        $obj = new Produtos();
        $obj->id = (int)$_GET['id'];
        $resultado = $obj->Excluir($obj->id);
        if($resultado > 0){
            header("Location:../views/listarproduto.php?msg=3");
        }
        else{
            header("Location:../views/listarproduto.php?msg=2");
        }
    }else{
        header("Location:logout.php");
    }
            
?>