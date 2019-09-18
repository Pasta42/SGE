<?php
include_once "../views/cabecalho.php";
include_once "../class/Usuarios.class.php";
		//print_r($_POST); var_dump tbm pode ser usado para testar alguns possíveis erros


			if(isset($_POST['nome']) && $_POST['nome']!=''){
                if(isset($_POST['senha1']) && $_POST['senha1']!= '' && (isset($_POST['senha2']) && $_POST['senha2']!= '')){ 
                    $obj = new Usuarios();
                    $obj->senha = strip_tags(md5($_POST['senha1']));
                    $resultado = $obj->Adicionar();
                    //var_dump($obj);
                    if($resultado){
                        echo "<div style='text-align:center;' class='alert alert-success'> 
                        <strong>Senha alterada com sucesso!</strong>
                        </div>";
                        header("Refresh:3; url=listausu.php");}
                    else{
                        echo "<div style='text-align:center;' class='alert alert-danger'>
                        <strong>Senha não pode ser alterada!</strong>
                        </div>";
                        header("Refresh:3; url=listausu.php");}
                }
                else{
                    echo  "<div style='text-align:center;' class='alert alert-danger'>
                    <strong>As senhas não correspondem!</strong>
                    </div>";
                    header("Refresh:3; url=addusuario.php");}
            }
            else{
                echo  "<div style='text-align:center;' class='alert alert-danger'>
                    <strong>Algo errado aconteceu, tente novamente!</strong>
                    </div>";
                    header("Refresh:2; url=logout.php");

            }
include_once "../views/rodape.php";
?>