<?php
    class Movimentos{
        public $id;
        public $quantidade;
        public $id_produto;
        public $data;
        public $movimentacao;
        public $valvenda;
        public $valcusto;

        public function conectar(){
            date_default_timezone_set('America/Sao_Paulo');
            $connection = new PDO('mysql:host=localhost; dbname=pasta42_sige', 'pasta42_42', 'SiGE$42pasta');
            //$connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
            return $connection;
        }

        public function Adicionar() {
            $connection;
            try{
                $connection = Movimentos::conectar();
                $connection->beginTransaction();
                $sql = "INSERT INTO movimento (quantidade, id_produto, data, movimentacao, valcusto, valvenda) VALUES (:quantidade, :id_produto, :data, :movimentacao, :valcusto, :valvenda)";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":quantidade", $this->quantidade);
                $preparedStatment->bindParam(":id_produto", $this->id_produto);
                $preparedStatment->bindParam(":data", $this->data);
                $preparedStatment->bindParam(":movimentacao", $this->movimentacao);
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
                $connection = Movimentos::conectar();
                $connection->beginTransaction();
                $sql = "SELECT * FROM movimento";
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
                $connection = Movimentos::conectar();
                $connection->beginTransaction();
                $sql = "UPDATE movimento SET quantidade = :quantidade, id_produto = :id_produto, movimentacao = :movimentacao WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $this->id);
                $preparedStatment->bindParam(":quantidade", $this->quantidade);
                $preparedStatment->bindParam(":id_produto", $this->id_produto);
                $preparedStatment->bindParam(":movimentacao", $this->movimentacao);
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
            $connection = Movimentos::conectar();
            try{
                $connection->beginTransaction();
                $sql = "DELETE FROM movimento WHERE id = :id";
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

        public function ultimaMovimentacao($id){
            $connection = Movimentos::conectar();
            try{
                $connection->beginTransaction();
                $sql = "SELECT * FROM movimento WHERE id = :id";
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

        public function pegarmovimentacao($movimentacao){
            switch($movimentacao){
                case 1:
                    return "Entrada";
                    break;
                case 2:
                    return "Saida";
                    break;
                default:
                    header("Location: ../function/logout.php");
                    break;
            }
        }
    }

?>