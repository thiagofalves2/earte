<?php

include_once("logado.php");

set_time_limit ( 0 );
error_reporting(6135);
date_default_timezone_set('America/Sao_Paulo');
require_once("dao/DBFactory.class.php");

DBFactory::getConnection();
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

foreach($_POST as $k => $v){
	$_POST[$k] = mysql_real_escape_string($v);
}

$or_g = ($_POST['fieldset_geral']==="sim")? 1 : 0;

function geraQuery($campos,$tabela,$isBoolean=0,$or=0){
	global $or_g;
	$temp = '';
	if(!$isBoolean){
		foreach($campos as $campo => $valor){
			if(isset($valor)&&$valor){
				if(is_int($valor)){
					if(!$or){
						$temp .= " `".$campo."` = ".$valor." AND";
					}else{
						$temp .= " `".$campo."` = ".$valor." OR ";
					}
				}else{
					if(!$or){
						$temp .= " `".$campo."` LIKE '%".$valor."%' AND";
					}else{
						$temp .= " `".$campo."` LIKE '%".$valor."%' OR ";
					}
				}
			}
		}
	}else{
		foreach($campos as $campo => $valor){
			if(isset($valor)&&$valor){
				if(!$or){
					$temp .= " `".$campo."` = 1 AND";
				}else{
					$temp .= " `".$campo."` = 1 OR ";
				}
			}
		}
	}

	if($temp){
		return "SELECT id FROM ".$tabela." WHERE".substr($temp,0,-4).";";
	}
	if(!$or_g){
		return "SELECT id FROM ".$tabela;
	}else{
		return "SELECT id FROM ".$tabela." WHERE true=false;";
	}
}

$query = array();
$result = array();

//RESULTADOS
$result['codigo'] = array();

//Consolidadas sempre serão "E"
if($or_g) $result_consolidada = array();
else $result['consolidada'] = array();

$result['identificacao'] = array();
$result['identificacao_ano'] = array();
$result['contexto_educacional'] = array();
$result['tema_ambiental'] = array();
$result['tema_estudo'] = array();
$result['resumo'] = array();
$result['detalhes_finais'] = array();
$result['publico_envolvido'] = array();
$result['area_conhecimento'] = array();
$result['modalidade'] = array();
$result['area_curricular'] = array();

//CÓDIGO
$codigo = array();
$codigo['codigo'] = 0+$_POST['codigo'];

$query['codigo'] = geraQuery($codigo,'ficha_classificacao',0);

$temp = mysql_query($query['codigo']);

while($linha = mysql_fetch_assoc($temp)){
	$result['codigo'][] = $linha['id'];
}

//CONSOLIDADA
$consolidada = array();
$consolidada['consolidada'] = $_POST['consolidada'];

$query['consolidada'] = geraQuery($consolidada,'ficha_classificacao',1);

$temp = mysql_query($query['consolidada']);

if($or_g){
	while($linha = mysql_fetch_assoc($temp)){
		$result_consolidada[] = $linha['id'];
	}
}else{
	while($linha = mysql_fetch_assoc($temp)){
		$result['consolidada'][] = $linha['id'];
	}
}

//IDENTIFICAÇÃO
$identificacao = array();
$identificacao['titulo'] = $_POST['titulo'];
$identificacao['autor_nome'] = $_POST['autor'];
$identificacao['autor_sobrenome'] = $_POST['sobrenome'];
$identificacao['orientador'] = $_POST['orientador'];
$identificacao['numero_paginas'] = 0+$_POST['ndepaginas'];
$identificacao['programa_pos'] = $_POST['programapos'];
$identificacao['ies'] = $_POST['siglaies'];
$identificacao['unidade_setor'] = $_POST['unidadesetor'];
$identificacao['estado'] = $_POST['estado'];
$identificacao['cidade'] = $_POST['cidade'];
$identificacao['grau_titulacao_academica'] = $_POST['grautitulacao'];
$identificacao['dependencia_administrativa'] = $_POST['depadm'];

if($_POST['fieldset_ident']==="sim"){
	$query['identificacao'] = geraQuery($identificacao,'identificacao',0,1);
}else{
	$query['identificacao'] = geraQuery($identificacao,'identificacao');
}

$temp = mysql_query($query['identificacao']);

while($linha = mysql_fetch_assoc($temp)){
	$result['identificacao'][] = $linha['id'];
}

//ANOS
$identificacao_ano = array();
$identificacao_ano['ano_inicial'] = $_POST['ano_inicial'];
$identificacao_ano['ano_final'] = $_POST['ano_final'];


if($identificacao_ano['ano_inicial'] && $identificacao_ano['ano_final']){
	$query['identificacao_ano'] = "SELECT id FROM identificacao WHERE ano_defesa BETWEEN ".$identificacao_ano['ano_inicial']." AND ".$identificacao_ano['ano_final'];
}else{
	if(!$or_g){
		$query['identificacao_ano'] = "SELECT id FROM identificacao";
	}else{
		$query['identificacao_ano'] = "SELECT id FROM identificacao WHERE true=false";
	}
}
$temp = mysql_query($query['identificacao_ano']);

while($linha = mysql_fetch_assoc($temp)){
	$result['identificacao_ano'][] = $linha['id'];
}

//Contexto Educacional
$contexto_educacional = array();
$contexto_educacional['contexto_nao_escolar'] = $_POST['opt1'];
$contexto_educacional['abordagem_generica'] = $_POST['opt3'];
$contexto_educacional['contexto_escolar'] = $_POST['opt2'];
$contexto_educacional['qcontexto_nao_escolar'] = $_POST['qnaoEscolar'];
$contexto_educacional['qabordagem_generica'] = $_POST['qgenerica'];
$contexto_educacional['qcontexto_escolar'] = $_POST['qescolar'];
$contexto_educacional['qcontexto_educacional'] = $_POST['qcontextEdu'];

if($_POST['fieldset_q0']==="sim"){
	$query['contexto_educacional'] = geraQuery($contexto_educacional,'contexto_educacional',1,1);
}else{
	$query['contexto_educacional'] = geraQuery($contexto_educacional,'contexto_educacional',1);
}

