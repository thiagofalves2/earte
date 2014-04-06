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
	//$time_start = microtime(true);
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
/*			$fdao = new Ficha_classificacaoDAO();
			$ficha=$fdao->selectDataForCode((int)$tese['id']);*/

			DBFactory::getConnection();
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			$query ="SELECT * FROM ficha_classificacao as ficha ".
					"LEFT JOIN identificacao ON identificacao.id = ficha.id_identificacao ".
					"LEFT JOIN resumo ON resumo.id = ficha.id_resumo ".
					"LEFT JOIN contexto_educacional ON contexto_educacional.id = ficha.id_identificacao ".
					"LEFT JOIN modalidade ON modalidade.id = ficha.id_modalidades ".
					"LEFT JOIN area_curricular ON area_curricular.id = ficha.id_area_curricular ".
					"LEFT JOIN area_conhecimento ON area_conhecimento.id = ficha.id_area_conhecimento ".
					"LEFT JOIN tema_estudo ON tema_estudo.id = ficha.id_tema_estudo ".
					"LEFT JOIN detalhes_finais ON detalhes_finais.id = ficha.id_detalhes_finais ".
					"WHERE ficha.id = ".$tese['id'];
			
			$query = mysql_query($query);

			DBFactory::closeConnection();


			$titulo = $autor_nome = $autor_sobrenome = $ano_defesa = $numero_paginas = $programa_pos = $ies = $unidade_setor = $estado = $cidade = $grau_titulacao_academica = $dependencia_administrativa = $orientador = '';

			$qcontextEdu = $contexto_nao_escolar = $abordagem_generica = $contexto_escolar = $qcontexto_nao_escolar = $qcontexto_escolar = $qabordagem_generica = '';

			$qmodalidade  = $regular  = $educacao_infantil  = $ensino_fundamental_1_4_1_5  = $ensino_fundamental_5_8_6_9  = $ensino_medio  = $ensino_superior  = $abordagem_generica_niveis_escolares  = $eja  = $educacao_especial  = $educacao_indigena  = $educacao_profissional_tecnologica  = $qregular  = $qeducacao_infantil  = $qensino_fundamental_1_4_1_5  = $qensino_fundamental_5_8_6_9  = $qensino_medio  = $qensino_superior  = $qabordagem_generica_niveis_escolares  = $qeja  = $qeducacao_especial  = $qeducacao_indigena  = $qeducacao_profissional_tecnologica = '';

			$qareaCurr = $arte = $biologia = $ciencias_agrarias = $ciencias_computacao = $ciencias_geologicas = $ciencias_naturais = $comunicacao_jornalismo = $direito = $ecologia = $economia = $educacao_fisica = $filosofia = $fisica = $geografia = $geral = $historia = $lingua_estrangeira = $lingua_portuguesa = $matematica = $pedagogia = $quimica = $saude = $sociologia = $turismo = $id_outra_area = $id_area_licenciatura = $qarte = $qbiologia = $qciencias_agrarias = $qciencias_computacao = $qciencias_geologicas = $qciencias_naturais = $qcomunicacao_jornalismo = $qdireito = $qecologia = $qeconomia = $qeducacao_fisica = $qfilosofia = $qfisica = $qgeografia = $qgeral = $qhistoria = $qlingua_estrangeira = $qlingua_portuguesa = $qmatematica = $qpedagogia = $qquimica = $qsaude = $qsociologia = $qturismo = '';

			$qAreaConhecimento = $agronomia = $arquitetura_urbanismo = $biologia_geral = $direito = $educacao = $filosofia = $geociencias = $historia = $matematica = $quimica = $saude_coletiva = $turismo = $antropologia = $arte = $comunicacao_jornalismo = $ecologia = $engenharia_sanitaria = $fisica = $geografia = $letras = $psicologia = $rec_florestais_eng_florestal = $sociologia = $administracao = $administracao_rural = $astronomia = $biomedicina = $botanica = $carreira_religiosa = $ciencia_informacao = $ciencia_politica = $ciencias_atuariais = $comunicacao = $demografia = $desenho_projetos = $diplomacia = $economia_domestica = $enfermagem = $engenharia_agricola = $engenharia_cartografica = $engenharia_agrimensura = $engenharia_materiais_metalurgica = $engenharia_producao = $engenharia_eletrica = $engenharia_naval_oceanica = $engenharia_quimica = $estudos_sociais = $farmacologia = $fisioterapia_terapia_ocupacional = $genetica = $imunologia = $medicina = $microbiologia = $museologia = $oceanografia = $parasitologia = $probabilidade_estatistica = $recursos_pesqueiros_engenharia_pesca = $relacoes_publicas = $servico_social = $zoologia = $administracao_hospitalar = $arqueologia = $biofisica = $bioquimica = $carreira_militar = $ciencia_computacao = $ciencia_alimentos = $ciencias = $ciencias_sociais = $decoracao = $desenho_moda = $desenho_industrial = $economia = $educacao_fisica = $engenharia_aeroespacial = $engenharia_biomedica = $engenharia_civil = $engenharia_armamentos = $engenharia_minas = $engenharia_transportes = $engenharia_mecatronica = $engenharia_nucl = $engenharia_textil = $farmacia = $fisiologia = $fonoaudiologia = $historia_natural = $linguistica = $medicina_veterinaria = $morfologia = $nutricao = $odontologia = $planejamento_urbano_regional = $quimica_industrial = $relacoes_internacionais = $secretariado_executiva = $teologia = $zootecnia = $qagronomia = $qarquitetura_urbanismo = $qbiologia_geral = $qdireito = $qeducacao = $qfilosofia = $qgeociencias = $qhistoria = $qmatematica = $qquimica = $qsaude_coletiva = $qturismo = $qantropologia = $qarte = $qcomunicacao_jornalismo = $qecologia = $qengenharia_sanitaria = $qfisica = $qgeografia = $qletras = $qpsicologia = $qrec_florestais_eng_florestal = $qsociologia = $qadministracao = $qadministracao_rural = $qastronomia = $qbiomedicina = $qbotanica = $qcarreira_religiosa = $qciencia_informacao = $qciencia_politica = $qciencias_atuariais = $qcomunicacao = $qdemografia = $qdesenho_projetos = $qdiplomacia = $qeconomia_domestica = $qenfermagem = $qengenharia_agricola = $qengenharia_cartografica = $qengenharia_agrimensura = $qengenharia_materiais_metalurgica = $qengenharia_producao = $qengenharia_eletrica = $qengenharia_naval_oceanica = $qengenharia_quimica = $qestudos_sociais = $qfarmacologia = $qfisioterapia_terapia_ocupacional = $qgenetica = $qimunologia = $qmedicina = $qmicrobiologia = $qmuseologia = $qoceanografia = $qparasitologia = $qprobabilidade_estatistica = $qrecursos_pesqueiros_engenharia_pesca = $qrelacoes_publicas = $qservico_social = $qzoologia = $qadministracao_hospitalar = $qarqueologia = $qbiofisica = $qbioquimica = $qcarreira_militar = $qciencia_computacao = $qciencia_alimentos = $qciencias = $qciencias_sociais = $qdecoracao = $qdesenho_moda = $qdesenho_industrial = $qeconomia = $qeducacao_fisica = $qengenharia_aeroespacial = $qengenharia_biomedica = $qengenharia_civil = $qengenharia_armamentos = $qengenharia_minas = $qengenharia_transportes = $qengenharia_mecatronica = $qengenharia_nucl = $qengenharia_textil = $qfarmacia = $qfisiologia = $qfonoaudiologia = $qhistoria_natural = $qlinguistica = $qmedicina_veterinaria = $qmorfologia = $qnutricao = $qodontologia = $qplanejamento_urbano_regional = $qquimica_industrial = $qrelacoes_internacionais = $qsecretariado_executiva = $qteologia = $qzootecnia = '';

			$qTemaEstudo = $curric_programas_projetos = $conteudo_metodos = $concep_repres_percep_formador = $concep_repres_percep_aprediz = $recursos_didaticos = $linguagem_cognicao = $politicas_publicas_ea = $organ_instituicao_escolar = $organ_nao_governamental = $organ_governamental = $trab_form_professores_agentes = $movim_sociais_ambientalistas = $fundamentos_ea = $qcurric_programas_projetos = $qconteudo_metodos = $qconcep_repres_percep_formador = $qconcep_repres_percep_aprediz = $qrecursos_didaticos = $qlinguagem_cognicao = $qpoliticas_publicas_ea = $qorgan_instituicao_escolar = $qorgan_nao_governamental = $qorgan_governamental = $qtrab_form_professores_agentes = $qmovim_sociais_ambientalistas = $qfundamentos_ea = '';

			$observacoes = $palavras_chave = $url_trabalho = $url_resumo = $doc_classificado_por = $data_classificacao = '';

			$ficha = mysql_fetch_assoc($query);

			$consolidada = $ficha['consolidada'];
			$codigo = $ficha['codigo'];
			$id_identificacao = $ficha['id_identificacao'];
			$id_resumo = $ficha['id_resumo'];
			$id_contexto_educacional = $ficha['id_contexto_educacional'];
			$id_modalidades = $ficha['id_modalidades'];
			$id_area_curricular = $ficha['id_area_curricular'];
			$id_area_conhecimento = $ficha['id_area_conhecimento'];
			$id_tema_estudo = $ficha['id_tema_estudo'];
			$id_detalhes_finais = $ficha['id_detalhes_finais'];

			//IDENTIFICACAO
				$titulo = $ficha['titulo'];
				$autor_nome = $ficha['autor_nome'];
				$autor_sobrenome = $ficha['autor_sobrenome'];
				$ano_defesa = $ficha['ano_defesa'];
				$numero_paginas = $ficha['numero_paginas'];
				$programa_pos = $ficha['programa_pos'];
				$ies = $ficha['ies'];
				$unidade_setor = $ficha['unidade_setor'];
				$estado = $ficha['estado'];
				$cidade = $ficha['cidade'];
				$grau_titulacao_academica = $ficha['grau_titulacao_academica'];
				$dependencia_administrativa = $ficha['dependencia_administrativa'];
				$orientador = $ficha['orientador'];

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
				$resumo = $ficha['resumo'];
			//END RESUMO

			//CONTEXTO EDUCACIONAL
				$qcontextEdu = $ficha['qcontextEdu'];
				$contexto_nao_escolar = $ficha['contexto_nao_escolar'];
				$abordagem_generica = $ficha['abordagem_generica'];
				$contexto_escolar = $ficha['contexto_escolar'];
				$qcontexto_nao_escolar = $ficha['qcontexto_nao_escolar'];
				$qcontexto_escolar = $ficha['qcontexto_escolar'];
				$qabordagem_generica = $ficha['qabordagem_generica'];

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
				$qmodalidade = $ficha['qmodalidade'];
				$regular = $ficha['regular'];
				$educacao_infantil = $ficha['educacao_infantil'];
				$ensino_fundamental_1_4_1_5 = $ficha['ensino_fundamental_1_4_1_5'];
				$ensino_fundamental_5_8_6_9 = $ficha['ensino_fundamental_5_8_6_9'];
				$ensino_medio = $ficha['ensino_medio'];
				$ensino_superior = $ficha['ensino_superior'];
				$abordagem_generica_niveis_escolares = $ficha['abordagem_generica_niveis_escolares'];
				$eja = $ficha['eja'];
				$educacao_especial = $ficha['educacao_especial'];
				$educacao_indigena = $ficha['educacao_indigena'];
				$educacao_profissional_tecnologica = $ficha['educacao_profissional_tecnologica'];
				$qregular = $ficha['qregular'];
				$qeducacao_infantil = $ficha['qeducacao_infantil'];
				$qensino_fundamental_1_4_1_5 = $ficha['qensino_fundamental_1_4_1_5'];
				$qensino_fundamental_5_8_6_9 = $ficha['qensino_fundamental_5_8_6_9'];
				$qensino_medio = $ficha['qensino_medio'];
				$qensino_superior = $ficha['qensino_superior'];
				$qabordagem_generica_niveis_escolares = $ficha['qabordagem_generica_niveis_escolares'];
				$qeja = $ficha['qeja'];
				$qeducacao_especial = $ficha['qeducacao_especial'];
				$qeducacao_indigena = $ficha['qeducacao_indigena'];
				$qeducacao_profissional_tecnologica = $ficha['qeducacao_profissional_tecnologica'];

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
				$qareaCurr = $ficha['qareaCurr'];
				$arte = $ficha['arte'];
				$biologia = $ficha['biologia'];
				$ciencias_agrarias = $ficha['ciencias_agrarias'];
				$ciencias_computacao = $ficha['ciencias_computacao'];
				$ciencias_geologicas = $ficha['ciencias_geologicas'];
				$ciencias_naturais = $ficha['ciencias_naturais'];
				$comunicacao_jornalismo = $ficha['comunicacao_jornalismo'];
				$direito = $ficha['direito'];
				$ecologia = $ficha['ecologia'];
				$economia = $ficha['economia'];
				$educacao_fisica = $ficha['educacao_fisica'];
				$filosofia = $ficha['filosofia'];
				$fisica = $ficha['fisica'];
				$geografia = $ficha['geografia'];
				$geral = $ficha['geral'];
				$historia = $ficha['historia'];
				$lingua_estrangeira = $ficha['lingua_estrangeira'];
				$lingua_portuguesa = $ficha['lingua_portuguesa'];
				$matematica = $ficha['matematica'];
				$pedagogia = $ficha['pedagogia'];
				$quimica = $ficha['quimica'];
				$saude = $ficha['saude'];
				$sociologia = $ficha['sociologia'];
				$turismo = $ficha['turismo'];
				$id_outra_area = $ficha['id_outra_area'];
				$id_area_licenciatura = $ficha['id_area_licenciatura'];
				$qarte = $ficha['qarte'];
				$qbiologia = $ficha['qbiologia'];
				$qciencias_agrarias = $ficha['qciencias_agrarias'];
				$qciencias_computacao = $ficha['qciencias_computacao'];
				$qciencias_geologicas = $ficha['qciencias_geologicas'];
				$qciencias_naturais = $ficha['qciencias_naturais'];
				$qcomunicacao_jornalismo = $ficha['qcomunicacao_jornalismo'];
				$qdireito = $ficha['qdireito'];
				$qecologia = $ficha['qecologia'];
				$qeconomia = $ficha['qeconomia'];
				$qeducacao_fisica = $ficha['qeducacao_fisica'];
				$qfilosofia = $ficha['qfilosofia'];
				$qfisica = $ficha['qfisica'];
				$qgeografia = $ficha['qgeografia'];
				$qgeral = $ficha['qgeral'];
				$qhistoria = $ficha['qhistoria'];
				$qlingua_estrangeira = $ficha['qlingua_estrangeira'];
				$qlingua_portuguesa = $ficha['qlingua_portuguesa'];
				$qmatematica = $ficha['qmatematica'];
				$qpedagogia = $ficha['qpedagogia'];
				$qquimica = $ficha['qquimica'];
				$qsaude = $ficha['qsaude'];
				$qsociologia = $ficha['qsociologia'];
				$qturismo = $ficha['qturismo'];

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
				$qAreaConhecimento = $ficha['qAreaConhecimento'];
				$agronomia = $ficha['agronomia'];
				$arquitetura_urbanismo = $ficha['arquitetura_urbanismo'];
				$biologia_geral = $ficha['biologia_geral'];
				$direito = $ficha['direito'];
				$educacao = $ficha['educacao'];
				$filosofia = $ficha['filosofia'];
				$geociencias = $ficha['geociencias'];
				$historia = $ficha['historia'];
				$matematica = $ficha['matematica'];
				$quimica = $ficha['quimica'];
				$saude_coletiva = $ficha['saude_coletiva'];
				$turismo = $ficha['turismo'];
				$antropologia = $ficha['antropologia'];
				$arte = $ficha['arte'];
				$comunicacao_jornalismo = $ficha['comunicacao_jornalismo'];
				$ecologia = $ficha['ecologia'];
				$engenharia_sanitaria = $ficha['engenharia_sanitaria'];
				$fisica = $ficha['fisica'];
				$geografia = $ficha['geografia'];
				$letras = $ficha['letras'];
				$psicologia = $ficha['psicologia'];
				$rec_florestais_eng_florestal = $ficha['rec_florestais_eng_florestal'];
				$sociologia = $ficha['sociologia'];
				$administracao = $ficha['administracao'];
				$administracao_rural = $ficha['administracao_rural'];
				$astronomia = $ficha['astronomia'];
				$biomedicina = $ficha['biomedicina'];
				$botanica = $ficha['botanica'];
				$carreira_religiosa = $ficha['carreira_religiosa'];
				$ciencia_informacao = $ficha['ciencia_informacao'];
				$ciencia_politica = $ficha['ciencia_politica'];
				$ciencias_atuariais = $ficha['ciencias_atuariais'];
				$comunicacao = $ficha['comunicacao'];
				$demografia = $ficha['demografia'];
				$desenho_projetos = $ficha['desenho_projetos'];
				$diplomacia = $ficha['diplomacia'];
				$economia_domestica = $ficha['economia_domestica'];
				$enfermagem = $ficha['enfermagem'];
				$engenharia_agricola = $ficha['engenharia_agricola'];
				$engenharia_cartografica = $ficha['engenharia_cartografica'];
				$engenharia_agrimensura = $ficha['engenharia_agrimensura'];
				$engenharia_materiais_metalurgica = $ficha['engenharia_materiais_metalurgica'];
				$engenharia_producao = $ficha['engenharia_producao'];
				$engenharia_eletrica = $ficha['engenharia_eletrica'];
				$engenharia_naval_oceanica = $ficha['engenharia_naval_oceanica'];
				$engenharia_quimica = $ficha['engenharia_quimica'];
				$estudos_sociais = $ficha['estudos_sociais'];
				$farmacologia = $ficha['farmacologia'];
				$fisioterapia_terapia_ocupacional = $ficha['fisioterapia_terapia_ocupacional'];
				$genetica = $ficha['genetica'];
				$imunologia = $ficha['imunologia'];
				$medicina = $ficha['medicina'];
				$microbiologia = $ficha['microbiologia'];
				$museologia = $ficha['museologia'];
				$oceanografia = $ficha['oceanografia'];
				$parasitologia = $ficha['parasitologia'];
				$probabilidade_estatistica = $ficha['probabilidade_estatistica'];
				$recursos_pesqueiros_engenharia_pesca = $ficha['recursos_pesqueiros_engenharia_pesca'];
				$relacoes_publicas = $ficha['relacoes_publicas'];
				$servico_social = $ficha['servico_social'];
				$zoologia = $ficha['zoologia'];
				$administracao_hospitalar = $ficha['administracao_hospitalar'];
				$arqueologia = $ficha['arqueologia'];
				$biofisica = $ficha['biofisica'];
				$bioquimica = $ficha['bioquimica'];
				$carreira_militar = $ficha['carreira_militar'];
				$ciencia_computacao = $ficha['ciencia_computacao'];
				$ciencia_alimentos = $ficha['ciencia_alimentos'];
				$ciencias = $ficha['ciencias'];
				$ciencias_sociais = $ficha['ciencias_sociais'];
				$decoracao = $ficha['decoracao'];
				$desenho_moda = $ficha['desenho_moda'];
				$desenho_industrial = $ficha['desenho_industrial'];
				$economia = $ficha['economia'];
				$educacao_fisica = $ficha['educacao_fisica'];
				$engenharia_aeroespacial = $ficha['engenharia_aeroespacial'];
				$engenharia_biomedica = $ficha['engenharia_biomedica'];
				$engenharia_civil = $ficha['engenharia_civil'];
				$engenharia_armamentos = $ficha['engenharia_armamentos'];
				$engenharia_minas = $ficha['engenharia_minas'];
				$engenharia_transportes = $ficha['engenharia_transportes'];
				$engenharia_mecatronica = $ficha['engenharia_mecatronica'];
				$engenharia_nucl = $ficha['engenharia_nucl'];
				$engenharia_textil = $ficha['engenharia_textil'];
				$farmacia = $ficha['farmacia'];
				$fisiologia = $ficha['fisiologia'];
				$fonoaudiologia = $ficha['fonoaudiologia'];
				$historia_natural = $ficha['historia_natural'];
				$linguistica = $ficha['linguistica'];
				$medicina_veterinaria = $ficha['medicina_veterinaria'];
				$morfologia = $ficha['morfologia'];
				$nutricao = $ficha['nutricao'];
				$odontologia = $ficha['odontologia'];
				$planejamento_urbano_regional = $ficha['planejamento_urbano_regional'];
				$quimica_industrial = $ficha['quimica_industrial'];
				$relacoes_internacionais = $ficha['relacoes_internacionais'];
				$secretariado_executiva = $ficha['secretariado_executiva'];
				$teologia = $ficha['teologia'];
				$zootecnia = $ficha['zootecnia'];
				$qagronomia = $ficha['qagronomia'];
				$qarquitetura_urbanismo = $ficha['qarquitetura_urbanismo'];
				$qbiologia_geral = $ficha['qbiologia_geral'];
				$qdireito = $ficha['qdireito'];
				$qeducacao = $ficha['qeducacao'];
				$qfilosofia = $ficha['qfilosofia'];
				$qgeociencias = $ficha['qgeociencias'];
				$qhistoria = $ficha['qhistoria'];
				$qmatematica = $ficha['qmatematica'];
				$qquimica = $ficha['qquimica'];
				$qsaude_coletiva = $ficha['qsaude_coletiva'];
				$qturismo = $ficha['qturismo'];
				$qantropologia = $ficha['qantropologia'];
				$qarte = $ficha['qarte'];
				$qcomunicacao_jornalismo = $ficha['qcomunicacao_jornalismo'];
				$qecologia = $ficha['qecologia'];
				$qengenharia_sanitaria = $ficha['qengenharia_sanitaria'];
				$qfisica = $ficha['qfisica'];
				$qgeografia = $ficha['qgeografia'];
				$qletras = $ficha['qletras'];
				$qpsicologia = $ficha['qpsicologia'];
				$qrec_florestais_eng_florestal = $ficha['qrec_florestais_eng_florestal'];
				$qsociologia = $ficha['qsociologia'];
				$qadministracao = $ficha['qadministracao'];
				$qadministracao_rural = $ficha['qadministracao_rural'];
				$qastronomia = $ficha['qastronomia'];
				$qbiomedicina = $ficha['qbiomedicina'];
				$qbotanica = $ficha['qbotanica'];
				$qcarreira_religiosa = $ficha['qcarreira_religiosa'];
				$qciencia_informacao = $ficha['qciencia_informacao'];
				$qciencia_politica = $ficha['qciencia_politica'];
				$qciencias_atuariais = $ficha['qciencias_atuariais'];
				$qcomunicacao = $ficha['qcomunicacao'];
				$qdemografia = $ficha['qdemografia'];
				$qdesenho_projetos = $ficha['qdesenho_projetos'];
				$qdiplomacia = $ficha['qdiplomacia'];
				$qeconomia_domestica = $ficha['qeconomia_domestica'];
				$qenfermagem = $ficha['qenfermagem'];
				$qengenharia_agricola = $ficha['qengenharia_agricola'];
				$qengenharia_cartografica = $ficha['qengenharia_cartografica'];
				$qengenharia_agrimensura = $ficha['qengenharia_agrimensura'];
				$qengenharia_materiais_metalurgica = $ficha['qengenharia_materiais_metalurgica'];
				$qengenharia_producao = $ficha['qengenharia_producao'];
				$qengenharia_eletrica = $ficha['qengenharia_eletrica'];
				$qengenharia_naval_oceanica = $ficha['qengenharia_naval_oceanica'];
				$qengenharia_quimica = $ficha['qengenharia_quimica'];
				$qestudos_sociais = $ficha['qestudos_sociais'];
				$qfarmacologia = $ficha['qfarmacologia'];
				$qfisioterapia_terapia_ocupacional = $ficha['qfisioterapia_terapia_ocupacional'];
				$qgenetica = $ficha['qgenetica'];
				$qimunologia = $ficha['qimunologia'];
				$qmedicina = $ficha['qmedicina'];
				$qmicrobiologia = $ficha['qmicrobiologia'];
				$qmuseologia = $ficha['qmuseologia'];
				$qoceanografia = $ficha['qoceanografia'];
				$qparasitologia = $ficha['qparasitologia'];
				$qprobabilidade_estatistica = $ficha['qprobabilidade_estatistica'];
				$qrecursos_pesqueiros_engenharia_pesca = $ficha['qrecursos_pesqueiros_engenharia_pesca'];
				$qrelacoes_publicas = $ficha['qrelacoes_publicas'];
				$qservico_social = $ficha['qservico_social'];
				$qzoologia = $ficha['qzoologia'];
				$qadministracao_hospitalar = $ficha['qadministracao_hospitalar'];
				$qarqueologia = $ficha['qarqueologia'];
				$qbiofisica = $ficha['qbiofisica'];
				$qbioquimica = $ficha['qbioquimica'];
				$qcarreira_militar = $ficha['qcarreira_militar'];
				$qciencia_computacao = $ficha['qciencia_computacao'];
				$qciencia_alimentos = $ficha['qciencia_alimentos'];
				$qciencias = $ficha['qciencias'];
				$qciencias_sociais = $ficha['qciencias_sociais'];
				$qdecoracao = $ficha['qdecoracao'];
				$qdesenho_moda = $ficha['qdesenho_moda'];
				$qdesenho_industrial = $ficha['qdesenho_industrial'];
				$qeconomia = $ficha['qeconomia'];
				$qeducacao_fisica = $ficha['qeducacao_fisica'];
				$qengenharia_aeroespacial = $ficha['qengenharia_aeroespacial'];
				$qengenharia_biomedica = $ficha['qengenharia_biomedica'];
				$qengenharia_civil = $ficha['qengenharia_civil'];
				$qengenharia_armamentos = $ficha['qengenharia_armamentos'];
				$qengenharia_minas = $ficha['qengenharia_minas'];
				$qengenharia_transportes = $ficha['qengenharia_transportes'];
				$qengenharia_mecatronica = $ficha['qengenharia_mecatronica'];
				$qengenharia_nucl = $ficha['qengenharia_nucl'];
				$qengenharia_textil = $ficha['qengenharia_textil'];
				$qfarmacia = $ficha['qfarmacia'];
				$qfisiologia = $ficha['qfisiologia'];
				$qfonoaudiologia = $ficha['qfonoaudiologia'];
				$qhistoria_natural = $ficha['qhistoria_natural'];
				$qlinguistica = $ficha['qlinguistica'];
				$qmedicina_veterinaria = $ficha['qmedicina_veterinaria'];
				$qmorfologia = $ficha['qmorfologia'];
				$qnutricao = $ficha['qnutricao'];
				$qodontologia = $ficha['qodontologia'];
				$qplanejamento_urbano_regional = $ficha['qplanejamento_urbano_regional'];
				$qquimica_industrial = $ficha['qquimica_industrial'];
				$qrelacoes_internacionais = $ficha['qrelacoes_internacionais'];
				$qsecretariado_executiva = $ficha['qsecretariado_executiva'];
				$qteologia = $ficha['qteologia'];
				$qzootecnia = $ficha['qzootecnia'];

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
				$qTemaEstudo = $ficha['qTemaEstudo'];
				$curric_programas_projetos = $ficha['curric_programas_projetos'];
				$conteudo_metodos = $ficha['conteudo_metodos'];
				$concep_repres_percep_formador = $ficha['concep_repres_percep_formador'];
				$concep_repres_percep_aprediz = $ficha['concep_repres_percep_aprediz'];
				$recursos_didaticos = $ficha['recursos_didaticos'];
				$linguagem_cognicao = $ficha['linguagem_cognicao'];
				$politicas_publicas_ea = $ficha['politicas_publicas_ea'];
				$organ_instituicao_escolar = $ficha['organ_instituicao_escolar'];
				$organ_nao_governamental = $ficha['organ_nao_governamental'];
				$organ_governamental = $ficha['organ_governamental'];
				$trab_form_professores_agentes = $ficha['trab_form_professores_agentes'];
				$movim_sociais_ambientalistas = $ficha['movim_sociais_ambientalistas'];
				$fundamentos_ea = $ficha['fundamentos_ea'];
				$qcurric_programas_projetos = $ficha['qcurric_programas_projetos'];
				$qconteudo_metodos = $ficha['qconteudo_metodos'];
				$qconcep_repres_percep_formador = $ficha['qconcep_repres_percep_formador'];
				$qconcep_repres_percep_aprediz = $ficha['qconcep_repres_percep_aprediz'];
				$qrecursos_didaticos = $ficha['qrecursos_didaticos'];
				$qlinguagem_cognicao = $ficha['qlinguagem_cognicao'];
				$qpoliticas_publicas_ea = $ficha['qpoliticas_publicas_ea'];
				$qorgan_instituicao_escolar = $ficha['qorgan_instituicao_escolar'];
				$qorgan_nao_governamental = $ficha['qorgan_nao_governamental'];
				$qorgan_governamental = $ficha['qorgan_governamental'];
				$qtrab_form_professores_agentes = $ficha['qtrab_form_professores_agentes'];
				$qmovim_sociais_ambientalistas = $ficha['qmovim_sociais_ambientalistas'];
				$qfundamentos_ea = $ficha['qfundamentos_ea'];

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
				DBFactory::closeConnection();

				$string_foco_final = ob_get_contents();

				ob_end_clean();
			//END FOCO

			//DETALHES FINAIS
				$observacoes = $ficha['observacoes'];
				$palavras_chave = $ficha['palavras_chave'];
				$url_trabalho = $ficha['url_trabalho'];
				$url_resumo = $ficha['url_resumo'];
				$doc_classificado_por = $ficha['doc_classificado_por'];
				$data_classificacao = $ficha['data_classificacao'];
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
/*	$time_end = microtime(true);

	//dividing with 60 will give the execution time in minutes other wise seconds
	$execution_time = ($time_end - $time_start);
	echo $execution_time;*/
?>
		</div>
	</body>
</html>
