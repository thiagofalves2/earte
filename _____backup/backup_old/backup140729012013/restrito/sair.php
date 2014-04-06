<?php
	session_start();
	$_SESSION['logado'] = 0;
	session_destroy();
	header('Location: http://www.rc.unesp.br/earte/');
?>