$temp = mysql_query($query['contexto_educacional']);

while($linha = mysql_fetch_assoc($temp)){
	$result['contexto_educacional'][] = $linha['id'];
}

//Tema ambiental
$tema_ambiental = array();
$tema_ambiental['tema_ambiental'] = $_POST['temaamb'];
$tema_ambiental_ou = ($_POST['fieldset_ambi']==="sim")?"OR ":"AND";

if($tema_ambiental['tema_ambiental']){
	$temp_tema_ambiental = explode(';',$tema_ambiental['tema_ambiental']);

	foreach ($temp_tema_ambiental as $valor_tema) {
		$temp_result_tema_ambiental[$valor_tema] = array();
		$temp_result = array();
		$query_tema = mysql_query("SELECT id FROM tema_ambiental WHERE `tema_ambiental` LIKE '".trim($valor_tema)."';");
		if(mysql_num_rows($query_tema)){
			while($linha = mysql_fetch_assoc($query_tema)){
				$temp_result = array();
				$temp_query = mysql_query("SELECT ficha FROM tema_ambiental_keys WHERE `tema_ambiental` = ".$linha['id']);
				if(mysql_num_rows($temp_query)){
					while($linha_tema = mysql_fetch_assoc($temp_query)){
						$temp_result[] = $linha_tema['ficha'];
					}
				}
				$temp_result_tema_ambiental[$valor_tema] = array_merge($temp_result_tema_ambiental[$valor_tema],$temp_result);
			}
		}
	}

	if($tema_ambiental_ou==="OR "){
		$result['tema_ambiental'] = array();
		$function = 'array_merge';
	}else{
		$result['tema_ambiental'] = $result['codigo'];
		$function = 'array_intersect';
	}
	foreach($temp_result_tema_ambiental as $array){
		$result['tema_ambiental'] = $function($result['tema_ambiental'],$array);
	}
}else{
	$result['tema_ambiental'] = $result['codigo'];
}


//Tema Estudo
$tema_estudo = array();
$tema_estudo['curric_programas_projetos'] = $_POST['curriculos'];
$tema_estudo['conteudo_metodos'] = $_POST['conteudo'];
$tema_estudo['concep_repres_percep_formador'] = $_POST['concepcoesformador'];
$tema_estudo['concep_repres_percep_aprediz'] = $_POST['concepcoesaprendiz'];
$tema_estudo['recursos_didaticos'] = $_POST['recursos'];
$tema_estudo['linguagem_cognicao'] = $_POST['liguagemcognicao'];
$tema_estudo['politicas_publicas_ea'] = $_POST['politicas'];
$tema_estudo['organ_instituicao_escolar'] = $_POST['orientacao'];
$tema_estudo['organ_nao_governamental'] = $_POST['ong'];
$tema_estudo['organ_governamental'] = $_POST['orggov'];
$tema_estudo['trab_form_professores_agentes'] = $_POST['trabalho'];
$tema_estudo['movim_sociais_ambientalistas'] = $_POST['movimentos'];
$tema_estudo['fundamentos_ea'] = $_POST['fundamentos'];
$tema_estudo['qcurric_programas_projetos'] = $_POST['qCurrProgProj'];
$tema_estudo['qconteudo_metodos'] = $_POST['qconteudo'];
$tema_estudo['qconcep_repres_percep_formador'] = $_POST['qconcepcoesformador'];
$tema_estudo['qconcep_repres_percep_aprediz'] = $_POST['qconcepcoesaprendiz'];
$tema_estudo['qrecursos_didaticos'] = $_POST['qrecursos'];
$tema_estudo['qlinguagem_cognicao'] = $_POST['qliguagemcognicao'];
$tema_estudo['qpoliticas_publicas_ea'] = $_POST['qpoliticas'];
$tema_estudo['qorgan_instituicao_escolar'] = $_POST['qorientacao'];
$tema_estudo['qorgan_nao_governamental'] = $_POST['qong'];
$tema_estudo['qorgan_governamental'] = $_POST['qorggov'];
$tema_estudo['qtrab_form_professores_agentes'] = $_POST['qtrabalho'];
$tema_estudo['qmovim_sociais_ambientalistas'] = $_POST['qmovimentos'];
$tema_estudo['qfundamentos_ea'] = $_POST['qfundamentos'];
$tema_estudo['qtema_estudo'] = $_POST['qtemaEst'];

if($_POST['fieldset_estu']==='sim'){
	$query['tema_estudo'] = geraQuery($tema_estudo,'tema_estudo',1,1);
}else{
	$query['tema_estudo'] = geraQuery($tema_estudo,'tema_estudo',1);
}

$temp = mysql_query($query['tema_estudo']);

while($linha = mysql_fetch_assoc($temp)){
	$result['tema_estudo'][] = $linha['id'];
}

//Foco
$foco = array();
$foco['foco'] = $_POST['outrofoco'];
$foco_check = $_POST['focotematico'];
$foco_ou = ($_POST['fieldset_estu']==="sim")?"OR ":"AND";

if($foco['foco']){
	$temp_foco = explode(';',$foco['foco']);

	foreach ($temp_foco as $valor) {
		$temp_result_foco[$valor] = array();
		$temp_result = array();
		$query_foco = mysql_query("SELECT id FROM foco WHERE `foco` LIKE '".trim($valor)."';");
		if(mysql_num_rows($query_foco)){
			while($linha = mysql_fetch_assoc($query_foco)){
				$temp_query = array();
				$temp_query = mysql_query("SELECT ficha FROM foco_keys WHERE `foco` = ".$linha['id']);
				if(mysql_num_rows($temp_query)){
					while($linha_foco = mysql_fetch_assoc($temp_query)){
						$temp_result[] = $linha_foco['ficha'];
					}
				}
				$temp_result_foco[$valor] = array_merge($temp_result_foco[$valor],$temp_result);
			}
		}
	}

	if($foco_ou==="OR "){
		$function = 'array_merge';
	}else{
		$function = 'array_intersect';
	}
	foreach($temp_result_foco as $array){
		$result['tema_estudo'] = $function($result['tema_estudo'],$array);
	}
}elseif($foco_check==="outro"){
	$temp_query = mysql_query("SELECT DISTINCT ficha FROM foco_keys");
	if(mysql_num_rows($temp_query)){
		while($linha_foco = mysql_fetch_assoc($temp_query)){
			$temp_result_foco[] = $linha_foco['ficha'];
		}
		if($foco_ou==="OR "){
			$function = 'array_merge';
		}else{
			$function = 'array_intersect';
		}

		$result['tema_estudo'] = $function($result['tema_estudo'],$temp_result_foco);
	}
}

