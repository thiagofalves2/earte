<?php
	session_start();
	if(isset($_POST['user'])&&$_POST['user']==="earte"&&$_POST['pass']==="prjearte"){
		$_SESSION['logado'] = 1;
		header("Location: restrito/index.php");
	}else if(isset($_POST['user'])||isset($_POST['pass'])){
		$error = "Usuário ou senhas incorretos";
	}

	if(isset($_GET['erro'])&&$_GET['erro']){
		$error = "Acesso Negado";
	}

?>
<html>
	<head>
		<title>EArte - Login</title>
		<meta charset="utf-8">
	</head>
	<body>
		<style>
			body{
				text-align: center;
			}
			form{
				width:300px;
				text-align: center;
				display: inline-block;
				zoom:1;
				*display:inline;
			}
		</style>
		<h1>Sistema EArte</h1>
		<form method="post">
			<fieldset>
				<?php if(isset($error)){ echo "<p>".$error."</p>"; } ?>
				<label>
					Login
					<input type="text" name="user">
				</label><br>
				<label>
					Senha
					<input type="password" name="pass">
				</label><br>
				<input type="submit" value="acessar">
			</fieldset>
	</body>
</html>