<html>
	<head>
		<link rel="stylesheet" href="_css/comentarios.css"/>
		<meta charset="UTF-8"/>
		<title>Danilo Macedo Bakun</title>
	</head>
	<body>
		<div id="menu">
			<nav>
				<ul type="disc">
					<li><a href="index.html">Home</a></li>
					<li><a href="curriculo.html">Currículo</a></li>
					<li><a href="contato.html">Contato</a></li>
					<li><a href="comentarios.php">Comentários</a></li>
					<li><a href="videos.html">Vídeos</a></li>
					<li><a href="login.html">Login</a></li>
				</ul>
			</nav>
		</div>
		
		<div id="tudo">
			<?php
				$con = mysqli_connect('localhost','root','','dmb') or die('Erro ao conectar ao banco de dados');
				
				$consulta = "SELECT * FROM mensagem";
				$sqlc = mysqli_query($con,$consulta) or die("Erro ao tentar consultar registro");
				while($aux = mysqli_fetch_assoc($sqlc)) 
				{ 
					
					echo "<div id='comentario'><h1>".$aux["nome"].": </h1>";
					echo "<h2>".$aux["mensagem"]."</h2></div><br>";
				}
				
				mysqli_close($con);
			?>
			
			<form id="formulario" action="enviar.php" method="POST">
				<h1>Nome:</h1>
				<input type="text" id="nome" name="Nome" placeholder="Digite um identificador para o seu comentário." required><br>
				<h2>Mensagem: </h2><br>
				<textarea  id="mensagem" name="Mensagem" placeholder="Digite aqui sua mensagem e clique em Enviar ao terminar." required></textarea><br>
				<input type="submit" id="enviar" name="enviar" value="Enviar">
			</form>
		</div>
	</body>
</html>