//Resumo
$resumo = array();
$resumo['resumo'] = $_POST['resumo'];

$query['resumo'] = geraQuery($resumo,'resumo');

$temp = mysql_query($query['resumo']);

while($linha = mysql_fetch_assoc($temp)){
	$result['resumo'][] = $linha['id'];
}

//Detalhes Finais
$detalhes_finais = array();
$detalhes_finais['observacoes'] = $_POST['observacoes'];
$detalhes_finais['palavras_chave'] = $_POST['palavraschave'];
$detalhes_finais['url_trabalho'] = $_POST['linktese'];
$detalhes_finais['url_resumo'] = $_POST['linkresumo'];
$detalhes_finais['doc_classificado_por'] = $_POST['classificacao'];
$detalhes_finais['data_classificacao'] = 0+$_POST['dataclassificacao'];

if($_POST['fieldset_final']==="sim"){
	$query['detalhes_finais'] = geraQuery($detalhes_finais,'detalhes_finais',0,1);
}else{
	$query['detalhes_finais'] = geraQuery($detalhes_finais,'detalhes_finais');
}

$temp = mysql_query($query['detalhes_finais']);

while($linha = mysql_fetch_assoc($temp)){
	$result['detalhes_finais'][] = $linha['id'];
}

//Público Envolvido
$publico_envolvido = array();
$publico_envolvido['publico_envolvido'] = $_POST['naoescolar'];
$publico_envolvido_ou = ($_POST['fieldset_q3']==="sim")?"OR ":"AND";

if($publico_envolvido['publico_envolvido']){
	$temp_publico_envolvido = explode(';',$publico_envolvido['publico_envolvido']);

	foreach ($temp_publico_envolvido as $valor) {
		$temp_result_publico_envolvido[$valor] = array();
		$temp_result = array();
		$query_pub = mysql_query("SELECT id FROM publico_envolvido WHERE `publico_envolvido` LIKE '".trim($valor)."';");
		if(mysql_num_rows($query_pub)){
			while($linha = mysql_fetch_assoc($query_pub)){
				$temp_result = array();
				$temp_query = mysql_query("SELECT ficha FROM publico_envolvido_keys WHERE `publico_envolvido` = ".$linha['id']);
				if(mysql_num_rows($temp_query)){
					while($linha_publico_envolvido = mysql_fetch_assoc($temp_query)){
						$temp_result[] = $linha_publico_envolvido['ficha'];
					}
				}
				$temp_result_publico_envolvido[$valor] = array_merge($temp_result_publico_envolvido[$valor],$temp_result);
			}
		}
	}

	if($publico_envolvido_ou==="OR "){
		$result['publico_envolvido'] = array();
		$function = 'array_merge';
	}else{
		$result['publico_envolvido'] = $result['codigo'];
		$function = 'array_intersect';
	}
	foreach($temp_result_publico_envolvido as $array){
		$result['publico_envolvido'] = $function($result['publico_envolvido'],$array);
	}
}else{
	$result['publico_envolvido'] = $result['codigo'];
}



