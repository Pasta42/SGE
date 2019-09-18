<?php
    include_once "../views/cabecalho.php";
    include_once "../class/fornecedores.class.php";

    $obj = new Fornecedor();
        $obj->id = $_GET['id'];
        $resultado = $obj->Excluir($obj->id);
        if($resultado){
            echo "<div style='text-align:center;' class='alert alert-success'> 
            <strong>Excluído com sucesso!</strong>
            </div>";
            header("Refresh:3; url=../views/listarfornecedor.php");
        }
        else{
            echo "<div style='text-align:center;' class='alert alert-danger'>
            <strong>Fornecedor não pode ser excluído!</strong>
            </div>";
            header("Refresh:3; url=../views/listarfornecedor.php");
        }
            
    include_once "../views/rodape.php";
?>