<?php
session_start();
$recebe=$_GET['json'];
echo $recebe;

$dados_decode[] = json_decode($recebe,true);

var_dump($dados_decode);
$num=0;
foreach ($dados_decode as $dados){
	if(is_array($dados)){
		foreach ($dados as $dados2){
	
	echo "<b> Código: </b>: ". $dados2['id']."<br/>";
	echo "<b> Nome: </b>: ". $dados2['Nome do post']."<br/>";
	$num++;
		}
}
}

?>