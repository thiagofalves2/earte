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

			$result = mysql_query("SELECT ficha FROM information_schema.tables");

			$result = mysql_query("SELECT id FROM ficha_classificacao WHERE consolidada = 1");

			/*$sql = "SELECT publico_envolvido FROM publico_envolvido";
			$result = mysql_query($sql);
*/
			$pub = array();

			while($data = mysql_fetch_array($result)){
				$result2 = mysql_query("SELECT tema_ambiental FROM tema_ambiental_keys WHERE ficha = ".$data[0]);
				while($data2 = mysql_fetch_array($result2)){
					echo "<tr><pre>";
					$pub[] = $data2[0];
					echo "</pre></tr>";		
				}
			}

			$pub = array_unique($pub);

			sort($pub);

			$pub2 = array();

			foreach ($pub as $p) {
				$result3 = mysql_query("SELECT tema_ambiental FROM tema_ambiental WHERE id = $p");
				$pub2[] = ucfirst(trim(mysql_result($result3, 0)));
			}

			sort($pub2);

			foreach ($pub2 as $p) {
				echo $p.'<br>';
			}
		?>
		</table>
	</body>
</html>