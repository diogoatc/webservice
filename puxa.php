<?php
session_start();
$recebe=$_GET['json'];
echo $recebe;

$dados_decode[] = json_decode($recebe,true);

var_dump($dados_decode);

foreach ($dados_decode as $dados){
	if(is_array($dados)){
		foreach ($dados as $dados2){
		
		
	echo "<b> Código: </b>". $dados2['idpeca']."<br/>";
	echo "<b> Nome: </b>". $dados2['nome']."<br/>";
	echo "<b> Quantidade:</b> ". $dados2['qtd']."<br/>";
	echo "<b> Localizacao:</b> ". $dados2['localizacao']."<br/>";
	
			}
		
		
}
}

?>