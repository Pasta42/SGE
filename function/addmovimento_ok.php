<?php
include_once "../views/cabecalho.php";
include_once "../class/movimentos.class.php";


			if(isset($_POST['nome']) && $_POST['nome']!=''){
                    $obj = new Movimentos();
                    $obj->quantidade = strip_tags($_POST['quantidade']);
                    $obj->id_produto = strip_tags($_POST['id_produto']);
                    $obj->data = strip_tags($_POST['data1']);
                    $obj->movimentacao = $_POST['movimentacao'];
                    $resultado = $obj->Adicionar();
                    if($resultado != ""){
                        echo "<div style='text-align:center;' class='alert alert-success'> 
                        <strong>Movimento adicionado com sucesso!</strong>
                        </div>";
                        header("Refresh:3; url=../views/listarmovimento.php");
                    }
                    else{
                        echo "<div style='text-align:center;' class='alert alert-danger'>
                        <strong>Movimento não pode ser adicionado!</strong>
                        </div>";
                        header("Refresh:3; url=../views/addmovimento.php");
                    }
            else{
                echo  "<div style='text-align:center;' class='alert alert-danger'>
                    <strong>Algo errado aconteceu, tente novamente!</strong>
                    </div>";
                    header("Refresh:2; url=logout.php");

            }
include_once "../views/rodape.php";
?>