//Área Conhecimento
$area_conhecimento = array();
$area_conhecimento['agronomia'] = $_POST['agronomia'];
$area_conhecimento['arquitetura_urbanismo'] = $_POST['arquitetura_urbanismo'];
$area_conhecimento['biologia_geral'] = $_POST['biologia_geral'];
$area_conhecimento['direito'] = $_POST['direito'];
$area_conhecimento['educacao'] = $_POST['educacao'];
$area_conhecimento['filosofia'] = $_POST['filosofia'];
$area_conhecimento['geociencias'] = $_POST['geociencias'];
$area_conhecimento['historia'] = $_POST['historia'];
$area_conhecimento['matematica'] = $_POST['matematica'];
$area_conhecimento['quimica'] = $_POST['quimica'];
$area_conhecimento['saude_coletiva'] = $_POST['saude_coletiva'];
$area_conhecimento['turismo'] = $_POST['turismo'];
$area_conhecimento['antropologia'] = $_POST['antropologia'];
$area_conhecimento['arte'] = $_POST['arte'];
$area_conhecimento['comunicacao_jornalismo'] = $_POST['comunicacaoejorn'];
$area_conhecimento['ecologia'] = $_POST['ecologia'];
$area_conhecimento['engenharia_sanitaria'] = $_POST['eng_sanitaria'];
$area_conhecimento['fisica'] = $_POST['fisica'];
$area_conhecimento['geografia'] = $_POST['geografia'];
$area_conhecimento['letras'] = $_POST['letras'];
$area_conhecimento['psicologia'] = $_POST['psicologia'];
$area_conhecimento['rec_florestais_eng_florestal'] = $_POST['recursos_floresais_eng_florestal'];
$area_conhecimento['sociologia'] = $_POST['sociologia'];
$area_conhecimento['administracao'] = $_POST['administracao'];
$area_conhecimento['administracao_rural'] = $_POST['administracao_rural'];
$area_conhecimento['astronomia'] = $_POST['astronomia'];
$area_conhecimento['biomedicina'] = $_POST['biomedicina'];
$area_conhecimento['botanica'] = $_POST['botanica'];
$area_conhecimento['carreira_religiosa'] = $_POST['carreira_religiosa'];
$area_conhecimento['ciencia_informacao'] = $_POST['ciencia_informacao'];
$area_conhecimento['ciencia_politica'] = $_POST['ciencia_politica'];
$area_conhecimento['ciencias_atuariais'] = $_POST['ciencias_atuariais'];
$area_conhecimento['comunicacao'] = $_POST['comunicacao'];
$area_conhecimento['demografia'] = $_POST['demografia'];
$area_conhecimento['desenho_projetos'] = $_POST['desenho_projetos'];
$area_conhecimento['diplomacia'] = $_POST['diplomacia'];
$area_conhecimento['economia_domestica'] = $_POST['economia_domestica'];
$area_conhecimento['enfermagem'] = $_POST['enfermagem'];
$area_conhecimento['engenharia_agricola'] = $_POST['eng_agricola'];
$area_conhecimento['engenharia_cartografica'] = $_POST['eng_cartografica'];
$area_conhecimento['engenharia_agrimensura'] = $_POST['eng_agrimensura'];
$area_conhecimento['engenharia_materiais_metalurgica'] = $_POST['eng_materiais_metalurgica'];
$area_conhecimento['engenharia_producao'] = $_POST['eng_producao'];
$area_conhecimento['engenharia_eletrica'] = $_POST['eng_eletrica'];
$area_conhecimento['engenharia_naval_oceanica'] = $_POST['eng_navOc'];
$area_conhecimento['engenharia_quimica'] = $_POST['eng_quimica'];
$area_conhecimento['estudos_sociais'] = $_POST['estudos_sociais'];
$area_conhecimento['farmacologia'] = $_POST['farmacologia'];
$area_conhecimento['fisioterapia_terapia_ocupacional'] = $_POST['fisioterapia_terapia_ocupacional'];
$area_conhecimento['genetica'] = $_POST['genetica'];
$area_conhecimento['imunologia'] = $_POST['imunologia'];
$area_conhecimento['medicina'] = $_POST['medicina'];
$area_conhecimento['microbiologia'] = $_POST['microbiologia'];
$area_conhecimento['museologia'] = $_POST['museologia'];
$area_conhecimento['oceanografia'] = $_POST['oceanografia'];
$area_conhecimento['parasitologia'] = $_POST['parasitologia'];
$area_conhecimento['probabilidade_estatistica'] = $_POST['probabilidade_estatistica'];
$area_conhecimento['recursos_pesqueiros_engenharia_pesca'] = $_POST['rec_pesqueiros_eng_pesca'];
$area_conhecimento['relacoes_publicas'] = $_POST['relacoes_publicas'];
$area_conhecimento['servico_social'] = $_POST['servico_social'];
$area_conhecimento['zoologia'] = $_POST['zoologia'];
$area_conhecimento['administracao_hospitalar'] = $_POST['administracao_hosp'];
$area_conhecimento['arqueologia'] = $_POST['arqueologia'];
$area_conhecimento['biofisica'] = $_POST['biofisica'];
$area_conhecimento['bioquimica'] = $_POST['bioquimica'];
$area_conhecimento['carreira_militar'] = $_POST['carreira_militar'];
$area_conhecimento['ciencia_computacao'] = $_POST['ciencia_computacao'];
$area_conhecimento['ciencia_alimentos'] = $_POST['ciencia_alimentos'];
$area_conhecimento['ciencias'] = $_POST['ciencias'];
$area_conhecimento['ciencias_sociais'] = $_POST['ciencias_sociais'];
$area_conhecimento['decoracao'] = $_POST['decoracao'];
$area_conhecimento['desenho_moda'] = $_POST['desenho_moda'];
$area_conhecimento['desenho_industrial'] = $_POST['desenho_industrial'];
$area_conhecimento['economia'] = $_POST['economia'];
$area_conhecimento['educacao_fisica'] = $_POST['educacao_fisica'];
$area_conhecimento['engenharia_aeroespacial'] = $_POST['eng_aeroespacial'];
$area_conhecimento['engenharia_biomedica'] = $_POST['eng_biomedica'];
$area_conhecimento['engenharia_civil'] = $_POST['eng_civil'];
$area_conhecimento['engenharia_armamentos'] = $_POST['eng_armamentos'];
$area_conhecimento['engenharia_minas'] = $_POST['eng_minas'];
$area_conhecimento['engenharia_transportes'] = $_POST['eng_transportes'];
$area_conhecimento['engenharia_mecatronica'] = $_POST['eng_mecatronica'];
$area_conhecimento['engenharia_nucl'] = $_POST['eng_nucl'];
$area_conhecimento['engenharia_textil'] = $_POST['eng_textil'];
$area_conhecimento['farmacia'] = $_POST['farmacia'];
$area_conhecimento['fisiologia'] = $_POST['fisiologia'];
$area_conhecimento['fonoaudiologia'] = $_POST['fonoaudiologia'];
$area_conhecimento['historia_natural'] = $_POST['historia_natural'];
$area_conhecimento['linguistica'] = $_POST['linguistica'];
$area_conhecimento['medicina_veterinaria'] = $_POST['medicina_veterinaria'];
$area_conhecimento['morfologia'] = $_POST['morfologia'];
$area_conhecimento['nutricao'] = $_POST['nutricao'];
$area_conhecimento['odontologia'] = $_POST['odontologia'];
$area_conhecimento['planejamento_urbano_regional'] = $_POST['planejamento_urbano_regional'];
$area_conhecimento['quimica_industrial'] = $_POST['quimica_industrial'];
$area_conhecimento['relacoes_internacionais'] = $_POST['relacoes_internacionais'];
$area_conhecimento['secretariado_executiva'] = $_POST['secretariado_executiva'];
$area_conhecimento['teologia'] = $_POST['teologia'];
$area_conhecimento['zootecnia'] = $_POST['zootecnia'];
$area_conhecimento['qagronomia'] = $_POST['qagronomia'];
$area_conhecimento['qarquitetura_urbanismo'] = $_POST['qarquitetura_urbanismo'];
$area_conhecimento['qbiologia_geral'] = $_POST['qbiologia_geral'];
$area_conhecimento['qdireito'] = $_POST['qdireito'];
$area_conhecimento['qeducacao'] = $_POST['qeducacao'];
$area_conhecimento['qfilosofia'] = $_POST['qfilosofia'];
$area_conhecimento['qgeociencias'] = $_POST['qgeociencias'];
$area_conhecimento['qhistoria'] = $_POST['qhistoria'];
$area_conhecimento['qmatematica'] = $_POST['qmatematica'];
$area_conhecimento['qquimica'] = $_POST['qquimica'];
$area_conhecimento['qsaude_coletiva'] = $_POST['qsaude_coletiva'];
$area_conhecimento['qturismo'] = $_POST['qturismo'];
$area_conhecimento['qantropologia'] = $_POST['qantropologia'];
$area_conhecimento['qarte'] = $_POST['qarte'];
$area_conhecimento['qcomunicacao_jornalismo'] = $_POST['qcomunicacaoejorn'];
$area_conhecimento['qecologia'] = $_POST['qecologia'];
$area_conhecimento['qengenharia_sanitaria'] = $_POST['qeng_sanitaria'];
$area_conhecimento['qfisica'] = $_POST['qfisica'];
$area_conhecimento['qgeografia'] = $_POST['qgeografia'];
$area_conhecimento['qletras'] = $_POST['qletras'];
$area_conhecimento['qpsicologia'] = $_POST['qpsicologia'];
$area_conhecimento['qrec_florestais_eng_florestal'] = $_POST['qrecursos_floresais_eng_florestal'];
$area_conhecimento['qsociologia'] = $_POST['qsociologia'];
$area_conhecimento['qadministracao'] = $_POST['qadministracao'];
$area_conhecimento['qadministracao_rural'] = $_POST['qadministracao_rural'];
$area_conhecimento['qastronomia'] = $_POST['qastronomia'];
$area_conhecimento['qbiomedicina'] = $_POST['qbiomedicina'];
$area_conhecimento['qbotanica'] = $_POST['qbotanica'];
$area_conhecimento['qcarreira_religiosa'] = $_POST['qcarreira_religiosa'];
$area_conhecimento['qciencia_informacao'] = $_POST['qciencia_informacao'];
$area_conhecimento['qciencia_politica'] = $_POST['qciencia_politica'];
$area_conhecimento['qciencias_atuariais'] = $_POST['qciencias_atuariais'];
$area_conhecimento['qcomunicacao'] = $_POST['qcomunicacao'];
$area_conhecimento['qdemografia'] = $_POST['qdemografia'];
$area_conhecimento['qdesenho_projetos'] = $_POST['qdesenho_projetos'];
$area_conhecimento['qdiplomacia'] = $_POST['qdiplomacia'];
$area_conhecimento['qeconomia_domestica'] = $_POST['qeconomia_domestica'];
$area_conhecimento['qenfermagem'] = $_POST['qenfermagem'];
$area_conhecimento['qengenharia_agricola'] = $_POST['qeng_agricola'];
$area_conhecimento['qengenharia_cartografica'] = $_POST['qeng_cartografica'];
$area_conhecimento['qengenharia_agrimensura'] = $_POST['qeng_agrimensura'];
$area_conhecimento['qengenharia_materiais_metalurgica'] = $_POST['qeng_materiais_metalurgica'];
$area_conhecimento['qengenharia_producao'] = $_POST['qeng_producao'];
$area_conhecimento['qengenharia_eletrica'] = $_POST['qeng_eletrica'];
$area_conhecimento['qengenharia_naval_oceanica'] = $_POST['qeng_navOc'];
$area_conhecimento['qengenharia_quimica'] = $_POST['qeng_quimica'];
$area_conhecimento['qestudos_sociais'] = $_POST['qestudos_sociais'];
$area_conhecimento['qfarmacologia'] = $_POST['qfarmacologia'];
$area_conhecimento['qfisioterapia_terapia_ocupacional'] = $_POST['qfisioterapia_terapia_ocupacional'];
$area_conhecimento['qgenetica'] = $_POST['qgenetica'];
$area_conhecimento['qimunologia'] = $_POST['qimunologia'];
$area_conhecimento['qmedicina'] = $_POST['qmedicina'];
$area_conhecimento['qmicrobiologia'] = $_POST['qmicrobiologia'];
$area_conhecimento['qmuseologia'] = $_POST['qmuseologia'];
$area_conhecimento['qoceanografia'] = $_POST['qoceanografia'];
$area_conhecimento['qparasitologia'] = $_POST['qparasitologia'];
$area_conhecimento['qprobabilidade_estatistica'] = $_POST['qprobabilidade_estatistica'];
$area_conhecimento['qrecursos_pesqueiros_engenharia_pesca'] = $_POST['qrec_pesqueiros_eng_pesca'];
$area_conhecimento['qrelacoes_publicas'] = $_POST['qrelacoes_publicas'];
$area_conhecimento['qservico_social'] = $_POST['qservico_social'];
$area_conhecimento['qzoologia'] = $_POST['qzoologia'];
$area_conhecimento['qadministracao_hospitalar'] = $_POST['qadministracao_hosp'];
$area_conhecimento['qarqueologia'] = $_POST['qarqueologia'];
$area_conhecimento['qbiofisica'] = $_POST['qbiofisica'];
$area_conhecimento['qbioquimica'] = $_POST['qbioquimica'];
$area_conhecimento['qcarreira_militar'] = $_POST['qcarreira_militar'];
$area_conhecimento['qciencia_computacao'] = $_POST['qciencia_computacao'];
$area_conhecimento['qciencia_tecnologia_alimentos'] = $_POST['qciencia_alimentos'];
$area_conhecimento['qciencias'] = $_POST['qciencias'];
$area_conhecimento['qciencias_sociais'] = $_POST['qciencias_sociais'];
$area_conhecimento['qdecoracao'] = $_POST['qdecoracao'];
$area_conhecimento['qdesenho_moda'] = $_POST['qdesenho_moda'];
$area_conhecimento['qdesenho_industrial'] = $_POST['qdesenho_industrial'];
$area_conhecimento['qeconomia'] = $_POST['qeconomia'];
$area_conhecimento['qeducacao_fisica'] = $_POST['qeducacao_fisica'];
$area_conhecimento['qengenharia_aeroespacial'] = $_POST['qeng_aeroespacial'];
$area_conhecimento['qengenharia_biomedica'] = $_POST['qeng_biomedica'];
$area_conhecimento['qengenharia_civil'] = $_POST['qeng_civil'];
$area_conhecimento['qengenharia_armamentos'] = $_POST['qeng_armamentos'];
$area_conhecimento['qengenharia_minas'] = $_POST['qeng_minas'];
$area_conhecimento['qengenharia_transportes'] = $_POST['qeng_transportes'];
$area_conhecimento['qengenharia_mecatronica'] = $_POST['qeng_mecatronica'];
$area_conhecimento['qengenharia_nucl'] = $_POST['qeng_nucl'];
$area_conhecimento['qengenharia_textil'] = $_POST['qeng_textil'];
$area_conhecimento['qfarmacia'] = $_POST['qfarmacia'];
$area_conhecimento['qfisiologia'] = $_POST['qfisiologia'];
$area_conhecimento['qfonoaudiologia'] = $_POST['qfonoaudiologia'];
$area_conhecimento['qhistoria_natural'] = $_POST['qhistoria_natural'];
$area_conhecimento['qlinguistica'] = $_POST['qlinguistica'];
$area_conhecimento['qmedicina_veterinaria'] = $_POST['qmedicina_veterinaria'];
$area_conhecimento['qmorfologia'] = $_POST['qmorfologia'];
$area_conhecimento['qnutricao'] = $_POST['qnutricao'];
$area_conhecimento['qodontologia'] = $_POST['qodontologia'];
$area_conhecimento['qplanejamento_urbano_regional'] = $_POST['qplanejamento_urbano_regional'];
$area_conhecimento['qquimica_industrial'] = $_POST['qquimica_industrial'];
$area_conhecimento['qrelacoes_internacionais'] = $_POST['qrelacoes_internacionais'];
$area_conhecimento['qsecretariado_executiva'] = $_POST['qsecretariado_executiva'];
$area_conhecimento['qteologia'] = $_POST['qteologia'];
$area_conhecimento['qzootecnia'] = $_POST['qzootecnia'];
$area_conhecimento['qarea_conhecimento'] = $_POST['qAreaConh'];

