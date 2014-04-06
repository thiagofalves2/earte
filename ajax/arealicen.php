<?php
/**
*	@file
*		Arquivo de requisições AJAX do projeto
*/

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

date_default_timezone_set('America/Sao_Paulo');
include_once("../dao/Area_licenciatura.class.php");
include_once("../dao/Area_licenciaturaDAO.class.php");

error_reporting(0);

$response = array();
/* licenciatura - area curricular */
if($_GET['term']){
	$aldao=new Area_licenciaturaDAO();
	$todasAreas=$aldao->selectData($_GET['term']);
	if(isset($todasAreas)){
		foreach($todasAreas as $a){
			$valor=$a->getArea_licenciatura();
			$id=$a->getId();
			$response[] = array(
				"value" => $valor
			);
		}
	}
}
print_r(json_encode($response));