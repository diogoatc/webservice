<?php

	/* Solicita o parâmetro "usuario"  */
	if(isset($_GET['usuario']) and intval($_GET['usuario'])) {
	
		/* verifica se a variável foi passada, ou define o valor das variáveis */
		$numero_de_artigos = isset($_GET['artigos']) ? intval($_GET['artigos']) : 10; //10 é o padrão
		$id_do_usuario = $_GET['usuario']; //sem valor padrão
		
		/* conecta ao banco de dados */
		$mysqli = new mysqli('localhost','root','','list');
		if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
		/* seleciona os artigos do banco de dados */
		$sql = "SELECT guid, post_title FROM wp_posts WHERE post_author = $id_do_usuario LIMIT $numero_de_artigos";
		$query= $mysqli->query($sql);
		
		/* cria um array mestre com os registros */
		$artigos = array();
		while ($dados = $query->fetch_array()) {
				$artigos[] = array('post'=>$dados);
			}
		}
		
		/* extrai os dados no formato expecificado */
		
			header('Content-type: application/json');
			echo json_encode(array("artigos"=>$artigos));
			
		
		


?>