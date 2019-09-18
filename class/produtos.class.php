<?php
    class Produtos{
        private $id;
        private $nome;
        private $descricao;
        private $id_fornecedor;
        private $valcusto;
        private $valvenda;

            public function __get($key){
                return $this->$key;
            }
            public function __set($key, $value){
                $this->$key=$value;
            }

            public function conectar(){
                date_default_timezone_set('America/Sao_Paulo');
                //$connection = new PDO('mysql:host=localhost; dbname=""', 'root', '');
                $connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
                return $connection;
            }

            public function Adicionar() {
                $connection;
                try{
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                    $sql = "INSERT INTO produtos (nome, descricao, id_fornecedor, valcusto, valvenda) VALUES (:nome, :descricao, :id_fornecedor, :valcusto, :valvenda)";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->bindParam(":nome", $this->nome);
                    $preparedStatment->bindParam(":descricao", $this->descricao);
                    $preparedStatment->bindParam(":id_fornecedor", $this->id_fornecedor);
                    $preparedStatment->bindParam(":valcusto", $this->valcusto);
                    $preparedStatment->bindParam(":valvenda", $this->valvenda);
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
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                    $sql = "SELECT * FROM produtos";
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
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                    $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, id_fornecedor = :id_fornecedor, valcusto = :valcusto, valvenda = :valvenda WHERE id = :id";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->bindParam(":id", $this->id);
                    $preparedStatment->bindParam(":nome", $this->nome);
                    $preparedStatment->bindParam(":descricao", $this->descricao);
                    $preparedStatment->bindParam(":id_fornecedor", $this->id_fornecedor);
                    $preparedStatment->bindParam(":valcusto", $this->valcusto);
                    $preparedStatment->bindParam(":valvenda", $this->valvenda);
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
                $connection;
                try{
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                $sql = "DELETE FROM produtos WHERE id = :id";
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
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                $sql = "SELECT * FROM produtos WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $id);
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