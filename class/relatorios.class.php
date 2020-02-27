<?php
    class Relatorio{
        public $id;
        public $entrada;
        public $saida;

        public function conectar(){
            date_default_timezone_set('America/Sao_Paulo');
            $connection = new PDO('mysql:host=localhost; dbname=pasta42_sige', 'pasta42_42', 'SiGE$42pasta');
            //$connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
            return $connection;
        }

        static public function totalProdutos(){
            $connection;
            try{
                $connection = Relatorio::conectar();
                $connection->beginTransaction();
                $sql = "SELECT * FROM produtos";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->execute();
                $executionResult = $preparedStatment->rowCount();
                $connection->commit();
                if ($executionResult == TRUE){
                    if($executionResult != "" AND $executionResult > 0){
                        return $executionResult; 
                    }else{
                        return 0;
                    }
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

        static public function totalFornecedores(){
            $connection;
            try{
                $connection = Relatorio::conectar();
                $connection->beginTransaction();
                $sql = "SELECT * FROM fornecedor";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->execute();
                $executionResult = $preparedStatment->rowCount();
                $connection->commit();
                if ($executionResult == TRUE){
                    if($executionResult != "" AND $executionResult > 0){
                        return $executionResult; 
                    }else{
                        return 0;
                    }
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

        static public function totalValores($movimento){
			try{
				$connection = Relatorio::conectar();
				$connection->beginTransaction();
				$sql = "SELECT valcusto, valvenda FROM movimento WHERE {$movimento}";
				$preparedStatment = $connection->prepare($sql);
				$preparedStatment->execute();
				$executionResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
				$connection->commit();
				if ($executionResult == TRUE){
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