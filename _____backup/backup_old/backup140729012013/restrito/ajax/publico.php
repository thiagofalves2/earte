<?php
/**
*	@file
*		Arquivo de requisições AJAX do projeto
*/

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

date_default_timezone_set('America/Sao_Paulo');
include_once("../dao/Publico_envolvido.class.php");
include_once("../dao/Publico_envolvidoDAO.class.php");

error_reporting(0);

$response = array();
/* outra area área curricular */
if($_GET['term']){
	$pedao=new Publico_envolvidoDAO();
	$todosPubl=$pedao->selectData($_GET['term']);
	if(isset($todosPubl)){
		foreach($todosPubl as $p){
			$valor=$p->getPublico_envolvido();
			$response[] = array(
				"value" => $valor
			);
		}
	}
}
print_r(json_encode($response));