if($_POST['fieldset_q4']==="sim"){
	$query['area_conhecimento'] = geraQuery($area_conhecimento,'area_conhecimento',1,1);
}else{
	$query['area_conhecimento'] = geraQuery($area_conhecimento,'area_conhecimento',1);
}

$temp = mysql_query($query['area_conhecimento']);

while($linha = mysql_fetch_assoc($temp)){
	$result['area_conhecimento'][] = $linha['id'];
}

//Modalidades
$modalidade = array();
$modalidade['regular'] = $_POST['regular'];
$modalidade['eja'] = $_POST['eja'];
$modalidade['educacao_especial'] = $_POST['educespecial'];
$modalidade['educacao_indigena'] = $_POST['educindigena'];
$modalidade['educacao_profissional_tecnologica'] = $_POST['educprofetecno'];
$modalidade['educacao_infantil'] = $_POST['edinfantil'];
$modalidade['ensino_fundamental_1_4_1_5'] = $_POST['efundamental1a4'];
$modalidade['ensino_fundamental_5_8_6_9'] = $_POST['efundamental5a8'];
$modalidade['ensino_medio'] = $_POST['emedio'];
$modalidade['educacao_superior'] = $_POST['esuperior'];
$modalidade['abordagem_generica_niveis_escolares'] = $_POST['agne'];
$modalidade['qmodalidade'] = $_POST['qmodalidade'];
$modalidade['qregular'] = $_POST['qregular'];
$modalidade['qeja'] = $_POST['qeja'];
$modalidade['qeducacao_especial'] = $_POST['qeducespecial'];
$modalidade['qeducacao_indigena'] = $_POST['qeducindigena'];
$modalidade['qeducacao_profissional_tecnologica'] = $_POST['qeducprofetecno'];
$modalidade['qeducacao_infantil'] = $_POST['qedinfantil'];
$modalidade['qensino_fundamental_1_4_1_5'] = $_POST['qefundamental1a4'];
$modalidade['qensino_fundamental_5_8_6_9'] = $_POST['qefundamental5a8'];
$modalidade['qensino_medio'] = $_POST['qemedio'];
$modalidade['qeducacao_superior'] = $_POST['qesuperior'];
$modalidade['qabordagem_generica_niveis_escolares'] = $_POST['qagne'];

