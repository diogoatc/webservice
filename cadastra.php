<form method="post" action="">
<input name="id" placeholder="id">
<input name="nome" placeholder="nome">
<input name="quantidade" placeholder="qtd">
<input name="localizacao" placeholder="loca">
<input type="submit" name="envia">

</form>

<?php
if(isset($_POST['envia'])){
	
	$id=$_POST['id'];
	$nome=$_POST['nome'];
	$qtd=$_POST['quantidade'];
	$localizacao=$_POST['localizacao'];
	
	$dados=array("id"=>$id, "nome"=>$nome, "qtd"=>$qtd, "localizacao"=>$localizacao);
	$insertjson=json_encode($dados);
	header("location:webservice.php?htmlins=$insertjson");
	
	
}





?>