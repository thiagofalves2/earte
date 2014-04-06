<?php include_once("logado.php"); paginaRestrita(); ?>
<?php 
header("Content-type: application/octet-stream");
header("Cache-control: private");
header("Content-Disposition: attachment; filename=\"earte.sql\"");

error_reporting(0);

$dbname = "earte"; 

set_time_limit ( 0 );
date_default_timezone_set('America/Sao_Paulo');
//require_once("dao\\IDAO.class.php");
require_once("dao/DBFactory.class.php");

DBFactory::getConnection();
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

// Pega a lista de todas as tabelas 
$res = mysql_list_tables($dbname) or die(mysql_error()); 
while ($row = mysql_fetch_row($res)) { 
	$table = $row[0]; // cada uma das tabelas 
	$res2 = mysql_query("SHOW CREATE TABLE $table"); 
	while ( $lin = mysql_fetch_row($res2)){ // Para cada tabela 
		echo "$lin[1];\n"; 
		$res3 = mysql_query("SELECT * FROM $table"); 
		while($r=mysql_fetch_row($res3)){ // Dump de todos os dados das tabelas 
			for($i=0,$l=count($r);$i<$l;$i++){
				$r[$i] = addslashes($r[$i]);
			}
			$sql="INSERT INTO `$table` VALUES ('"; 
			$sql .= implode("','",$r); 
			$sql .= "');\n"; 
			echo $sql; 
		} 
	} 
} 