if($_POST['fieldset_q1']==="sim"){
	$query['modalidade'] = geraQuery($modalidade,'modalidade',1,1);
}else{
	$query['modalidade'] = geraQuery($modalidade,'modalidade',1);
}

$temp = mysql_query($query['modalidade']);

while($linha = mysql_fetch_assoc($temp)){
	$result['modalidade'][] = $linha['id'];
}

//Area Curricular
$area_curricular = array();
$area_curricular['arte'] = $_POST['artee'];
$area_curricular['biologia'] = $_POST['biologia'];
$area_curricular['ciencias_agrarias'] = $_POST['cienciasagrarias'];
$area_curricular['ciencias_computacao'] = $_POST['ciecom'];
$area_curricular['ciencias_geologicas'] = $_POST['cienciasgeologicas'];
$area_curricular['ciencias_naturais'] = $_POST['cienciasnaturais'];
$area_curricular['comunicacao_jornalismo'] = $_POST['comunejorn'];
$area_curricular['direito'] = $_POST['direi'];
$area_curricular['ecologia'] = $_POST['ecol'];
$area_curricular['economia'] = $_POST['economi'];
$area_curricular['educacao_fisica'] = $_POST['edfi'];
$area_curricular['filosofia'] = $_POST['filoso'];
$area_curricular['fisica'] = $_POST['fisi'];
$area_curricular['geografia'] = $_POST['geogr'];
$area_curricular['geral'] = $_POST['geral'];
$area_curricular['historia'] = $_POST['histo'];
$area_curricular['lingua_estrangeira'] = $_POST['linguaestrangeira'];
$area_curricular['lingua_portuguesa'] = $_POST['linguaportuguesa'];
$area_curricular['matematica'] = $_POST['matema'];
$area_curricular['pedagogia'] = $_POST['pedagogia'];
$area_curricular['quimica'] = $_POST['quimi'];
$area_curricular['saude'] = $_POST['saude'];
$area_curricular['sociologia'] = $_POST['sociolo'];
$area_curricular['turismo'] = $_POST['turi'];
$area_curricular['qarte'] = $_POST['qartee'];
$area_curricular['qbiologia'] = $_POST['qbiologia'];
$area_curricular['qciencias_agrarias'] = $_POST['qcienciasagrarias'];
$area_curricular['qciencias_computacao'] = $_POST['qciecom'];
$area_curricular['qciencias_geologicas'] = $_POST['qcienciasgeologicas'];
$area_curricular['qciencias_naturais'] = $_POST['qcienciasnaturais'];
$area_curricular['qcomunicacao_jornalismo'] = $_POST['qcomunejorn'];
$area_curricular['qdireito'] = $_POST['qdirei'];
$area_curricular['qecologia'] = $_POST['qecol'];
$area_curricular['qeconomia'] = $_POST['qeconomi'];
$area_curricular['qeducacao_fisica'] = $_POST['qedfi'];
$area_curricular['qfilosofia'] = $_POST['qfiloso'];
$area_curricular['qfisica'] = $_POST['qfisi'];
$area_curricular['qgeografia'] = $_POST['qgeogr'];
$area_curricular['qgeral'] = $_POST['qgeral'];
$area_curricular['qhistoria'] = $_POST['qhisto'];
$area_curricular['qlingua_estrangeira'] = $_POST['qlinguaestrangeira'];
$area_curricular['qlingua_portuguesa'] = $_POST['qlinguaportuguesa'];
$area_curricular['qmatematica'] = $_POST['qmatema'];
$area_curricular['qpedagogia'] = $_POST['qpedagogia'];
$area_curricular['qquimica'] = $_POST['qquimi'];
$area_curricular['qsaude'] = $_POST['qsaude'];
$area_curricular['qsociologia'] = $_POST['qsociolo'];
$area_curricular['qturismo'] = $_POST['qturi'];
$area_curricular['qarea_curricular'] = $_POST['qareaCurr'];

