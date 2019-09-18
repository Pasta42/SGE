<?php
    class relatorios{
        private $id;
        private $entrada;
        private $saida;

            public function __get($key){
                return $this->$key;
            }
            public function __set($key, $value){
                $this->$key=$value;
            }

            public function conectar(){
                date_default_timezone_set('America/Sao Paulo');
                //$connection = new PDO('mysql:host=localhost; dbname=""', 'root', '');
                $connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
                return $connection;
            }

            public function Adicionar() {
                $connection;
                try{
                    $connection = Relatorios::conectar();
                    $connection->beginTransaction();
                    $sql = "INSERT INTO relatorios (entrada, saida) VALUES (:entrada, :saida)";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->bindParam(":entrada", $this->entrada);
                    $preparedStatment->bindParam(":saida", $this->saida);
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
                    $connection = Relatorios::conectar();
                    $connection->beginTransaction();
                    $sql = "SELECT * FROM relatorios";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->execute();
                    $executeResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
                    $connection->commit();
                    if ($executionResult == TRUE) {
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
                    $connection = Relatorios::conectar();
                    $connection->beginTransaction();
                    $sql = "UPDATE relatorios SET entrada = :entrada, saida = :saida WHERE id = :id";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->bindParam(":id", $this->id);
                    $preparedStatment->bindParam(":entrada", $this->entrada);
                    $preparedStatment->bindParam(":saida", $this->saida);
                    $executionResult = $preparedStatment->execute();
                    $connection->commit(); 
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
                    $connection = Relatórios::conectar();
                    $connection->beginTransaction();
                $sql = "DELETE FROM relatorios WHERE id = :id";
                $preparedStatment->bindParam(":id", $this->id);
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
                    $connection = Relatorios::conectar();
                    $connection->beginTransaction();
                $sql = "SELECT * FROM relatorios WHERE id = {$id}";
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