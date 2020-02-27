<?php
    include_once("../class/usuarios.class.php");


    if(isset($_POST['nome']) && $_POST['nome']!=''){
        if(isset($_POST['senha1']) && $_POST['senha1']!= '' && (isset($_POST['senha2']) && $_POST['senha2']!= '') AND $_POST['senha1'] == $_POST['senha2']){ 
            $obj = new Usuarios();
            $obj->nome = strip_tags($_POST['nome']);
            $obj->login = strip_tags($_POST['login']);
            $obj->senha = strip_tags(md5($_POST['senha1']));
            $obj->permissao = (INT)$_POST['permissao'];
            $obj->ativo = (INT)$_POST['ativo'];
            $resultado = $obj->Adicionar();
            if($resultado != ""){
                header("Location:../views/listarusuario.php?msg=1");
            }else{
                header("Location:../views/listarusuario.php?msg=2");
            }
        }else{
            header("Location:../views/listarusuario.php?msg=4");
        }
    }else{
        header("Location: logout.php");
    }

?>