<?php include_once("logado.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Ficha de Classificação</title>
	</head>
	<body>
<?php
	set_time_limit ( 0 );
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
		foreach($ids as $id){
			echo "<br />";
			$fdao = new Ficha_classificacaoDAO();
			$ficha=$fdao->selectDataForCode((int)$id);
			$consolidada=$ficha->getConsolidada();
			$codigo=$ficha->getCodigo();
			$id_identificacao=$ficha->getId_identificacao();
			$idao = new IdentificacaoDAO();
			$identificacao=$idao->selectDataForCode($id_identificacao);

			$titulo=$identificacao->getTitulo();
			$titulo = explode(":",$titulo);
			if(isset($titulo[1])){
				$titulo_sec = $titulo[1];
				$titulo = $titulo[0].':';
			}else{
				$titulo_sec = "";
				$titulo = $titulo[0];
			}

			$autor_nome=$identificacao->getAutor_nome();
			$autor_sobrenome=$identificacao->getAutor_sobrenome();
			$orientador=$identificacao->getOrientador();
			$ano_defesa=$identificacao->getAno_defesa();
			$numero_paginas=$identificacao->getNumero_paginas();
			$programa_pos=$identificacao->getPrograma_pos();
			$ies=$identificacao->getIes();
			$unidade_setor=$identificacao->getUnidade_setor();
			$estado=$identificacao->getEstado();
			// Pega o nome do estado através da sigla
			switch (trim($estado)) {
				case "AC":
				 $estado = "Acre";
				 break;

				 case "AL":
				 $estado = "Alagoas";
				 break;

				 case "AP":
				 $estado = "Amapá";
				 break;

				 case "AM":
				 $estado = "Amazonas";
				 break;

				 case "BA":
				 $estado = "Bahia";
				 break;

				 case "CE":
				 $estado = "Ceará";
				 break;

				 case "DF":
				 $estado = "Distrito Federal";
				 break;

				 case "GO":
				 $estado = "Goiás";
				 break;

				 case "RO":
				 $estado = "Rondônia";
				 break;

				 case "ES":
				 $estado = "Espírito Santo";
				 break;

				 case "MA":
				 $estado = "Maranhão";
				 break;

				 case "MT":
				 $estado = "Mato Grosso";
				 break;

				 case "MS":
				 $estado = "Mato Grosso do Sul";
				 break;

				 case "MG":
				 $estado = "Minas Gerais";
				 break;

				 case "PA":
				 $estado = "Pará";
				 break;

				 case "PB":
				 $estado = "Paraiba";
				 break;

				 case "PR":
				 $estado = "Paraná";
				 break;

				 case "PE":
				 $estado = "Pernambuco";
				 break;

				 case "PI":
				 $estado = "Piauí";
				 break;

				 case "RJ":
				 $estado = "Rio de Janeiro";
				 break;

				 case "RN":
				 $estado = "Rio Grande do Norte";
				 break;

				 case "RS":
				 $estado = "Rio Grande do Sul";
				 break;

				 case "RO":
				 $estado = "Rondônia";
				 break;

				 case "RR":
				 $estado = "Roraima";
				 break;

				 case "SP":
				 $estado = "São Paulo";
				 break;

				 case "SC":
				 $estado = "Santa Catarina";
				 break;

				 case "SE":
				 $estado = "Sergipe";
				 break;

				 case "TO":
				 $estado = "Tocantins";
				 break;

				 default:
				 $estado = '';
			 }
			$cidade=$identificacao->getCidade();
			$grau_titulacao_academica=$identificacao->getGrau_titulacao_academica();
			switch(mb_strtolower($grau_titulacao_academica,'UTF-8')){
				case "profissional":
				case "mestrado":
					$tipo_texto = "Dissertação";
					$grau_titulacao_academica_inside = "Mestrado";
				case "doutorado":
					$tipo_texto = "Tese";
					$grau_titulacao_academica_inside = "Doutorado";
			}
			$dependencia_administrativa=$identificacao->getDependencia_administrativa();
			echo mb_strtoupper($autor_sobrenome,'UTF-8').', '.$autor_nome.'. <strong>'.ucfirst($titulo).'</strong>'.$titulo_sec.'. '.$ano_defesa.'. '.$numero_paginas.' p. '.$tipo_texto.' ('.$grau_titulacao_academica_inside.' em '.$programa_pos.') &ndash; '.$unidade_setor.', '.$ies.', '.$cidade.', '.$ano_defesa.'.<br>';

			$temp_orientador = explode(';',$orientador);
			$temp_orientador_string = '';

			foreach ($temp_orientador as $nome){
				$nome = explode(' ', $nome);
				$last_nome = mb_strtoupper(array_pop($nome));
				if($last_nome==="JÚNIOR"||$last_nome==="JUNIOR"||$last_nome==="FILHO"||$last_nome==="NETO"){
					$last_nome = mb_strtoupper(array_pop($nome)).' '.$last_nome;
				}
				$nome = implode(' ',$nome);
				$temp_orientador_string .= $last_nome.', '.$nome.'; ';
			}

			echo 'Orientador: '.substr($temp_orientador_string,0,-2).'<br><br>';

			$id_resumo=$ficha->getId_resumo();
			$rdao = new ResumoDAO();
			$resumo=$rdao->selectDataForCode($id_resumo);
			$resumo=$resumo->getResumo();
			echo "<strong>Resumo</strong><br> <br>$resumo<br /><br />";

			$string_contexto_educacional = '';
			$id_contexto_educacional=$ficha->getId_contexto_educacional();
			$cedao = new Contexto_educacionalDAO();
			$contexto_educacional=$cedao->selectDataForCode($id_identificacao);
			$qcontextEdu=$contexto_educacional->getQcontexto_educacional();
			$contexto_nao_escolar=$contexto_educacional->getContexto_nao_escolar();
			$contexto_escolar=$contexto_educacional->getContexto_escolar();
			$abordagem_generica=$contexto_educacional->getAbordagem_generica();
			if($contexto_nao_escolar==1) $string_contexto_educacional .= "Contexto Não Escolar<br/>";
			if($contexto_escolar==1) $string_contexto_educacional .= "Contexto Escolar<br/>";
			if($abordagem_generica==1) $string_contexto_educacional .= "Abordagem Genérica<br/>";
			if($string_contexto_educacional != ''){
				echo "Contexto Educacional:<br/>";
				echo $string_contexto_educacional;
				echo "<br>";
			}elseif($qcontextEdu==1){
				echo "Contexto Educacional:<br>Dúvida";
			}


			$string_modalidades = '';
			$id_modalidades=$ficha->getId_modalidades();
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
			if($regular==1) $string_modalidades .= "Regular<br/>";
			if($educacao_infantil==1) $string_modalidades .= "Educação Infantil<br/>";
			if($ensino_fundamental_1_4_1_5==1) $string_modalidades .= "Ensino Fundamental 1ª a 4ª/1º ao 5º<br/>";
			if($ensino_fundamental_5_8_6_9==1) $string_modalidades .= "Ensino Fundamental 5ª a 8ª/6º ao 9º<br/>";
			if($ensino_medio==1) $string_modalidades .= "Ensino Médio<br/>";
			if($ensino_superior==1) $string_modalidades .= "Educação Superior<br/>";
			if($abordagem_generica_niveis_escolares==1) $string_modalidades .= "Abordagem Genérica dos Níveis Escolares<br/>";
			if($eja==1) $string_modalidades .= "EJA<br/>";
			if($educacao_especial==1) $string_modalidades .= "Educação Especial<br/>";
			if($educacao_indigena==1) $string_modalidades .= "Educação Indígena<br/>";
			if($educacao_profissional_tecnologica==1) $string_modalidades .= "Educação Profissional e Tecnológica<br/>";
			if($string_modalidades!=''){
				echo "Modalidades:<br/>";
				echo $string_modalidades;
				echo "<br />";
			}elseif($qmodalidade==1){
				echo "Modalidades:<br>Dúvida<br><br>";
			}



			$string_area_curricular = '';
			$id_area_curricular=$ficha->getId_area_curricular();
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

			ob_start();
			if($string_area_curricular!=''){
				echo $string_area_curricular;
			}

			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			$query = mysql_query("SELECT area_licenciatura FROM area_licenciatura_keys WHERE ficha = ".$id);
			if(mysql_num_rows($query)){
				while($linha = mysql_fetch_assoc($query)){
					$area_licenciatura = mysql_query("SELECT area_licenciatura FROM area_licenciatura WHERE id = ".$linha['area_licenciatura']);
					if(mysql_num_rows($area_licenciatura)){
						echo 'Licenciatura em ',mysql_result($area_licenciatura, 0),'<br>';
					}
				}
			}
			DBFactory::closeConnection();

			$string_area_curricular_final = ob_get_contents();

			ob_end_clean();

			if(isset($string_area_curricular_final)&&$string_area_curricular_final){
				echo "Área Curricular:<br/>";
				echo $string_area_curricular_final;
				echo "<br>";
			}elseif($qareaCurr==1){
				echo "Área Curricular:<br>Dúvida<br>";
			}

			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			$query = mysql_query("SELECT outra_area FROM outra_area_keys WHERE ficha = ".$id);
			if(mysql_num_rows($query)){
				if(!$string_area_curricular_final){
					echo "Área Curricular:<br/>";
				}
				echo 'Outra Área:<br>';
				while($linha = mysql_fetch_assoc($query)){
					$outra_area = mysql_query("SELECT outra_area FROM outra_area WHERE id = ".$linha['outra_area']);
					if(mysql_num_rows($outra_area)){
						echo mysql_result($outra_area, 0),'<br>';
					}
				}
			}

			DBFactory::closeConnection();



			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			$query = mysql_query("SELECT publico_envolvido FROM publico_envolvido_keys WHERE ficha = ".$id);
			if(mysql_num_rows($query)){
				echo "Publico Envolvido:<br>";
				while($linha = mysql_fetch_assoc($query)){
					$publico_envolvido = mysql_query("SELECT publico_envolvido FROM publico_envolvido WHERE id = ".$linha['publico_envolvido']);
					if(mysql_num_rows($publico_envolvido)){
						echo mysql_result($publico_envolvido, 0),'<br>';
					}
				}
				echo '<br>';
			}
			DBFactory::closeConnection();


			$string_area_conhecimento = '';
			$id_area_conhecimento=$ficha->getId_area_conhecimento();
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
			if($agronomia==1) $string_area_conhecimento .= "Agronomia<br />";
			if($antropologia==1) $string_area_conhecimento .= "Antropologia<br />";
			if($arquitetura_urbanismo==1) $string_area_conhecimento .= "Arquitetura e Urbanismo<br />";
			if($arte==1) $string_area_conhecimento .= "Arte<br />";
			if($biologia_geral==1) $string_area_conhecimento .= "Biologia Geral<br />";
			if($comunicacao_jornalismo==1) $string_area_conhecimento .= "Geral<br />";
			if($direito==1) $string_area_conhecimento .= "Direito<br />";
			if($ecologia==1) $string_area_conhecimento .= "Ecologia<br />";
			if($educacao==1) $string_area_conhecimento .= "Educação<br />";
			if($engenharia_sanitaria==1) $string_area_conhecimento .= "Engenharia Sanitária<br />";
			if($filosofia==1) $string_area_conhecimento .= "Filosofia<br />";
			if($fisica==1) $string_area_conhecimento .= "Física<br />";
			if($geociencias==1) $string_area_conhecimento .= "Geociencias<br />";
			if($geografia==1) $string_area_conhecimento .= "Geografia<br />";
			if($historia==1) $string_area_conhecimento .= "História<br />";
			if($letras==1) $string_area_conhecimento .= "Letras<br />";
			if($matematica==1) $string_area_conhecimento .= "Matemática<br />";
			if($psicologia==1) $string_area_conhecimento .= "Psicologia<br />";
			if($quimica==1) $string_area_conhecimento .= "Química<br />";
			if($rec_florestais_eng_florestal==1) $string_area_conhecimento .= "Recursos Florestais e Eng. Florestal<br />";
			if($saude_coletiva==1) $string_area_conhecimento .= "Saúde Coletiva<br />";
			if($sociologia==1) $string_area_conhecimento .= "Sociologia<br />";
			if($turismo==1) $string_area_conhecimento .= "Turismo<br />";
			if($administracao==1) $string_area_conhecimento .= "Administração<br />";
			if($administracao_hospitalar==1) $string_area_conhecimento .= "Administração Hospitalar<br />";
			if($administracao_rural==1) $string_area_conhecimento .= "Administração Rural<br />";
			if($arqueologia==1) $string_area_conhecimento .= "Arqueologia<br />";
			if($astronomia==1) $string_area_conhecimento .= "Astronomia<br />";
			if($biofisica==1) $string_area_conhecimento .= "Biofísica<br />";
			if($biomedicina==1) $string_area_conhecimento .= "Biomedicina<br />";
			if($bioquimica==1) $string_area_conhecimento .= "Bioquímica<br />";
			if($botanica==1) $string_area_conhecimento .= "Botanica<br />";
			if($carreira_militar==1) $string_area_conhecimento .= "Carreira Militar<br />";
			if($carreira_religiosa==1) $string_area_conhecimento .= "Carreira Religiosa<br />";
			if($ciencia_computacao==1) $string_area_conhecimento .= "Ciência da Computação<br />";
			if($ciencia_informacao==1) $string_area_conhecimento .= "Ciência da Informação<br />";
			if($ciencia_alimentos==1) $string_area_conhecimento .= "Ciência e Tecnologia de Alimentos<br />";
			if($ciencia_politica==1) $string_area_conhecimento .= "Ciência Política<br />";
			if($ciencias==1) $string_area_conhecimento .= "Ciências<br />";
			if($ciencias_atuariais==1) $string_area_conhecimento .= "Ciências Atuariais<br />";
			if($ciencias_sociais==1) $string_area_conhecimento .= "Ciências Sociais<br />";
			if($comunicacao==1) $string_area_conhecimento .= "Comunicação<br />";
			if($decoracao==1) $string_area_conhecimento .= "Decoração<br />";
			if($demografia==1) $string_area_conhecimento .= "Demografia<br />";
			if($desenho_moda==1) $string_area_conhecimento .= "Desenho de Moda<br />";
			if($desenho_projetos==1) $string_area_conhecimento .= "Desenho de Projetos<br />";
			if($desenho_industrial==1) $string_area_conhecimento .= "Desenho Industrial<br />";
			if($diplomacia==1) $string_area_conhecimento .= "Diplomacia<br />";
			if($economia==1) $string_area_conhecimento .= "Economia<br />";
			if($economia_domestica==1) $string_area_conhecimento .= "Economia Doméstica<br />";
			if($educacao_fisica==1) $string_area_conhecimento .= "Educação Física<br />";
			if($enfermagem==1) $string_area_conhecimento .= "Enfermagem<br />";
			if($engenharia_aeroespacial==1) $string_area_conhecimento .= "Engenharia Aeroespacial<br />";
			if($engenharia_agricola==1) $string_area_conhecimento .= "Engenharia Agrícola<br />";
			if($engenharia_biomedica==1) $string_area_conhecimento .= "Engenharia Biomédica<br />";
			if($engenharia_cartografica==1) $string_area_conhecimento .= "Engenharia Cartográfica<br />";
			if($engenharia_civil==1) $string_area_conhecimento .= "Engenharia Civil<br />";
			if($engenharia_agrimensura==1) $string_area_conhecimento .= "Engenharia de Agrimensura<br />";
			if($engenharia_armamentos==1) $string_area_conhecimento .= "Engenharia de Armamentos<br />";
			if($engenharia_materiais_metalurgica==1) $string_area_conhecimento .= "Engenharia de Materiais e Metalúrgica<br />";
			if($engenharia_minas==1) $string_area_conhecimento .= "Engenharia de Minas<br />";
			if($engenharia_producao==1) $string_area_conhecimento .= "Engenharia de Produção<br />";
			if($engenharia_transportes==1) $string_area_conhecimento .= "Engenharia de Transportes<br />";
			if($engenharia_eletrica==1) $string_area_conhecimento .= "Engenharia Elétrica<br />";
			if($engenharia_mecatronica==1) $string_area_conhecimento .= "Engenharia Mecatrônica<br />";
			if($engenharia_naval_oceanica==1) $string_area_conhecimento .= "Engenharia Naval e Oceânica<br />";
			if($engenharia_nucl==1) $string_area_conhecimento .= "Engenharia Nuclear<br />";
			if($engenharia_quimica==1) $string_area_conhecimento .= "Engenharia Química<br />";
			if($engenharia_textil==1) $string_area_conhecimento .= "Engenharia Têxtil<br />";
			if($estudos_sociais==1) $string_area_conhecimento .= "Estudos Sociais<br />";
			if($farmacia==1) $string_area_conhecimento .= "Farmácia<br />";
			if($farmacologia==1) $string_area_conhecimento .= "Farmacologia<br />";
			if($fisiologia==1) $string_area_conhecimento .= "Fisiologia<br />";
			if($fisioterapia_terapia_ocupacional==1) $string_area_conhecimento .= "Fisioterapia e Terapia Ocupacional<br />";
			if($fonoaudiologia==1) $string_area_conhecimento .= "Fonoaudiologia<br />";
			if($genetica==1) $string_area_conhecimento .= "Genética<br />";
			if($historia_natural==1) $string_area_conhecimento .= "História Natural<br />";
			if($imunologia==1) $string_area_conhecimento .= "Imunologia<br />";
			if($linguistica==1) $string_area_conhecimento .= "Linguística<br />";
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
			if($quimica_industrial==1) $string_area_conhecimento .= "Química Industrial<br />";
			if($recursos_pesqueiros_engenharia_pesca==1) $string_area_conhecimento .= "Recursos Pesqueiros e Engenharia de Pesca<br />";
			if($relacoes_internacionais==1) $string_area_conhecimento .= "Relações Internacionais<br />";
			if($relacoes_publicas==1) $string_area_conhecimento .= "Relações Públicas<br />";
			if($secretariado_executiva==1) $string_area_conhecimento .= "Secretariado Executiva<br />";
			if($servico_social==1) $string_area_conhecimento .= "Serviço Social<br />";
			if($teologia==1) $string_area_conhecimento .= "Teologia<br />";
			if($zoologia==1) $string_area_conhecimento .= "Zoologia<br />";
			if($zootecnia==1) $string_area_conhecimento .= "Zootecnia<br />";
			if($string_area_conhecimento!=''){
				echo "Área de Conhecimento: <br />";
				echo $string_area_conhecimento;
				echo "<br />";
			}elseif($qAreaConhecimento==1){
				echo "Área de Conhecimento:<br>Dúvida<br><br>";
			}


			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			$query = mysql_query("SELECT tema_ambiental FROM tema_ambiental_keys WHERE ficha = ".$id);
			if(mysql_num_rows($query)){
				echo "Tema Ambiental:<br>";
				while($linha = mysql_fetch_assoc($query)){
					$tema_ambiental = mysql_query("SELECT tema_ambiental FROM tema_ambiental WHERE id = ".$linha['tema_ambiental']);
					if(mysql_num_rows($tema_ambiental)){
						echo mysql_result($tema_ambiental, 0),'<br>';
					}
				}
				echo '<br>';
			}
			DBFactory::closeConnection();

				$string_tema_estudo = '';
				$id_tema_estudo=$ficha->getId_tema_estudo();
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
				$fundamentos_ea=$tema_estudo->getfundamentos_ea();
				$id_foco=$tema_estudo->getId_foco();
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
				if($string_tema_estudo!=''){
					echo "Tema de Estudo: <br />";
					echo $string_tema_estudo;
					echo'<br>';
				}elseif($qTemaEstudo){
					echo "Tema de Estudo:<br>Dúvida";
				}

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');

				$query = mysql_query("SELECT foco FROM foco_keys WHERE ficha = ".$id);
				if(mysql_num_rows($query)){
					if(!$string_tema_estudo){
						echo "Tema de Estudo: <br />";
					}
					echo "Outro Tema:<br>";
					while($linha = mysql_fetch_assoc($query)){
						$foco = mysql_query("SELECT foco FROM foco WHERE id = ".$linha['foco']);
						if(mysql_num_rows($foco)){
							echo mysql_result($foco, 0),'<br>';
						}
					}
					echo '<br>';
				}
				DBFactory::closeConnection();

			$id_detalhes_finais=$ficha->getId_resumo();
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
			if($palavras_chave) echo "Palavras-Chave: $palavras_chave<br><br>";
			//if($url_trabalho) echo "URL Trab. Complet: $url_trabalho<br />";
			if($url_resumo) echo "URL Banco de Teses CAPES:<br> $url_resumo<br />";
			//if($doc_classificado_por) echo "Doc. Classificado por: $doc_classificado_por<br />";
			//if($data_classificacao) echo "Data de Classificação: $data_classificacao<br /><br />";
			echo '<div style="page-break-before:always;"></div>';
			echo "<br />";
		}
	} else {
		echo "Não há nenhum resultado para ser listado.";
	}
?>
	</body>
</html>