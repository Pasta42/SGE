<?php
    class Usuarios{
        public $id;
        public $nome;
        public $login;
        public $senha;
        public $ativo;
        public $permissao;

        public function conectar(){
            date_default_timezone_set('America/Sao_Paulo');
            $connection = new PDO('mysql:host=localhost; dbname=pasta42_sige', 'pasta42_42', 'SiGE$42pasta');
            //$connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
            return $connection;
        }

        public function Adicionar() {
            $connection;
            try{
                $connection = Usuarios::conectar();
                $connection->beginTransaction();
                $sql = "INSERT INTO usuarios (nome, login, senha, permissao, ativo) VALUES (:nome, :login, :senha, :permissao, :ativo)";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":nome", $this->nome);
                $preparedStatment->bindParam(":login", $this->login);
                $preparedStatment->bindParam(":senha", $this->senha);
                $preparedStatment->bindParam(":permissao", $this->permissao);
                $preparedStatment->bindParam(":ativo", $this->ativo);
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
            if($_SESSION['permissao'] != 9){$where = "WHERE permissao != 9";}else{$where="";}
            try {
                $connection = Usuarios::conectar();
                $connection->beginTransaction();
                $sql = "SELECT * FROM usuarios {$where}";
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
                $connection = Usuarios::conectar();
                $connection->beginTransaction();
                $sql = "UPDATE usuarios SET nome = :nome, login = :login, permissao = :permissao, ativo = :ativo WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $this->id);
                $preparedStatment->bindParam(":nome", $this->nome);
                $preparedStatment->bindParam(":login", $this->login);
                $preparedStatment->bindParam(":permissao", $this->permissao);
                $preparedStatment->bindParam(":ativo", $this->ativo);
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

        public function EditarSenha(){
            $connection;
            try{
                $connection = Usuarios::conectar();
                $connection->beginTransaction();
                $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $this->id);
                $preparedStatment->bindParam(":senha", $this->senha);
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
            $connection = Usuarios::conectar();
            try{
                $connection->beginTransaction();
                $sql = "DELETE FROM usuarios WHERE id = :id";
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
            $connection = Usuarios::conectar();
            try{
                $connection->beginTransaction();
                $sql = "SELECT * FROM usuarios WHERE id = :id";
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

        public function pegarPermissao($permissao){
            switch($permissao){
                case 1:
                    return "Moderador";
                    break;
                case 2:
                    return "Adminsitrador";
                    break;
                case 9:
                    return "Desenvolvedor";
                    break;
                default:
                    header("Location: ../function/logout.php");
                    break;
            }
        }

        public function pegarAtivo($ativo){
            switch($ativo){
                case 0:
                    return "Não";
                    break;
                case 1:
                    return "Sim";
                    break;
                default:
                    header("Location: ../function/logout.php");
                    break;
            }
        }
    }

?>