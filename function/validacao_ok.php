<?php
	
	if(!isset($_SESSION)){ session_start(); }
  	require_once("../class/validacao.class.php");
	if(isset($_POST['login']) AND $_POST['login'] != "" AND isset($_POST['senha']) AND $_POST['senha'] !="" AND $_GET['page'] == 'val'){
		$objeto = new Validacao;
		$objeto->login = addslashes($_POST['login']);
		$objeto->senha = md5(addslashes($_POST['senha']));
	  	$consulta = $objeto->listar();
	  	if($consulta != ""){
			foreach($consulta as $validacao){
				$_SESSION['id'] = $validacao->id;
				$_SESSION['nome'] = $validacao->nome;
				$_SESSION['permissao'] = $validacao->permissao;
				$_SESSION['senha'] = $validacao->senha;
				$_SESSION['login'] = $validacao->login;
				header("Location: ../views/index.php");
			}
	  }else{
		header("Location: ../index.php?msg=5");
	  }
	}else{
	   header('Location: ../function/logout.php');
	}

?>