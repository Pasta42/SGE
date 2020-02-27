<?php
    include_once("../class/movimentos.class.php");

    if(isset($_POST['nome']) && $_POST['nome']!=''){
        $obj = new Movimentos();
        $obj->quantidade = (int)$_POST['quantidade'];
        $obj->id_produto = (int)$_POST['id_produto'];
        $obj->data = strip_tags($_POST['data']);
        $obj->movimentacao = (int)$_POST['movimentacao'];
        if($obj->movimentacao == 1){
            $obj->valcusto = (float)$_POST['valcusto'];
        }elseif( $obj->movimentacao == 2){
            $obj->valvenda = (float)$_POST['valvenda'];
        }
        $resultado = $obj->Adicionar();
        if($resultado != ""){
            header("Location:../views/listarproduto.php?msg=1");
        }
        else{
            header("Location:../views/listarproduto.php?msg=2");
        }
    }else{
        header("Location: logout.php");
    }

?>