<html>
<head>
	<meta charset="utf-8">
	</head>
<body>
<?php
	set_time_limit ( 0 );
	date_default_timezone_set('America/Sao_Paulo');
	//require_once("dao\\IDAO.class.php");
	require_once("dao/DBFactory.class.php");

	$sql = "SELECT e1.consolidada, v2.educacao_superior FROM ficha_classificacao e1, modalidade v2 WHERE e1.consolidada = 1 AND v2.educacao_superior = 1 ORDER BY id ASC";
	DBFactory::getConnection();
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	$result = mysql_query($sql);
	$i = 0;
	$fichas=null;
	while($data = mysql_fetch_assoc($result)){
			echo"<pre>";
			print_r($data);
			echo"</pre>";
	} 
?>
	</body>
</html>