<?php
include_once "../class/fornecedores.class.php";

	$obj = new Fornecedor;
	if(isset($_GET['Buscar']))
		$retorno = $obj->Listar('where id="'.$_GET['Buscar'].'" or nome like "'.$_GET['Buscar'].'"');
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
						<td><a href='editafornecedor.php?id=$linha->id' class='btn btn-warning'>Editar</a></td>
						<td><a href='excluirfornecedor.php?id=$linha->id' class='btn btn-warning'>Apagar</a></td>
					</tr>";
			}
		}
?>