if($_POST['fieldset_q2']==="sim"){
	$query['area_curricular'] = geraQuery($area_curricular,'area_curricular',1,1);
}else{
	$query['area_curricular'] = geraQuery($area_curricular,'area_curricular',1);
}

$temp = mysql_query($query['area_curricular']);

while($linha = mysql_fetch_assoc($temp)){
	$result['area_curricular'][] = $linha['id'];
}



$area_curricular_string['licenciatura'] = $_POST['arealicen'];
$area_curricular_string['outra_area'] = $_POST['outraareaA'];
$area_curricular_ou = ($_POST['fieldset_q2']==="sim")?"OR ":"AND";
$licenciatura_check = $_POST['licenciatura'];
$outra_area_check = $_POST['outra'];

if($area_curricular_string['licenciatura']){
	$temp_licenciatura = explode(';',$area_curricular_string['licenciatura']);

	foreach ($temp_licenciatura as $valor) {
		$temp_result_licenciatura[$valor] = array();
		$temp_result = array();
		$query_licen = mysql_query("SELECT id FROM area_licenciatura WHERE `area_licenciatura` LIKE '".trim($valor)."';");
		if(mysql_num_rows($query_licen)){
			while($linha = mysql_fetch_assoc($query_licen)){
				$temp_result = array();
				$temp_query = mysql_query("SELECT ficha FROM area_licenciatura_keys WHERE `area_licenciatura` = ".$linha['id']);
				if(mysql_num_rows($temp_query)){
					while($linha_licenciatura = mysql_fetch_assoc($temp_query)){
						$temp_result[] = $linha_licenciatura['ficha'];
					}
				}
				$temp_result_licenciatura[$valor] = array_merge($temp_result_licenciatura[$valor],$temp_result);
			}
		}
	}

	if($area_curricular_ou==="OR "){
		$function = 'array_merge';
	}else{
		$function = 'array_intersect';
	}
	foreach($temp_result_licenciatura as $array){
		$result['area_curricular'] = $function($result['area_curricular'],$array);
	}
}elseif($licenciatura_check==="licenciatura"){
	$temp_query = mysql_query("SELECT DISTINCT ficha FROM area_licenciatura_keys");
	if(mysql_num_rows($temp_query)){
		while($linha_licenciatura = mysql_fetch_assoc($temp_query)){
			$temp_result_licenciatura[] = $linha_licenciatura['ficha'];
		}
		if($area_curricular_ou==="OR "){
			$function = 'array_merge';
		}else{
			$function = 'array_intersect';
		}

		$result['area_curricular'] = $function($result['area_curricular'],$temp_result_licenciatura);
	}
}

