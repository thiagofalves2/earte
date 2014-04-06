<?php
	session_start();
	if(isset($_POST['user'])&&$_POST['user']==="abdalawiller"&&$_POST['pass']==="zucki3505"){
		$_SESSION['logado'] = 1;
		header("Location: index.php");
	}else if(isset($_POST['user'])||isset($_POST['pass'])){
		$error = "Usuário ou senhas incorretos";
	}

	if(isset($_GET['erro'])&&$_GET['erro']){
		$error = "Acesso Negado";
	}

?>
<html>
	<head>
		<title>Sistema Earte | Login</title>
		<meta charset="utf-8">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="style.css" rel="stylesheet" type="text/css" media="screen">
	</head>

	<body id="login">
		<h2>Sistema EArte</h2>
		<form method="post">
			<fieldset id="login">
				<?php if(isset($error)){ echo "<p>".$error."</p>"; } ?>
				<label class="loginfields">
					Login
					<input type="text" name="user">
				</label><br>
				<label class="loginfields">
					Senha
					<input type="password" name="pass">
				</label>
				<input class="loginbutton" type="submit" value="acessar">
			</fieldset>
	</body>
</html>
