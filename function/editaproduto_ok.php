<?php
  include_once("../class/produtos.class.php");

    if(isset($_POST['nome']) && $_POST['nome']!=''){
        $obj = new Produtos();
        $obj->id = (int)$_POST['id'];
        $obj->nome = strip_tags($_POST['nome']);
        $obj->codigo = strip_tags($_POST['codigo']);
        $obj->referencia = strip_tags($_POST['referencia']);
        $obj->descricao = strip_tags($_POST['descricao']);
        $obj->id_fornecedor = (int)$_POST['id_fornecedor'];
        $obj->valcusto = (float)$_POST['valcusto'];
        $obj->valvenda = (float)$_POST['valvenda'];
        if(isset($_POST['imagem']) AND $_POST['imagem'] !=""){
          $obj->imagem= addslashes($_POST['imagem']);
        }else{
          if($_FILES['fileUpload']['size'] > 0) {
            $obj->imagem = $obj->uploadImagem(); 
          } else { 
            $obj->imagem = "sem-img.jpg";
          }
        }
        $resultado = $obj->Editar();
        if($resultado != ""){
          header("Location:../views/listarproduto.php?msg=1");
        }else{
          header("Location:../views/listarproduto.php?msg=2");
        }
    }else{
      header("Location:logout.php");
    }

?>
