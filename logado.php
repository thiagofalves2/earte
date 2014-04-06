<?php
  session_start();

  function estaLogado(){
  	return isset($_SESSION['logado']);
  }
  
  function paginaRestrita(){
	  if(!$_SESSION['logado']){
	    $_SESSION['logado'] = 0;
	    session_destroy();
	    header('Location: http://www.earte.net/logar.php?erro=1');
	  }
	}
?>