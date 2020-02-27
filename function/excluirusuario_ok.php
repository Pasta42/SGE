<?php
    include_once("../class/usuarios.class.php");

    
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        $obj = new Usuarios();
        $obj->id = $_GET['id'];
        $resultado = $obj->Excluir($obj->id);
        if($resultado > 0){
            header("Location:../views/listarusuario.php?msg=3");
        }else{
            header("Location:../views/listarusuario.php?msg=2");
        }
    }else{
        header("Location: logout.php");
    }


?>