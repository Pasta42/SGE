<?php
   function pegarMensagem($msg){
      switch($msg){
         case 1:
            return "Dados adicionado com sucesso.";
            break;
         case 2:
            return "Erro ao conectar com o banco de dados.";
            break;
         case 3:
            return "Dados excluídos com sucesso.";
            break;
         case 4:
            return "As senhas não conferem.";
            break;
         case 5:
            return "Usuário inexistente ou senha incorreta.";
            break;
         default:
            header("Location: ../functions/deslogar_ok.php");
            break;
      }
  }
?>