<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="style.css" rel="stylesheet" type="text/css" media="screen">
		<link href="print.css" rel="stylesheet" type="text/css" media="print">
		<title>Ficha de Classificação</title>
	</head>
	<body>
		<br /><center>Ficha de Classificação</center><br />
		<a href="formulario.php">Adicionar Nova Ficha</a><br /><br /><hr />
		<table>
		<?php
			set_time_limit ( 0 );
			date_default_timezone_set('America/Sao_Paulo');
			//require_once("dao\\IDAO.class.php");
			//include("dao\\DBFactory.class.php");
			
			/* declaracao de algumas variaves relevantes */
			$hostname   = "sbd01.rc.unesp.br";
			$username   = "anonymous";
			$password   = "eu90012dig";
			$dbname     = "projetoearte";

			/* cria conexao para o usuario anonymous */
			$conexao = MYSQL_CONNECT($hostname, $username, $password) OR DIE("Nao foi possivel conectar o usuario");

			/* seleciona base de dados */
			@mysql_select_db($dbname) or die("Nao foi possível conectar ao banco de dados");
			
			$sql = "SELECT * FROM ficha_classificacao ORDER BY id ASC";
	
			//DBFactory::getConnection();
			
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');
			$result = mysql_query($sql);
			$i = 0;
			$fichas=null;
			while($data = mysql_fetch_array($result)){
				$fichas[$i] = array($data['id'],$data['codigo']);	
				$i++;
			}

			$sql = "SELECT * FROM identificacao ORDER BY id ASC";
			$result = mysql_query($sql);
			$i = 0;
			$titulos=null;
			while($data = mysql_fetch_array($result)){
				$titulos[$i] = $data['titulo'];
				$i++;
			}
			
			/* fecha a conexao */
			MYSQL_CLOSE();
			//DBFactory::closeConnection();

			if(isset($fichas)){
				foreach($fichas as $i=>$f){
					$titulo=$titulos[$i];
					$id_ficha=$fichas[$i][0];
					$codigo = $fichas[$i][1];
					echo"<tr>
					<td>$codigo</td>
					<td>$titulo</td>
					<td><a href=\"formulario.php?id=$id_ficha\"><img src=\"editar.png\" alt=\"Editar\" /></a></td>
					</tr>";
				}
			} else {
				echo "<br />Nenhuma ficha cadastrada";
			}
		?>
		</table>
	</body>
</html>