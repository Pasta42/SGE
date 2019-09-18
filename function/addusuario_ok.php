<?php
include_once "../views/cabecalho.php";
include_once "../class/usuarios.class.php";


			if(isset($_POST['nome']) && $_POST['nome']!=''){
                if(isset($_POST['senha1']) && $_POST['senha1']!= '' && (isset($_POST['senha2']) && $_POST['senha2']!= '') AND $_POST['senha1'] == $_POST['senha2']){ 
                    $obj = new Usuarios();
                    $obj->nome = strip_tags($_POST['nome']);
                    $obj->login = strip_tags($_POST['login']);
                    $obj->senha = strip_tags(md5($_POST['senha1']));
                    $obj->permissao = (INT)$_POST['permissao'];
                    $resultado = $obj->Adicionar();
                    if($resultado != ""){
                        echo "<div style='text-align:center;' class='alert alert-success'> 
                        <strong>Adicionado com sucesso!</strong>
                        </div>";
                        header("Refresh:3; url=../views/listarusuario.php");}
                    else{
                        echo "<div style='text-align:center;' class='alert alert-danger'>
                        <strong>Usuário não pode ser adicionado!</strong>
                        </div>";
                        header("Refresh:3; url=../views/listarusuario.php");}
                }
                else{
                    echo  "<div style='text-align:center;' class='alert alert-danger'>
                    <strong>As senhas não correspondem!</strong>
                    </div>";
                    header("Refresh:3; url=../views/addusuario.php");}
            }
            else{
                echo  "<div style='text-align:center;' class='alert alert-danger'>
                    <strong>Algo errado aconteceu, tente novamente!</strong>
                    </div>";
                    header("Refresh:2; url=logout.php");

            }
include_once "../views/rodape.php";
?>