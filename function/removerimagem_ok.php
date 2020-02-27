<?php
    include_once("../class/produtos.class.php");
    $obj = new Produtos();
    $id = (int)$_GET['id'];
    $img = addslashes($_GET['img']);
    $resultado = $obj->removerImagem($id, $img);
    if($resultado > 0 and $resultado !=""){
        header("Location:../views/listarproduto.php?msg=3");
    }
    else{
        header("Location:../views/listarproduto.php?msg=2");
    }
?>