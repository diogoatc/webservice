<?php
	
/* conecta ao banco de dados */
		$mysqli = new mysqli('localhost','root','','pecas');
		if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
		function listatudo(){ //FUNÇÃO PARA LISTAR TODAS AS PEÇAS
			global $mysqli;
			$sql= "SELECT * FROM listapecas";
			$query= $mysqli->query($sql);
			while ($dados = $query->fetch_array()){
				$listatudo[]=array("idpeca"=>$dados['id'],"nome"=>$dados['nome'],"qtd"=>$dados['qtd'],"localizacao"=>$dados['localizacao']);
			}
			return $listatudo;
			
		}
		
		
		function cadastra($json){ //FUNÇÃO PARA CADASTRAR A PEÇA RECEBENDO UM JSON
			global $mysqli;
			$decodejson=json_decode($json,true);
			$id=(int)$decodejson['id']; //o decode transforma esses dados em string, nós devolvemos pra int
			$qtd=(int)$decodejson['qtd'];//o decode transforma esses dados em string, nós devolvemos pra int
			
			$stmt=$mysqli->prepare("INSERT INTO listapecas(id,nome,qtd,localizacao) VALUES (?, ?, ?, ?)");
			$stmt->bind_param('isis', $id, $decodejson['nome'], $qtd, $decodejson['localizacao']);
			$stmt->execute();
			$stmt->close();
		}
	
		function deleta($id){ //Recebe um id e deleta a peça
			global $mysqli;
			$stmt = $mysqli->prepare("DELETE FROM listapecas WHERE id = ?");
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
		}
	if(isset($_GET['jsonins'])){    //recebe o json, cadastra a peça no BD e retorna um JSON
			
		$json=$_GET['jsonins'];
		cadastra($json);
		$status=array("status"=>"inserted");
		$jsonsaida=json_encode($status);
		
		echo $jsonsaida;
		
		
		
		}elseif(isset($_GET['htmlins'])){    	//recebe o json, cadastra a peça no BD e retorna um html
			$json=$_GET['htmlins'];
			cadastra($json);
			echo "Peça cadastrada com sucesso";
			
		}
		
		
		
		elseif(isset($_GET['listajson'])){  //lista todas as peças em JSON
			
			
				$listatudo=listatudo();
				$json=json_encode($listatudo);
				echo $json;
				
				
			}elseif(isset($_GET['listahtml'])) { //Lista todas as peças em html
				$listatudo=listatudo();
				$lista=serialize($listatudo);
				
				
				header("location: listatudo.php?list=$lista");
				
			}elseif(isset($_GET['delhtml'])){ //DELETA AS PEÇAS E FAZ UMA SAÍDA HTML
				$id=$_GET['delhtml'];
				deleta($id);
				echo "Peça deletada com sucesso<br/>";
				echo "<a href='index.php'> INDEX </a>";
				
				
			}elseif(isset($_GET['deljson'])){ //DELTA AS PEÇAS E FAZ UMA SAÍDA JSON
				$id=$_GET['deljson'];
				deleta($id);
				$status=array("status"=>"deleted");
				$jsonsaida=json_encode($status);
		
		echo $jsonsaida;
	}else{
		echo "ERRO";
	}


?>