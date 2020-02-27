<?php
    class Produtos{
        public $id;
        public $nome;
        public $imagem;
        public $codigo;
        public $referencia;
        public $descricao;
        public $id_fornecedor;
        public $valcusto;
        public $valvenda;
        public $data_cadastro;



        public function conectar(){
            date_default_timezone_set('America/Sao_Paulo');
            $connection = new PDO('mysql:host=localhost; dbname=pasta42_sige', 'pasta42_42', 'SiGE$42pasta');
            //$connection = new PDO('mysql:host=localhost; dbname=bancosge', 'root', '');
            return $connection;
        }

            public function Adicionar() {
                $connection;
                try{
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                    $sql = "INSERT INTO produtos (nome, codigo, referencia, descricao, id_fornecedor, valcusto, valvenda, imagem, data_cadastro) VALUES (:nome, :codigo, :referencia, :descricao, :id_fornecedor, :valcusto, :valvenda, :imagem, :data_cadastro)";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->bindParam(":nome", $this->nome);
                    $preparedStatment->bindParam(":codigo", $this->codigo);
                    $preparedStatment->bindParam(":referencia", $this->referencia);
                    $preparedStatment->bindParam(":descricao", $this->descricao);
                    $preparedStatment->bindParam(":id_fornecedor", $this->id_fornecedor);
                    $preparedStatment->bindParam(":valcusto", $this->valcusto);
                    $preparedStatment->bindParam(":valvenda", $this->valvenda);
                    $preparedStatment->bindParam(":imagem", $this->imagem);
                    $preparedStatment->bindParam(":data_cadastro", $this->data_cadastro);
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

            public function Listar($where) {
                $connection;
                try {
                    $connection = Produtos::conectar();
                    $connection->beginTransaction();
                    $sql = "SELECT * FROM produtos {$where}";
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
                    $sql = "UPDATE produtos SET nome = :nome, codigo = :codigo, referencia = :referencia, descricao = :descricao, id_fornecedor = :id_fornecedor, valcusto = :valcusto, valvenda = :valvenda, imagem = :imagem WHERE id = :id";
                    $preparedStatment = $connection->prepare($sql);
                    $preparedStatment->bindParam(":id", $this->id);
                    $preparedStatment->bindParam(":nome", $this->nome);
                    $preparedStatment->bindParam(":codigo", $this->codigo);
                    $preparedStatment->bindParam(":referencia", $this->referencia);
                    $preparedStatment->bindParam(":descricao", $this->descricao);
                    $preparedStatment->bindParam(":id_fornecedor", $this->id_fornecedor);
                    $preparedStatment->bindParam(":valcusto", $this->valcusto);
                    $preparedStatment->bindParam(":valvenda", $this->valvenda);
                    $preparedStatment->bindParam(":imagem", $this->imagem);
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

        public function retornarMovimentacao($id_produto){
            $connection;
            try{
                $connection = Produtos::conectar();
                $connection->beginTransaction();
                $sql = "SELECT * FROM movimento WHERE id_produto = :id_produto";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id_produto", $id_produto);
                $preparedStatment->execute();
                $executionResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ); 
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

        public function pegarFornecedor($id){
            $connection;
            try{
                $connection = Produtos::conectar();
                $connection->beginTransaction();
                $sql = "SELECT nome FROM fornecedor WHERE id = :id";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id", $id);
                $preparedStatment->execute();
                $executionResult = $preparedStatment->fetch(PDO::FETCH_ASSOC);
                $connection->commit();
                if ($executionResult == TRUE) {
                    return $executionResult['nome'];
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

        //CLASSES PARA IMAGENS
        public function removerImagem($id, $imagem){
            $connection = Produtos::conectar();
            try {
             $connection->beginTransaction();
              $sql = "UPDATE produtos SET imagem = 'sem-img.jpg' WHERE id = :id";
              $preparedStatment = $connection->prepare($sql);
              $preparedStatment->bindParam(":id", $id);
              $executionResult = $preparedStatment->execute();
              $connection->commit();
              $img_deletada = "../img/produtos/".$imagem;
              unlink($img_deletada);
              return 1;
            } catch (PDOException $exc) {
              if ((isset($connection)) && ($connection->inTransaction())) {
                  $connection->rollBack();
              }
              print $exc->getMessage();
            } finally {
                if (isset($connection)) {
                  unset($connection);
              }
            }
          }
      
          public function uploadImagem() {
            if(isset($_FILES['fileUpload']) and $_FILES['fileUpload'] != null){
                require_once ("../function/WideImage/WideImage.php"); //Inclui classe WideImage à página
      
                date_default_timezone_set("Brazil/East");
      
                $name 	= $_FILES['fileUpload']['name']; //Atribui uma array com os nomes dos arquivos à variável
                $tmp_name = $_FILES['fileUpload']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável
      
                    $dir = "../img/produtos/";
                    if (!file_exists($dir)) {
                        mkdir($dir, 0755);
                    }
      
                $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas
                for($i = 0; $i < count($tmp_name); $i++){ //passa por todos os arquivos
                    $ext = strtolower(substr($name[$i],-4));
                    if($ext == "jpeg") {$ext = ".jpeg";}
                        if(in_array($ext, $allowedExts)){ //Pergunta se a extensão do arquivo, está presente no array das extensões permitidas
                        $new_name = date("Ymd_His") . $i . $ext;
                        $image = WideImage::load($tmp_name[$i]); //Carrega a imagem utilizando a WideImage
                        $image = $image->resize(800, 600, 'outside'); //Redimensiona a imagem para 800 de largura e 600 de altura, mantendo
                        $image->saveToFile($dir.$new_name); //Salva a imagem
                        chmod($dir.$new_name, 0777);
                        return $new_name;
                    }
                }
            }
        }

        static public function ultimasMovimentacoes($id_produto){
            $connection = Produtos::conectar();
            try{
                $connection->beginTransaction();
                $sql = "SELECT * FROM movimento WHERE id_produto = :id_produto ORDER BY data Desc, id Desc Limit 10";
                $preparedStatment = $connection->prepare($sql);
                $preparedStatment->bindParam(":id_produto", $id_produto);
                $preparedStatment->execute();
                $executionResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
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

        static public function pegarValor($valor){
            return number_format($valor, 2, ',', '');
        }

        static public function pegarEstoque($qtd){
            if($qtd > 0){
				if($qtd > 2){
					$aviso_estoque = "Em estoque";
				}else{
					$aviso_estoque = "Estoque baixo";
				}
			}else{
				$aviso_estoque = "Sem estoque";
            }
            return $aviso_estoque;
        }

    }

?>