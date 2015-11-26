<?php
	
/* conecta ao banco de dados */
		$mysqli = new mysqli('localhost','root','','pecas');
		if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
	
	if(isset($_GET['jsonins'])){    //recebe o json e cadastra a peça no BD
		
		$json=$_GET['jsonins'];
		$decodejson=json_decode($json,true);
		$id=(int)$decodejson['id']; //o decode transforma esses dados em string, nós devolvemos pra int
		$qtd=(int)$decodejson['qtd'];//o decode transforma esses dados em string, nós devolvemos pra int
		
		$stmt=$mysqli->prepare("INSERT INTO listapecas(id, 
nome,qtd,localizacao) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('isis', $id, $decodejson['nome'], $qtd, $decodejson['localizacao']);
		$stmt->execute();
		$stmt->close();
		echo "<h1>PEÇA INSERIDA COM SUCESSO</h1>";
		
		
	}elseif(isset($_GET['idpeca'])) { //lista uma peça
	
	
		$idpeca = $_GET['idpeca']; //guarda o valor do formulario na variavel
		
		/* seleciona as Peças do banco de dados */
		$sql = "SELECT * FROM listapecas WHERE id=$idpeca";
		$query= $mysqli->query($sql);
		
		// cria um array mestre com os registros 
		$artigos = array();
		while ($dados = $query->fetch_array()) {
				$artigos[] =array("idpeca"=>$dados['id'],"nome"=>$dados['nome'],"qtd"=>$dados['qtd'],"localizacao"=>$dados['localizacao']);
			}
			
			header('Content-type: application/json');
			$json= json_encode($artigos);
			header("location:puxa.php?json=$json");
			
		}elseif(isset($_GET['listatudo'])){  //lista todas as peças
				$sql= "SELECT * FROM listapecas";
				$query= $mysqli->query($sql);
				while ($dados = $query->fetch_array()){
				$listatudo[]=array("idpeca"=>$dados['id'],"nome"=>$dados['nome'],"qtd"=>$dados['qtd'],"localizacao"=>$dados['localizacao']);
				}
				$json= json_encode($listatudo);
				header("location:listatudo.php?json=$json");
			}else {
				echo "ERRO";	
	}


?>