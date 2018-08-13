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
	
	$query_select = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
	$select = mysqli_query($connect,$query_select) or die("Erro ao tentar cadastrar registro");
	$array = mysqli_fetch_array($select);
	$usuarioarray = $array['usuario'];
 
	if($usuario == "" || $usuario == null)
	{
		echo"<script language='javascript' type='text/javascript'>alert('O campo usuário deve ser preenchido');window.location.href='cadastro.html';</script>"; 
    }
	else
	{
      if($usuarioarray == $usuario)
	  {
        echo"<script language='javascript' type='text/javascript'>alert('Esse usuário já existe');window.location.href='login.html';</script>";
        die();
      }
	  else
	  {
        $query = "INSERT INTO usuarios (usuario,senha) VALUES ('$usuario','$senha')";
        $insert = mysqli_query($connect,$query);
         
        if($insert)
		{
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }
		else
		{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>