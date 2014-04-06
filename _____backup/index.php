<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="restrito/style.css" rel="stylesheet" type="text/css" media="screen">
		<title>Sistema EArte</title>
	</head>
	<body>
		<br /><center><h2>Sistema EArte</h2></center><br />

		<a class="button" href="busca.php">Buscar</a>
		<a class="button" href="logar.php">Log In</a><br><br>

		<table>
		<?php
			set_time_limit ( 0 );
			date_default_timezone_set('America/Sao_Paulo');
			//require_once("dao\\IDAO.class.php");
			require_once("restrito/dao/DBFactory.class.php");

			$sql = "SELECT f.id,f.codigo,f.consolidada,i.titulo FROM ficha_classificacao AS f LEFT JOIN identificacao AS i ON f.id = i.id WHERE f.consolidada = 1 ORDER BY f.id ASC";
			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');
			$result = mysql_query($sql);
			$i = 0;
			$fichas=null;
			while($data = mysql_fetch_array($result)){
				$fichas[$i] = array($data['id'],$data['codigo'],$data['consolidada'],$data['titulo']);
				$i++;
			}
			$i=0;
			DBFactory::closeConnection();
			if(isset($fichas)){
				while(isset($fichas[$i])){
					$titulo=$fichas[$i][3];
					$id_ficha=$fichas[$i][0];
					$codigo = $fichas[$i][1];
					$consolidada = ($fichas[$i][2])?"":"_nc";
					echo"<tr>
					<td>$codigo</td>
					<td>$titulo</td>
					</tr>";
					$i++;
				}
			} else {
				echo "<br />Nenhuma ficha cadastrada";
			}
		?>
		</table>
	</body>
</html>
