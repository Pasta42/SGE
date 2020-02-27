<?php
	include_once("../class/fornecedores.class.php");

	$obj = new Fornecedor;
	if(isset($_GET['buscar']))
		$retorno = $obj->Listar('where id="'.$_GET['buscar'].'" or nome like "'.$_GET['buscar'].'"');
	else
		$retorno = $obj->Listar();
		if($retorno ==''){
			echo "
					<tr>
						<td colspan='5'>
							Sua busca não retornou nenhum resultado, tente novamente
						</td>
					</tr>";}
		else {
			foreach ($retorno as $linha){
			echo "<tr>
						<td>$linha->nome</td>
						<td>$linha->cnpj</td>
                        <td>$linha->telefone</td>
                        <td>$linha->email</td>
						<td><a href='editafornecedor.php?id=$linha->id' class='btn btn-warning' alt='Editar' title='Editar'><i class='fas fa-edit'></i></a></td>
						<td><a href='excluirfornecedor.php?id=$linha->id' class='btn btn-warning' alt='Excluir' title='Excluir'><i class='fas fa-trash'></i></a></td>
					</tr>";
			}
		}
?>