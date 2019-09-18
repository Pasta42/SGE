<?php
include_once "../class/produtos.class.php";

	$obj = new Produtos;
	if(isset($_GET['Buscar']))
		$retorno = $obj->listar('where id="'.$_GET['Buscar'].'" or nome like "'.$_GET['Buscar'].'"');
	else
		$retorno = $obj->listar();
		if($retorno ==''){
			echo "
					<tr>
						<td colspan='8'>
							Sua busca não retornou nenhum resultado, tente novamente
						</td>
					</tr>";}
		else {
			foreach ($retorno as $linha){
			echo "<tr>
						<td>$linha->nome</td>
						<td>$linha->descricao</td>
                        <td>$linha->id_fornecedor</td>
                        <td>$linha->valcusto</td>
                        <td>$linha->valvenda</td>
						<td><a href='editarproduto.php?id=$linha->id' class='btn btn-warning'>Editar</a></td>
						<td><a href='excluirproduto.php?id=$linha->id' class='btn btn-warning'>Apagar</a></td>
					</tr>";
			}
		}
?>