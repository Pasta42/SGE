<?php
    include_once("../class/produtos.class.php");

        if(isset($_POST['nome']) AND $_POST['nome']!=''){
            $obj = new Produtos();
            $obj->nome = strip_tags($_POST['nome']);
            $obj->codigo = strip_tags($_POST['codigo']);
            $obj->referencia = strip_tags($_POST['referencia']);
            $obj->descricao = strip_tags($_POST['descricao']);
            $obj->id_fornecedor = (int)$_POST['id_fornecedor'];
            $obj->valcusto = (real)$_POST['valcusto'];
            $obj->valvenda = (real)$_POST['valvenda'];
            $obj->data_cadastro = date('Y-m-d');
            if($_FILES['fileUpload']['size'] > 0) { $obj->imagem = $obj->uploadImagem(); } else { $obj->imagem = "sem-img.jpg"; }
            $resultado = $obj->Adicionar();
            if($resultado != ""){
                header("Location:../views/listarproduto.php?msg=1");
            }else{
                header("Location:../views/listarproduto.php?msg=2");
            }
        }else{
            header("Location: logout.php");

        }
?>