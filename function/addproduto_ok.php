<?php
    include_once "../views/cabecalho.php";
    include_once "../class/produtos.class.php";

        if(isset($_POST['nome']) && $_POST['nome']!=''){
                $obj = new Produtos();
                $obj->nome = strip_tags($_POST['nome']);
                $obj->descricao = strip_tags($_POST['descricao']);
                $obj->id_fornecedor = (int)$_POST['id_fornecedor'];
                $obj->valcusto = (real)$_POST['valcusto'];
                $obj->valvenda = (real)$_POST['valvenda'];
                $resultado = $obj->Adicionar();
                if($resultado != ""){
                    echo "<div style='text-align:center;' class='alert alert-success'> 
                    <strong>Produto adicionado com sucesso!</strong>
                    </div>";
                    header("Refresh:3; url=../views/listarproduto.php");}
                else{
                    echo "<div style='text-align:center;' class='alert alert-danger'>
                    <strong>Produto não pode ser adicionado!</strong>
                    </div>";
                    header("Refresh:3; url=../views/addproduto.php");}
            }
        else{
            echo  "<div style='text-align:center;' class='alert alert-danger'>
                <strong>Algo errado aconteceu, tente novamente!</strong>
                </div>";
            header("Refresh:2; url=logout.php");

        }

    include_once "../views/rodape.php";
?>