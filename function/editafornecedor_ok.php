<?php
    include_once("../class/fornecedores.class.php");

    if(isset($_POST['nome']) && $_POST['nome']!=''){
            $obj = new Fornecedor();
            $obj->id = $_POST["id"];
            $obj->nome = strip_tags($_POST['nome']);
            $obj->cnpj = strip_tags($_POST['cnpj']);
            $obj->telefone = strip_tags($_POST['telefone']);
            $obj->email = strip_tags($_POST['email']);
            $resultado = $obj->Editar();
            if($resultado != ""){
                header("Location:../views/listarfornecedor.php?msg=1");
            }else{
                header("Location:../views/listarfornecedor.php?msg=2");
            }
        }else{
            header("Location: logout.php");
        }

?>
