<?php
	session_start();
	if(!$_SESSION['logado']){
		$_SESSION['logado'] = 0;
		session_destroy();
		header('Location: http://www.rc.unesp.br/earte/?erro=1');
	}
?>