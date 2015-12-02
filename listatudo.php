<?php
if(isset($_GET['list'])){
	$dados=$_GET['list'];
	$vetor=unserialize($dados);
	
	echo "<table border='1' cellspacing='3' cellpadding='2'>";
echo "<td> <strong>ID da Peça</strong></td>
	  <td> <strong>Nome da Peça</strong> </td>
	  <td> <strong>Quantidade em Estoque</strong></td>
	  <td> <strong>Localização da Peça</strong></td>";
	
			foreach ($vetor as $dados){
				$idpeca=$dados['idpeca'];
				$nome=$dados['nome'];
				$qtd=$dados['qtd'];
				$loc=$dados['localizacao'];
			echo"
				<tr>
				<td width='20%'>$idpeca</td>
				<td width='20%'>$nome</td>
				<td width='20%'>$qtd</td>
				<td width='20%'>$loc </td>
				 <td width='20%'><a href=webservice.php?delhtml=$idpeca> DELETAR </a> </td>
				</tr>
				";
			}
			echo "</table>";
		} 
	
	//var_dump($vetor);
	
	




?>