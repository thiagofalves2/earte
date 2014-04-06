<?php
/**
*	@file
*		Arquivo de requisições AJAX do projeto
*/

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

date_default_timezone_set('America/Sao_Paulo');
include_once("../dao/Outra_area.class.php");
include_once("../dao/Outra_areaDAO.class.php");

error_reporting(0);

$response = array();
/* outra area área curricular */
if($_GET['term']){
	$oadao=new Outra_areaDAO();
	$todasOutr=$oadao->selectData($_GET['term']);
	if(isset($todasOutr)){
		foreach($todasOutr as $o){
			$valor=$o->getOutra_area();
			$response[] = array(
				"value" => $valor
			);
		}
	}
}
print_r(json_encode($response));