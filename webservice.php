<?php
	session_start();
	/* Solicita o parâmetro "idpeca"  */
	if(isset($_POST['idpeca'])) {
	
	
		$idpeca = $_POST['idpeca']; //guarda o valor do formulario na variavel
		/* conecta ao banco de dados */
		$mysqli = new mysqli('localhost','root','','pecas');
		if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
		/* seleciona os artigos do banco de dados */
		$sql = "SELECT * FROM listapecas WHERE id=$idpeca";
		$query= $mysqli->query($sql);
		
		/* cria um array mestre com os registros */
		$artigos = array();
		while ($dados = $query->fetch_array()) {
				$artigos[] =array($dados['id'],$dados['nome'],$dados['qtd'],$dados['localizacao']);
			}
		}
		
		//var_dump($artigos);
		
		// extrai os dados no formato expecificado 
		
		header('Content-type: application/json');
			$json= json_encode($artigos);
			header("location:puxa.php?json=$json");
			//echo $json;
			
		/*	$nojson = json_decode($json);
			
			var_dump($nojson);
		*/
		


?>