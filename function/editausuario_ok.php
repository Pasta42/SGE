<?php
include_once "../views/cabecalho.php";
include_once "../class/usuarios.class.php";

    if(isset($_POST['login']) && $_POST['permissao']!=''){
            $obj = new Usuarios();
            $obj->id = (int)$_POST['id'];
            $obj->nome = strip_tags($_POST['nome']);
            $obj->login = strip_tags($_POST['login']);
            $obj->permissao = (int)$_POST['permissao'];
            $resultado = $obj->Editar();
            if($resultado != ""){
                echo "<div style='text-align:center;' class='alert alert-success'> 
                <strong>Usuário editado com sucesso!</strong>
                </div>";
                header("Refresh:3; url=../views/editausuario.php?id={$obj->id}");}
            else{
                echo "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Usuário não pode ser editado!</strong>
                </div>";
                header("Refresh:3; url=../views/editausuario.php?id={$obj->id}");}
        }	
        else{
            echo  "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Algo errado aconteceu, tente novamente!</strong>
                </div>";
                header("Refresh:2; url=logout.php");

        }

include_once "../views/rodape.php";
?>
