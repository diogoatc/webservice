<?php
	session_start();
	/* Solicita o par�metro "usuario"  */
	if(isset($_POST['usuario'])) {
	
		/* verifica se a vari�vel foi passada, ou define o valor das vari�veis */
		$numero_de_artigos = isset($_POST['artigos']) ? intval($_POST['artigos']) : 10; //10 � o padr�o
		$id_do_usuario = $_POST['usuario']; //sem valor padr�o
		/* conecta ao banco de dados */
		$mysqli = new mysqli('localhost','root','','list');
		if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
		/* seleciona os artigos do banco de dados */
		$sql = "SELECT guid, post_title FROM wp_posts WHERE post_author = '$id_do_usuario' LIMIT $numero_de_artigos";
		$query= $mysqli->query($sql);
		
		/* cria um array mestre com os registros */
		$artigos = array();
		while ($dados = $query->fetch_array()) {
				$artigos[] = array("id do post"=>$dados['guid'], "Nome do post"=>$dados['post_title']);
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