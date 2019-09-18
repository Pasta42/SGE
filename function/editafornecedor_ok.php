<?php
    include_once "../views/cabecalho.php";
    include_once "../class/fornecedores.class.php";

    if(isset($_POST['nome']) && $_POST['nome']!=''){
            $obj = new Fornecedor();
            $obj->id = $_POST["id"];
            $obj->nome = strip_tags($_POST['nome']);
            $obj->cnpj = strip_tags($_POST['cnpj']);
            $obj->telefone = strip_tags($_POST['telefone']);
            $obj->email = strip_tags($_POST['email']);
            $resultado = $obj->Editar();
            if($resultado != ""){
                echo "<div style='text-align:center;' class='alert alert-success'> 
                <strong>Fornecedor editado com sucesso!</strong>
                </div>";
                header("Refresh:3; url=../views/listarfornecedor.php");}
            else{
                echo "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Usuário não pode ser editado!</strong>
                </div>";
                header("Refresh:3; url=../views/editafornecedor.php?id={$obj->id}");}
        }	
        else{
            echo  "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Algo errado aconteceu, tente novamente!</strong>
                </div>";
                header("Refresh:2; url=logout.php");

        }

    include_once "../views/rodape.php";
?>
