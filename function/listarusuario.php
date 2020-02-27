<?php
	include_once("../class/usuarios.class.php");
	$obj = new Usuarios;
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
					<td><a href='editausuario.php?id=$linha->id' class='btn btn-warning'' alt='Editar' title='Editar'><i class='fas fa-edit'></i></a></td>
					<td><a href='excluirusuario.php?id=$linha->id' class='btn btn-warning'' alt='Excluir' title='Excluir'><i class='fas fa-trash'></i></a></td>
				</tr>";
		}
	}
?>