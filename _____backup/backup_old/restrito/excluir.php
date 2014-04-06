<?php include_once("logado.php"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="style.css" rel="stylesheet" type="text/css" media="screen">
		<link href="print.css" rel="stylesheet" type="text/css" media="print">
		<title>Ficha de Classificação</title>
	</head>
	<body>
		<br /><center>Ficha de classificação</center><br/ ><br /><hr />
		<?php
			include_once("dao/Ficha_classificacao.class.php");
			include_once("dao/Ficha_classificacaoDAO.class.php");
			include_once("dao/Identificacao.class.php");
			include_once("dao/IdentificacaoDAO.class.php");
			include_once("dao/Contexto_educacional.class.php");
			include_once("dao/Contexto_educacionalDAO.class.php");
			include_once("dao/Modalidades.class.php");
			include_once("dao/ModalidadesDAO.class.php");
			include_once("dao/Area_curricular.class.php");
			include_once("dao/Area_curricularDAO.class.php");
			include_once("dao/Area_licenciatura.class.php");
			include_once("dao/Area_licenciaturaDAO.class.php");
			include_once("dao/Outra_area.class.php");
			include_once("dao/Outra_areaDAO.class.php");
			include_once("dao/Publico_envolvido.class.php");
			include_once("dao/Publico_envolvidoDAO.class.php");
			include_once("dao/Area_conhecimento.class.php");
			include_once("dao/Area_conhecimentoDAO.class.php");
			include_once("dao/Tema_ambiental.class.php");
			include_once("dao/Tema_ambientalDAO.class.php");
			include_once("dao/Tema_estudo.class.php");
			include_once("dao/Tema_estudoDAO.class.php");
			include_once("dao/Foco.class.php");
			include_once("dao/FocoDAO.class.php");
			include_once("dao/Resumo.class.php");
			include_once("dao/ResumoDAO.class.php");
			include_once("dao/Detalhes_finais.class.php");
			include_once("dao/Detalhes_finaisDAO.class.php");
			if(isset($_GET["id"])&&$_GET["id"]!=null){
				$id_ficha = $_GET["id"];
				$fdao = new Ficha_classificacaoDAO();
				$ficha=$fdao->selectDataForCode($id_ficha);
				
				$id_ident=$ficha->getId_identificacao();
				$idao=new IdentificacaoDAO();
				$identificacao=$idao->selectDataForCode($id_ident);
				$idao->deleteData($identificacao);
				
				$id_contexto_educacional=$ficha->getId_contexto_educacional();
				$cdao=new Contexto_educacionalDAO();
				$contexto_educacional=$cdao->selectDataForCode($id_contexto_educacional);
				$cdao->deleteData($contexto_educacional);
				
				$id_tema_estudo=$ficha->getId_tema_estudo();
				$tedao=new Tema_estudoDAO();
				$tema_estudo=$tedao->selectDataForCode($id_tema_estudo);
				$tedao->deleteData($tema_estudo);
				
				$id_resumo=$ficha->getId_resumo();
				$rdao=new ResumoDAO();
				$resumo=$rdao->selectDataForCode($id_resumo);
				$rdao->deleteData($resumo);
				
				$id_detalhes_finais=$ficha->getId_detalhes_finais();
				$dfdao=new Detalhes_finaisDAO();
				$detalhes_finais=$dfdao->selectDataForCode($id_detalhes_finais);
				$dfdao->deleteData($detalhes_finais);
				
				$id_area_conhecimento=$ficha->getId_area_conhecimento();
				$acdao=new Area_conhecimentoDAO();
				$area_conhecimento=$acdao->selectDataForCode($id_area_conhecimento);
				$acdao->deleteData($area_conhecimento);
				
				$id_modalidades=$ficha->getId_modalidades();
				$mdao=new ModalidadesDAO();
				$modalidades=$mdao->selectDataForCode($id_modalidades);
				$mdao->deleteData($modalidades);
				
				$id_area_curricular=$ficha->getId_area_curricular();
				$acrdao=new Area_curricularDAO();
				$area_curricular=$acrdao->selectDataForCode($id_area_curricular);
				$acrdao->deleteData($area_curricular);
				
				$fdao->deleteData($ficha);
				
				echo "A ficha foi excluída com sucesso<br /><br /><a href=\"index.php\" alt=\"Voltar\">Voltar</a>";
			} else {
				echo "Nenhuma ficha foi excluída<br /><br /><a href=\"index.php\" alt=\"Voltar\">Voltar</a>";
			}
		?>
	</body>
</html>