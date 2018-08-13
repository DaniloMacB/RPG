<?php
	header("Content-type: text/html; charset=utf-8");
	
	$connect = mysqli_connect('localhost','root','','dmb') or die('Erro ao conectar ao banco de dados');
	
	if (isset($_POST['usuario']) === true) 
	{
		$usuario = $_POST['usuario'];
	} 
	else 
	{
		$usuario = false;
	}
	
	if (isset($_POST['senha']) === true) 
	{
		$senha = MD5($_POST['senha']);
	} 
	else 
	{
		$senha = false;
	}
	
	if (isset($_POST['entrar']) === true) 
	{
		$entrar = $_POST['entrar'];
	} 
	else 
	{
		$entrar = false;
	}
	
	if (isset($entrar)) 
	{
		$query_select = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
		
		$verifica = mysqli_query($connect,$query_select) or die("erro ao selecionar");
		
		if (mysqli_num_rows($verifica)<=0)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Usuário e/ou senha incorretos');window.location.href='login.html';</script>";
			die();
        }
		else
		{
			setcookie("usuario",$usuario);
			echo "<script>alert('Login feito com sucesso!'); document.location.href='index.php';</script>";
        }
    }
?>