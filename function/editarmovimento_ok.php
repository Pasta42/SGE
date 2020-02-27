<?php
include_once "../class/movimentos.class.php";

    if(isset($_POST['login']) && $_POST['permissao']!=''){
            $obj = new Movimentos();
            $obj->id = (int)$_POST['id'];
            $obj->quantidade = strip_tags($_POST['quantidade']);
            $obj->id_produto = strip_tags($_POST['id_produto']);
            $obj->data = strip_tags($_POST['data']);
            $obj->movimentacao = strip_tags($_POST['movimentacao']);
            $resultado = $obj->Editar();
            if($resultado != ""){
                echo "<div style='text-align:center;' class='alert alert-success'> 
                <strong> O movimento foi editado com sucesso!</strong>
                </div>";
                header("Refresh:3; url=../views/listarmovimento.php");
            }
            else{
                echo "<div style='text-align:center;' class='alert alert-danger'>
                <strong> O movimento não pode ser editado!</strong>
                </div>";
                header("Refresh:3; url=../views/editarmovimento.php?id={$obj->id}");}
        }	
        else{
            echo  "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Algo errado aconteceu, tente novamente!</strong>
                </div>";
                header("Refresh:2; url=logout.php");

        }

?>
