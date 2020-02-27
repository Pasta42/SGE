<?php
    include_once("../class/usuarios.class.php");

    if(isset($_POST['login']) && $_POST['permissao']!=''){
        $obj = new Usuarios();
        $obj->id = (int)$_POST['id'];
        $obj->nome = strip_tags($_POST['nome']);
        $obj->login = strip_tags($_POST['login']);
        $obj->permissao = (int)$_POST['permissao'];
        $obj->ativo = (int)$_POST['ativo'];
        $resultado = $obj->Editar();
        if($resultado != ""){
            header("Location:../views/listarusuario.php?msg=1");
        }else{
            header("Location:../views/listarusuario.php?msg=2");
        }
    }else{
        header("Location: logout.php");
    }

?>
