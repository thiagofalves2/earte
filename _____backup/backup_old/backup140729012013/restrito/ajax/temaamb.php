<?php
/**
*	@file
*		Arquivo de requisições AJAX do projeto
*/

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

date_default_timezone_set('America/Sao_Paulo');
include_once("../dao/Tema_ambiental.class.php");
include_once("../dao/Tema_ambientalDAO.class.php");

error_reporting(0);

$response = array();
/* Tema ambiental */
if($_GET['term']){
	$tadao=new Tema_ambientalDAO();
	$todosTemas=$tadao->selectData($_GET['term']);
	if(isset($todosTemas)){
		foreach($todosTemas as $t){
			$valor=$t->getTema_ambiental();
			$id=$t->getId();
			$response[] = array(
				"value" => $valor
			);
		}
	}
}

print_r(json_encode($response));