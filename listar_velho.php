<?php include_once("logado.php"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="liststyle.css" rel="stylesheet" type="text/css" media="screen">
		<title>Sistema EArte | Listagem</title>
	</head>
	<body>
		<div class="container">
<?php
	set_time_limit ( 0 );

	$teses = array();

	$listagem = $_GET['listar'];
	//xdebug_start_trace('D:\wamp\www\Earte_2014\sistemaEarte\sistema\debug\debug');
	$time_start = microtime(true);
	if(isset($_SESSION['listar'])&&$_SESSION['listar']!=null){
		$ids = $_SESSION['listar'];
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
		include_once("dao/Area_conhecimentoDAO.class.php");
		include_once("dao/Tema_ambientalDAO.class.php");
		include_once("dao/Tema_estudo.class.php");
		include_once("dao/Tema_estudoDAO.class.php");
		include_once("dao/Foco.class.php");
		include_once("dao/FocoDAO.class.php");
		include_once("dao/Resumo.class.php");
		include_once("dao/ResumoDAO.class.php");
		include_once("dao/Detalhes_finais.class.php");
		include_once("dao/Detalhes_finaisDAO.class.php");
		foreach($ids as $id){
			$fdao = new Ficha_classificacaoDAO();
			$ficha = $fdao->selectDataForCode((int)$id);
			$id_identificacao = $ficha->getId_identificacao();
			$idao = new IdentificacaoDAO();
			$identificacao = $idao->selectDataForCode($id_identificacao);

			$titulo = $identificacao->getTitulo();
			$autor_nome = $identificacao->getAutor_nome();
			$autor_sobrenome = $identificacao->getAutor_sobrenome();
			$ano_defesa = $identificacao->getAno_defesa();
			$codigo = $ficha->getCodigo();

			//Orientadores
			$orientador = $identificacao->getOrientador();

			$temp_orientador = explode(';',$orientador);
			$temp_orientador_string = '';

			foreach ($temp_orientador as $nome){
				$nome = explode(' ', $nome);
				$last_nome = mb_strtoupper(array_pop($nome),'UTF-8');
				if($last_nome==="JÚNIOR"||$last_nome==="JUNIOR"||$last_nome==="FILHO"||$last_nome==="NETO"){
					$last_nome = mb_strtoupper(array_pop($nome),'UTF-8').' '.$last_nome;
				}
				$nome = implode(' ', $nome);
				$last_nome = $last_nome.' '.$nome;
			}
			//END Orientadores


			$teses[$id] = array(
				'id' => $id,
				'sobrenomeAutor' => $autor_sobrenome.' '.$autor_nome,
				'sobrenomeOrientador' => $last_nome,
				'titulo' => $titulo,
				'codigo' => $codigo
			);
		}

		if($listagem==0){
			$sobrenomeAutor = array();
			foreach ($teses as $key => $row){
				$sobrenomeAutor[$key] = mb_strtoupper(trim($row['sobrenomeAutor']),'UTF-8');
			}
	     	array_multisort($sobrenomeAutor, SORT_ASC, $teses);
	    }else if($listagem==1){
			$sobrenomeOrientador = array();
			foreach ($teses as $key => $row){
				$sobrenomeOrientador[$key] = mb_strtoupper(trim($row['sobrenomeOrientador']),'UTF-8');
			}
			array_multisort($sobrenomeOrientador, SORT_ASC, $teses);
	    }else if($listagem==2){
			$titulo = array();
			foreach ($teses as $key => $row){
				$titulo[$key] = str_replace(array('"','(',')'), "", $titulo[$key]);
				$titulo[$key] = mb_strtoupper(trim($row['titulo']),'UTF-8');
			}
			array_multisort($titulo, SORT_ASC, $teses);
	    }else if($listagem==3){
			$codigo = array();
			foreach ($teses as $key => $row){
				$codigo[$key] = $row['codigo'];
			}
			array_multisort($codigo, SORT_ASC, $teses);
	    }

		foreach($teses as $tese){
			echo '<br>';
			$fdao = new Ficha_classificacaoDAO();
			$ficha=$fdao->selectDataForCode((int)$tese['id']);

			$consolidada=$ficha->getConsolidada();
			$codigo=$ficha->getCodigo();
			$id_identificacao=$ficha->getId_identificacao();
			$id_resumo=$ficha->getId_resumo();
			$id_contexto_educacional=$ficha->getId_contexto_educacional();
			$id_modalidades=$ficha->getId_modalidades();
			$id_area_curricular=$ficha->getId_area_curricular();
			$id_area_conhecimento=$ficha->getId_area_conhecimento();
			$id_tema_estudo=$ficha->getId_tema_estudo();
			$id_detalhes_finais=$ficha->getId_resumo();

			//IDENTIFICACAO
				$idao = new IdentificacaoDAO();
				$identificacao=$idao->selectDataForCode($id_identificacao);

				$titulo=$identificacao->getTitulo();
				$autor_nome=$identificacao->getAutor_nome();
				$autor_sobrenome=$identificacao->getAutor_sobrenome();
				$ano_defesa=$identificacao->getAno_defesa();
				$numero_paginas=$identificacao->getNumero_paginas();
				$programa_pos=$identificacao->getPrograma_pos();
				$ies=$identificacao->getIes();
				$unidade_setor=$identificacao->getUnidade_setor();
				$estado=$identificacao->getEstado();
				$cidade=$identificacao->getCidade();
				$grau_titulacao_academica=$identificacao->getGrau_titulacao_academica();
				$dependencia_administrativa=$identificacao->getDependencia_administrativa();
				$orientador=$identificacao->getOrientador();

				//Título
				$titulo = explode(":",$titulo);
				if(isset($titulo[1])){
					$titulo_sec = $titulo[1];
					$titulo = $titulo[0].':';
				}else{
					$titulo_sec = "";
					$titulo = $titulo[0];
				}
				//END Título

				//Estado
				switch (trim($estado)) {
					case "AC": $estado = "Acre"; break;
					case "AL": $estado = "Alagoas"; break;
					case "AP": $estado = "Amapá"; break;
					case "AM": $estado = "Amazonas"; break;
					case "BA": $estado = "Bahia"; break;
					case "CE": $estado = "Ceará"; break;
					case "DF": $estado = "Distrito Federal"; break;
					case "GO": $estado = "Goiás"; break;
					case "ES": $estado = "Espírito Santo"; break;
					case "MA": $estado = "Maranhão"; break;
					case "MT": $estado = "Mato Grosso"; break;
					case "MS": $estado = "Mato Grosso do Sul"; break;
					case "MG": $estado = "Minas Gerais"; break;
					case "PA": $estado = "Pará"; break;
					case "PB": $estado = "Paraiba"; break;
	 				case "PR": $estado = "Paraná"; break;
					case "PE": $estado = "Pernambuco"; break;
					case "PI": $estado = "Piauí"; break;
					case "RJ": $estado = "Rio de Janeiro"; break;
					case "RN": $estado = "Rio Grande do Norte"; break;
					case "RS": $estado = "Rio Grande do Sul"; break;
					case "RO": $estado = "Rondônia"; break;
					case "RR": $estado = "Roraima"; break;
					case "SP": $estado = "São Paulo"; break;
					case "SC": $estado = "Santa Catarina"; break;
					case "SE": $estado = "Sergipe"; break;
					case "TO": $estado = "Tocantins"; break;
					default: $estado = '';
				}
				//END Estado

				//Grau Tit. Academica
				switch(mb_strtolower($grau_titulacao_academica,'UTF-8')){
					case "profissional": case "mestrado":
						$tipo_texto = "Dissertação";
						$grau_titulacao_academica_inside = "Mestrado";
						break;
					case "doutorado":
						$tipo_texto = "Tese";
						$grau_titulacao_academica_inside = "Doutorado";
						break;
				}
				//END Grau Tit. Academica

				//Orientador
				$temp_orientador = explode(';',$orientador);
				$temp_orientador_string = '';

				foreach ($temp_orientador as $nome){
					$nome = explode(' ', $nome);
					$last_nome = mb_strtoupper(array_pop($nome),'UTF-8');
					if($last_nome==="JÚNIOR"||$last_nome==="JUNIOR"||$last_nome==="FILHO"||$last_nome==="NETO"){
						$last_nome = mb_strtoupper(array_pop($nome),'UTF-8').' '.$last_nome;
					}
					$nome = implode(' ',$nome);
					$temp_orientador_string .= $last_nome.', '.$nome.'; ';
				}
				//END Orientador
			//END IDENTIFICACAO

			//RESUMO
				$rdao = new ResumoDAO();
				$resumo=$rdao->selectDataForCode($id_resumo);

				$resumo=$resumo->getResumo();
			//END RESUMO

			//CONTEXTO EDUCACIONAL
				$cedao = new Contexto_educacionalDAO();
				$contexto_educacional=$cedao->selectDataForCode($id_identificacao);

				$qcontextEdu=$contexto_educacional->getQcontexto_educacional();
				$contexto_nao_escolar=$contexto_educacional->getContexto_nao_escolar();
				$contexto_escolar=$contexto_educacional->getContexto_escolar();
				$abordagem_generica=$contexto_educacional->getAbordagem_generica();
				$qcontexto_nao_escolar=$contexto_educacional->getQcontexto_nao_escolar();
				$qcontexto_escolar=$contexto_educacional->getQcontexto_escolar();
				$qabordagem_generica=$contexto_educacional->getQabordagem_generica();

				//Contexto Educacional
				$string_contexto_educacional = '';
				if($qcontextEdu==1 || $qcontexto_nao_escolar==1 || $qcontexto_escolar==1 || $qabordagem_generica==1){
					$string_contexto_educacional .= "Dados insuficientes para classificação";
				}else{
					if($contexto_nao_escolar==1) $string_contexto_educacional .= "Contexto Não Escolar<br>";
					if($abordagem_generica==1) $string_contexto_educacional .= "Abordagem Genérica<br>";
					if($contexto_escolar==1) $string_contexto_educacional .= "Contexto Escolar";
				}
				//END Contexto Educacional
			//END CONTEXTO EDUCACIONAL

			//MODALIDADES
				$mdao = new ModalidadesDAO();
				$modalidades=$mdao->selectDataForCode($id_modalidades);

				$qmodalidade=$modalidades->getQmodalidade();
				$regular=$modalidades->getRegular();
				$educacao_infantil=$modalidades->getEducacao_infantil();
				$ensino_fundamental_1_4_1_5=$modalidades->getEnsino_fundamental_1_4_1_5();
				$ensino_fundamental_5_8_6_9=$modalidades->getEnsino_fundamental_5_8_6_9();
				$ensino_medio=$modalidades->getEnsino_medio();
				$ensino_superior=$modalidades->getEducacao_superior();
				$abordagem_generica_niveis_escolares=$modalidades->getAbordagem_generica_niveis_escolares();
				$eja=$modalidades->getEja();
				$educacao_especial=$modalidades->getEducacao_especial();
				$educacao_indigena=$modalidades->getEducacao_indigena();
				$educacao_profissional_tecnologica=$modalidades->getEducacao_profissional_tecnologica();
				$qregular=$modalidades->getQregular();
				$qeducacao_infantil=$modalidades->getQeducacao_infantil();
				$qensino_fundamental_1_4_1_5=$modalidades->getQensino_fundamental_1_4_1_5();
				$qensino_fundamental_5_8_6_9=$modalidades->getQensino_fundamental_5_8_6_9();
				$qensino_medio=$modalidades->getQensino_medio();
				$qensino_superior=$modalidades->getQeducacao_superior();
				$qabordagem_generica_niveis_escolares=$modalidades->getQabordagem_generica_niveis_escolares();
				$qeja=$modalidades->getQeja();
				$qeducacao_especial=$modalidades->getQeducacao_especial();
				$qeducacao_indigena=$modalidades->getQeducacao_indigena();
				$qeducacao_profissional_tecnologica=$modalidades->getQeducacao_profissional_tecnologica();

				//Modalidades
				$string_modalidades = '';
				if($qmodalidade===1 || $qeja===1 || $qeducacao_especial===1 || $qeducacao_indigena==1 || $qeducacao_profissional_tecnologica===1 || $qregular===1){
					$string_modalidades .= "Dados insuficientes para classificação";
				}else{
					if($eja==1) $string_modalidades .= "EJA";
					if($educacao_especial==1) $string_modalidades .= "Educação Especial";
					if($educacao_indigena==1) $string_modalidades .= "Educação Indígena";
					if($educacao_profissional_tecnologica==1) $string_modalidades .= "Educação Profissional e Tecnológica";
					if($regular==1) $string_modalidades .= "Regular";
					if($qeducacao_infantil===1 || $qensino_fundamental_1_4_1_5===1 || $qensino_fundamental_5_8_6_9===1 || $qensino_medio===1 || $qensino_superior===1 || $qabordagem_generica_niveis_escolares===1){
						$string_modalidades .= " - Dados insuficientes para classificação";
					}else{
						if($educacao_infantil==1) $string_modalidades .= " - Educação Infantil";
						if($ensino_fundamental_1_4_1_5==1) $string_modalidades .= " - Ensino Fundamental 1ª a 4ª/1º ao 5º";
						if($ensino_fundamental_5_8_6_9==1) $string_modalidades .= " - Ensino Fundamental 5ª a 8ª/6º ao 9º";
						if($ensino_medio==1) $string_modalidades .= " - Ensino Médio";
						if($ensino_superior==1) $string_modalidades .= " - Educação Superior";
						if($abordagem_generica_niveis_escolares==1) $string_modalidades .= " - Abordagem Genérica dos Níveis Escolares";
					}
				}
				//END Modalidades
			//END MODALIDADES

			//AREA CURRICULAR
				$acdao = new Area_curricularDAO();
				$area_curricular=$acdao->selectDataForCode($id_area_curricular);

				$qareaCurr=$area_curricular->getQarea_curricular();
				$arte=$area_curricular->getArte();
				$biologia=$area_curricular->getBiologia();
				$ciencias_agrarias=$area_curricular->getCiencias_agrarias();
				$ciencias_computacao=$area_curricular->getCiencias_computacao();
				$ciencias_geologicas=$area_curricular->getCiencias_geologicas();
				$ciencias_naturais=$area_curricular->getCiencias_naturais();
				$comunicacao_jornalismo=$area_curricular->getcomunicacao_jornalismo();
				$direito=$area_curricular->getDireito();
				$ecologia=$area_curricular->getEcologia();
				$economia=$area_curricular->getEconomia();
				$educacao_fisica=$area_curricular->getEducacao_fisica();
				$filosofia=$area_curricular->getFilosofia();
				$fisica=$area_curricular->getFisica();
				$geografia=$area_curricular->getGeografia();
				$geral=$area_curricular->getGeral();
				$historia=$area_curricular->getHistoria();
				$lingua_estrangeira=$area_curricular->getLingua_estrangeira();
				$lingua_portuguesa=$area_curricular->getLingua_portuguesa();
				$matematica=$area_curricular->getMatematica();
				$pedagogia=$area_curricular->getPedagogia();
				$quimica=$area_curricular->getQuimica();
				$saude=$area_curricular->getSaude();
				$sociologia=$area_curricular->getSociologia();
				$turismo=$area_curricular->getTurismo();
				$id_outra_area=$area_curricular->getId_outra_area();
				$id_area_licenciatura=$area_curricular->getId_area_licenciatura();
				$qarte=$area_curricular->getQarte();
				$qbiologia=$area_curricular->getQbiologia();
				$qciencias_agrarias=$area_curricular->getQciencias_agrarias();
				$qciencias_computacao=$area_curricular->getQciencias_computacao();
				$qciencias_geologicas=$area_curricular->getQciencias_geologicas();
				$qciencias_naturais=$area_curricular->getQciencias_naturais();
				$qcomunicacao_jornalismo=$area_curricular->getQcomunicacao_jornalismo();
				$qdireito=$area_curricular->getQdireito();
				$qecologia=$area_curricular->getQecologia();
				$qeconomia=$area_curricular->getQeconomia();
				$qeducacao_fisica=$area_curricular->getQeducacao_fisica();
				$qfilosofia=$area_curricular->getQfilosofia();
				$qfisica=$area_curricular->getQfisica();
				$qgeografia=$area_curricular->getQgeografia();
				$qgeral=$area_curricular->getQgeral();
				$qhistoria=$area_curricular->getQhistoria();
				$qlingua_estrangeira=$area_curricular->getQlingua_estrangeira();
				$qlingua_portuguesa=$area_curricular->getQlingua_portuguesa();
				$qmatematica=$area_curricular->getQmatematica();
				$qpedagogia=$area_curricular->getQpedagogia();
				$qquimica=$area_curricular->getQquimica();
				$qsaude=$area_curricular->getQsaude();
				$qsociologia=$area_curricular->getQsociologia();
				$qturismo=$area_curricular->getQturismo();

				//Area Curricular
				$string_area_curricular = '';
				if($qareaCurr==1){
					$string_area_curricular .= "Dados insuficientes para classificação<br>";
				}else{
					if($qarte==1 || $qbiologia==1 || $qciencias_agrarias==1 || $qciencias_computacao==1 || $qciencias_geologicas==1 || $qciencias_naturais==1 || $qcomunicacao_jornalismo==1 || $qdireito==1 || $qecologia==1 || $qeconomia==1 || $qeducacao_fisica==1 || $qfilosofia==1 || $qfisica==1 || $qgeografia==1 || $qgeral==1 || $qhistoria==1 || $qlingua_estrangeira==1 || $qlingua_portuguesa==1 || $qmatematica==1 || $qpedagogia==1 || $qquimica==1 || $qsaude==1 || $qsociologia==1 || $qturismo==1){
						$string_area_curricular .= "Dados insuficientes para classificação<br>";
					}else{
						if($arte==1) $string_area_curricular .= "Arte<br/>";
						if($biologia==1) $string_area_curricular .= "Biologia<br />";
						if($ciencias_agrarias==1) $string_area_curricular .= "Ciências Agrárias<br/>";
						if($ciencias_computacao==1) $string_area_curricular .= "Ciências da Computação<br />";
						if($ciencias_geologicas==1) $string_area_curricular .= "Ciências Geológicas<br />";
						if($ciencias_naturais==1) $string_area_curricular .= "Ciências Naturais<br />";
						if($comunicacao_jornalismo==1) $string_area_curricular .= "Comunicação e Jornalismo<br />";
						if($direito==1) $string_area_curricular .= "Direito<br />";
						if($ecologia==1) $string_area_curricular .= "Ecologia<br />";
						if($economia==1) $string_area_curricular .= "Economia<br />";
						if($educacao_fisica==1) $string_area_curricular .= "Educação Física<br />";
						if($filosofia==1) $string_area_curricular .= "Filosofia<br />";
						if($fisica==1) $string_area_curricular .= "Física<br/>";
						if($geografia==1) $string_area_curricular .= "Geografia<br />";
						if($geral==1) $string_area_curricular .= "Geral<br />";
						if($historia==1) $string_area_curricular .= "História<br/>";
						if($lingua_estrangeira==1) $string_area_curricular .= "Língua Estrangeira<br/>";
						if($lingua_portuguesa==1) $string_area_curricular .= "Língua Portuguesa<br/>";
						if($matematica==1) $string_area_curricular .= "Matemática<br/>";
						if($pedagogia==1) $string_area_curricular .= "Pedagogia<br />";
						if($quimica==1) $string_area_curricular .= "Química<br/>";
						if($saude==1) $string_area_curricular .= "Saúde<br />";
						if($sociologia==1) $string_area_curricular .= "Sociologia<br />";
						if($turismo==1) $string_area_curricular .= "Turismo<br/>";
					}
				}
				//END Area Curricular

				//Área Licenciatura
				ob_start();

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');

				if($string_area_curricular!=''){
					echo $string_area_curricular;
				}

				$query = mysql_query("SELECT area_licenciatura FROM area_licenciatura_keys WHERE ficha = ".$tese['id']);
				if(mysql_num_rows($query)){
					while($linha = mysql_fetch_assoc($query)){
						$area_licenciatura = mysql_query("SELECT area_licenciatura FROM area_licenciatura WHERE id = ".$linha['area_licenciatura']);
						if(mysql_num_rows($area_licenciatura)){
							echo 'Licenciatura em ',mysql_result($area_licenciatura, 0),'<br>';
						}
					}
				}

				$string_area_curricular_final = ob_get_contents();

				DBFactory::closeConnection();

				ob_end_clean();
				//END Área Licenciatura
			//END AREA CURRICULAR

			//OUTRA AREA
				ob_start();

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');

				$query = mysql_query("SELECT outra_area FROM outra_area_keys WHERE ficha = ".$tese['id']);
				if(mysql_num_rows($query)){
					while($linha = mysql_fetch_assoc($query)){
						$outra_area = mysql_query("SELECT outra_area FROM outra_area WHERE id = ".$linha['outra_area']);
						if(mysql_num_rows($outra_area)){
							echo mysql_result($outra_area, 0),'<br>';
						}
					}
				}

				$string_outra_area_final = ob_get_contents();

				DBFactory::closeConnection();

				ob_end_clean();
			//END OUTRA AREA

			//PUBLICO ENVOLVIDO
				ob_start();

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');

				$query = mysql_query("SELECT publico_envolvido FROM publico_envolvido_keys WHERE ficha = ".$tese['id']);
				if(mysql_num_rows($query)){
					while($linha = mysql_fetch_assoc($query)){
						$publico_envolvido = mysql_query("SELECT publico_envolvido FROM publico_envolvido WHERE id = ".$linha['publico_envolvido']);
						if(mysql_num_rows($publico_envolvido)){
							echo mysql_result($publico_envolvido, 0),'<br>';
						}
					}
				}

				$string_publico_envolvido_final = ob_get_contents();

				DBFactory::closeConnection();

				ob_end_clean();
			//END PUBLICO ENVOLVIDO

			//AREA CONHECIMENTO
				$acdao = new Area_conhecimentoDAO();
				$area_conhecimento=$acdao->selectDataForCode($id_area_conhecimento);

				$qAreaConhecimento=$area_conhecimento->getQarea_conhecimento();
				$agronomia=$area_conhecimento->getAgronomia();
				$arquitetura_urbanismo=$area_conhecimento->getArquitetura_urbanismo();
				$biologia_geral=$area_conhecimento->getBiologia_geral();
				$direito=$area_conhecimento->getDireito();
				$educacao=$area_conhecimento->getEducacao();
				$filosofia=$area_conhecimento->getFilosofia();
				$geociencias=$area_conhecimento->getGeociencias();
				$historia=$area_conhecimento->getHistoria();
				$matematica=$area_conhecimento->getMatematica();
				$quimica=$area_conhecimento->getQuimica();
				$saude_coletiva=$area_conhecimento->getSaude_coletiva();
				$turismo=$area_conhecimento->getTurismo();
				$antropologia=$area_conhecimento->getAntropologia();
				$arte=$area_conhecimento->getArte();
				$comunicacao_jornalismo=$area_conhecimento->getComunicacao_jornalismo();
				$ecologia=$area_conhecimento->getEcologia();
				$engenharia_sanitaria=$area_conhecimento->getEngenharia_sanitaria();
				$fisica=$area_conhecimento->getFisica();
				$geografia=$area_conhecimento->getGeografia();
				$letras=$area_conhecimento->getLetras();
				$psicologia=$area_conhecimento->getPsicologia();
				$rec_florestais_eng_florestal=$area_conhecimento->getRec_florestais_eng_florestal();
				$sociologia=$area_conhecimento->getSociologia();
				$administracao=$area_conhecimento->getAdministracao();
				$administracao_rural=$area_conhecimento->getAdministracao_rural();
				$astronomia=$area_conhecimento->getAstronomia();
				$biomedicina=$area_conhecimento->getBiomedicina();
				$botanica=$area_conhecimento->getBotanica();
				$carreira_religiosa=$area_conhecimento->getCarreira_religiosa();
				$ciencia_informacao=$area_conhecimento->getCiencia_informacao();
				$ciencia_politica=$area_conhecimento->getCiencia_politica();
				$ciencias_atuariais=$area_conhecimento->getCiencias_atuariais();
				$comunicacao=$area_conhecimento->getComunicacao();
				$demografia=$area_conhecimento->getDemografia();
				$desenho_projetos=$area_conhecimento->getDesenho_projetos();
				$diplomacia=$area_conhecimento->getDiplomacia();
				$economia_domestica=$area_conhecimento->getEconomia_domestica();
				$enfermagem=$area_conhecimento->getEnfermagem();
				$engenharia_agricola=$area_conhecimento->getEngenharia_agricola();
				$engenharia_cartografica=$area_conhecimento->getEngenharia_cartografica();
				$engenharia_agrimensura=$area_conhecimento->getEngenharia_agrimensura();
				$engenharia_materiais_metalurgica=$area_conhecimento->getEngenharia_materiais_metalurgica();
				$engenharia_producao=$area_conhecimento->getEngenharia_producao();
				$engenharia_eletrica=$area_conhecimento->getEngenharia_eletrica();
				$engenharia_naval_oceanica=$area_conhecimento->getEngenharia_naval_oceanica();
				$engenharia_quimica=$area_conhecimento->getEngenharia_quimica();
				$estudos_sociais=$area_conhecimento->getEstudos_sociais();
				$farmacologia=$area_conhecimento->getFarmacologia();
				$fisioterapia_terapia_ocupacional=$area_conhecimento->getFisioterapia_terapia_ocupacional();
				$genetica=$area_conhecimento->getGenetica();
				$imunologia=$area_conhecimento->getImunologia();
				$medicina=$area_conhecimento->getMedicina();
				$microbiologia=$area_conhecimento->getMicrobiologia();
				$museologia=$area_conhecimento->getMuseologia();
				$oceanografia=$area_conhecimento->getOceanografia();
				$parasitologia=$area_conhecimento->getParasitologia();
				$probabilidade_estatistica=$area_conhecimento->getProbabilidade_estatistica();
				$recursos_pesqueiros_engenharia_pesca=$area_conhecimento->getRecursos_pesqueiros_engenharia_pesca();
				$relacoes_publicas=$area_conhecimento->getRelacoes_publicas();
				$servico_social=$area_conhecimento->getServico_social();
				$zoologia=$area_conhecimento->getZoologia();
				$administracao_hospitalar=$area_conhecimento->getAdministracao_hospitalar();
				$arqueologia=$area_conhecimento->getArqueologia();
				$biofisica=$area_conhecimento->getBiofisica();
				$bioquimica=$area_conhecimento->getBioquimica();
				$carreira_militar=$area_conhecimento->getCarreira_militar();
				$ciencia_computacao=$area_conhecimento->getCiencia_computacao();
				$ciencia_alimentos=$area_conhecimento->getCiencia_tecnologia_alimentos();
				$ciencias=$area_conhecimento->getCiencias();
				$ciencias_sociais=$area_conhecimento->getCiencias_sociais();
				$decoracao=$area_conhecimento->getDecoracao();
				$desenho_moda=$area_conhecimento->getDesenho_moda();
				$desenho_industrial=$area_conhecimento->getDesenho_industrial();
				$economia=$area_conhecimento->getEconomia();
				$educacao_fisica=$area_conhecimento->getEducacao_fisica();
				$engenharia_aeroespacial=$area_conhecimento->getEngenharia_aeroespacial();
				$engenharia_biomedica=$area_conhecimento->getEngenharia_biomedica();
				$engenharia_civil=$area_conhecimento->getEngenharia_civil();
				$engenharia_armamentos=$area_conhecimento->getEngenharia_armamentos();
				$engenharia_minas=$area_conhecimento->getEngenharia_minas();
				$engenharia_transportes=$area_conhecimento->getEngenharia_transportes();
				$engenharia_mecatronica=$area_conhecimento->getEngenharia_mecatronica();
				$engenharia_nucl=$area_conhecimento->getEngenharia_nuclear();
				$engenharia_textil=$area_conhecimento->getEngenharia_textil();
				$farmacia=$area_conhecimento->getFarmacia();
				$fisiologia=$area_conhecimento->getFisiologia();
				$fonoaudiologia=$area_conhecimento->getFonoaudiologia();
				$historia_natural=$area_conhecimento->getHistoria_natural();
				$linguistica=$area_conhecimento->getLinguistica();
				$medicina_veterinaria=$area_conhecimento->getMedicina_veterinaria();
				$morfologia=$area_conhecimento->getMorfologia();
				$nutricao=$area_conhecimento->getNutricao();
				$odontologia=$area_conhecimento->getOdontologia();
				$planejamento_urbano_regional=$area_conhecimento->getPlanejamento_urbano_regional();
				$quimica_industrial=$area_conhecimento->getQuimica_industrial();
				$relacoes_internacionais=$area_conhecimento->getRelacoes_internacionais();
				$secretariado_executiva=$area_conhecimento->getSecretariado_executiva();
				$teologia=$area_conhecimento->getTeologia();
				$zootecnia=$area_conhecimento->getZootecnia();
				$qagronomia=$area_conhecimento->getQagronomia();
				$qarquitetura_urbanismo=$area_conhecimento->getQarquitetura_urbanismo();
				$qbiologia_geral=$area_conhecimento->getQbiologia_geral();
				$qdireito=$area_conhecimento->getQdireito();
				$qeducacao=$area_conhecimento->getQeducacao();
				$qfilosofia=$area_conhecimento->getQfilosofia();
				$qgeociencias=$area_conhecimento->getQgeociencias();
				$qhistoria=$area_conhecimento->getQhistoria();
				$qmatematica=$area_conhecimento->getQmatematica();
				$qquimica=$area_conhecimento->getQquimica();
				$qsaude_coletiva=$area_conhecimento->getQsaude_coletiva();
				$qturismo=$area_conhecimento->getQturismo();
				$qantropologia=$area_conhecimento->getQantropologia();
				$qarte=$area_conhecimento->getQarte();
				$qcomunicacao_jornalismo=$area_conhecimento->getQcomunicacao_jornalismo();
				$qecologia=$area_conhecimento->getQecologia();
				$qengenharia_sanitaria=$area_conhecimento->getQengenharia_sanitaria();
				$qfisica=$area_conhecimento->getQfisica();
				$qgeografia=$area_conhecimento->getQgeografia();
				$qletras=$area_conhecimento->getQletras();
				$qpsicologia=$area_conhecimento->getQpsicologia();
				$qrec_florestais_eng_florestal=$area_conhecimento->getQrec_florestais_eng_florestal();
				$qsociologia=$area_conhecimento->getQsociologia();
				$qadministracao=$area_conhecimento->getQadministracao();
				$qadministracao_rural=$area_conhecimento->getQadministracao_rural();
				$qastronomia=$area_conhecimento->getQastronomia();
				$qbiomedicina=$area_conhecimento->getQbiomedicina();
				$qbotanica=$area_conhecimento->getQbotanica();
				$qcarreira_religiosa=$area_conhecimento->getQcarreira_religiosa();
				$qciencia_informacao=$area_conhecimento->getQciencia_informacao();
				$qciencia_politica=$area_conhecimento->getQciencia_politica();
				$qciencias_atuariais=$area_conhecimento->getQciencias_atuariais();
				$qcomunicacao=$area_conhecimento->getQcomunicacao();
				$qdemografia=$area_conhecimento->getQdemografia();
				$qdesenho_projetos=$area_conhecimento->getQdesenho_projetos();
				$qdiplomacia=$area_conhecimento->getQdiplomacia();
				$qeconomia_domestica=$area_conhecimento->getQeconomia_domestica();
				$qenfermagem=$area_conhecimento->getQenfermagem();
				$qengenharia_agricola=$area_conhecimento->getQengenharia_agricola();
				$qengenharia_cartografica=$area_conhecimento->getQengenharia_cartografica();
				$qengenharia_agrimensura=$area_conhecimento->getQengenharia_agrimensura();
				$qengenharia_materiais_metalurgica=$area_conhecimento->getQengenharia_materiais_metalurgica();
				$qengenharia_producao=$area_conhecimento->getQengenharia_producao();
				$qengenharia_eletrica=$area_conhecimento->getQengenharia_eletrica();
				$qengenharia_naval_oceanica=$area_conhecimento->getQengenharia_naval_oceanica();
				$qengenharia_quimica=$area_conhecimento->getQengenharia_quimica();
				$qestudos_sociais=$area_conhecimento->getQestudos_sociais();
				$qfarmacologia=$area_conhecimento->getQfarmacologia();
				$qfisioterapia_terapia_ocupacional=$area_conhecimento->getQfisioterapia_terapia_ocupacional();
				$qgenetica=$area_conhecimento->getQgenetica();
				$qimunologia=$area_conhecimento->getQimunologia();
				$qmedicina=$area_conhecimento->getQmedicina();
				$qmicrobiologia=$area_conhecimento->getQmicrobiologia();
				$qmuseologia=$area_conhecimento->getQmuseologia();
				$qoceanografia=$area_conhecimento->getQoceanografia();
				$qparasitologia=$area_conhecimento->getQparasitologia();
				$qprobabilidade_estatistica=$area_conhecimento->getQprobabilidade_estatistica();
				$qrecursos_pesqueiros_engenharia_pesca=$area_conhecimento->getQrecursos_pesqueiros_engenharia_pesca();
				$qrelacoes_publicas=$area_conhecimento->getQrelacoes_publicas();
				$qservico_social=$area_conhecimento->getQservico_social();
				$qzoologia=$area_conhecimento->getQzoologia();
				$qadministracao_hospitalar=$area_conhecimento->getQadministracao_hospitalar();
				$qarqueologia=$area_conhecimento->getQarqueologia();
				$qbiofisica=$area_conhecimento->getQbiofisica();
				$qbioquimica=$area_conhecimento->getQbioquimica();
				$qcarreira_militar=$area_conhecimento->getQcarreira_militar();
				$qciencia_computacao=$area_conhecimento->getQciencia_computacao();
				$qciencia_alimentos=$area_conhecimento->getQciencia_tecnologia_alimentos();
				$qciencias=$area_conhecimento->getQciencias();
				$qciencias_sociais=$area_conhecimento->getQciencias_sociais();
				$qdecoracao=$area_conhecimento->getQdecoracao();
				$qdesenho_moda=$area_conhecimento->getQdesenho_moda();
				$qdesenho_industrial=$area_conhecimento->getQdesenho_industrial();
				$qeconomia=$area_conhecimento->getQeconomia();
				$qeducacao_fisica=$area_conhecimento->getQeducacao_fisica();
				$qengenharia_aeroespacial=$area_conhecimento->getQengenharia_aeroespacial();
				$qengenharia_biomedica=$area_conhecimento->getQengenharia_biomedica();
				$qengenharia_civil=$area_conhecimento->getQengenharia_civil();
				$qengenharia_armamentos=$area_conhecimento->getQengenharia_armamentos();
				$qengenharia_minas=$area_conhecimento->getQengenharia_minas();
				$qengenharia_transportes=$area_conhecimento->getQengenharia_transportes();
				$qengenharia_mecatronica=$area_conhecimento->getQengenharia_mecatronica();
				$qengenharia_nucl=$area_conhecimento->getQengenharia_nuclear();
				$qengenharia_textil=$area_conhecimento->getQengenharia_textil();
				$qfarmacia=$area_conhecimento->getQfarmacia();
				$qfisiologia=$area_conhecimento->getQfisiologia();
				$qfonoaudiologia=$area_conhecimento->getQfonoaudiologia();
				$qhistoria_natural=$area_conhecimento->getQhistoria_natural();
				$qlinguistica=$area_conhecimento->getQlinguistica();
				$qmedicina_veterinaria=$area_conhecimento->getQmedicina_veterinaria();
				$qmorfologia=$area_conhecimento->getQmorfologia();
				$qnutricao=$area_conhecimento->getQnutricao();
				$qodontologia=$area_conhecimento->getQodontologia();
				$qplanejamento_urbano_regional=$area_conhecimento->getQplanejamento_urbano_regional();
				$qquimica_industrial=$area_conhecimento->getQquimica_industrial();
				$qrelacoes_internacionais=$area_conhecimento->getQrelacoes_internacionais();
				$qsecretariado_executiva=$area_conhecimento->getQsecretariado_executiva();
				$qteologia=$area_conhecimento->getQteologia();
				$qzootecnia=$area_conhecimento->getQzootecnia();

				//Area Conhecimento
				$string_area_conhecimento = '';
				if($qAreaConhecimento==1){
					$string_area_conhecimento .= "Dados insuficientes para classificação<br>";
				}else{
					if($qagronomia==1 || $qantropologia==1 || $qarquitetura_urbanismo==1 || $qarte==1 || $qbiologia_geral==1 || $qcomunicacao_jornalismo==1 || $qdireito==1 || $qecologia==1 || $qeducacao==1 || $qengenharia_sanitaria==1 || $qfilosofia==1 || $qfisica==1 || $qgeociencias==1 || $qgeografia==1 || $qhistoria==1 || $qletras==1 || $qmatematica==1 || $qpsicologia==1 || $qquimica==1 || $qrec_florestais_eng_florestal==1 || $qsaude_coletiva==1 || $qsociologia==1 || $qturismo==1 || $qadministracao==1 || $qadministracao_hospitalar==1 || $qadministracao_rural==1 || $qarqueologia==1 || $qastronomia==1 || $qbiofisica==1 || $qbiomedicina==1 || $qbioquimica==1 || $qbotanica==1 || $qcarreira_militar==1 || $qcarreira_religiosa==1 || $qciencia_computacao==1 || $qciencia_informacao==1 || $qciencia_alimentos==1 || $qciencia_politica==1 || $qciencias==1 || $qciencias_atuariais==1 || $qciencias_sociais==1 || $qcomunicacao==1 || $qdecoracao==1 || $qdemografia==1 || $qdesenho_moda==1 || $qdesenho_projetos==1 || $qdesenho_industrial==1 || $qdiplomacia==1 || $qeconomia==1 || $qeconomia_domestica==1 || $qeducacao_fisica==1 || $qenfermagem==1 || $qengenharia_aeroespacial==1 || $qengenharia_agricola==1 || $qengenharia_biomedica==1 || $qengenharia_cartografica==1 || $qengenharia_civil==1 || $qengenharia_agrimensura==1 || $qengenharia_armamentos==1 || $qengenharia_materiais_metalurgica==1 || $qengenharia_minas==1 || $qengenharia_producao==1 || $qengenharia_transportes==1 || $qengenharia_eletrica==1 || $qengenharia_mecatronica==1 || $qengenharia_naval_oceanica==1 || $qengenharia_nucl==1 || $qengenharia_quimica==1 || $qengenharia_textil==1 || $qestudos_sociais==1 || $qfarmacia==1 || $qfarmacologia==1 || $qfisiologia==1 || $qfisioterapia_terapia_ocupacional==1 || $qfonoaudiologia==1 || $qgenetica==1 || $qhistoria_natural==1 || $qimunologia==1 || $qlinguistica==1 || $qmedicina==1 || $qmedicina_veterinaria==1 || $qmicrobiologia==1 || $qmorfologia==1 || $qmuseologia==1 || $qnutricao==1 || $qoceanografia==1 || $qodontologia==1 || $qparasitologia==1 || $qplanejamento_urbano_regional==1 || $qprobabilidade_estatistica==1 || $qquimica_industrial==1 || $qrecursos_pesqueiros_engenharia_pesca==1 || $qrelacoes_internacionais==1 || $qrelacoes_publicas==1 || $qsecretariado_executiva==1 || $qservico_social==1 || $qteologia==1 || $qzoologia==1 || $qzootecnia==1){
						$string_area_conhecimento .= "Dados insuficientes para classificação<br>";
					}else{
						if($administracao==1) $string_area_conhecimento .= "Administração<br />";
						if($administracao_hospitalar==1) $string_area_conhecimento .= "Administração Hospitalar<br />";
						if($administracao_rural==1) $string_area_conhecimento .= "Administração Rural<br />";
						if($agronomia==1) $string_area_conhecimento .= "Agronomia<br />";
						if($antropologia==1) $string_area_conhecimento .= "Antropologia<br />";
						if($arqueologia==1) $string_area_conhecimento .= "Arqueologia<br />";
						if($arquitetura_urbanismo==1) $string_area_conhecimento .= "Arquitetura e Urbanismo<br />";
						if($arte==1) $string_area_conhecimento .= "Arte<br />";
						if($astronomia==1) $string_area_conhecimento .= "Astronomia<br />";
						if($biofisica==1) $string_area_conhecimento .= "Biofísica<br />";
						if($biologia_geral==1) $string_area_conhecimento .= "Biologia Geral<br />";
						if($biomedicina==1) $string_area_conhecimento .= "Biomedicina<br />";
						if($bioquimica==1) $string_area_conhecimento .= "Bioquímica<br />";
						if($botanica==1) $string_area_conhecimento .= "Botanica<br />";
						if($carreira_militar==1) $string_area_conhecimento .= "Carreira Militar<br />";
						if($carreira_religiosa==1) $string_area_conhecimento .= "Carreira Religiosa<br />";
						if($ciencia_alimentos==1) $string_area_conhecimento .= "Ciência e Tecnologia de Alimentos<br />";
						if($ciencia_computacao==1) $string_area_conhecimento .= "Ciência da Computação<br />";
						if($ciencia_informacao==1) $string_area_conhecimento .= "Ciência da Informação<br />";
						if($ciencia_politica==1) $string_area_conhecimento .= "Ciência Política<br />";
						if($ciencias==1) $string_area_conhecimento .= "Ciências<br />";
						if($ciencias_atuariais==1) $string_area_conhecimento .= "Ciências Atuariais<br />";
						if($ciencias_sociais==1) $string_area_conhecimento .= "Ciências Sociais<br />";
						if($comunicacao==1) $string_area_conhecimento .= "Comunicação<br />";
						if($comunicacao_jornalismo==1) $string_area_conhecimento .= "Geral<br />";
						if($decoracao==1) $string_area_conhecimento .= "Decoração<br />";
						if($demografia==1) $string_area_conhecimento .= "Demografia<br />";
						if($desenho_industrial==1) $string_area_conhecimento .= "Desenho Industrial<br />";
						if($desenho_moda==1) $string_area_conhecimento .= "Desenho de Moda<br />";
						if($desenho_projetos==1) $string_area_conhecimento .= "Desenho de Projetos<br />";
						if($diplomacia==1) $string_area_conhecimento .= "Diplomacia<br />";
						if($direito==1) $string_area_conhecimento .= "Direito<br />";
						if($ecologia==1) $string_area_conhecimento .= "Ecologia<br />";
						if($economia==1) $string_area_conhecimento .= "Economia<br />";
						if($economia_domestica==1) $string_area_conhecimento .= "Economia Doméstica<br />";
						if($educacao==1) $string_area_conhecimento .= "Educação<br />";
						if($educacao_fisica==1) $string_area_conhecimento .= "Educação Física<br />";
						if($enfermagem==1) $string_area_conhecimento .= "Enfermagem<br />";
						if($engenharia_aeroespacial==1) $string_area_conhecimento .= "Engenharia Aeroespacial<br />";
						if($engenharia_agricola==1) $string_area_conhecimento .= "Engenharia Agrícola<br />";
						if($engenharia_agrimensura==1) $string_area_conhecimento .= "Engenharia de Agrimensura<br />";
						if($engenharia_armamentos==1) $string_area_conhecimento .= "Engenharia de Armamentos<br />";
						if($engenharia_biomedica==1) $string_area_conhecimento .= "Engenharia Biomédica<br />";
						if($engenharia_cartografica==1) $string_area_conhecimento .= "Engenharia Cartográfica<br />";
						if($engenharia_civil==1) $string_area_conhecimento .= "Engenharia Civil<br />";
						if($engenharia_eletrica==1) $string_area_conhecimento .= "Engenharia Elétrica<br />";
						if($engenharia_materiais_metalurgica==1) $string_area_conhecimento .= "Engenharia de Materiais e Metalúrgica<br />";
						if($engenharia_mecatronica==1) $string_area_conhecimento .= "Engenharia Mecatrônica<br />";
						if($engenharia_minas==1) $string_area_conhecimento .= "Engenharia de Minas<br />";
						if($engenharia_naval_oceanica==1) $string_area_conhecimento .= "Engenharia Naval e Oceânica<br />";
						if($engenharia_nucl==1) $string_area_conhecimento .= "Engenharia Nuclear<br />";
						if($engenharia_producao==1) $string_area_conhecimento .= "Engenharia de Produção<br />";
						if($engenharia_quimica==1) $string_area_conhecimento .= "Engenharia Química<br />";
						if($engenharia_sanitaria==1) $string_area_conhecimento .= "Engenharia Sanitária<br />";
						if($engenharia_textil==1) $string_area_conhecimento .= "Engenharia Têxtil<br />";
						if($engenharia_transportes==1) $string_area_conhecimento .= "Engenharia de Transportes<br />";
						if($estudos_sociais==1) $string_area_conhecimento .= "Estudos Sociais<br />";
						if($farmacia==1) $string_area_conhecimento .= "Farmácia<br />";
						if($farmacologia==1) $string_area_conhecimento .= "Farmacologia<br />";
						if($filosofia==1) $string_area_conhecimento .= "Filosofia<br />";
						if($fisica==1) $string_area_conhecimento .= "Física<br />";
						if($fisiologia==1) $string_area_conhecimento .= "Fisiologia<br />";
						if($fisioterapia_terapia_ocupacional==1) $string_area_conhecimento .= "Fisioterapia e Terapia Ocupacional<br />";
						if($fonoaudiologia==1) $string_area_conhecimento .= "Fonoaudiologia<br />";
						if($genetica==1) $string_area_conhecimento .= "Genética<br />";
						if($geociencias==1) $string_area_conhecimento .= "Geociencias<br />";
						if($geografia==1) $string_area_conhecimento .= "Geografia<br />";
						if($historia==1) $string_area_conhecimento .= "História<br />";
						if($historia_natural==1) $string_area_conhecimento .= "História Natural<br />";
						if($imunologia==1) $string_area_conhecimento .= "Imunologia<br />";
						if($letras==1) $string_area_conhecimento .= "Letras<br />";
						if($linguistica==1) $string_area_conhecimento .= "Linguística<br />";
						if($matematica==1) $string_area_conhecimento .= "Matemática<br />";
						if($medicina==1) $string_area_conhecimento .= "Medicina<br />";
						if($medicina_veterinaria==1) $string_area_conhecimento .= "Medicina Veterinária<br />";
						if($microbiologia==1) $string_area_conhecimento .= "Microbiologia<br />";
						if($morfologia==1) $string_area_conhecimento .= "Morfologia<br />";
						if($museologia==1) $string_area_conhecimento .= "Museologia<br />";
						if($nutricao==1) $string_area_conhecimento .= "Nutrição<br />";
						if($oceanografia==1) $string_area_conhecimento .= "Oceanografia<br />";
						if($odontologia==1) $string_area_conhecimento .= "Odontologia<br />";
						if($parasitologia==1) $string_area_conhecimento .= "Parasitologia<br />";
						if($planejamento_urbano_regional==1) $string_area_conhecimento .= "Planejamento Urbano e Regional<br />";
						if($probabilidade_estatistica==1) $string_area_conhecimento .= "Probabilidade e Estatística<br />";
						if($psicologia==1) $string_area_conhecimento .= "Psicologia<br />";
						if($quimica==1) $string_area_conhecimento .= "Química<br />";
						if($quimica_industrial==1) $string_area_conhecimento .= "Química Industrial<br />";
						if($rec_florestais_eng_florestal==1) $string_area_conhecimento .= "Recursos Florestais e Eng. Florestal<br />";
						if($recursos_pesqueiros_engenharia_pesca==1) $string_area_conhecimento .= "Recursos Pesqueiros e Engenharia de Pesca<br />";
						if($relacoes_internacionais==1) $string_area_conhecimento .= "Relações Internacionais<br />";
						if($relacoes_publicas==1) $string_area_conhecimento .= "Relações Públicas<br />";
						if($saude_coletiva==1) $string_area_conhecimento .= "Saúde Coletiva<br />";
						if($secretariado_executiva==1) $string_area_conhecimento .= "Secretariado Executiva<br />";
						if($servico_social==1) $string_area_conhecimento .= "Serviço Social<br />";
						if($sociologia==1) $string_area_conhecimento .= "Sociologia<br />";
						if($teologia==1) $string_area_conhecimento .= "Teologia<br />";
						if($turismo==1) $string_area_conhecimento .= "Turismo<br />";
						if($zoologia==1) $string_area_conhecimento .= "Zoologia<br />";
						if($zootecnia==1) $string_area_conhecimento .= "Zootecnia<br />";
					}
				}
				//END Area Conhecimento
			//END AREA CONHECIMENTO

			//TEMA AMBIENTAL
				ob_start();

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');

				$query = mysql_query("SELECT tema_ambiental FROM tema_ambiental_keys WHERE ficha = ".$tese['id']);
				if(mysql_num_rows($query)){
					while($linha = mysql_fetch_assoc($query)){
						$tema_ambiental = mysql_query("SELECT tema_ambiental FROM tema_ambiental WHERE id = ".$linha['tema_ambiental']);
						if(mysql_num_rows($tema_ambiental)){
							echo mysql_result($tema_ambiental, 0),'<br>';
						}
					}
				}

				$string_tema_ambiental_final = ob_get_contents();

				DBFactory::closeConnection();

				ob_end_clean();
			//END TEMA AMBIENTAL

			//TEMA ESTUDO
				$tedao = new Tema_estudoDAO();
				$tema_estudo=$tedao->selectDataForCode($id_tema_estudo);

				$qTemaEstudo=$tema_estudo->getQtema_estudo();
				$curric_programas_projetos=$tema_estudo->getCurric_programas_projetos();
				$conteudo_metodos=$tema_estudo->getConteudo_metodos();
				$concep_repres_percep_formador=$tema_estudo->getConcep_repres_percep_formador();
				$concep_repres_percep_aprediz=$tema_estudo->getConcep_repres_percep_aprediz();
				$recursos_didaticos=$tema_estudo->getRecursos_didaticos();
				$linguagem_cognicao=$tema_estudo->getLinguagem_cognicao();
				$politicas_publicas_ea=$tema_estudo->getPoliticas_publicas_ea();
				$organ_instituicao_escolar=$tema_estudo->getOrgan_instituicao_escolar();
				$organ_nao_governamental=$tema_estudo->getOrgan_nao_governamental();
				$organ_governamental=$tema_estudo->getOrgan_governamental();
				$trab_form_professores_agentes=$tema_estudo->getTrab_form_professores_agentes();
				$movim_sociais_ambientalistas=$tema_estudo->getMovim_sociais_ambientalistas();
				$fundamentos_ea=$tema_estudo->getfundamentos_ea();$qcurric_programas_projetos=$tema_estudo->getQcurric_programas_projetos();
				$qconteudo_metodos=$tema_estudo->getQconteudo_metodos();
				$qconcep_repres_percep_formador=$tema_estudo->getQconcep_repres_percep_formador();
				$qconcep_repres_percep_aprediz=$tema_estudo->getQconcep_repres_percep_aprediz();
				$qrecursos_didaticos=$tema_estudo->getQrecursos_didaticos();
				$qlinguagem_cognicao=$tema_estudo->getQlinguagem_cognicao();
				$qpoliticas_publicas_ea=$tema_estudo->getQpoliticas_publicas_ea();
				$qorgan_instituicao_escolar=$tema_estudo->getQorgan_instituicao_escolar();
				$qorgan_nao_governamental=$tema_estudo->getQorgan_nao_governamental();
				$qorgan_governamental=$tema_estudo->getQorgan_governamental();
				$qtrab_form_professores_agentes=$tema_estudo->getQtrab_form_professores_agentes();
				$qmovim_sociais_ambientalistas=$tema_estudo->getQmovim_sociais_ambientalistas();
				$qfundamentos_ea=$tema_estudo->getQfundamentos_ea();

				//Tema de Estudo
				$string_tema_estudo = '';
				if($qTemaEstudo==1){
					$string_tema_estudo .= "Dados insuficientes para classificação<br>";
				}else{
					if($qcurric_programas_projetos==1 || $qconteudo_metodos==1 || $qconcep_repres_percep_formador==1 || $qconcep_repres_percep_aprediz==1 || $qrecursos_didaticos==1 || $qlinguagem_cognicao==1 || $qpoliticas_publicas_ea==1 || $qorgan_instituicao_escolar==1 || $qorgan_nao_governamental==1 || $qorgan_governamental==1 || $qtrab_form_professores_agentes==1 || $qmovim_sociais_ambientalistas==1 || $qfundamentos_ea==1){
						$string_tema_estudo .= "Dados insuficientes para classificação<br>";
					}else{
						if($curric_programas_projetos==1) $string_tema_estudo .= "Currículos, Programas e Projetos<br />";
						if($conteudo_metodos==1) $string_tema_estudo .= "Conteúdo e Métodos<br />";
						if($concep_repres_percep_formador==1) $string_tema_estudo .= "Concepções/Representações/ Percepções do Formador em EA<br />";
						if($concep_repres_percep_aprediz==1) $string_tema_estudo .= "Concepções/Representações/ Percepções do Aprendiz em EA<br />";
						if($recursos_didaticos==1) $string_tema_estudo .= "Recursos Didáticos<br />";
						if($linguagem_cognicao==1) $string_tema_estudo .= "Linguagens/Comunicação/Cognição<br />";
						if($politicas_publicas_ea==1) $string_tema_estudo .= "Políticas Públicas em EA<br />";
						if($organ_instituicao_escolar==1) $string_tema_estudo .= "Organização da Instituição Escolar<br />";
						if($organ_nao_governamental==1) $string_tema_estudo .= "Organização não Governamental<br />";
						if($organ_governamental==1) $string_tema_estudo .= "Organização Governamental<br />";
						if($trab_form_professores_agentes==1) $string_tema_estudo .= "Trabalho e Formação de Professores/Agentes<br />";
						if($movim_sociais_ambientalistas==1) $string_tema_estudo .= "Movimentos Sociais/Ambientalistas<br />";
						if($fundamentos_ea==1) $string_tema_estudo .= "Fundamentos em EA<br />";
					}
				}
				//END Tema de Estudo
			//END TEMA ESTUDO

			//FOCO
				ob_start();

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');

				$query = mysql_query("SELECT foco FROM foco_keys WHERE ficha = ".$tese['id']);
				if(mysql_num_rows($query)){
					while($linha = mysql_fetch_assoc($query)){
						$foco = mysql_query("SELECT foco FROM foco WHERE id = ".$linha['foco']);
						if(mysql_num_rows($foco)){
							echo mysql_result($foco, 0),'<br>';
						}
					}
				}

				$string_foco_final = ob_get_contents();

				ob_end_clean();
			//END FOCO

			//DETALHES FINAIS
				$dfdao = new Detalhes_finaisDAO();
				$detalhes_finais=$dfdao->selectDataForCode($id_detalhes_finais);

				$observacoes=$detalhes_finais->getObservacoes();
				$palavras_chave=$detalhes_finais->getPalavras_chave();
				$url_trabalho=$detalhes_finais->getUrl_trabalho();
				$url_resumo=$detalhes_finais->getUrl_resumo();
				$doc_classificado_por=$detalhes_finais->getDoc_classificado_por();
				$data_classificacao=$detalhes_finais->getData_classificacao();
				//echo "Detalhes Finais: <br />";
				//if($observacoes) echo "Observações: $observacoes<br />";
				//if($url_trabalho) echo "URL Trab. Complet: $url_trabalho<br />";
				//if($doc_classificado_por) echo "Doc. Classificado por: $doc_classificado_por<br />";
				//if($data_classificacao) echo "Data de Classificação: $data_classificacao<br /><br />";
			//END DETALHES FINAIS

			//ECHO Créditos do Trabalho (IDENTIFICACAO)
				echo mb_strtoupper($autor_sobrenome,'UTF-8').', '.$autor_nome.'. <strong>'.ucfirst($titulo).'</strong>'.$titulo_sec.'. '.$ano_defesa.'. '.$numero_paginas.' p. '.$tipo_texto.' ('.$grau_titulacao_academica_inside.' em '.$programa_pos.') &ndash; '.$unidade_setor.', '.$ies.', '.$cidade.', '.$ano_defesa.'.<br>';

				echo '<strong>Orientador</strong>: '.substr($temp_orientador_string,0,-2).'<br>';
				
				echo '<strong>Id</strong>:'.$codigo.'<br><br>';
			//END ECHO Créditos do Trabalho (IDENTIFICACAO)

			//ECHO Resumo (RESUMO)
				echo "<h3>Resumo</h3><br>$resumo<br /><br />";
			//END ECHO Resumo (RESUMO)

			//ECHO Palavras-Chave (DETALHES FINAIS)
				if($palavras_chave){
					echo "<h3>Palavras-Chave</h3>";
					echo "$palavras_chave<br><br>";
				}
			//END ECHO Palavras-Chave (DETALHES FINAIS)

			//ECHO Urls (DETALHES FINAIS)
				if($url_resumo) echo "<h3>URL Banco de Teses CAPES</h3> $url_resumo<br>";
				if($url_trabalho) echo "<h3>URL do Trabalho Completo</h3> $url_trabalho<br>";
			//END ECHO Urls (DETALHES FINAIS)

			echo "<h2>Resultados da Classificação</h2>";

			//ECHO Contexto Educacional e Modalidades (CONTEXTO EDUCACIONAL)
				if($string_contexto_educacional != ''){
					echo "<h4>Contexto Educacional</h4>";
					echo $string_contexto_educacional;
					if($string_modalidades!=''){
						echo ' - '.$string_modalidades;
					}
					echo "<br>";
				}
			//END ECHO Contexto Educacional e Modalidades (CONTEXTO EDUCACIONAL)

			//ECHO Área Curricular (AREA CURRICULAR)
				if(isset($string_area_curricular_final)&&$string_area_curricular_final){
					echo "<h4>Área Curricular:</h4>";
					echo $string_area_curricular_final;
					echo "<br>";
				}
			//END ECHO Área Curricular (AREA CURRICULAR)

			//ECHO Outra área (OUTRA AREA)
				if($string_outra_area_final!=''){
					if(!$string_area_curricular_final){
						echo "<h4>Área Curricular:</h4>";
					}
					echo '<h4>Outra Área:</h4>';
					echo $string_outra_area_final;
				}
			//END ECHO Outra área (OUTRA AREA)

			//ECHO Publico Envolvido (PUBLICO ENVOLVIDO)
				if($string_publico_envolvido_final!=''){
					echo "<h4>Público Envolvido:</h4>";
					echo $string_publico_envolvido_final;
					echo '<br>';
				}
			//END ECHO Publico Envolvido (PUBLICO ENVOLVIDO)

			//ECHO Area de Conhecimento (AREA CONHECIMENTO)
				if($string_area_conhecimento!=''){
					echo "<h4>Área de Conhecimento:</h4>";
					echo $string_area_conhecimento;
					echo "<br />";
				}
			//END ECHO Area de Conhecimento (AREA CONHECIMENTO)

			//ECHO Tema Ambiental (TEMA AMBIENTAL)
				if($string_tema_ambiental_final!=""){
					echo "<h4>Tema Ambiental:</h4>";
					echo $string_tema_ambiental_final;
					echo '<br>';
				}
			//END ECHO Tema Ambiental (TEMA AMBIENTAL)

			//ECHO Tema de Estudo (TEMA ESTUDO)
				if($string_tema_estudo!=''){
					echo "<h4>Tema de Estudo:</h4>";
					echo $string_tema_estudo;
					echo'<br>';
				}
			//END ECHO Tema de Estudo (TEMA ESTUDO)

			//ECHO Foco (FOCO)
				if($string_foco_final!=""){
					if(!$string_tema_estudo){
						echo "<h4>Tema de Estudo:</h4>";
					}
					echo "<h4>Outro Tema:</h4>";
					echo $string_foco_final;
					echo '<br>';
				}
			//END ECHO Foco (FOCO)


			echo "<hr><br>";
		}
	} else {
		echo "Não há nenhum resultado para ser listado.";
	}
	//xdebug_stop_trace();
	$time_end = microtime(true);

	//dividing with 60 will give the execution time in minutes other wise seconds
	$execution_time = ($time_end - $time_start);
	echo $execution_time;
?>
		</div>
	</body>
</html>
