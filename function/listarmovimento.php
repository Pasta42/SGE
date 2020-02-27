<?php
	include_once("../class/movimentos.class.php");

	$obj = new Movimentos;
	if(isset($_GET['buscar']))
		$retorno = $obj->listar('where id="'.$_GET['buscar'].'" or nome like "'.$_GET['buscar'].'"');
	else
		$retorno = $obj->listar();
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
						<td>$linha->quantidade</td>
                        <td>$linha->id_produto</td>
                        <td>$linha->data</td>
						<td>".$obj->pegarmovimentacao($linha->movimentacao)."</td>
						<td><a href='editarmovimento.php?id=$linha->id' class='btn btn-warning'>Editar</a></td>
						<td><a href='excluirmovimento.php?id=$linha->id' class='btn btn-warning'>Apagar</a></td>
					</tr>";
			}
		}
?>