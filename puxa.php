<?php
session_start();
$recebe=$_GET['json'];
echo $recebe;

$dados_decode[] = json_decode($recebe,true);

var_dump($dados_decode);
$num=0;
foreach ($dados_decode as $dados){
	echo "<b> Código: </b>: ". $dados[$num]['id'];
	echo "<b> Nome: </b>: ". $dados[$num]['Nome do post'];
	$num++;
	
}


?>