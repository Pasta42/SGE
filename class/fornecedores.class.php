<?php
    class Fornecedor{
        public $id;
        public $nome;
        public $cnpj;
        public $telefone;
        public $email;

        public function conectar(){
            date_default_timezone_set('America/Sao_Paulo');
            $connection = new PDO('mysql:host=localhost; dbname=pasta42_sige', 'pasta42_42', 'SiGE$42pasta');
            //$connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
            return $connection;
        }

        public function Adicionar() {
            $connection;
            try{
                $connection = Fornecedor::conectar();
                $connection->beginTransaction();
                $sql = "INSERT INTO fornecedor (nome, cnpj, telefone, email) VALUES (:nome, :cnpj, :telefone, :email)";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":nome", $this->nome);
                $preparedStatment->bindParam(":cnpj", $this->cnpj);
                $preparedStatment->bindParam(":telefone", $this->telefone);
                $preparedStatment->bindParam(":email", $this->email);
                $executionResult = $preparedStatment->execute();
                $connection->commit();

                if($executionResult == TRUE) {
                    return TRUE;
                }
                throw new PDOException();
            }
            catch (PDOException $exc){
                if((isset($connection)) && ($connection->inTransaction())) {
                    $connection->rollBack();
                }
                PRINT($exc->getMessage());
                return FALSE;
            }
            finally {
                if (isset($connection)) {
                    unset($connection);
                }
            }

        }
        public function Listar() {
            $connection;
            try {
                $connection = Fornecedor::conectar();
                $connection->beginTransaction();
                $sql = "SELECT * FROM fornecedor";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->execute();
                $executeResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
                $connection->commit();
                if ($executeResult == TRUE) {
                    return $executeResult;
                }
                throw new PDOException();
            }
            catch (PDOException $exc) {
                if ((isset($connection)) && ($connection->inTransaction())){
                    $connection->rollBack();
                }
                PRINT($exc->getMessage());
                return FALSE;
            }
            finally {
                if(isset($connection)) {
                    unset($connection);
                }
            }
        }

        public function Editar(){
            $connection;
            try{
                $connection = Fornecedor::conectar();
                $connection->beginTransaction();
                $sql = "UPDATE fornecedor SET nome = :nome, cnpj = :cnpj, telefone = :telefone, email = :email WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $this->id);
                $preparedStatment->bindParam(":nome", $this->nome);
                $preparedStatment->bindParam(":cnpj", $this->cnpj);
                $preparedStatment->bindParam(":telefone", $this->telefone);
                $preparedStatment->bindParam(":email", $this->email);
                $executionResult = $preparedStatment->execute();
                $connection->commit();
                if ($executionResult == TRUE) {
                    return $executionResult;
                }
                throw new PDOException();
            }
            catch (PDOException $exc) {
                if ((isset($connection)) && ($connection->inTransaction())) {
                    $connection->rollBack();
                }
                PRINT $exc->getMessage();
            }
            finally {
                if (isset($connection)) {
                    unset($connection);
                }
            }
        }

        public function Excluir($id){
            $connection = Fornecedor::conectar();
            try{
                $connection->beginTransaction();
                $sql = "DELETE FROM fornecedor WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $this->id);
                $executionResult = $preparedStatment->execute();
                $executionResult = $preparedStatment->rowCount();
                $connection->commit();
                if ($executionResult == TRUE) {
                    return $executionResult;
                }
            }
            catch (PDOException $exc) {
                if ((isset($connection)) && ($connection->inTransaction())){
                    $connection->rollBack();
                }
                PRINT $exc->getMessage();
            }
            finally {
                if (isset($connection)){
                    unset($connection);
                }
            }
        }

        public function retornarunico($id){
            $connection;
            try{
                $connection = Fornecedor::conectar();
                $connection->beginTransaction();
            $sql = "SELECT * FROM fornecedor WHERE id = {$id}";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();
            $executionResult = $preparedStatment->fetch(PDO::FETCH_ASSOC);
            $connection->commit();
            if ($executionResult == TRUE) {
                return $executionResult;
            }
            throw new PDOException();
            }
            catch (PDOException $exc) {
                if ((isset($connection)) && ($connection->inTransaction())) {
                    $connection->rollBack();
                }
                PRINT($exc->getMessage());
                return FALSE;
            }
            finally {
                if (isset($connection)) {
                    unset($connection);
                }
            }
        }
    }

?>