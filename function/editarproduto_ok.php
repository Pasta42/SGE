<?php
include_once "../views/cabecalho.php";
include_once "../class/produtos.class.php";

    if(isset($_POST['nome']) && $_POST['nome']!=''){
            $obj = new Produtos();
            $obj->id = (int)$_POST['id'];
            $obj->nome = strip_tags($_POST['nome']);
            $obj->descricao = strip_tags($_POST['descricao']);
            $obj->id_fornecedor = (int)$_POST['id_fornecedor'];
            $obj->valcusto = (real)$_POST['valcusto'];
            $obj->valvenda = (real)$_POST['valvenda'];
            $resultado = $obj->Editar();
            if($resultado != ""){
                echo "<div style='text-align:center;' class='alert alert-success'> 
                <strong>Produto editado com sucesso!</strong>
                </div>";
                header("Refresh:3; url=../views/listarproduto.php");}
            else{
                echo "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Produto não pode ser editado!</strong>
                </div>";
                header("Refresh:3; url=../views/editarproduto.php?id={$obj->id}");}
        }	
        else{
            echo  "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Algo errado aconteceu, tente novamente!</strong>
                </div>";
                header("Refresh:2; url=logout.php");

        }

include_once "../views/rodape.php";
?>
