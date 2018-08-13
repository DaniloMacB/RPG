<?php
	$strcon = mysqli_connect('localhost','root','','dmb') or die('Erro ao conectar ao banco de dados');
	
	if (isset($_POST['Nome']) === true) 
	{
		$nome = $_POST['Nome'];
	} 
	else 
	{
		$nome = false;
	}
	
	if (isset($_POST['Mensagem']) === true) 
	{
		$mensagem = $_POST['Mensagem'];
	} 
	else 
	{
		$mensagem = false;
	}
	
	$sql = "INSERT INTO mensagem VALUES ('default','$nome', '$mensagem')";
	mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
	mysqli_close($strcon);
	
	header("Location: comentarios.php");
?>