if($area_curricular_string['outra_area']){
	$temp_outra_area = explode(';',$area_curricular_string['outra_area']);

	foreach ($temp_outra_area as $valor) {
		$temp_result_outra_area[$valor] = array();
		$temp_result = array();
		$query_outra = mysql_query("SELECT id FROM outra_area WHERE `outra_area` LIKE '".trim($valor)."';");
		if(mysql_num_rows($query_outra)){
			while($linha = mysql_fetch_assoc($query_outra)){
				$temp_result = array();
				$temp_query = mysql_query("SELECT ficha FROM outra_area_keys WHERE `outra_area` = ".$linha['id']);
				if(mysql_num_rows($temp_query)){
					while($linha_outra_area = mysql_fetch_assoc($temp_query)){
						$temp_result[] = $linha_outra_area['ficha'];
					}
				}
				$temp_result_outra_area[$valor] = array_merge($temp_result_outra_area[$valor],$temp_result);
			}
		}
	}

	if($area_curricular_ou==="OR "){
		$function = 'array_merge';
	}else{
		$function = 'array_intersect';
	}
	foreach($temp_result_licenciatura as $array){
		$result['area_curricular'] = $function($result['area_curricular'],$array);
	}
}elseif($outra_area_check==="outra"){
	$temp_query = mysql_query("SELECT DISTINCT ficha FROM outra_area_keys");
	if(mysql_num_rows($temp_query)){
		while($linha_outra_area = mysql_fetch_assoc($temp_query)){
			$temp_result_outra_area[] = $linha_outra_area['ficha'];
		}
		if($area_curricular_ou==="OR "){
			$function = 'array_merge';
		}else{
			$function = 'array_intersect';
		}

		$result['area_curricular'] = $function($result['area_curricular'],$temp_result_outra_area);
	}
}

if($or_g){
	$resultado_final = array();
	foreach($result as $tabela){
		$resultado_final = array_merge($resultado_final, $tabela);
	}
	//É esperado um intersect com consolidadas (AND consolidadas)
	if($consolidada['consolidada']=="sim"){
		$resultado_final = array_intersect($result_consolidada, $resultado_final);
	}
}else{
	$resultado_final = $result['codigo'];
	foreach($result as $tabela){
		$resultado_final = array_intersect($resultado_final, $tabela);
	}
}

$resultado_ids_query = null;

$resultado_final_link = array();

foreach ($resultado_final as $id) {
	$resultado_final_link[] = dechex($id);

	$resultado_ids_query.="f.id=".$id." OR ";
}

$resultado_ids_query = (empty($resultado_ids_query)) ? null : substr($resultado_ids_query,0,-4);

$_SESSION['listar'] = $resultado_final;

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="style.css" rel="stylesheet" type="text/css" media="screen">
		<link href="print.css" rel="stylesheet" type="text/css" media="print">
		<title>Sistema EArte | Buscar</title>
	</head>
	<body>
		<script>
			//Confirmador de exclusão de uma ficha
			function confirma_exclusao(ficha){
				var resposta = confirm("Você realmente deseja excluir essa ficha?");
				if (resposta){
					window.location = "excluir.php?id="+ficha;
				}
			}
		</script>
		<br /><center><h2>Busca</h2></center><br />
		<a class="button" href="index.php">Voltar: Lista</a>
		<a class="button" href="busca.php">Voltar: Busca</a>
		<div><br /><br /></div>
		<a class="button" href="listar.php?listar=0">Listar: Sobrenome do Autor</a>
		<a class="button" href="listar.php?listar=1">Listar: Sobrenome do Orientador</a>
		<a class="button" href="listar.php?listar=2">Listar: Título</a>
		<a class="button" href="listar.php?listar=3">Listar: Código</a>
		<?php if($resultado_ids_query){ ?>
		<p id="numero_teses">Resultado: 
			<?php
				if (count($resultado_final)==1) {
					echo count($resultado_final)." documento";
				}
				else {
					echo count($resultado_final)." documentos";
				}
			?>
		</p>
		<?php } ?>
		<table>
		<?php
			if($resultado_ids_query){
				$sql = "SELECT f.id,f.codigo,f.consolidada,i.titulo,d.url_trabalho
						FROM ficha_classificacao AS f 
						LEFT JOIN identificacao AS i 
							ON f.id = i.id 
						LEFT JOIN detalhes_finais AS d
							ON f.id = d.id
						WHERE $resultado_ids_query
						ORDER BY f.id ASC";

				DBFactory::getConnection();
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');
				$result = mysql_query($sql);
				$i = 0;
				$fichas=null;
				while($data = mysql_fetch_array($result)){
					$fichas[$i] = array($data['id'],$data['codigo'],$data['consolidada'],$data['titulo'],$data['url_trabalho']);
					$i++;
				}

				/*$sql = "SELECT * FROM ficha_classificacao ".$resultado_ids_query." ORDER BY id ASC";
				$result = mysql_query($sql);
				$i = 0;
				$fichas=null;
				while($data = mysql_fetch_array($result)){
					$fichas[$i] = array($data['id'],$data['codigo'],$data['consolidada']);
					$i++;
				}

				$sql = "SELECT * FROM identificacao ".$resultado_ids_query." ORDER BY id ASC";
				$result = mysql_query($sql);
				$i = 0;
				$titulos=null;
				while($data = mysql_fetch_array($result)){
					$titulos[$i] = $data['titulo'];
					$i++;
				}*/
				$i=0;
				DBFactory::closeConnection();
			}
			if(isset($fichas)){
				while(isset($fichas[$i])){
					$id_ficha = $fichas[$i][0];
					$codigo = $fichas[$i][1];
					$consolidada = ($fichas[$i][2])?"":"_nc";
					$titulo = $fichas[$i][3];
					$url_trabalho = $fichas[$i][4];
					
					//Codigo e título
					echo
					"<tr>
					<td>$codigo</td>
					<td>$titulo</td>";

					//Url do trabalho
					echo "<td>";
					if(!empty($url_trabalho)){
						echo "<a href=\"".$url_trabalho."\"><img src=\"text.png\" alt=\"Abrir tese\"></a>";
					}
					echo "</td>";

					//Edição e remoção
					if(estaLogado()):
						echo "<td><a href=\"formulario.php?id=$id_ficha\"><img src=\"editar".$consolidada.".png\" alt=\"Editar\" /></a></td>";
						echo "<td><a href=\"javascript:void()\" onClick=\"confirma_exclusao($id_ficha);\"><img src=\"excluir.png\" alt=\"Excluir\" /></a></td>";
					endif;

					//Fechando linha
					echo "</tr>";
					$i++;
				}
			} else {
				echo "<br />Nenhuma ficha encontrada";
			}
		?>
		</table>
	</body>
</html>