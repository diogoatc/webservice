<?php
if(isset($_GET['json'])){
	$jsondecode=json_decode($_GET['json'],true);
	echo "<table border='1' cellspacing='3' cellpadding='2'>";
echo "<td> <strong>ID da Pe�a</strong></td>
	  <td> <strong>Nome da Pe�a</strong> </td>
	  <td> <strong>Quantidade em Estoque</strong></td>
	  <td> <strong>Localiza��o da Pe�a</strong></td>";
	
			foreach ($jsondecode as $dados2){
				$idpeca=$dados2['idpeca'];
				$nome=$dados2['nome'];
				$qtd=$dados2['qtd'];
				$loc=$dados2['localizacao'];
			echo"
				<tr>
				<td width='20%'>$idpeca</td>
				<td width='20%'>$nome</td>
				<td width='20%'>$qtd</td>
				<td width='20%'>$loc </td>
				 
				</tr>
				";
			}
			echo "</table>";
		}
	
	var_dump($jsondecode);
	
	




?>