<?php
	include_once("../class/produtos.class.php");

	$obj = new Produtos;

	$retorno = $obj->listar(" ORDER BY data_cadastro DESC LIMIT 20");
	if($retorno ==''){
		echo "
				<tr>
					<td colspan='8'>
						Sua busca não retornou nenhum resultado, tente novamente
					</td>
				</tr>";
	} else {
		foreach ($retorno as $linha){
			$qtd = 0;
			$consulta = $obj->retornarMovimentacao($linha->id);
			if($consulta != ""){
				foreach($consulta as $movimentacao){
					if($movimentacao->movimentacao == 1){
						$qtd += $movimentacao->quantidade;
					}elseif($movimentacao->movimentacao == 2){
						$qtd -= $movimentacao->quantidade;
					}
				}
			}


		echo "<tr>
					<td>
					<a href='verproduto.php?id=$linha->id'> <img src='../img/produtos/{$linha->imagem}' class='img_fluid' style='width: 80px; height: auto;'/> </a>
					</td>
					<td>
						<p> <a href='verproduto.php?id=$linha->id'>$linha->nome</a> <br>
						<i> ".strip_tags(substr_replace($linha->descricao, '...', 50))." </i></p>
					</td>
					<td>
						$qtd Itens <br> <small>".$obj->pegarEstoque($qtd)." </small>
					</td>
					<td>R$ ".$obj->pegarValor($linha->valcusto)."</td>
					<td>R$ ".$obj->pegarValor($linha->valvenda)."</td>
					<td><a href='addmovimento.php?id=$linha->id' class='btn btn-warning' alt='Movimentação' title='Movimentação'><i class='fas fa-sync-alt'></i></a></td>
					<td><a href='editaproduto.php?id=$linha->id' class='btn btn-warning' alt='Editar' title='Editar'><i class='fas fa-edit'></i></a></td>
					<td><a href='excluirproduto.php?id=$linha->id' class='btn btn-warning' alt='Excluir' title='Excluir'><i class='fas fa-trash'></i></a></td>
				</tr>";
		}

	}
?>