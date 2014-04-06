<?php
/**
*	@file
*		Arquivo de requisições AJAX do projeto
*/

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

date_default_timezone_set('America/Sao_Paulo');
include_once("../dao/Foco.class.php");
include_once("../dao/FocoDAO.class.php");

error_reporting(0);

$response = array();
/* Tema de Estudo (foco) */
if($_GET['term']){
	$fdao=new FocoDAO();
	$todosFocos=$fdao->selectData($_GET['term']);
	if(isset($todosFocos)){
		foreach($todosFocos as $f){
			$valor=$f->getFoco();
			$response[] = array(
				"value" => $valor
			);
		}
	}
}
print_r(json_encode($response));