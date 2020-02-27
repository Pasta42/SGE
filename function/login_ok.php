<?php
	if(!isset($_SESSION)){ 
		session_start(); 
	}
	if(isset($_SESSION["login"]) AND $_SESSION["login"] != "" AND isset($_SESSION["senha"]) AND $_SESSION["senha"] != "") {
		session_regenerate_id();
	}else{
		session_unset(); 
		session_destroy();
		header('Location: ../function/logout.php');
	}
?>
