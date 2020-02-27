<?php
  class Validacao{
    public $id;
    public $nome;
    public $login;
    public $senha;
    public $permissao;

    static public function conectar(){
      date_default_timezone_set('America/Sao_Paulo');
      $connection = new PDO('mysql:host=localhost; dbname=pasta42_sige', 'pasta42_42', 'SiGE$42pasta');
      //$connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
      return $connection;
    }

    public function listar(){
      $connection = Validacao::conectar();
      try {
          $connection->beginTransaction();
          $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha AND ativo = 1 LIMIT 1";
          $preparedStatment = $connection->prepare($sql);
          $preparedStatment->bindParam(":login", $this->login);
          $preparedStatment->bindParam(":senha", $this->senha);
          $preparedStatment->execute();
          $executionResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
          $connection->commit();
          if ($executionResult == TRUE) {
              return $executionResult;
          }
          throw new PDOException();
      } catch (PDOException $exc) {
          if ((isset($connection)) && ($connection->inTransaction())) {
              $connection->rollBack();
          }
          PRINT($exc->getMessage());
          return FALSE;
      } finally {
          if (isset($connection)) {
              unset($connection);
          }
      }
    }

  }
?>
