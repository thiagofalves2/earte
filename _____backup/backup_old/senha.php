<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
ob_start();

$login = "earte"; //armazena o usuário dentro da variável $login
$senha = "projetoearte123"; //armazena a senha dentro da variável $senha

if ($login == $_POST['user'] && $senha == $_POST['pwd'])
{

$valida = 1;
$usuario = $_POST['user'];

session_start();

$_SESSION['user'] = $usuario;
$_SESSION['valida'] = $valida;

header ("Location: http://www.epea.tmp.br/earte/earte/");

}

else
{
?>
<script type="text/javascript">
alert("Login ou senha incorreta")
</script>

<?php
echo "<a href=index_ficha.html>VOLTAR</a>";
}
?>

</body>
</html>