<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="restrito/style.css" rel="stylesheet" type="text/css" media="screen">
		<title>Ficha de Classificação</title>
	</head>
	<body>
		<table>
		<?php
			set_time_limit ( 0 );
			date_default_timezone_set('America/Sao_Paulo');
			//require_once("dao\\IDAO.class.php");
			require_once("restrito/dao/DBFactory.class.php");

			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			$sql = "SELECT * FROM tema_ambiental WHERE id = 5";
			$result = mysql_query($sql);

			while($data = mysql_fetch_array($result)){
				echo "<tr><pre>";
				print_r($data);
				echo "</pre></tr>";
			}
		?>
		</table>
	</body>
</html>