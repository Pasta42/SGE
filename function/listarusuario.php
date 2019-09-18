<?php
include_once "../class/usuarios.class.php";

	$obj = new Usuarios;
	if(isset($_GET['Buscar']))
		$retorno = $obj->listar('where id="'.$_GET['Buscar'].'" or nome like "'.$_GET['Buscar'].'"');
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
						<td>$linha->nome</td>
						<td>$linha->login</td>
						<td>".$obj->pegarPermissao($linha->permissao)."</td>
						<td><a href='editausuario.php?id=$linha->id' class='btn btn-warning'>Editar</a></td>
						<td><a href='excluirusuario.php?id=$linha->id' class='btn btn-warning'>Apagar</a></td>
					</tr>";
			}
		}
?>