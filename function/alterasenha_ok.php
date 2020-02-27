<?php
    include_once("../class/usuarios.class.php");


    if(isset($_POST['id']) && $_POST['id']!=''){
        $obj = new Usuarios();
        $obj->id = (int)$_POST['id'];

        //confere as senhas
        if(isset($_POST['senha1']) && $_POST['senha1']!= '' && (isset($_POST['senha2']) && $_POST['senha2']!= '' AND $_POST['senha1'] == $_POST['senha2'])){ 
            $obj->senha = strip_tags(md5($_POST['senha1']));
            $resultado = $obj->EditarSenha();
            if($resultado){
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