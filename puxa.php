<?php
session_start();
$recebe=$_GET['json'];
echo $recebe;

$dados_decode[] = json_decode($recebe,true);

foreach ($dados_decode as $dados){
	echo "<b> C�digo: </b>: ". $dados['id do post'];
	
}


?>