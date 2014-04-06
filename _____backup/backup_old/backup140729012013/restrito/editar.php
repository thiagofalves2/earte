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
		<br /><center>Ficha de Classificação</center><br/ ><br /><hr />
		<?php
			date_default_timezone_set('America/Sao_Paulo');
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
			function upper($str) {
				//$LATIN_UC_CHARS = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ";
				//$LATIN_LC_CHARS = "àáâãäåæçèéêëìíîïðñòóôõöøùúûüý";
				//$str = strtr($str, $LATIN_LC_CHARS, $LATIN_UC_CHARS);
				//$str = strtoupper($str);
				//
				// Função deprecated, não removida por ser usada
				return $str;
			}
			if(isset($_POST["idFicha"])&&$_POST["idFicha"]!=null&&$_POST["idFicha"]!=""){
				//Ficha de classificação
				$id_ficha = $_POST["idFicha"];
				$fidao = new Ficha_classificacaoDAO();
				$ficha=$fidao->selectDataForCode($id_ficha);
				$ficha->setCodigo($_POST["codigo"]);
				if(isset($_POST["consolidada"])&&$_POST["consolidada"]=="sim"){
					$ficha->setConsolidada(true);
				} else {
					$ficha->setConsolidada(false);
				}
				
				//Identificacao
				$id_ident=$ficha->getId_identificacao();
				$idao=new IdentificacaoDAO();
				$identificacao=$idao->selectDataForCode($id_ident);
				$identificacao->setTitulo(upper($_POST["titulo"]));
				$identificacao->setAutor_nome(upper($_POST["autor"]));
				$identificacao->setAutor_sobrenome(upper($_POST["sobrenome"]));
				$identificacao->setOrientador(upper($_POST["orientador"]));
				$identificacao->setAno_defesa($_POST["ano"]);
				$identificacao->setNumero_paginas($_POST["ndepaginas"]);
				$identificacao->setPrograma_pos(upper($_POST["programapos"]));
				$identificacao->setIes(upper($_POST["siglaies"]));
				$identificacao->setUnidade_setor(upper($_POST["unidadesetor"]));
				$identificacao->setEstado($_POST["estado"]);
				if(isset($_POST["cidade"])){
					$identificacao->setCidade($_POST["cidade"]);
				} else {
					$identificacao->setCidade("");
				}
				$identificacao->setGrau_titulacao_academica(upper($_POST["grautitulacao"]));
				$identificacao->setDependencia_administrativa(upper($_POST["depadm"]));
				$idao->updateData($identificacao);
				
				//Contexto educacional
				$id_contexto_educacional=$ficha->getId_contexto_educacional();
				$cdao=new Contexto_educacionalDAO();
				$contexto_educacional=$cdao->selectDataForCode($id_contexto_educacional);
				if(isset($_POST["opt1"])&&$_POST["opt1"]=="naoescolar"){
					$contexto_educacional->setContexto_nao_escolar(true);
				} else {
					$contexto_educacional->setContexto_nao_escolar(false);
				}
				if(isset($_POST["opt2"])&&$_POST["opt2"]=="escolar"){
					$contexto_educacional->setContexto_escolar(true);
				} else {
					$contexto_educacional->setContexto_escolar(false);
				}
				if(isset($_POST["opt3"])&&$_POST["opt3"]=="generica"){
					$contexto_educacional->setAbordagem_generica(true);
				} else {
					$contexto_educacional->setAbordagem_generica(false);
				}
				if(isset($_POST["qcontextEdu"])&&$_POST["qcontextEdu"]=="sim"){
					$contexto_educacional->setQcontexto_educacional(true);
				} else {
					$contexto_educacional->setQcontexto_educacional(false);
				}
				if(isset($_POST["qgenerica"])&&$_POST["qgenerica"]=="sim"){
					$contexto_educacional->setQabordagem_generica(true);
				} else {
					$contexto_educacional->setQabordagem_generica(false);
				}
				if(isset($_POST["qescolar"])&&$_POST["qescolar"]=="sim"){
					$contexto_educacional->setQcontexto_escolar(true);
				} else {
					$contexto_educacional->setQcontexto_escolar(false);
				}
				if(isset($_POST["qnaoEscolar"])&&$_POST["qnaoEscolar"]=="sim"){
					$contexto_educacional->setQcontexto_nao_escolar(true);
				} else {
					$contexto_educacional->setQcontexto_nao_escolar(false);
				}
				$cdao->updateData($contexto_educacional);
				
				//Tema ambiental
				/*$temaForm=$_POST["temaambS"];
				if($temaForm==""){
					$ficha->setId_tema_ambiental(null);
				} else if($temaForm=="new"){
					$novoTema=new Tema_ambiental("",upper($_POST["temaamb"]));
					$tadao=new Tema_ambientalDAO();
					$tadao->insertData($novoTema);
					$id=$tadao->getLastInsertedId();
					$ficha->setId_tema_ambiental($id);
				} else {
					$ficha->setId_tema_ambiental($temaForm);
				}*/
				$temaForm=$_POST["temaamb"];
				$ficha->setId_tema_ambiental(null);  //Fallback

				DBFactory::getConnection();

				if(isset($temaForm)&&$temaForm){
					$query = "DELETE FROM tema_ambiental_keys WHERE ficha=".$id_ident;
					mysql_query($query);
					
					$temasAmbientais = explode(";",$temaForm);
					foreach($temasAmbientais as $v){
						$v = trim($v);
						if($v!==''){
							$query = "SELECT id FROM tema_ambiental WHERE tema_ambiental='".$v."'";
							$query = mysql_query($query);
							if(mysql_num_rows($query)){
								$tema_ambiental_id = mysql_result($query, 0);
							}else{
								$query = "INSERT INTO tema_ambiental VALUES (null,'".$v."');";
								$query = mysql_query($query);
								$tema_ambiental_id = mysql_insert_id();
							}

							$query = "INSERT INTO tema_ambiental_keys VALUES (".$id_ident.",".$tema_ambiental_id.")";
							$query = mysql_query($query);
						}
					}
				}
				
				//Tema estudo
				$id_tema_estudo=$ficha->getId_tema_estudo();
				$tedao=new Tema_estudoDAO();
				$tema_estudo=$tedao->selectDataForCode($id_tema_estudo);
				if(isset($_POST["curriculos"])&&$_POST["curriculos"]=="sim"){
					$tema_estudo->setCurric_programas_projetos(true);
				} else {
					$tema_estudo->setCurric_programas_projetos(false);
				}
				if(isset($_POST["conteudo"])&&$_POST["conteudo"]=="sim"){
					$tema_estudo->setConteudo_metodos(true);
				} else {
					$tema_estudo->setConteudo_metodos(false);
				}
				if(isset($_POST["concepcoesformador"])&&$_POST["concepcoesformador"]=="sim"){
					$tema_estudo->setConcep_repres_percep_formador(true);
				} else {
					$tema_estudo->setConcep_repres_percep_formador(false);
				}
				if(isset($_POST["concepcoesaprendiz"])&&$_POST["concepcoesaprendiz"]=="sim"){
					$tema_estudo->setConcep_repres_percep_aprediz(true);
				} else {
					$tema_estudo->setConcep_repres_percep_aprediz(false);
				}
				if(isset($_POST["recursos"])&&$_POST["recursos"]=="sim"){
					$tema_estudo->setRecursos_didaticos(true);
				} else {
					$tema_estudo->setRecursos_didaticos(false);
				}
				if(isset($_POST["liguagemcognicao"])&&$_POST["liguagemcognicao"]=="sim"){
					$tema_estudo->setLinguagem_cognicao(true);
				} else {
					$tema_estudo->setLinguagem_cognicao(false);
				}
				if(isset($_POST["politicas"])&&$_POST["politicas"]=="sim"){
					$tema_estudo->setPoliticas_publicas_ea(true);
				} else {
					$tema_estudo->setPoliticas_publicas_ea(false);
				}
				if(isset($_POST["orientacao"])&&$_POST["orientacao"]=="sim"){
					$tema_estudo->setOrgan_instituicao_escolar(true);
				} else {
					$tema_estudo->setOrgan_instituicao_escolar(false);
				}
				if(isset($_POST["ong"])&&$_POST["ong"]=="sim"){
					$tema_estudo->setOrgan_nao_governamental(true);
				} else {
					$tema_estudo->setOrgan_nao_governamental(false);
				}
				if(isset($_POST["orggov"])&&$_POST["orggov"]=="sim"){
					$tema_estudo->setOrgan_governamental(true);
				} else {
					$tema_estudo->setOrgan_governamental(false);
				}
				if(isset($_POST["trabalho"])&&$_POST["trabalho"]=="sim"){
					$tema_estudo->setTrab_form_professores_agentes(true);
				} else {
					$tema_estudo->setTrab_form_professores_agentes(false);
				}
				if(isset($_POST["movimentos"])&&$_POST["movimentos"]=="sim"){
					$tema_estudo->setMovim_sociais_ambientalistas(true);
				} else {
					$tema_estudo->setMovim_sociais_ambientalistas(false);
				}
				if(isset($_POST["fundamentos"])&&$_POST["fundamentos"]=="sim"){
					$tema_estudo->setFundamentos_ea(true);
				} else {
					$tema_estudo->setFundamentos_ea(false);
				}
				if(isset($_POST["qCurrProgProj"])&&$_POST["qCurrProgProj"]=="sim"){
					$tema_estudo->setQcurric_programas_projetos(true);
				} else {
					$tema_estudo->setQcurric_programas_projetos(false);
				}
				if(isset($_POST["qconteudo"])&&$_POST["qconteudo"]=="sim"){
					$tema_estudo->setQconteudo_metodos(true);
				} else {
					$tema_estudo->setQconteudo_metodos(false);
				}
				if(isset($_POST["qconcepcoesformador"])&&$_POST["qconcepcoesformador"]=="sim"){
					$tema_estudo->setQconcep_repres_percep_formador(true);
				} else {
					$tema_estudo->setQconcep_repres_percep_formador(false);
				}
				if(isset($_POST["qconcepcoesaprendiz"])&&$_POST["qconcepcoesaprendiz"]=="sim"){
					$tema_estudo->setQconcep_repres_percep_aprediz(true);
				} else {
					$tema_estudo->setQconcep_repres_percep_aprediz(false);
				}
				if(isset($_POST["qrecursos"])&&$_POST["qrecursos"]=="sim"){
					$tema_estudo->setQrecursos_didaticos(true);
				} else {
					$tema_estudo->setQrecursos_didaticos(false);
				}
				if(isset($_POST["qliguagemcognicao"])&&$_POST["qliguagemcognicao"]=="sim"){
					$tema_estudo->setQlinguagem_cognicao(true);
				} else {
					$tema_estudo->setQlinguagem_cognicao(false);
				}
				if(isset($_POST["qpoliticas"])&&$_POST["qpoliticas"]=="sim"){
					$tema_estudo->setQpoliticas_publicas_ea(true);
				} else {
					$tema_estudo->setQpoliticas_publicas_ea(false);
				}
				if(isset($_POST["qorientacao"])&&$_POST["qorientacao"]=="sim"){
					$tema_estudo->setQorgan_instituicao_escolar(true);
				} else {
					$tema_estudo->setQorgan_instituicao_escolar(false);
				}
				if(isset($_POST["qong"])&&$_POST["qong"]=="sim"){
					$tema_estudo->setQorgan_nao_governamental(true);
				} else {
					$tema_estudo->setQorgan_nao_governamental(false);
				}
				if(isset($_POST["qorggov"])&&$_POST["qorggov"]=="sim"){
					$tema_estudo->setQorgan_governamental(true);
				} else {
					$tema_estudo->setQorgan_governamental(false);
				}
				if(isset($_POST["qtrabalho"])&&$_POST["qtrabalho"]=="sim"){
					$tema_estudo->setQtrab_form_professores_agentes(true);
				} else {
					$tema_estudo->setQtrab_form_professores_agentes(false);
				}
				if(isset($_POST["qmovimentos"])&&$_POST["qmovimentos"]=="sim"){
					$tema_estudo->setQmovim_sociais_ambientalistas(true);
				} else {
					$tema_estudo->setQmovim_sociais_ambientalistas(false);
				}
				if(isset($_POST["qfundamentos"])&&$_POST["qfundamentos"]=="sim"){
					$tema_estudo->setQfundamentos_ea(true);
				} else {
					$tema_estudo->setQfundamentos_ea(false);
				}
				if(isset($_POST["qtemaEst"])&&$_POST["qtemaEst"]=="sim"){
					$tema_estudo->setQtema_estudo(true);
				} else {
					$tema_estudo->setQtema_estudo(false);
				}
				//Outro Foco
				$tema_estudo->setId_foco(null); //Fallback

				DBFactory::getConnection();

				if(isset($_POST["outrofoco"])){
					$query = "DELETE FROM foco_keys WHERE ficha=".$id_ident;
					mysql_query($query);

					$focosTematicos = explode(";",$_POST['outrofoco']);
					foreach($focosTematicos as $v){
						$v = trim($v);
						if($v!==''){
						$query = "SELECT id FROM foco WHERE foco='".$v."'";
						$query = mysql_query($query);
						if(mysql_num_rows($query)){
							$foco_id = mysql_result($query, 0);
						}else{
							$query = "INSERT INTO foco VALUES (null,'".$v."');";
							$query = mysql_query($query);
							$foco_id = mysql_insert_id();
						}

						$query = "INSERT INTO foco_keys VALUES (".$id_ident.",".$foco_id.")";
						$query = mysql_query($query);
						}
					}
				}


				$tedao->updateData($tema_estudo);
				
				//Resumo
				$id_resumo=$ficha->getId_resumo();
				$rdao=new ResumoDAO();
				$resumo=$rdao->selectDataForCode($id_resumo);
				$resumo->setResumo(upper($_POST["resumo"]));
				$rdao->updateData($resumo);
				
				//Detalhes Finais
				$id_detalhes_finais=$ficha->getId_detalhes_finais();
				$dfdao=new Detalhes_finaisDAO();
				$detalhes_finais=$dfdao->selectDataForCode($id_detalhes_finais);
				$detalhes_finais->setObservacoes(upper($_POST["observacoes"]));
				$detalhes_finais->setPalavras_chave(upper($_POST["palavraschave"]));
				$detalhes_finais->setUrl_trabalho($_POST["linktese"]);
				$detalhes_finais->setUrl_resumo($_POST["linkresumo"]);
				$detalhes_finais->setDoc_classificado_por(upper($_POST["classificacao"]));
				$detalhes_finais->setData_classificacao(date('U'));
				$dfdao->updateData($detalhes_finais);
				
				//Público envolvido
				$publForm=$_POST["naoescolar"];
				$ficha->setId_publico_envolvido(null); //FALLBACK

				DBFactory::getConnection();

				if($publForm){
					$query = "DELETE FROM publico_envolvido_keys WHERE ficha=".$id_ident;
					mysql_query($query);

					$publicosEnvolvidos = explode(";",$publForm);
					foreach($publicosEnvolvidos as $v){
						$v = trim($v);
						if($v!==''){
						$query = "SELECT id FROM publico_envolvido WHERE publico_envolvido='".$v."'";
						$query = mysql_query($query);
						if(mysql_num_rows($query)){
							$publico_envolvido_id = mysql_result($query, 0);
						}else{
							$query = "INSERT INTO publico_envolvido VALUES (null,'".$v."');";
							$query = mysql_query($query);
							$publico_envolvido_id = mysql_insert_id();
						}

						$query = "INSERT INTO publico_envolvido_keys VALUES (".$id_ident.",".$publico_envolvido_id.")";
						$query = mysql_query($query);
						}
					}
				}

				//Area Conhecimento
				$id_area_conhecimento=$ficha->getId_area_conhecimento();
				$acdao=new Area_conhecimentoDAO();
				$area_conhecimento=$acdao->selectDataForCode($id_area_conhecimento);
				if(isset($_POST["agronomia"])&&$_POST["agronomia"]=="sim"){
					$area_conhecimento->setAgronomia(true);
				} else {
					$area_conhecimento->setAgronomia(false);
				}
				if(isset($_POST["arquitetura_urbanismo"])&&$_POST["arquitetura_urbanismo"]=="sim"){
					$area_conhecimento->setArquitetura_urbanismo(true);
				} else {
					$area_conhecimento->setArquitetura_urbanismo(false);
				}
				if(isset($_POST["biologia_geral"])&&$_POST["biologia_geral"]=="sim"){
					$area_conhecimento->setBiologia_geral(true);
				} else {
					$area_conhecimento->setBiologia_geral(false);
				}
				if(isset($_POST["direito"])&&$_POST["direito"]=="sim"){
					$area_conhecimento->setDireito(true);
				} else {
					$area_conhecimento->setDireito(false);
				}
				if(isset($_POST["educacao"])&&$_POST["educacao"]=="sim"){
					$area_conhecimento->setEducacao(true);
				} else {
					$area_conhecimento->setEducacao(false);
				}
				if(isset($_POST["filosofia"])&&$_POST["filosofia"]=="sim"){
					$area_conhecimento->setFilosofia(true);
				} else {
					$area_conhecimento->setFilosofia(false);
				}
				if(isset($_POST["geociencias"])&&$_POST["geociencias"]=="sim"){
					$area_conhecimento->setGeociencias(true);
				} else {
					$area_conhecimento->setGeociencias(false);
				}
				if(isset($_POST["historia"])&&$_POST["historia"]=="sim"){
					$area_conhecimento->setHistoria(true);
				} else {
					$area_conhecimento->setHistoria(false);
				}
				if(isset($_POST["matematica"])&&$_POST["matematica"]=="sim"){
					$area_conhecimento->setMatematica(true);
				} else {
					$area_conhecimento->setMatematica(false);
				}
				if(isset($_POST["quimica"])&&$_POST["quimica"]=="sim"){
					$area_conhecimento->setQuimica(true);
				} else {
					$area_conhecimento->setQuimica(false);
				}
				if(isset($_POST["saude_coletiva"])&&$_POST["saude_coletiva"]=="sim"){
					$area_conhecimento->setSaude_coletiva(true);
				} else {
					$area_conhecimento->setSaude_coletiva(false);
				}
				if(isset($_POST["turismo"])&&$_POST["turismo"]=="sim"){
					$area_conhecimento->setTurismo(true);
				} else {
					$area_conhecimento->setTurismo(false);
				}
				if(isset($_POST["antropologia"])&&$_POST["antropologia"]=="sim"){
					$area_conhecimento->setAntropologia(true);
				} else {
					$area_conhecimento->setAntropologia(false);
				}
				if(isset($_POST["arte"])&&$_POST["arte"]=="sim"){
					$area_conhecimento->setArte(true);
				} else {
					$area_conhecimento->setArte(false);
				}
				if(isset($_POST["comunicacaoejorn"])&&$_POST["comunicacaoejorn"]=="sim"){
					$area_conhecimento->setComunicacao_jornalismo(true);
				} else {
					$area_conhecimento->setComunicacao_jornalismo(false);
				}
				if(isset($_POST["ecologia"])&&$_POST["ecologia"]=="sim"){
					$area_conhecimento->setEcologia(true);
				} else {
					$area_conhecimento->setEcologia(false);
				}
				if(isset($_POST["eng_sanitaria"])&&$_POST["eng_sanitaria"]=="sim"){
					$area_conhecimento->setEngenharia_sanitaria(true);
				} else {
					$area_conhecimento->setEngenharia_sanitaria(false);
				}
				if(isset($_POST["fisica"])&&$_POST["fisica"]=="sim"){
					$area_conhecimento->setFisica(true);
				} else {
					$area_conhecimento->setFisica(false);
				}
				if(isset($_POST["geografia"])&&$_POST["geografia"]=="sim"){
					$area_conhecimento->setGeografia(true);
				} else {
					$area_conhecimento->setGeografia(false);
				}
				if(isset($_POST["letras"])&&$_POST["letras"]=="sim"){
					$area_conhecimento->setLetras(true);
				} else {
					$area_conhecimento->setLetras(false);
				}
				if(isset($_POST["psicologia"])&&$_POST["psicologia"]=="sim"){
					$area_conhecimento->setPsicologia(true);
				} else {
					$area_conhecimento->setPsicologia(false);
				}
				if(isset($_POST["recursos_floresais_eng_florestal"])&&$_POST["recursos_floresais_eng_florestal"]=="sim"){
					$area_conhecimento->setRec_florestais_eng_florestal(true);
				} else {
					$area_conhecimento->setRec_florestais_eng_florestal(false);
				}
				if(isset($_POST["sociologia"])&&$_POST["sociologia"]=="sim"){
					$area_conhecimento->setSociologia(true);
				} else {
					$area_conhecimento->setSociologia(false);
				}
				if(isset($_POST["administracao"])&&$_POST["administracao"]=="sim"){
					$area_conhecimento->setAdministracao(true);
				} else {
					$area_conhecimento->setAdministracao(false);
				}
				if(isset($_POST["administracao_rural"])&&$_POST["administracao_rural"]=="sim"){
					$area_conhecimento->setAdministracao_rural(true);
				} else {
					$area_conhecimento->setAdministracao_rural(false);
				}
				if(isset($_POST["astronomia"])&&$_POST["astronomia"]=="sim"){
					$area_conhecimento->setAstronomia(true);
				} else {
					$area_conhecimento->setAstronomia(false);
				}
				if(isset($_POST["biomedicina"])&&$_POST["biomedicina"]=="sim"){
					$area_conhecimento->setBiomedicina(true);
				} else {
					$area_conhecimento->setBiomedicina(false);
				}
				if(isset($_POST["botanica"])&&$_POST["botanica"]=="sim"){
					$area_conhecimento->setBotanica(true);
				} else {
					$area_conhecimento->setBotanica(false);
				}
				if(isset($_POST["carreira_religiosa"])&&$_POST["carreira_religiosa"]=="sim"){
					$area_conhecimento->setCarreira_religiosa(true);
				} else {
					$area_conhecimento->setCarreira_religiosa(false);
				}
				if(isset($_POST["ciencia_informacao"])&&$_POST["ciencia_informacao"]=="sim"){
					$area_conhecimento->setCiencia_informacao(true);
				} else {
					$area_conhecimento->setCiencia_informacao(false);
				}
				if(isset($_POST["ciencia_politica"])&&$_POST["ciencia_politica"]=="sim"){
					$area_conhecimento->setCiencia_politica(true);
				} else {
					$area_conhecimento->setCiencia_politica(false);
				}
				if(isset($_POST["ciencias_atuariais"])&&$_POST["ciencias_atuariais"]=="sim"){
					$area_conhecimento->setCiencias_atuariais(true);
				} else {
					$area_conhecimento->setCiencias_atuariais(false);
				}
				if(isset($_POST["comunicacao"])&&$_POST["comunicacao"]=="sim"){
					$area_conhecimento->setComunicacao(true);
				} else {
					$area_conhecimento->setComunicacao(false);
				}
				if(isset($_POST["demografia"])&&$_POST["demografia"]=="sim"){
					$area_conhecimento->setDemografia(true);
				} else {
					$area_conhecimento->setDemografia(false);
				}
				if(isset($_POST["desenho_projetos"])&&$_POST["desenho_projetos"]=="sim"){
					$area_conhecimento->setDesenho_projetos(true);
				} else {
					$area_conhecimento->setDesenho_projetos(false);
				}
				if(isset($_POST["diplomacia"])&&$_POST["diplomacia"]=="sim"){
					$area_conhecimento->setDiplomacia(true);
				} else {
					$area_conhecimento->setDiplomacia(false);
				}
				if(isset($_POST["economia_domestica"])&&$_POST["economia_domestica"]=="sim"){
					$area_conhecimento->setEconomia_domestica(true);
				} else {
					$area_conhecimento->setEconomia_domestica(false);
				}
				if(isset($_POST["enfermagem"])&&$_POST["enfermagem"]=="sim"){
					$area_conhecimento->setEnfermagem(true);
				} else {
					$area_conhecimento->setEnfermagem(false);
				}
				if(isset($_POST["eng_agricola"])&&$_POST["eng_agricola"]=="sim"){
					$area_conhecimento->setEngenharia_agricola(true);
				} else {
					$area_conhecimento->setEngenharia_agricola(false);
				}
				if(isset($_POST["eng_cartografica"])&&$_POST["eng_cartografica"]=="sim"){
					$area_conhecimento->setEngenharia_cartografica(true);
				} else {
					$area_conhecimento->setEngenharia_cartografica(false);
				}
				if(isset($_POST["eng_agrimensura"])&&$_POST["eng_agrimensura"]=="sim"){
					$area_conhecimento->setEngenharia_agrimensura(true);
				} else {
					$area_conhecimento->setEngenharia_agrimensura(false);
				}
				if(isset($_POST["eng_materiais_metalurgica"])&&$_POST["eng_materiais_metalurgica"]=="sim"){
					$area_conhecimento->setEngenharia_materiais_metalurgica(true);
				} else {
					$area_conhecimento->setEngenharia_materiais_metalurgica(false);
				}
				if(isset($_POST["eng_producao"])&&$_POST["eng_producao"]=="sim"){
					$area_conhecimento->setEngenharia_producao(true);
				} else {
					$area_conhecimento->setEngenharia_producao(false);
				}
				if(isset($_POST["eng_eletrica"])&&$_POST["eng_eletrica"]=="sim"){
					$area_conhecimento->setEngenharia_eletrica(true);
				} else {
					$area_conhecimento->setEngenharia_eletrica(false);
				}
				if(isset($_POST["eng_navOc"])&&$_POST["eng_navOc"]=="sim"){
					$area_conhecimento->setEngenharia_naval_oceanica(true);
				} else {
					$area_conhecimento->setEngenharia_naval_oceanica(false);
				}
				if(isset($_POST["eng_quimica"])&&$_POST["eng_quimica"]=="sim"){
					$area_conhecimento->setEngenharia_quimica(true);
				} else {
					$area_conhecimento->setEngenharia_quimica(false);
				}
				if(isset($_POST["estudos_sociais"])&&$_POST["estudos_sociais"]=="sim"){
					$area_conhecimento->setEstudos_sociais(true);
				} else {
					$area_conhecimento->setEstudos_sociais(false);
				}
				if(isset($_POST["farmacologia"])&&$_POST["farmacologia"]=="sim"){
					$area_conhecimento->setFarmacologia(true);
				} else {
					$area_conhecimento->setFarmacologia(false);
				}
				if(isset($_POST["fisioterapia_terapia_ocupacional"])&&$_POST["fisioterapia_terapia_ocupacional"]=="sim"){
					$area_conhecimento->setFisioterapia_terapia_ocupacional(true);
				} else {
					$area_conhecimento->setFisioterapia_terapia_ocupacional(false);
				}
				if(isset($_POST["genetica"])&&$_POST["genetica"]=="sim"){
					$area_conhecimento->setGenetica(true);
				} else {
					$area_conhecimento->setGenetica(false);
				}
				if(isset($_POST["imunologia"])&&$_POST["imunologia"]=="sim"){
					$area_conhecimento->setImunologia(true);
				} else {
					$area_conhecimento->setImunologia(false);
				}
				if(isset($_POST["medicina"])&&$_POST["medicina"]=="sim"){
					$area_conhecimento->setMedicina(true);
				} else {
					$area_conhecimento->setMedicina(false);
				}
				if(isset($_POST["microbiologia"])&&$_POST["microbiologia"]=="sim"){
					$area_conhecimento->setMicrobiologia(true);
				} else {
					$area_conhecimento->setMicrobiologia(false);
				}
				if(isset($_POST["museologia"])&&$_POST["museologia"]=="sim"){
					$area_conhecimento->setMuseologia(true);
				} else {
					$area_conhecimento->setMuseologia(false);
				}
				if(isset($_POST["oceanografia"])&&$_POST["oceanografia"]=="sim"){
					$area_conhecimento->setOceanografia(true);
				} else {
					$area_conhecimento->setOceanografia(false);
				}
				if(isset($_POST["parasitologia"])&&$_POST["parasitologia"]=="sim"){
					$area_conhecimento->setParasitologia(true);
				} else {
					$area_conhecimento->setParasitologia(false);
				}
				if(isset($_POST["probabilidade_estatistica"])&&$_POST["probabilidade_estatistica"]=="sim"){
					$area_conhecimento->setProbabilidade_estatistica(true);
				} else {
					$area_conhecimento->setProbabilidade_estatistica(false);
				}
				if(isset($_POST["rec_pesqueiros_eng_pesca"])&&$_POST["rec_pesqueiros_eng_pesca"]=="sim"){
					$area_conhecimento->setRecursos_pesqueiros_engenharia_pesca(true);
				} else {
					$area_conhecimento->setRecursos_pesqueiros_engenharia_pesca(false);
				}
				if(isset($_POST["relacoes_publicas"])&&$_POST["relacoes_publicas"]=="sim"){
					$area_conhecimento->setRelacoes_publicas(true);
				} else {
					$area_conhecimento->setRelacoes_publicas(false);
				}
				if(isset($_POST["servico_social"])&&$_POST["servico_social"]=="sim"){
					$area_conhecimento->setServico_social(true);
				} else {
					$area_conhecimento->setServico_social(false);
				}
				if(isset($_POST["zoologia"])&&$_POST["zoologia"]=="sim"){
					$area_conhecimento->setZoologia(true);
				} else {
					$area_conhecimento->setZoologia(false);
				}
				if(isset($_POST["administracao_hosp"])&&$_POST["administracao_hosp"]=="sim"){
					$area_conhecimento->setAdministracao_hospitalar(true);
				} else {
					$area_conhecimento->setAdministracao_hospitalar(false);
				}
				if(isset($_POST["arqueologia"])&&$_POST["arqueologia"]=="sim"){
					$area_conhecimento->setArqueologia(true);
				} else {
					$area_conhecimento->setArqueologia(false);
				}
				if(isset($_POST["biofisica"])&&$_POST["biofisica"]=="sim"){
					$area_conhecimento->setBiofisica(true);
				} else {
					$area_conhecimento->setBiofisica(false);
				}
				if(isset($_POST["bioquimica"])&&$_POST["bioquimica"]=="sim"){
					$area_conhecimento->setBioquimica(true);
				} else {
					$area_conhecimento->setBioquimica(false);
				}
				if(isset($_POST["carreira_militar"])&&$_POST["carreira_militar"]=="sim"){
					$area_conhecimento->setCarreira_militar(true);
				} else {
					$area_conhecimento->setCarreira_militar(false);
				}
				if(isset($_POST["ciencia_computacao"])&&$_POST["ciencia_computacao"]=="sim"){
					$area_conhecimento->setCiencia_computacao(true);
				} else {
					$area_conhecimento->setCiencia_computacao(false);
				}
				if(isset($_POST["ciencia_alimentos"])&&$_POST["ciencia_alimentos"]=="sim"){
					$area_conhecimento->setCiencia_tecnologia_alimentos(true);
				} else {
					$area_conhecimento->setCiencia_tecnologia_alimentos(false);
				}
				if(isset($_POST["ciencias"])&&$_POST["ciencias"]=="sim"){
					$area_conhecimento->setCiencias(true);
				} else {
					$area_conhecimento->setCiencias(false);
				}
				if(isset($_POST["ciencias_sociais"])&&$_POST["ciencias_sociais"]=="sim"){
					$area_conhecimento->setCiencias_sociais(true);
				} else {
					$area_conhecimento->setCiencias_sociais(false);
				}
				if(isset($_POST["decoracao"])&&$_POST["decoracao"]=="sim"){
					$area_conhecimento->setDecoracao(true);
				} else {
					$area_conhecimento->setDecoracao(false);
				}
				if(isset($_POST["desenho_moda"])&&$_POST["desenho_moda"]=="sim"){
					$area_conhecimento->setDesenho_moda(true);
				} else {
					$area_conhecimento->setDesenho_moda(false);
				}
				if(isset($_POST["desenho_industrial"])&&$_POST["desenho_industrial"]=="sim"){
					$area_conhecimento->setDesenho_industrial(true);
				} else {
					$area_conhecimento->setDesenho_industrial(false);
				}
				if(isset($_POST["economia"])&&$_POST["economia"]=="sim"){
					$area_conhecimento->setEconomia(true);
				} else {
					$area_conhecimento->setEconomia(false);
				}
				if(isset($_POST["educacao_fisica"])&&$_POST["educacao_fisica"]=="sim"){
					$area_conhecimento->setEducacao_fisica(true);
				} else {
					$area_conhecimento->setEducacao_fisica(false);
				}
				if(isset($_POST["eng_aeroespacial"])&&$_POST["eng_aeroespacial"]=="sim"){
					$area_conhecimento->setEngenharia_aeroespacial(true);
				} else {
					$area_conhecimento->setEngenharia_aeroespacial(false);
				}
				if(isset($_POST["eng_biomedica"])&&$_POST["eng_biomedica"]=="sim"){
					$area_conhecimento->setEngenharia_biomedica(true);
				} else {
					$area_conhecimento->setEngenharia_biomedica(false);
				}
				if(isset($_POST["eng_civil"])&&$_POST["eng_civil"]=="sim"){
					$area_conhecimento->setEngenharia_civil(true);
				} else {
					$area_conhecimento->setEngenharia_civil(false);
				}
				if(isset($_POST["eng_armamentos"])&&$_POST["eng_armamentos"]=="sim"){
					$area_conhecimento->setEngenharia_armamentos(true);
				} else {
					$area_conhecimento->setEngenharia_armamentos(false);
				}
				if(isset($_POST["eng_minas"])&&$_POST["eng_minas"]=="sim"){
					$area_conhecimento->setEngenharia_minas(true);
				} else {
					$area_conhecimento->setEngenharia_minas(false);
				}
				if(isset($_POST["eng_transportes"])&&$_POST["eng_transportes"]=="sim"){
					$area_conhecimento->setEngenharia_transportes(true);
				} else {
					$area_conhecimento->setEngenharia_transportes(false);
				}
				if(isset($_POST["eng_mecatronica"])&&$_POST["eng_mecatronica"]=="sim"){
					$area_conhecimento->setEngenharia_mecatronica(true);
				} else {
					$area_conhecimento->setEngenharia_mecatronica(false);
				}
				if(isset($_POST["eng_nucl"])&&$_POST["eng_nucl"]=="sim"){
					$area_conhecimento->setEngenharia_nuclear(true);
				} else {
					$area_conhecimento->setEngenharia_nuclear(false);
				}
				if(isset($_POST["eng_textil"])&&$_POST["eng_textil"]=="sim"){
					$area_conhecimento->setEngenharia_textil(true);
				} else {
					$area_conhecimento->setEngenharia_textil(false);
				}
				if(isset($_POST["farmacia"])&&$_POST["farmacia"]=="sim"){
					$area_conhecimento->setFarmacia(true);
				} else {
					$area_conhecimento->setFarmacia(false);
				}
				if(isset($_POST["fisiologia"])&&$_POST["fisiologia"]=="sim"){
					$area_conhecimento->setFisiologia(true);
				} else {
					$area_conhecimento->setFisiologia(false);
				}
				if(isset($_POST["fonoaudiologia"])&&$_POST["fonoaudiologia"]=="sim"){
					$area_conhecimento->setFonoaudiologia(true);
				} else {
					$area_conhecimento->setFonoaudiologia(false);
				}
				if(isset($_POST["historia_natural"])&&$_POST["historia_natural"]=="sim"){
					$area_conhecimento->setHistoria_natural(true);
				} else {
					$area_conhecimento->setHistoria_natural(false);
				}
				if(isset($_POST["linguistica"])&&$_POST["linguistica"]=="sim"){
					$area_conhecimento->setLinguistica(true);
				} else {
					$area_conhecimento->setLinguistica(false);
				}
				if(isset($_POST["medicina_veterinaria"])&&$_POST["medicina_veterinaria"]=="sim"){
					$area_conhecimento->setMedicina_veterinaria(true);
				} else {
					$area_conhecimento->setMedicina_veterinaria(false);
				}
				if(isset($_POST["morfologia"])&&$_POST["morfologia"]=="sim"){
					$area_conhecimento->setMorfologia(true);
				} else {
					$area_conhecimento->setMorfologia(false);
				}
				if(isset($_POST["nutricao"])&&$_POST["nutricao"]=="sim"){
					$area_conhecimento->setNutricao(true);
				} else {
					$area_conhecimento->setNutricao(false);
				}
				if(isset($_POST["odontologia"])&&$_POST["odontologia"]=="sim"){
					$area_conhecimento->setOdontologia(true);
				} else {
					$area_conhecimento->setOdontologia(false);
				}
				if(isset($_POST["planejamento_urbano_regional"])&&$_POST["planejamento_urbano_regional"]=="sim"){
					$area_conhecimento->setPlanejamento_urbano_regional(true);
				} else {
					$area_conhecimento->setPlanejamento_urbano_regional(false);
				}
				if(isset($_POST["quimica_industrial"])&&$_POST["quimica_industrial"]=="sim"){
					$area_conhecimento->setQuimica_industrial(true);
				} else {
					$area_conhecimento->setQuimica_industrial(false);
				}
				if(isset($_POST["relacoes_internacionais"])&&$_POST["relacoes_internacionais"]=="sim"){
					$area_conhecimento->setRelacoes_internacionais(true);
				} else {
					$area_conhecimento->setRelacoes_internacionais(false);
				}
				if(isset($_POST["secretariado_executiva"])&&$_POST["secretariado_executiva"]=="sim"){
					$area_conhecimento->setSecretariado_executiva(true);
				} else {
					$area_conhecimento->setSecretariado_executiva(false);
				}
				if(isset($_POST["teologia"])&&$_POST["teologia"]=="sim"){
					$area_conhecimento->setTeologia(true);
				} else {
					$area_conhecimento->setTeologia(false);
				}
				if(isset($_POST["zootecnia"])&&$_POST["zootecnia"]=="sim"){
					$area_conhecimento->setZootecnia(true);
				} else {
					$area_conhecimento->setZootecnia(false);
				}
				if(isset($_POST["qagronomia"])&&$_POST["qagronomia"]=="sim"){
					$area_conhecimento->setQagronomia(true);
				} else {
					$area_conhecimento->setQagronomia(false);
				}
				if(isset($_POST["qarquitetura_urbanismo"])&&$_POST["qarquitetura_urbanismo"]=="sim"){
					$area_conhecimento->setQarquitetura_urbanismo(true);
				} else {
					$area_conhecimento->setQarquitetura_urbanismo(false);
				}
				if(isset($_POST["qbiologia_geral"])&&$_POST["qbiologia_geral"]=="sim"){
					$area_conhecimento->setQbiologia_geral(true);
				} else {
					$area_conhecimento->setQbiologia_geral(false);
				}
				if(isset($_POST["qdireito"])&&$_POST["qdireito"]=="sim"){
					$area_conhecimento->setQdireito(true);
				} else {
					$area_conhecimento->setQdireito(false);
				}
				if(isset($_POST["qeducacao"])&&$_POST["qeducacao"]=="sim"){
					$area_conhecimento->setQeducacao(true);
				} else {
					$area_conhecimento->setQeducacao(false);
				}
				if(isset($_POST["qfilosofia"])&&$_POST["qfilosofia"]=="sim"){
					$area_conhecimento->setQfilosofia(true);
				} else {
					$area_conhecimento->setQfilosofia(false);
				}
				if(isset($_POST["qgeociencias"])&&$_POST["qgeociencias"]=="sim"){
					$area_conhecimento->setQgeociencias(true);
				} else {
					$area_conhecimento->setQgeociencias(false);
				}
				if(isset($_POST["qhistoria"])&&$_POST["qhistoria"]=="sim"){
					$area_conhecimento->setQhistoria(true);
				} else {
					$area_conhecimento->setQhistoria(false);
				}
				if(isset($_POST["qmatematica"])&&$_POST["qmatematica"]=="sim"){
					$area_conhecimento->setQmatematica(true);
				} else {
					$area_conhecimento->setQmatematica(false);
				}
				if(isset($_POST["qquimica"])&&$_POST["qquimica"]=="sim"){
					$area_conhecimento->setQquimica(true);
				} else {
					$area_conhecimento->setQquimica(false);
				}
				if(isset($_POST["qsaude_coletiva"])&&$_POST["qsaude_coletiva"]=="sim"){
					$area_conhecimento->setQsaude_coletiva(true);
				} else {
					$area_conhecimento->setQsaude_coletiva(false);
				}
				if(isset($_POST["qturismo"])&&$_POST["qturismo"]=="sim"){
					$area_conhecimento->setQturismo(true);
				} else {
					$area_conhecimento->setQturismo(false);
				}
				if(isset($_POST["qantropologia"])&&$_POST["qantropologia"]=="sim"){
					$area_conhecimento->setQantropologia(true);
				} else {
					$area_conhecimento->setQantropologia(false);
				}
				if(isset($_POST["qarte"])&&$_POST["qarte"]=="sim"){
					$area_conhecimento->setQarte(true);
				} else {
					$area_conhecimento->setQarte(false);
				}
				if(isset($_POST["qcomunicacaoejorn"])&&$_POST["qcomunicacaoejorn"]=="sim"){
					$area_conhecimento->setQcomunicacao_jornalismo(true);
				} else {
					$area_conhecimento->setQcomunicacao_jornalismo(false);
				}
				if(isset($_POST["qecologia"])&&$_POST["qecologia"]=="sim"){
					$area_conhecimento->setQecologia(true);
				} else {
					$area_conhecimento->setQecologia(false);
				}
				if(isset($_POST["qeng_sanitaria"])&&$_POST["qeng_sanitaria"]=="sim"){
					$area_conhecimento->setQengenharia_sanitaria(true);
				} else {
					$area_conhecimento->setQengenharia_sanitaria(false);
				}
				if(isset($_POST["qfisica"])&&$_POST["qfisica"]=="sim"){
					$area_conhecimento->setQfisica(true);
				} else {
					$area_conhecimento->setQfisica(false);
				}
				if(isset($_POST["qgeografia"])&&$_POST["qgeografia"]=="sim"){
					$area_conhecimento->setQgeografia(true);
				} else {
					$area_conhecimento->setQgeografia(false);
				}
				if(isset($_POST["qletras"])&&$_POST["qletras"]=="sim"){
					$area_conhecimento->setQletras(true);
				} else {
					$area_conhecimento->setQletras(false);
				}
				if(isset($_POST["qpsicologia"])&&$_POST["qpsicologia"]=="sim"){
					$area_conhecimento->setQpsicologia(true);
				} else {
					$area_conhecimento->setQpsicologia(false);
				}
				if(isset($_POST["qrecursos_floresais_eng_florestal"])&&$_POST["qrecursos_floresais_eng_florestal"]=="sim"){
					$area_conhecimento->setQrec_florestais_eng_florestal(true);
				} else {
					$area_conhecimento->setQrec_florestais_eng_florestal(false);
				}
				if(isset($_POST["qsociologia"])&&$_POST["qsociologia"]=="sim"){
					$area_conhecimento->setQsociologia(true);
				} else {
					$area_conhecimento->setQsociologia(false);
				}
				if(isset($_POST["qadministracao"])&&$_POST["qadministracao"]=="sim"){
					$area_conhecimento->setQadministracao(true);
				} else {
					$area_conhecimento->setQadministracao(false);
				}
				if(isset($_POST["qadministracao_rural"])&&$_POST["qadministracao_rural"]=="sim"){
					$area_conhecimento->setQadministracao_rural(true);
				} else {
					$area_conhecimento->setQadministracao_rural(false);
				}
				if(isset($_POST["qastronomia"])&&$_POST["qastronomia"]=="sim"){
					$area_conhecimento->setQastronomia(true);
				} else {
					$area_conhecimento->setQastronomia(false);
				}
				if(isset($_POST["qbiomedicina"])&&$_POST["qbiomedicina"]=="sim"){
					$area_conhecimento->setQbiomedicina(true);
				} else {
					$area_conhecimento->setQbiomedicina(false);
				}
				if(isset($_POST["qbotanica"])&&$_POST["qbotanica"]=="sim"){
					$area_conhecimento->setQbotanica(true);
				} else {
					$area_conhecimento->setQbotanica(false);
				}
				if(isset($_POST["qcarreira_religiosa"])&&$_POST["qcarreira_religiosa"]=="sim"){
					$area_conhecimento->setQcarreira_religiosa(true);
				} else {
					$area_conhecimento->setQcarreira_religiosa(false);
				}
				if(isset($_POST["qciencia_informacao"])&&$_POST["qciencia_informacao"]=="sim"){
					$area_conhecimento->setQciencia_informacao(true);
				} else {
					$area_conhecimento->setQciencia_informacao(false);
				}
				if(isset($_POST["qciencia_politica"])&&$_POST["qciencia_politica"]=="sim"){
					$area_conhecimento->setQciencia_politica(true);
				} else {
					$area_conhecimento->setQciencia_politica(false);
				}
				if(isset($_POST["qciencias_atuariais"])&&$_POST["qciencias_atuariais"]=="sim"){
					$area_conhecimento->setQciencias_atuariais(true);
				} else {
					$area_conhecimento->setQciencias_atuariais(false);
				}
				if(isset($_POST["qcomunicacao"])&&$_POST["qcomunicacao"]=="sim"){
					$area_conhecimento->setQcomunicacao(true);
				} else {
					$area_conhecimento->setQcomunicacao(false);
				}
				if(isset($_POST["qdemografia"])&&$_POST["qdemografia"]=="sim"){
					$area_conhecimento->setQdemografia(true);
				} else {
					$area_conhecimento->setQdemografia(false);
				}
				if(isset($_POST["qdesenho_projetos"])&&$_POST["qdesenho_projetos"]=="sim"){
					$area_conhecimento->setQdesenho_projetos(true);
				} else {
					$area_conhecimento->setQdesenho_projetos(false);
				}
				if(isset($_POST["qdiplomacia"])&&$_POST["qdiplomacia"]=="sim"){
					$area_conhecimento->setQdiplomacia(true);
				} else {
					$area_conhecimento->setQdiplomacia(false);
				}
				if(isset($_POST["qeconomia_domestica"])&&$_POST["qeconomia_domestica"]=="sim"){
					$area_conhecimento->setQeconomia_domestica(true);
				} else {
					$area_conhecimento->setQeconomia_domestica(false);
				}
				if(isset($_POST["qenfermagem"])&&$_POST["qenfermagem"]=="sim"){
					$area_conhecimento->setQenfermagem(true);
				} else {
					$area_conhecimento->setQenfermagem(false);
				}
				if(isset($_POST["qeng_agricola"])&&$_POST["qeng_agricola"]=="sim"){
					$area_conhecimento->setQengenharia_agricola(true);
				} else {
					$area_conhecimento->setQengenharia_agricola(false);
				}
				if(isset($_POST["qeng_cartografica"])&&$_POST["qeng_cartografica"]=="sim"){
					$area_conhecimento->setQengenharia_cartografica(true);
				} else {
					$area_conhecimento->setQengenharia_cartografica(false);
				}
				if(isset($_POST["qeng_agrimensura"])&&$_POST["qeng_agrimensura"]=="sim"){
					$area_conhecimento->setQengenharia_agrimensura(true);
				} else {
					$area_conhecimento->setQengenharia_agrimensura(false);
				}
				if(isset($_POST["qeng_materiais_metalurgica"])&&$_POST["qeng_materiais_metalurgica"]=="sim"){
					$area_conhecimento->setQengenharia_materiais_metalurgica(true);
				} else {
					$area_conhecimento->setQengenharia_materiais_metalurgica(false);
				}
				if(isset($_POST["qeng_producao"])&&$_POST["qeng_producao"]=="sim"){
					$area_conhecimento->setQengenharia_producao(true);
				} else {
					$area_conhecimento->setQengenharia_producao(false);
				}
				if(isset($_POST["qeng_eletrica"])&&$_POST["qeng_eletrica"]=="sim"){
					$area_conhecimento->setQengenharia_eletrica(true);
				} else {
					$area_conhecimento->setQengenharia_eletrica(false);
				}
				if(isset($_POST["qeng_navOc"])&&$_POST["qeng_navOc"]=="sim"){
					$area_conhecimento->setQengenharia_naval_oceanica(true);
				} else {
					$area_conhecimento->setQengenharia_naval_oceanica(false);
				}
				if(isset($_POST["qeng_quimica"])&&$_POST["qeng_quimica"]=="sim"){
					$area_conhecimento->setQengenharia_quimica(true);
				} else {
					$area_conhecimento->setQengenharia_quimica(false);
				}
				if(isset($_POST["qestudos_sociais"])&&$_POST["qestudos_sociais"]=="sim"){
					$area_conhecimento->setQestudos_sociais(true);
				} else {
					$area_conhecimento->setQestudos_sociais(false);
				}
				if(isset($_POST["qfarmacologia"])&&$_POST["qfarmacologia"]=="sim"){
					$area_conhecimento->setQfarmacologia(true);
				} else {
					$area_conhecimento->setQfarmacologia(false);
				}
				if(isset($_POST["qfisioterapia_terapia_ocupacional"])&&$_POST["qfisioterapia_terapia_ocupacional"]=="sim"){
					$area_conhecimento->setQfisioterapia_terapia_ocupacional(true);
				} else {
					$area_conhecimento->setQfisioterapia_terapia_ocupacional(false);
				}
				if(isset($_POST["qgenetica"])&&$_POST["qgenetica"]=="sim"){
					$area_conhecimento->setQgenetica(true);
				} else {
					$area_conhecimento->setQgenetica(false);
				}
				if(isset($_POST["qimunologia"])&&$_POST["qimunologia"]=="sim"){
					$area_conhecimento->setQimunologia(true);
				} else {
					$area_conhecimento->setQimunologia(false);
				}
				if(isset($_POST["qmedicina"])&&$_POST["qmedicina"]=="sim"){
					$area_conhecimento->setQmedicina(true);
				} else {
					$area_conhecimento->setQmedicina(false);
				}
				if(isset($_POST["qmicrobiologia"])&&$_POST["qmicrobiologia"]=="sim"){
					$area_conhecimento->setQmicrobiologia(true);
				} else {
					$area_conhecimento->setQmicrobiologia(false);
				}
				if(isset($_POST["qmuseologia"])&&$_POST["qmuseologia"]=="sim"){
					$area_conhecimento->setQmuseologia(true);
				} else {
					$area_conhecimento->setQmuseologia(false);
				}
				if(isset($_POST["qoceanografia"])&&$_POST["qoceanografia"]=="sim"){
					$area_conhecimento->setQoceanografia(true);
				} else {
					$area_conhecimento->setQoceanografia(false);
				}
				if(isset($_POST["qparasitologia"])&&$_POST["qparasitologia"]=="sim"){
					$area_conhecimento->setQparasitologia(true);
				} else {
					$area_conhecimento->setQparasitologia(false);
				}
				if(isset($_POST["qprobabilidade_estatistica"])&&$_POST["qprobabilidade_estatistica"]=="sim"){
					$area_conhecimento->setQprobabilidade_estatistica(true);
				} else {
					$area_conhecimento->setQprobabilidade_estatistica(false);
				}
				if(isset($_POST["qrec_pesqueiros_eng_pesca"])&&$_POST["qrec_pesqueiros_eng_pesca"]=="sim"){
					$area_conhecimento->setQrecursos_pesqueiros_engenharia_pesca(true);
				} else {
					$area_conhecimento->setQrecursos_pesqueiros_engenharia_pesca(false);
				}
				if(isset($_POST["qrelacoes_publicas"])&&$_POST["qrelacoes_publicas"]=="sim"){
					$area_conhecimento->setQrelacoes_publicas(true);
				} else {
					$area_conhecimento->setQrelacoes_publicas(false);
				}
				if(isset($_POST["qservico_social"])&&$_POST["qservico_social"]=="sim"){
					$area_conhecimento->setQservico_social(true);
				} else {
					$area_conhecimento->setQservico_social(false);
				}
				if(isset($_POST["qzoologia"])&&$_POST["qzoologia"]=="sim"){
					$area_conhecimento->setQzoologia(true);
				} else {
					$area_conhecimento->setQzoologia(false);
				}
				if(isset($_POST["qadministracao_hosp"])&&$_POST["qadministracao_hosp"]=="sim"){
					$area_conhecimento->setQadministracao_hospitalar(true);
				} else {
					$area_conhecimento->setQadministracao_hospitalar(false);
				}
				if(isset($_POST["qarqueologia"])&&$_POST["qarqueologia"]=="sim"){
					$area_conhecimento->setQarqueologia(true);
				} else {
					$area_conhecimento->setQarqueologia(false);
				}
				if(isset($_POST["qbiofisica"])&&$_POST["qbiofisica"]=="sim"){
					$area_conhecimento->setQbiofisica(true);
				} else {
					$area_conhecimento->setQbiofisica(false);
				}
				if(isset($_POST["qbioquimica"])&&$_POST["qbioquimica"]=="sim"){
					$area_conhecimento->setQbioquimica(true);
				} else {
					$area_conhecimento->setQbioquimica(false);
				}
				if(isset($_POST["qcarreira_militar"])&&$_POST["qcarreira_militar"]=="sim"){
					$area_conhecimento->setQcarreira_militar(true);
				} else {
					$area_conhecimento->setQcarreira_militar(false);
				}
				if(isset($_POST["qciencia_computacao"])&&$_POST["qciencia_computacao"]=="sim"){
					$area_conhecimento->setQciencia_computacao(true);
				} else {
					$area_conhecimento->setQciencia_computacao(false);
				}
				if(isset($_POST["qciencia_alimentos"])&&$_POST["qciencia_alimentos"]=="sim"){
					$area_conhecimento->setQciencia_tecnologia_alimentos(true);
				} else {
					$area_conhecimento->setQciencia_tecnologia_alimentos(false);
				}
				if(isset($_POST["qciencias"])&&$_POST["qciencias"]=="sim"){
					$area_conhecimento->setQciencias(true);
				} else {
					$area_conhecimento->setQciencias(false);
				}
				if(isset($_POST["qciencias_sociais"])&&$_POST["qciencias_sociais"]=="sim"){
					$area_conhecimento->setQciencias_sociais(true);
				} else {
					$area_conhecimento->setQciencias_sociais(false);
				}
				if(isset($_POST["qdecoracao"])&&$_POST["qdecoracao"]=="sim"){
					$area_conhecimento->setQdecoracao(true);
				} else {
					$area_conhecimento->setQdecoracao(false);
				}
				if(isset($_POST["qdesenho_moda"])&&$_POST["qdesenho_moda"]=="sim"){
					$area_conhecimento->setQdesenho_moda(true);
				} else {
					$area_conhecimento->setQdesenho_moda(false);
				}
				if(isset($_POST["qdesenho_industrial"])&&$_POST["qdesenho_industrial"]=="sim"){
					$area_conhecimento->setQdesenho_industrial(true);
				} else {
					$area_conhecimento->setQdesenho_industrial(false);
				}
				if(isset($_POST["qeconomia"])&&$_POST["qeconomia"]=="sim"){
					$area_conhecimento->setQeconomia(true);
				} else {
					$area_conhecimento->setQeconomia(false);
				}
				if(isset($_POST["qeducacao_fisica"])&&$_POST["qeducacao_fisica"]=="sim"){
					$area_conhecimento->setQeducacao_fisica(true);
				} else {
					$area_conhecimento->setQeducacao_fisica(false);
				}
				if(isset($_POST["qeng_aeroespacial"])&&$_POST["qeng_aeroespacial"]=="sim"){
					$area_conhecimento->setQengenharia_aeroespacial(true);
				} else {
					$area_conhecimento->setQengenharia_aeroespacial(false);
				}
				if(isset($_POST["qeng_biomedica"])&&$_POST["qeng_biomedica"]=="sim"){
					$area_conhecimento->setQengenharia_biomedica(true);
				} else {
					$area_conhecimento->setQengenharia_biomedica(false);
				}
				if(isset($_POST["qeng_civil"])&&$_POST["qeng_civil"]=="sim"){
					$area_conhecimento->setQengenharia_civil(true);
				} else {
					$area_conhecimento->setQengenharia_civil(false);
				}
				if(isset($_POST["qeng_armamentos"])&&$_POST["qeng_armamentos"]=="sim"){
					$area_conhecimento->setQengenharia_armamentos(true);
				} else {
					$area_conhecimento->setQengenharia_armamentos(false);
				}
				if(isset($_POST["qeng_minas"])&&$_POST["qeng_minas"]=="sim"){
					$area_conhecimento->setQengenharia_minas(true);
				} else {
					$area_conhecimento->setQengenharia_minas(false);
				}
				if(isset($_POST["qeng_transportes"])&&$_POST["qeng_transportes"]=="sim"){
					$area_conhecimento->setQengenharia_transportes(true);
				} else {
					$area_conhecimento->setQengenharia_transportes(false);
				}
				if(isset($_POST["qeng_mecatronica"])&&$_POST["qeng_mecatronica"]=="sim"){
					$area_conhecimento->setQengenharia_mecatronica(true);
				} else {
					$area_conhecimento->setQengenharia_mecatronica(false);
				}
				if(isset($_POST["qeng_nucl"])&&$_POST["qeng_nucl"]=="sim"){
					$area_conhecimento->setQengenharia_nuclear(true);
				} else {
					$area_conhecimento->setQengenharia_nuclear(false);
				}
				if(isset($_POST["qeng_textil"])&&$_POST["qeng_textil"]=="sim"){
					$area_conhecimento->setQengenharia_textil(true);
				} else {
					$area_conhecimento->setQengenharia_textil(false);
				}
				if(isset($_POST["qfarmacia"])&&$_POST["qfarmacia"]=="sim"){
					$area_conhecimento->setQfarmacia(true);
				} else {
					$area_conhecimento->setQfarmacia(false);
				}
				if(isset($_POST["qfisiologia"])&&$_POST["qfisiologia"]=="sim"){
					$area_conhecimento->setQfisiologia(true);
				} else {
					$area_conhecimento->setQfisiologia(false);
				}
				if(isset($_POST["qfonoaudiologia"])&&$_POST["qfonoaudiologia"]=="sim"){
					$area_conhecimento->setQfonoaudiologia(true);
				} else {
					$area_conhecimento->setQfonoaudiologia(false);
				}
				if(isset($_POST["qhistoria_natural"])&&$_POST["qhistoria_natural"]=="sim"){
					$area_conhecimento->setQhistoria_natural(true);
				} else {
					$area_conhecimento->setQhistoria_natural(false);
				}
				if(isset($_POST["qlinguistica"])&&$_POST["qlinguistica"]=="sim"){
					$area_conhecimento->setQlinguistica(true);
				} else {
					$area_conhecimento->setQlinguistica(false);
				}
				if(isset($_POST["qmedicina_veterinaria"])&&$_POST["qmedicina_veterinaria"]=="sim"){
					$area_conhecimento->setQmedicina_veterinaria(true);
				} else {
					$area_conhecimento->setQmedicina_veterinaria(false);
				}
				if(isset($_POST["qmorfologia"])&&$_POST["qmorfologia"]=="sim"){
					$area_conhecimento->setQmorfologia(true);
				} else {
					$area_conhecimento->setQmorfologia(false);
				}
				if(isset($_POST["qnutricao"])&&$_POST["qnutricao"]=="sim"){
					$area_conhecimento->setQnutricao(true);
				} else {
					$area_conhecimento->setQnutricao(false);
				}
				if(isset($_POST["qodontologia"])&&$_POST["qodontologia"]=="sim"){
					$area_conhecimento->setQodontologia(true);
				} else {
					$area_conhecimento->setQodontologia(false);
				}
				if(isset($_POST["qplanejamento_urbano_regional"])&&$_POST["qplanejamento_urbano_regional"]=="sim"){
					$area_conhecimento->setQplanejamento_urbano_regional(true);
				} else {
					$area_conhecimento->setQplanejamento_urbano_regional(false);
				}
				if(isset($_POST["qquimica_industrial"])&&$_POST["qquimica_industrial"]=="sim"){
					$area_conhecimento->setQquimica_industrial(true);
				} else {
					$area_conhecimento->setQquimica_industrial(false);
				}
				if(isset($_POST["qrelacoes_internacionais"])&&$_POST["qrelacoes_internacionais"]=="sim"){
					$area_conhecimento->setQrelacoes_internacionais(true);
				} else {
					$area_conhecimento->setQrelacoes_internacionais(false);
				}
				if(isset($_POST["qsecretariado_executiva"])&&$_POST["qsecretariado_executiva"]=="sim"){
					$area_conhecimento->setQsecretariado_executiva(true);
				} else {
					$area_conhecimento->setQsecretariado_executiva(false);
				}
				if(isset($_POST["qteologia"])&&$_POST["qteologia"]=="sim"){
					$area_conhecimento->setQteologia(true);
				} else {
					$area_conhecimento->setQteologia(false);
				}
				if(isset($_POST["qzootecnia"])&&$_POST["qzootecnia"]=="sim"){
					$area_conhecimento->setQzootecnia(true);
				} else {
					$area_conhecimento->setQzootecnia(false);
				}
				if(isset($_POST["qAreaConh"])&&$_POST["qAreaConh"]=="sim"){
					$area_conhecimento->setQarea_conhecimento(true);
				} else {
					$area_conhecimento->setQarea_conhecimento(false);
				}
				$acdao->updateData($area_conhecimento);
				
				//Modalidades
				$id_modalidades=$ficha->getId_modalidades();
				$mdao=new ModalidadesDAO();
				$modalidades=$mdao->selectDataForCode($id_modalidades);
				if(isset($_POST["regular"])){
					$modalidades->setRegular(true);
				} else {
					$modalidades->setRegular(false);
				}
				if(isset($_POST["eja"])&&$_POST["eja"]=="sim"){
					$modalidades->setEja(true);
				} else {
					$modalidades->setEja(false);
				}
				if(isset($_POST["educespecial"])&&$_POST["educespecial"]=="sim"){
					$modalidades->setEducacao_especial(true);
				} else {
					$modalidades->setEducacao_especial(false);
				}
				if(isset($_POST["educindigena"])&&$_POST["educindigena"]=="sim"){
					$modalidades->setEducacao_indigena(true);
				} else {
					$modalidades->setEducacao_indigena(false);
				}
				if(isset($_POST["educprofetecno"])&&$_POST["educprofetecno"]=="sim"){
					$modalidades->setEducacao_profissional_tecnologica(true);
				} else {
					$modalidades->setEducacao_profissional_tecnologica(false);
				}
				if(isset($_POST["edinfantil"])&&$_POST["edinfantil"]=="sim"){
					$modalidades->setEducacao_infantil(true);
				} else {
					$modalidades->setEducacao_infantil(false);
				}
				if(isset($_POST["efundamental1a4"])&&$_POST["efundamental1a4"]=="sim"){
					$modalidades->setEnsino_fundamental_1_4_1_5(true);
				} else {
					$modalidades->setEnsino_fundamental_1_4_1_5(false);
				}
				if(isset($_POST["efundamental5a8"])&&$_POST["efundamental5a8"]=="sim"){
					$modalidades->setEnsino_fundamental_5_8_6_9(true);
				} else {
					$modalidades->setEnsino_fundamental_5_8_6_9(false);
				}
				if(isset($_POST["emedio"])&&$_POST["emedio"]=="sim"){
					$modalidades->setEnsino_medio(true);
				} else {
					$modalidades->setEnsino_medio(false);
				}
				if(isset($_POST["esuperior"])&&$_POST["esuperior"]=="sim"){
					$modalidades->setEducacao_superior(true);
				} else {
					$modalidades->setEducacao_superior(false);
				}
				if(isset($_POST["agne"])&&$_POST["agne"]=="sim"){
					$modalidades->setAbordagem_generica_niveis_escolares(true);
				} else {
					$modalidades->setAbordagem_generica_niveis_escolares(false);
				}
				if(isset($_POST["qmodalidade"])){
					$modalidades->setQmodalidade(true);
				} else {
					$modalidades->setQmodalidade(false);
				}
				if(isset($_POST["qregular"])&&$_POST["qregular"]=="sim"){
					$modalidades->setQregular(true);
				} else {
					$modalidades->setQregular(false);
				}
				if(isset($_POST["qeja"])&&$_POST["qeja"]=="sim"){
					$modalidades->setQeja(true);
				} else {
					$modalidades->setQeja(false);
				}
				if(isset($_POST["qeducespecial"])&&$_POST["qeducespecial"]=="sim"){
					$modalidades->setQeducacao_especial(true);
				} else {
					$modalidades->setQeducacao_especial(false);
				}
				if(isset($_POST["qeducindigena"])&&$_POST["qeducindigena"]=="sim"){
					$modalidades->setQeducacao_indigena(true);
				} else {
					$modalidades->setQeducacao_indigena(false);
				}
				if(isset($_POST["qeducprofetecno"])&&$_POST["qeducprofetecno"]=="sim"){
					$modalidades->setQeducacao_profissional_tecnologica(true);
				} else {
					$modalidades->setQeducacao_profissional_tecnologica(false);
				}
				if(isset($_POST["qedinfantil"])&&$_POST["qedinfantil"]=="sim"){
					$modalidades->setQeducacao_infantil(true);
				} else {
					$modalidades->setQeducacao_infantil(false);
				}
				if(isset($_POST["qefundamental1a4"])&&$_POST["qefundamental1a4"]=="sim"){
					$modalidades->setQensino_fundamental_1_4_1_5(true);
				} else {
					$modalidades->setQensino_fundamental_1_4_1_5(false);
				}
				if(isset($_POST["qefundamental5a8"])&&$_POST["qefundamental5a8"]=="sim"){
					$modalidades->setQensino_fundamental_5_8_6_9(true);
				} else {
					$modalidades->setQensino_fundamental_5_8_6_9(false);
				}
				if(isset($_POST["qemedio"])&&$_POST["qemedio"]=="sim"){
					$modalidades->setQensino_medio(true);
				} else {
					$modalidades->setQensino_medio(false);
				}
				if(isset($_POST["qesuperior"])&&$_POST["qesuperior"]=="sim"){
					$modalidades->setQeducacao_superior(true);
				} else {
					$modalidades->setQeducacao_superior(false);
				}
				if(isset($_POST["qagne"])&&$_POST["qagne"]=="sim"){
					$modalidades->setQabordagem_generica_niveis_escolares(true);
				} else {
					$modalidades->setQabordagem_generica_niveis_escolares(false);
				}
				$mdao->updateData($modalidades);
				
				//Area Currícular
				$id_area_curricular=$ficha->getId_area_curricular();
				$acrdao=new Area_curricularDAO();
				$area_curricular=$acrdao->selectDataForCode($id_area_curricular);
				if(isset($_POST["artee"])&&$_POST["artee"]=="sim"){
					$area_curricular->setArte(true);
				} else {
					$area_curricular->setArte(false);
				}
				if(isset($_POST["biologia"])&&$_POST["biologia"]=="sim"){
					$area_curricular->setBiologia(true);
				} else {
					$area_curricular->setBiologia(false);
				}
				if(isset($_POST["cienciasagrarias"])&&$_POST["cienciasagrarias"]=="sim"){
					$area_curricular->setCiencias_agrarias(true);
				} else {
					$area_curricular->setCiencias_agrarias(false);
				}
				if(isset($_POST["ciecom"])&&$_POST["ciecom"]=="sim"){
					$area_curricular->setCiencias_computacao(true);
				} else {
					$area_curricular->setCiencias_computacao(false);
				}
				if(isset($_POST["cienciasgeologicas"])&&$_POST["cienciasgeologicas"]=="sim"){
					$area_curricular->setCiencias_geologicas(true);
				} else {
					$area_curricular->setCiencias_geologicas(false);
				}
				if(isset($_POST["cienciasnaturais"])&&$_POST["cienciasnaturais"]=="sim"){
					$area_curricular->setCiencias_naturais(true);
				} else {
					$area_curricular->setCiencias_naturais(false);
				}
				if(isset($_POST["comunejorn"])&&$_POST["comunejorn"]=="sim"){
					$area_curricular->setComunicacao_jornalismo(true);
				} else {
					$area_curricular->setComunicacao_jornalismo(false);
				}
				if(isset($_POST["direi"])&&$_POST["direi"]=="sim"){
					$area_curricular->setDireito(true);
				} else {
					$area_curricular->setDireito(false);
				}
				if(isset($_POST["ecol"])&&$_POST["ecol"]=="sim"){
					$area_curricular->setEcologia(true);
				} else {
					$area_curricular->setEcologia(false);
				}
				if(isset($_POST["economi"])&&$_POST["economi"]=="sim"){
					$area_curricular->setEconomia(true);
				} else {
					$area_curricular->setEconomia(false);
				}
				if(isset($_POST["edfi"])&&$_POST["edfi"]=="sim"){
					$area_curricular->setEducacao_fisica(true);
				} else {
					$area_curricular->setEducacao_fisica(false);
				}
				if(isset($_POST["filoso"])&&$_POST["filoso"]=="sim"){
					$area_curricular->setFilosofia(true);
				} else {
					$area_curricular->setFilosofia(false);
				}
				if(isset($_POST["fisi"])&&$_POST["fisi"]=="sim"){
					$area_curricular->setFisica(true);
				} else {
					$area_curricular->setFisica(false);
				}
				if(isset($_POST["geogr"])&&$_POST["geogr"]=="sim"){
					$area_curricular->setGeografia(true);
				} else {
					$area_curricular->setGeografia(false);
				}
				if(isset($_POST["geral"])&&$_POST["geral"]=="sim"){
					$area_curricular->setGeral(true);
				} else {
					$area_curricular->setGeral(false);
				}
				if(isset($_POST["histo"])&&$_POST["histo"]=="sim"){
					$area_curricular->setHistoria(true);
				} else {
					$area_curricular->setHistoria(false);
				}
				if(isset($_POST["linguaestrangeira"])&&$_POST["linguaestrangeira"]=="sim"){
					$area_curricular->setLingua_estrangeira(true);
				} else {
					$area_curricular->setLingua_estrangeira(false);
				}
				if(isset($_POST["linguaportuguesa"])&&$_POST["linguaportuguesa"]=="sim"){
					$area_curricular->setLingua_portuguesa(true);
				} else {
					$area_curricular->setLingua_portuguesa(false);
				}
				if(isset($_POST["matema"])&&$_POST["matema"]=="sim"){
					$area_curricular->setMatematica(true);
				} else {
					$area_curricular->setMatematica(false);
				}
				if(isset($_POST["pedagogia"])&&$_POST["pedagogia"]=="sim"){
					$area_curricular->setPedagogia(true);
				} else {
					$area_curricular->setPedagogia(false);
				}
				if(isset($_POST["quimi"])&&$_POST["quimi"]=="sim"){
					$area_curricular->setQuimica(true);
				} else {
					$area_curricular->setQuimica(false);
				}
				if(isset($_POST["saude"])&&$_POST["saude"]=="sim"){
					$area_curricular->setSaude(true);
				} else {
					$area_curricular->setSaude(false);
				}
				if(isset($_POST["sociolo"])&&$_POST["sociolo"]=="sim"){
					$area_curricular->setSociologia(true);
				} else {
					$area_curricular->setSociologia(false);
				}
				if(isset($_POST["turi"])&&$_POST["turi"]=="sim"){
					$area_curricular->setTurismo(true);
				} else {
					$area_curricular->setTurismo(false);
				}
				if(isset($_POST["qartee"])&&$_POST["qartee"]=="sim"){
					$area_curricular->setQarte(true);
				} else {
					$area_curricular->setQarte(false);
				}
				if(isset($_POST["qbiologia"])&&$_POST["qbiologia"]=="sim"){
					$area_curricular->setQbiologia(true);
				} else {
					$area_curricular->setQbiologia(false);
				}
				if(isset($_POST["qcienciasagrarias"])&&$_POST["qcienciasagrarias"]=="sim"){
					$area_curricular->setQciencias_agrarias(true);
				} else {
					$area_curricular->setQciencias_agrarias(false);
				}
				if(isset($_POST["qciecom"])&&$_POST["qciecom"]=="sim"){
					$area_curricular->setQciencias_computacao(true);
				} else {
					$area_curricular->setQciencias_computacao(false);
				}
				if(isset($_POST["qcienciasgeologicas"])&&$_POST["qcienciasgeologicas"]=="sim"){
					$area_curricular->setQciencias_geologicas(true);
				} else {
					$area_curricular->setQciencias_geologicas(false);
				}
				if(isset($_POST["qcienciasnaturais"])&&$_POST["qcienciasnaturais"]=="sim"){
					$area_curricular->setQciencias_naturais(true);
				} else {
					$area_curricular->setQciencias_naturais(false);
				}
				if(isset($_POST["qcomunejorn"])&&$_POST["qcomunejorn"]=="sim"){
					$area_curricular->setQcomunicacao_jornalismo(true);
				} else {
					$area_curricular->setQcomunicacao_jornalismo(false);
				}
				if(isset($_POST["qdirei"])&&$_POST["qdirei"]=="sim"){
					$area_curricular->setQdireito(true);
				} else {
					$area_curricular->setQdireito(false);
				}
				if(isset($_POST["qecol"])&&$_POST["qecol"]=="sim"){
					$area_curricular->setQecologia(true);
				} else {
					$area_curricular->setQecologia(false);
				}
				if(isset($_POST["qeconomi"])&&$_POST["qeconomi"]=="sim"){
					$area_curricular->setQeconomia(true);
				} else {
					$area_curricular->setQeconomia(false);
				}
				if(isset($_POST["qedfi"])&&$_POST["qedfi"]=="sim"){
					$area_curricular->setQeducacao_fisica(true);
				} else {
					$area_curricular->setQeducacao_fisica(false);
				}
				if(isset($_POST["qfiloso"])&&$_POST["qfiloso"]=="sim"){
					$area_curricular->setQfilosofia(true);
				} else {
					$area_curricular->setQfilosofia(false);
				}
				if(isset($_POST["qfisi"])&&$_POST["qfisi"]=="sim"){
					$area_curricular->setQfisica(true);
				} else {
					$area_curricular->setQfisica(false);
				}
				if(isset($_POST["qgeogr"])&&$_POST["qgeogr"]=="sim"){
					$area_curricular->setQgeografia(true);
				} else {
					$area_curricular->setQgeografia(false);
				}
				if(isset($_POST["qgeral"])&&$_POST["qgeral"]=="sim"){
					$area_curricular->setQgeral(true);
				} else {
					$area_curricular->setQgeral(false);
				}
				if(isset($_POST["qhisto"])&&$_POST["qhisto"]=="sim"){
					$area_curricular->setQhistoria(true);
				} else {
					$area_curricular->setQhistoria(false);
				}
				if(isset($_POST["qlinguaestrangeira"])&&$_POST["qlinguaestrangeira"]=="sim"){
					$area_curricular->setQlingua_estrangeira(true);
				} else {
					$area_curricular->setQlingua_estrangeira(false);
				}
				if(isset($_POST["qlinguaportuguesa"])&&$_POST["qlinguaportuguesa"]=="sim"){
					$area_curricular->setQlingua_portuguesa(true);
				} else {
					$area_curricular->setQlingua_portuguesa(false);
				}
				if(isset($_POST["qmatema"])&&$_POST["qmatema"]=="sim"){
					$area_curricular->setQmatematica(true);
				} else {
					$area_curricular->setQmatematica(false);
				}
				if(isset($_POST["qpedagogia"])&&$_POST["qpedagogia"]=="sim"){
					$area_curricular->setQpedagogia(true);
				} else {
					$area_curricular->setQpedagogia(false);
				}
				if(isset($_POST["qquimi"])&&$_POST["qquimi"]=="sim"){
					$area_curricular->setQquimica(true);
				} else {
					$area_curricular->setQquimica(false);
				}
				if(isset($_POST["qsaude"])&&$_POST["qsaude"]=="sim"){
					$area_curricular->setQsaude(true);
				} else {
					$area_curricular->setQsaude(false);
				}
				if(isset($_POST["qsociolo"])&&$_POST["qsociolo"]=="sim"){
					$area_curricular->setQsociologia(true);
				} else {
					$area_curricular->setQsociologia(false);
				}
				if(isset($_POST["qturi"])&&$_POST["qturi"]=="sim"){
					$area_curricular->setQturismo(true);
				} else {
					$area_curricular->setQturismo(false);
				}
				if(isset($_POST["qareaCurr"])&&$_POST["qareaCurr"]=="sim"){
					$area_curricular->setQarea_curricular(true);
				} else {
					$area_curricular->setQarea_curricular(false);
				}
				//Área em licenciatura
				/*if(!isset($_POST["licenciatura"])||$_POST["licenciatura"]!="licenciatura"){
					$area_curricular->setId_area_licenciatura(null);
				} else {
					if($_POST["arealicenS"]==""){
						$area_curricular->setId_area_licenciatura(null);
					} else if($_POST["arealicenS"]=="new"){
						$novoArea=new Area_licenciatura("",upper($_POST["arealicen"]));
						$aldao=new Area_licenciaturaDAO();
						$aldao->insertData($novoArea);
						$id=$aldao->getLastInsertedId();
						$area_curricular->setId_area_licenciatura($id);
					} else {
						$area_curricular->setId_area_licenciatura($_POST["arealicenS"]);
					}
				}
				//Outra Área
				if(!isset($_POST["outra"])||$_POST["outra"]!="outra"){
					$area_curricular->setId_outra_area(null);
				} else {
					if($_POST["outraareaSA"]==""){
						$area_curricular->setId_outra_area(null);
					} else if($_POST["outraareaSA"]=="new"){
						$novaOutraArea=new Outra_area("",upper($_POST["outraareaA"]));
						$oadao=new Outra_areaDAO();
						$oadao->insertData($novaOutraArea);
						$id=$oadao->getLastInsertedId();
						$area_curricular->setId_outra_area($id);
					} else {
						$area_curricular->setId_outra_area($_POST["outraareaSA"]);
					}
				}*/
				//Área em licenciatura
				$area_curricular->setId_area_licenciatura(null); //FALLBACK 

				DBFactory::getConnection();

				if(isset($_POST["arealicen"])){
					$query = "DELETE FROM area_licenciatura_keys WHERE ficha=".$id_ident;
					mysql_query($query);

					$areasLicen = explode(";",$_POST["arealicen"]);
					foreach($areasLicen as $v){
						$v = trim($v);
						if($v!==''){
						$query = "SELECT id FROM area_licenciatura WHERE area_licenciatura='".$v."'";
						$query = mysql_query($query);
						if(mysql_num_rows($query)){
							$area_licenciatura_id = mysql_result($query, 0);
						}else{
							$query = "INSERT INTO area_licenciatura VALUES (null,'".$v."');";
							$query = mysql_query($query);
							$area_licenciatura_id = mysql_insert_id();
						}

						$query = "INSERT INTO area_licenciatura_keys VALUES (".$id_ident.",".$area_licenciatura_id.")";
						$query = mysql_query($query);
						}
					}
				/*	
				} else {
					if($_POST["arealicen"]==""){
						$area_curricular->setId_area_licenciatura(null);
					} else{
						$novoArea=new Area_licenciatura("",upper($_POST["arealicen"]));
						$aldao=new Area_licenciaturaDAO();
						if(!$aldao->selectData($_POST['arealicen'])){
							$aldao->insertData($novoArea);
							$id=$aldao->getLastInsertedId();
							$area_curricular->setId_area_licenciatura($id);
						}
						$area_curricular->setId_area_licenciatura($_POST["arealicenS"]);
					}*/
				}
				//Outra Área
				$area_curricular->setId_outra_area(null);

				DBFactory::getConnection();

				if(isset($_POST["outraareaA"])){

					$query = "DELETE FROM outra_area_keys WHERE ficha=".$id_ident;
					mysql_query($query);

					$outrasAreas = explode(";",$_POST["outraareaA"]);
					foreach($outrasAreas as $v){
						$v = trim($v);
						if($v!==''){
						$query = "SELECT id FROM outra_area WHERE outra_area='".$v."'";
						$query = mysql_query($query);
						if(mysql_num_rows($query)){
							$outra_area_id = mysql_result($query, 0);
						}else{
							$query = "INSERT INTO outra_area VALUES (null,'".$v."');";
							$query = mysql_query($query);
							$outra_area_id = mysql_insert_id();
						}

						$query = "INSERT INTO outra_area_keys VALUES (".$id_ident.",".$outra_area_id.")";
						$query = mysql_query($query);
						}
					}
			/*	} else {
					if($_POST["outraareaSA"]==""){
						$area_curricular->setId_outra_area(null);
					} else if($_POST["outraareaSA"]=="new"){
						$novaOutraArea=new Outra_area("",upper($_POST["outraareaA"]));
						$oadao=new Outra_areaDAO();
						$oadao->insertData($novaOutraArea);
						$id=$oadao->getLastInsertedId();
						$area_curricular->setId_outra_area($id);
					} else {
						$area_curricular->setId_outra_area($_POST["outraareaSA"]);
					}*/
				}


				$acrdao->updateData($area_curricular);
				
				$fidao->updateData($ficha);
				echo "A ficha foi editada com sucesso<br /><br />".'<a href="formulario.php?id='.$id_ficha.'">Voltar para a ficha</a><br><br>'."<a href=\"index.php\" alt=\"Voltar\">Voltar para a lista</a>";
			} else {
				echo "Nenhuma ficha foi editada<br /><br />".'<a href="formulario.php?id='.$id_ficha.'">Voltar para a ficha</a><br><br>'."<a href=\"index.php\" alt=\"Voltar\">Voltar para a lista</a>";
			}
		?>
	</body>
</html>