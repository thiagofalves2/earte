<?php include_once("logado.php"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="style.css" rel="stylesheet" type="text/css" media="screen">
		<link href="print.css" rel="stylesheet" type="text/css" media="print">
		<script src="jquery.js" type="text/javascript"></script>
		<link href="ajax/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet">
		<script src="ajax/js/jquery-ui-1.9.1.custom.js"></script>
		<script src="cidades.js" type="text/javascript"></script>
		<script src="script.js" type="text/javascript"></script>
		<title>Ficha de Classificação</title>
	</head>
	<body>
		<?php
		date_default_timezone_set('America/Sao_Paulo');
			require_once("dao/DBFactory.class.php");
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
					$fichaSelecionada=null;
					if(isset($_GET["id"])&&$_GET["id"]!=null){
						echo "<form name = \"formulario\" action=\"editar.php\" method=\"post\">";
					} else {
						echo "<form name = \"formulario\" action=\"adicionar.php\" method=\"post\">";
					}
		?>
			<fieldset>
				<legend>Ficha de Classificação</legend>
				<label for="codigo">Código
					<?php
					if(isset($_GET["id"])&&$_GET["id"]!=null){
						$id_ficha = $_GET["id"];
						$fdao = new Ficha_classificacaoDAO();
						$fichas=$fdao->allData();
						foreach($fichas as $f){
							if((int)$f->getId()==(int)$id_ficha){
								$fichaSelecionada=$f;
								$codigo=$fichaSelecionada->getCodigo();
								echo "<input type=\"text\" id=\"codigo\" name=\"codigo\" placeholder=\"Código\" value=\"$codigo\">";
								break;
							}
						}
						echo "<input type=\"text\" name=\"idFicha\" style=\"display:none\" value=\"$id_ficha\">";
					} else {
						echo "<input type=\"text\" id=\"codigo\" name=\"codigo\" placeholder=\"Código\">";
						echo "<input type=\"text\" name=\"idFicha\" style=\"display:none\" value=\"\">";
					}
					?>
				</label>
				<label class="right" for="consolidada">Consolidada
					<?php
					if($fichaSelecionada!=null&&($fichaSelecionada->getConsolidada()==1)){
						echo "<input type=\"checkbox\" id=\"consolidada\" name=\"consolidada\" value=\"sim\" checked>";
					} else {
						echo "<input type=\"checkbox\" id=\"consolidada\" name=\"consolidada\" value=\"sim\">";
					}
					?>
				</label>
				<br><br>
				<fieldset>
					<legend>Identificação</legend>
					<label class="largelabel" for="titulo">Título
						<?php
						if($fichaSelecionada!=null){
							$id_ident=$fichaSelecionada->getId_identificacao();
							$idao = new IdentificacaoDAO();
							$identif=$idao->selectDataForCode($id_ident);
							$titulo=$identif->getTitulo();
							echo "<input type=\"text\" class=\"largeinput\" id=\"titulo\" name=\"titulo\" placeholder=\"Titulo\" value=\"$titulo\">";
						} else {
							echo "<input type=\"text\" class=\"largeinput\" id=\"titulo\" name=\"titulo\" placeholder=\"Titulo\">";
						}
						?>
					</label><br>
					<p class="tab">Autor:</p>
					<label for="autor">Nome
						<?php
						if($fichaSelecionada!=null){
							$nome=$identif->getAutor_nome();
							echo "<input type=\"text\" id=\"autor\" name=\"autor\" placeholder=\"Nome do Autor\" value=\"$nome\">";
						} else {
							echo "<input type=\"text\" id=\"autor\" name=\"autor\" placeholder=\"Nome do Autor\">";
						}
						?>
					</label>
					<label class="widelabel" for="sobrenome">Sobrenome
						<?php
						if($fichaSelecionada!=null){
							$sobrenome=$identif->getAutor_sobrenome();
							echo "<input type=\"text\" class=\"wideinput\" id=\"sobrenome\" name=\"sobrenome\" placeholder=\"Sobrenome do Autor\" value=\"$sobrenome\">";
						} else {
							echo "<input type=\"text\" class=\"wideinput\" id=\"sobrenome\" name=\"sobrenome\" placeholder=\"Sobrenome do Autor\">";
						}
						?>
					</label>
					
					<label class="widelabel" for="orientador">Orientador(es)
						<?php
						if($fichaSelecionada!=null){
							$orientador=$identif->getOrientador();
							echo "<input type=\"text\" class=\"wideinput\" id=\"orientador\" name=\"orientador\" placeholder=\"Nome do Orientador\" value=\"$orientador\">";
						} else {
							echo "<input type=\"text\" class=\"wideinput\" id=\"orientador\" name=\"orientador\" placeholder=\"Nome do Orientador\">";
						}
						?>
					</label>
					<label for="ano">Ano da Defesa
						<select name="ano">
						<?php
						if($fichaSelecionada!=null){
							$ano=$identif->getAno_Defesa();
							for($i=1940;$i<=2030;$i++){
								if($i==$ano){
									echo "<option value=\"$i\" selected>$i</option>";
								} else {
									echo "<option value=\"$i\">$i</option>";
								}
							}
						} else {
							for($i=1940;$i<=2030;$i++){
								if($i==date('Y')){
									echo "<option value=\"$i\" selected>$i</option>";
								} else {
									echo "<option value=\"$i\">$i</option>";
								}
							}
						}
						?>
						</select>
					</label>
					<label for="ndepaginas">Número de Páginas
						<?php
						if($fichaSelecionada!=null){
							$npaginas=$identif->getNumero_paginas();
							echo "<input type=\"text\" id=\"ndepaginas\" name=\"ndepaginas\" placeholder=\"Nº de Páginas\" value=\"$npaginas\">";
						} else {
							echo "<input type=\"text\" id=\"ndepaginas\" name=\"ndepaginas\" placeholder=\"Nº de Páginas\">";
						}
						?>
					</label>
					<label class="widelabel" for="programapos">Programa de Pós
						<?php
						if($fichaSelecionada!=null){
							$progpos=$identif->getPrograma_pos();
							echo "<input type=\"text\" class=\"wideinput\" id=\"programapos\" name=\"programapos\" placeholder=\"Programa de Pós\" value=\"$progpos\">";
						} else {
							echo "<input type=\"text\" class=\"wideinput\" id=\"programapos\" name=\"programapos\" placeholder=\"Programa de Pós\">";
						}
						?>
					</label>
					<label for="siglaies">IES
						<?php
						if($fichaSelecionada!=null){
							$siglaies=$identif->getIes();
							echo "<input type=\"text\" id=\"siglaies\" name=\"siglaies\" placeholder=\"Sigla da IES\" value=\"$siglaies\">";
						} else {
							echo "<input type=\"text\" id=\"siglaies\" name=\"siglaies\" placeholder=\"Sigla da IES\">";
						}
						?>
					</label>
					<label for="unidadesetor">Unidade/Setor
						<?php
						if($fichaSelecionada!=null){
							$uniSet=$identif->getUnidade_setor();
							echo "<input type=\"text\" id=\"unidadesetor\" name=\"unidadesetor\" placeholder=\"Unidade ou Setor\" value=\"$uniSet\">";
						} else {
							echo "<input type=\"text\" id=\"unidadesetor\" name=\"unidadesetor\" placeholder=\"Unidade ou Setor\">";
						}
						?>
					</label>
					<label for="estado">Estado
						<?php
						if($fichaSelecionada!=null){
							$estado=$identif->getEstado();
							echo "<input type=\"text\" id=\"estado\" name=\"estado\" placeholder=\"Sigla do Estado\" value=\"$estado\">";
						} else {
							echo "<input type=\"text\" id=\"estado\" name=\"estado\" placeholder=\"Sigla do Estado\">";
						}
						?>
					</label>
					<label for="cidade">Cidade
						<?php
						if($fichaSelecionada!=null){
							$cidade=$identif->getCidade();
							echo "<input type=\"text\" id=\"cidade\" name=\"cidade\" placeholder=\"Nome da Cidade\" value=\"$cidade\">";
						} else {
							echo "<input type=\"text\" id=\"cidade\" name=\"cidade\" placeholder=\"Nome da Cidade\">";
						}
						?>
					</label>
					<label class="widelabel" for="grautitulacao">Grau de Titulação Acadêmica
						<select name="grautitulacao">
							<?php
							if($fichaSelecionada!=null){
								$grau=$identif->getGrau_titulacao_academica();
								if(strtolower($grau)=="mestrado" || strtolower($grau)=="mestrado academico"){
									echo "<option value=\"\">Selecione uma opção...</option>
										<option value=\"mestrado\" selected>Mestrado Acadêmico</option>
										<option value=\"doutorado\">Doutorado</option>
										<option value=\"profissional\">Mestrado Profissional</option>";
								} else if(strtolower($grau)=="doutorado"){
									echo "<option value=\"\">Selecione uma opção...</option>
										<option value=\"mestrado\">Mestrado Acadêmico</option>
										<option value=\"doutorado\" selected>Doutorado</option>
										<option value=\"profissional\">Mestrado Profissional</option>";
								} else {
									echo "<option value=\"\">Selecione uma opção...</option>
										<option value=\"mestrado\" selected>Mestrado Acadêmico</option>
										<option value=\"doutorado\">Doutorado</option>
										<option value=\"profissional\" selected>Mestrado Profissional</option>";
								}
							} else {
								echo "<option value=\"\" selected>Selecione uma opção...</option>
									<option value=\"mestrado\">Mestrado Acadêmico</option>
									<option value=\"doutorado\">Doutorado</option>
									<option value=\"profissional\">Mestrado Profissional</option>";
							}
							?>
						</select>
					</label>
					<label for="depadm">Dependência Administrativa
						<select name="depadm" required>
							<?php
							if($fichaSelecionada!=null){
								$depadmin=$identif->getDependencia_administrativa();
								if(strtolower($depadmin)=="municipal"){
									echo "<option value=\"municipal\" selected>Municipal</option>
									<option value=\"estadual\">Estadual</option>
									<option value=\"federal\">Federal</option>
									<option value=\"particular\">Particular</option>";
								} else if(strtolower($depadmin)=="estadual"){
									echo "<option value=\"municipal\">Municipal</option>
									<option value=\"estadual\" selected>Estadual</option>
									<option value=\"federal\">Federal</option>
									<option value=\"particular\">Particular</option>";
								} else if(strtolower($depadmin)=="federal"){
									echo "<option value=\"municipal\">Municipal</option>
									<option value=\"estadual\">Estadual</option>
									<option value=\"federal\" selected>Federal</option>
									<option value=\"particular\">Particular</option>";
								} else {
									echo "<option value=\"municipal\">Municipal</option>
									<option value=\"estadual\">Estadual</option>
									<option value=\"federal\">Federal</option>
									<option value=\"particular\" selected>Particular</option>";
								}
							} else {
								echo "<option value=\"municipal\">Municipal</option>
									<option value=\"estadual\">Estadual</option>
									<option value=\"federal\">Federal</option>
									<option value=\"particular\">Particular</option>";
							}
							?>
						</select>
					</label>
				</fieldset>
				<fieldset id="q0">
					<legend>
					<?php
						$contextoNaoEscolar=false;
						$contextoEscolar=false;
						$abordagemGenerica=false;
						if($fichaSelecionada!=null){
							$id_cont=$fichaSelecionada->getId_contexto_educacional();
							$cdao=new Contexto_educacionalDAO();
							$context=$cdao->selectDataForCode($id_cont);
							$qcontextEdu=$context->getQcontexto_educacional();
							if($qcontextEdu==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qcontextEdu\" value=\"sim\" checked>";
							}else{
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qcontextEdu\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qcontextEdu\" value=\"sim\">";
						}
						?>
						
					</div>Contexto Educacional</legend>
					
					<div class="multi" for="opt">
					<div class="questionholder">
						<?php
						if($fichaSelecionada!=null){
							$qnaoEscolar=$context->getQcontexto_nao_escolar();
							if($qnaoEscolar==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qnaoEscolar\" value=\"sim\" checked>";
							}else{
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qnaoEscolar\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qnaoEscolar\" value=\"sim\">";
						}
						?>
						</div>
						<label>
						<?php
						if($fichaSelecionada!=null){
							$contEdu=$context->getContexto_nao_escolar();
							if($contEdu==1){
								$contextoNaoEscolar=true;
								echo "<input type=\"checkbox\" name=\"opt1\" value=\"naoescolar\" checked>Contexto Não-Escolar";
							}else{
								echo "<input type=\"checkbox\" name=\"opt1\" value=\"naoescolar\">Contexto Não-Escolar";
							}
						} else {
							echo "<input type=\"checkbox\" name=\"opt1\" value=\"naoescolar\">Contexto Não-Escolar";
						}
						?>
						</label>
					</div>
                    <div class="questionholder">
						<?php
						if($fichaSelecionada!=null){
							$qEscolar=$context->getQcontexto_escolar();
							if($qEscolar==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qescolar\" value=\"sim\" checked>";
							}else{
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qescolar\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qescolar\" value=\"sim\">";
						}
						?>
						</div>
						<label>
						<?php
						if($fichaSelecionada!=null){
							$contEdu=$context->getContexto_escolar();
							if($contEdu==1){
								$contextoEscolar=true;
								echo "<input type=\"checkbox\" name=\"opt2\" value=\"escolar\" checked>Contexto Escolar";
							}else{
								echo "<input type=\"checkbox\" name=\"opt2\" value=\"escolar\">Contexto Escolar";
							}
						} else {
							echo "<input type=\"checkbox\" name=\"opt2\" value=\"escolar\">Contexto Escolar";
						}
						?>
						</label>
					</div>
					<div class="questionholder">
						<?php
						if($fichaSelecionada!=null){
							$qGenerica=$context->getQabordagem_generica();
							if($qGenerica==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qgenerica\" value=\"sim\" checked>";
							}else{
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qgenerica\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qgenerica\" value=\"sim\">";
						}
						?>
						</div>
						<label>
						<?php
						if($fichaSelecionada!=null){
							$contEdu=$context->getAbordagem_generica();
							if($contEdu==1){
								$abordagemGenerica=true;
								echo "<input type=\"checkbox\" name=\"opt3\" value=\"generica\" checked>Abordagem Genérica";
							}else{
								echo "<input type=\"checkbox\" name=\"opt3\" value=\"generica\">Abordagem Genérica";
							}
						} else {
							echo "<input type=\"checkbox\" name=\"opt3\" value=\"generica\">Abordagem Genérica";
						}
						?>
						</label>
						</div>
					</div>
				</fieldset>
				<?php
					if($contextoEscolar){
						echo "<fieldset id=\"q1\">";
					} else {
						echo "<fieldset class=\"nodisplay\" id=\"q1\">";
					}
					
				?>				
					<legend>
					<?php
					if($contextoEscolar){
						$mdao=new ModalidadesDAO();
						$id_modalidade=$fichaSelecionada->getId_modalidades();
						$modalid=$mdao->selectDataForCode($id_modalidade);
						$qmodalidade=$modalid->getQmodalidade();
						if($qmodalidade==1){
							echo "<div class=\"question qticked\">
							<input type=\"checkbox\" name=\"qmodalidade\" value=\"sim\" checked>";
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qmodalidade\" value=\"sim\">";
						}
					} else {
						echo "<div class=\"question\">
						<input type=\"checkbox\" name=\"qmodalidade\" value=\"sim\">";
					}
				?>
				</div>Modalidades</legend>
					<div class="multi" for="modalidades">
						<div class="questionholderreg">
							<?php
							if($contextoEscolar){
								$mdao=new ModalidadesDAO();
								$id_modalidade=$fichaSelecionada->getId_modalidades();
								$modalid=$mdao->selectDataForCode($id_modalidade);
								$qregular=$modalid->getQregular();
								if($qregular==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qregular\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qregular\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qregular\" value=\"sim\">";
							}
							?>
								</div>
							<label>
							<?php
							$regular=0;
							if($contextoEscolar){
								$regular=$modalid->getRegular();
								if($regular==1){
									echo "<input type=\"checkbox\" name=\"regular\" value=\"regular\" checked>Regular";
								} else {
									echo "<input type=\"checkbox\" name=\"regular\" value=\"regular\">Regular";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"regular\" value=\"regular\">Regular";
							}
							?>
							</label>
						</div>
						<?php
						if($regular==1){
							echo "<div style=\"display: block;\" class=\"multi nodisplay\" id=\"q6\">";
						} else {
							echo "<div class=\"multi nodisplay\" id=\"q6\">";
						}
					?>
						<div class="questionholderreg">
                            <?php
							if($contextoEscolar){
								$qEduInf=$modalid->getQeducacao_infantil();
								if($qEduInf==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qedinfantil\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qedinfantil\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qedinfantil\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$edInf=$modalid->getEducacao_infantil();
								if($edInf==1){
									echo "<input type=\"checkbox\" name=\"edinfantil\" value=\"sim\" checked>Educação Infantil";
								} else {
									echo "<input type=\"checkbox\" name=\"edinfantil\" value=\"sim\">Educação Infantil";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"edinfantil\" value=\"sim\">Educação Infantil";
							}
							?>
							</label>
                            <br />
                            <?php
							if($contextoEscolar){
								$qEnsFund1415=$modalid->getQensino_fundamental_1_4_1_5();
								if($qEnsFund1415==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qefundamental1a4\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qefundamental1a4\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qefundamental1a4\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$ensFund1415=$modalid->getEnsino_fundamental_1_4_1_5();
								if($ensFund1415==1){
									echo "<input type=\"checkbox\" name=\"efundamental1a4\" value=\"sim\" checked>Ensino Fundamental 1ª a 4ª/1º ao 5º";
								} else {
									echo "<input type=\"checkbox\" name=\"efundamental1a4\" value=\"sim\">Ensino Fundamental 1ª a 4ª/1º ao 5º";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"efundamental1a4\" value=\"sim\">Ensino Fundamental 1ª a 4ª/1º ao 5º";
							}
							?>
							</label>
							<br />
                        	<?php
							if($contextoEscolar){
								$qEnsFund5869=$modalid->getQensino_fundamental_5_8_6_9();
								if($qEnsFund5869==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qefundamental5a8\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qefundamental5a8\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qefundamental5a8\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$ensFund5869=$modalid->getEnsino_fundamental_5_8_6_9();
								if($ensFund5869==1){
									echo "<input type=\"checkbox\" name=\"efundamental5a8\" value=\"sim\" checked>Ensino Fundamental 5ª a 8ª/6º ao 9º";
								} else {
									echo "<input type=\"checkbox\" name=\"efundamental5a8\" value=\"sim\">Ensino Fundamental 5ª a 8ª/6º ao 9º";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"efundamental5a8\" value=\"sim\">Ensino Fundamental 5ª a 8ª/6º ao 9º";
							}
							?>
							</label>
                        	<br />
                            <?php
							if($contextoEscolar){
								$qMedio=$modalid->getQensino_medio();
								if($qMedio==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qemedio\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qemedio\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qemedio\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$ensMed=$modalid->getEnsino_medio();
								if($ensMed==1){
									echo "<input type=\"checkbox\" name=\"emedio\" value=\"sim\" checked>Ensino Médio";
								} else {
									echo "<input type=\"checkbox\" name=\"emedio\" value=\"sim\">Ensino Médio";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"emedio\" value=\"sim\">Ensino Médio";
							}
							?>
							</label>
                            <br />
                            <?php
							if($contextoEscolar){
								$qEdSup=$modalid->getQeducacao_superior();
								if($qEdSup==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qesuperior\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qesuperior\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qesuperior\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$edSup=$modalid->getEducacao_superior();
								if($edSup==1){
									echo "<input type=\"checkbox\" name=\"esuperior\" value=\"sim\" checked>Educação Superior";
								} else {
									echo "<input type=\"checkbox\" name=\"esuperior\" value=\"sim\">Educação Superior";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"esuperior\" value=\"sim\">Educação Superior";
							}
							?>
							</label>
                            <br />
                            <?php
							if($contextoEscolar){
								$qAgne=$modalid->getQabordagem_generica_niveis_escolares();
								if($qAgne==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qagne\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qagne\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qagne\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$abGen=$modalid->getAbordagem_generica_niveis_escolares();
								if($abGen==1){
									echo "<input type=\"checkbox\" name=\"agne\" value=\"sim\" checked>Abordagem Genérica dos Níveis Escolares";
								} else {
									echo "<input type=\"checkbox\" name=\"agne\" value=\"sim\">Abordagem Genérica dos Níveis Escolares";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"agne\" value=\"sim\">Abordagem Genérica dos Níveis Escolares";
							}
							?>
							</label>
                        </div>
					</div>	
						<div class="questionholder">
							<?php
							if($contextoEscolar){
								$qeja=$modalid->getQeja();
								if($qeja==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qeja\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeja\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeja\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$eja=$modalid->getEja();
								if($eja==1){
									echo "<input type=\"checkbox\" name=\"eja\" value=\"sim\" checked>EJA";
								} else {
									echo "<input type=\"checkbox\" name=\"eja\" value=\"sim\">EJA";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"eja\" value=\"sim\">EJA";
							}
							?>
							</label>
                            <br />
                            <?php
							if($contextoEscolar){
								$qEduEsp=$modalid->getQeducacao_especial();
								if($qEduEsp==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qeducespecial\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeducespecial\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeducespecial\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$eduEsp=$modalid->getEducacao_especial();
								if($eduEsp==1){
									echo "<input type=\"checkbox\" name=\"educespecial\" value=\"sim\" checked>Educação Especial";
								} else {
									echo "<input type=\"checkbox\" name=\"educespecial\" value=\"sim\">Educação Especial";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"educespecial\" value=\"sim\">Educação Especial";
							}
							?>
							</label>
                            <br />
                            <?php
							if($contextoEscolar){
								$qEduInd=$modalid->getQeducacao_indigena();
								if($qEduInd==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qeducindigena\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeducindigena\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeducindigena\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$eduInd=$modalid->getEducacao_indigena();
								if($eduInd==1){
									echo "<input type=\"checkbox\" name=\"educindigena\" value=\"sim\" checked>Educação Indígena";
								} else {
									echo "<input type=\"checkbox\" name=\"educindigena\" value=\"sim\">Educação Indígena";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"educindigena\" value=\"sim\">Educação Indígena";
							}
							?>
							</label>
                            <br />
                            <?php
							if($contextoEscolar){
								$qEduProfTec=$modalid->getQeducacao_profissional_tecnologica();
								if($qEduProfTec==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qeducprofetecno\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeducprofetecno\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeducprofetecno\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
							if($contextoEscolar){
								$eduProf=$modalid->getEducacao_profissional_tecnologica();
								if($eduProf==1){
									echo "<input type=\"checkbox\" name=\"educprofetecno\" value=\"sim\" checked>Educação Profissional e Tecnológica";
								} else {
									echo "<input type=\"checkbox\" name=\"educprofetecno\" value=\"sim\">Educação Profissional e Tecnológica";
								}
							} else {
								echo "<input type=\"checkbox\" name=\"educprofetecno\" value=\"sim\">Educação Profissional e Tecnológica";
							}
							?>
							</label>
						</div>
						
						
					</div>
					
				</fieldset>
				<?php
					if($contextoEscolar){
						echo "<fieldset id=\"q2\">";
					} else {
						echo "<fieldset class=\"nodisplay\" id=\"q2\">";
					}
				?>
					<legend>
					<?php
						if($contextoEscolar){
							$acdao=new Area_curricularDAO();
							$id_areaCurr=$fichaSelecionada->getId_area_curricular();
							$areaCurri=$acdao->selectDataForCode($id_areaCurr);
							$qareaCurr=$areaCurri->getQarea_curricular();
							if($qareaCurr==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qareaCurr\" value=\"sim\" checked>";
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qareaCurr\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qareaCurr\" value=\"sim\">";
						}
					?>
					</div>
					Área Curricular</legend>
					<div class="multi" for="area">
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qArte=$areaCurri->getQarte();
									if($qArte==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qartee\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qartee\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qartee\" value=\"sim\">";
								}
								?>
									</div>
								<label>
								<?php
								if($contextoEscolar){
									$arte=$areaCurri->getArte();
									if($arte==1){
										echo "<input type=\"checkbox\" name=\"artee\" value=\"sim\" checked>Arte";
									} else {
										echo "<input type=\"checkbox\" name=\"artee\" value=\"sim\">Arte";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"artee\" value=\"sim\">Arte";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qBiolog=$areaCurri->getQbiologia();
									if($qBiolog==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qbiologia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qbiologia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qbiologia\" value=\"sim\">";
								}
								?>
									</div>
								<label>
								<?php
								if($contextoEscolar){
									$biol=$areaCurri->getBiologia();
									if($biol==1){
										echo "<input type=\"checkbox\" name=\"biologia\" value=\"sim\" checked>Biologia";
									} else {
										echo "<input type=\"checkbox\" name=\"biologia\" value=\"sim\">Biologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"biologia\" value=\"sim\">Biologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qCienAgra=$areaCurri->getQciencias_agrarias();
									if($qCienAgra==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qcienciasagrarias\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qcienciasagrarias\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcienciasagrarias\" value=\"sim\">";
								}
								?>
									</div>
								<label>
								<?php
								if($contextoEscolar){
									$cieAg=$areaCurri->getCiencias_agrarias();
									if($cieAg==1){
										echo "<input type=\"checkbox\" name=\"cienciasagrarias\" value=\"sim\" checked>Ciências Agrárias";
									} else {
										echo "<input type=\"checkbox\" name=\"cienciasagrarias\" value=\"sim\">Ciências Agrárias";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"cienciasagrarias\" value=\"sim\">Ciências Agrárias";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qCieComp=$areaCurri->getQciencias_computacao();
									if($qCieComp==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qciecom\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qciecom\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qciecom\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$cieComp=$areaCurri->getCiencias_computacao();
									if($cieComp==1){
										echo "<input type=\"checkbox\" name=\"ciecom\" value=\"sim\" checked>Ciências da Computação";
									} else {
										echo "<input type=\"checkbox\" name=\"ciecom\" value=\"sim\">Ciências da Computação";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"ciecom\" value=\"sim\">Ciências da Computação";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qCieGeo=$areaCurri->getQciencias_geologicas();
									if($qCieGeo==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qcienciasgeologicas\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qcienciasgeologicas\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcienciasgeologicas\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$cieGeo=$areaCurri->getCiencias_geologicas();
									if($cieGeo==1){
										echo "<input type=\"checkbox\" name=\"cienciasgeologicas\" value=\"sim\" checked>Ciências Geológicas";
									} else {
										echo "<input type=\"checkbox\" name=\"cienciasgeologicas\" value=\"sim\">Ciências Geológicas";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"cienciasgeologicas\" value=\"sim\">Ciências Geológicas";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qCienNat=$areaCurri->getQciencias_naturais();
									if($qCienNat==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qcienciasnaturais\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qcienciasnaturais\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcienciasnaturais\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$cieNat=$areaCurri->getCiencias_naturais();
									if($cieNat==1){
										echo "<input type=\"checkbox\" name=\"cienciasnaturais\" value=\"sim\" checked>Ciências Naturais";
									} else {
										echo "<input type=\"checkbox\" name=\"cienciasnaturais\" value=\"sim\">Ciências Naturais";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"cienciasnaturais\" value=\"sim\">Ciências Naturais";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qComunEJorn=$areaCurri->getQcomunicacao_jornalismo();
									if($qComunEJorn==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qcomunejorn\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qcomunejorn\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcomunejorn\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$comJor=$areaCurri->getComunicacao_jornalismo();
									if($comJor==1){
										echo "<input type=\"checkbox\" name=\"comunejorn\" value=\"sim\" checked>Comunicação e Jornalismo";
									} else {
										echo "<input type=\"checkbox\" name=\"comunejorn\" value=\"sim\">Comunicação e Jornalismo";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"comunejorn\" value=\"sim\">Comunicação e Jornalismo";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qDireito=$areaCurri->getQdireito();
									if($qDireito==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qdirei\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qdirei\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qdirei\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$dire=$areaCurri->getDireito();
									if($dire==1){
										echo "<input type=\"checkbox\" name=\"direi\" value=\"sim\" checked>Direito";
									} else {
										echo "<input type=\"checkbox\" name=\"direi\" value=\"sim\">Direito";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"direi\" value=\"sim\">Direito";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qEcol=$areaCurri->getQecologia();
									if($qEcol==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qecol\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qecol\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qecol\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$ecol=$areaCurri->getEcologia();
									if($ecol==1){
										echo "<input type=\"checkbox\" name=\"ecol\" value=\"sim\" checked>Ecologia";
									} else {
										echo "<input type=\"checkbox\" name=\"ecol\" value=\"sim\">Ecologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"ecol\" value=\"sim\">Ecologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qEconom=$areaCurri->getQeconomia();
									if($qEconom==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qeconomi\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qeconomi\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeconomi\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$econ=$areaCurri->getEconomia();
									if($econ==1){
										echo "<input type=\"checkbox\" name=\"economi\" value=\"sim\" checked>Economia";
									} else {
										echo "<input type=\"checkbox\" name=\"economi\" value=\"sim\">Economia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"economi\" value=\"sim\">Economia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qEdFis=$areaCurri->getQeducacao_fisica();
									if($qEdFis==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qedfi\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qedfi\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qedfi\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$edFis=$areaCurri->getEducacao_fisica();
									if($edFis==1){
										echo "<input type=\"checkbox\" name=\"edfi\" value=\"sim\" checked>Educação Física";
									} else {
										echo "<input type=\"checkbox\" name=\"edfi\" value=\"sim\">Educação Física";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"edfi\" value=\"sim\">Educação Física";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qFilos=$areaCurri->getQfilosofia();
									if($qFilos==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qfiloso\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qfiloso\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfiloso\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$filos=$areaCurri->getFilosofia();
									if($filos==1){
										echo "<input type=\"checkbox\" name=\"filoso\" value=\"sim\" checked>Filosofia";
									} else {
										echo "<input type=\"checkbox\" name=\"filoso\" value=\"sim\">Filosofia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"filoso\" value=\"sim\">Filosofia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qFisica=$areaCurri->getQfisica();
									if($qFisica==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qfisi\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qfisi\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfisi\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$fisic=$areaCurri->getFisica();
									if($fisic==1){
										echo "<input type=\"checkbox\" name=\"fisi\" value=\"sim\" checked>Física";
									} else {
										echo "<input type=\"checkbox\" name=\"fisi\" value=\"sim\">Física";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"fisi\" value=\"sim\">Física";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qGeograf=$areaCurri->getQgeografia();
									if($qGeograf==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qgeogr\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qgeogr\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeogr\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$geogr=$areaCurri->getGeografia();
									if($geogr==1){
										echo "<input type=\"checkbox\" name=\"geogr\" value=\"sim\" checked>Geografia";
									} else {
										echo "<input type=\"checkbox\" name=\"geogr\" value=\"sim\">Geografia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"geogr\" value=\"sim\">Geografia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qGeral=$areaCurri->getQgeral();
									if($qGeral==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qgeral\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qgeral\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeral\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$geral=$areaCurri->getGeral();
									if($geral==1){
										echo "<input type=\"checkbox\" name=\"geral\" value=\"sim\" checked>Geral";
									} else {
										echo "<input type=\"checkbox\" name=\"geral\" value=\"sim\">Geral";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"geral\" value=\"sim\">Geral";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qHisto=$areaCurri->getQhistoria();
									if($qHisto==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qhisto\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qhisto\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qhisto\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$hist=$areaCurri->getHistoria();
									if($hist==1){
										echo "<input type=\"checkbox\" name=\"histo\" value=\"sim\" checked>História";
									} else {
										echo "<input type=\"checkbox\" name=\"histo\" value=\"sim\">História";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"histo\" value=\"sim\">História";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qLinguEstr=$areaCurri->getQlingua_estrangeira();
									if($qLinguEstr==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qlinguaestrangeira\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qlinguaestrangeira\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qlinguaestrangeira\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$lingEst=$areaCurri->getLingua_estrangeira();
									if($lingEst==1){
										echo "<input type=\"checkbox\" name=\"linguaestrangeira\" value=\"sim\" checked>Língua Estrangeira";
									} else {
										echo "<input type=\"checkbox\" name=\"linguaestrangeira\" value=\"sim\">Língua Estrangeira";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"linguaestrangeira\" value=\"sim\">Língua Estrangeira";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qLinguPort=$areaCurri->getQlingua_portuguesa();
									if($qLinguPort==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qlinguaportuguesa\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qlinguaportuguesa\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qlinguaportuguesa\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$lingPor=$areaCurri->getLingua_portuguesa();
									if($lingPor==1){
										echo "<input type=\"checkbox\" name=\"linguaportuguesa\" value=\"sim\" checked>Língua Portuguesa";
									} else {
										echo "<input type=\"checkbox\" name=\"linguaportuguesa\" value=\"sim\">Língua Portuguesa";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"linguaportuguesa\" value=\"sim\">Língua Portuguesa";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qMatema=$areaCurri->getQmatematica();
									if($qMatema==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qmatema\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qmatema\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qmatema\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$mate=$areaCurri->getMatematica();
									if($mate==1){
										echo "<input type=\"checkbox\" name=\"matema\" value=\"sim\" checked>Matemática";
									} else {
										echo "<input type=\"checkbox\" name=\"matema\" value=\"sim\">Matemática";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"matema\" value=\"sim\">Matemática";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qPedago=$areaCurri->getQpedagogia();
									if($qPedago==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qpedagogia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qpedagogia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qpedagogia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$pedago=$areaCurri->getPedagogia();
									if($pedago==1){
										echo "<input type=\"checkbox\" name=\"pedagogia\" value=\"sim\" checked>Pedagogia";
									} else {
										echo "<input type=\"checkbox\" name=\"pedagogia\" value=\"sim\">Pedagogia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"pedagogia\" value=\"sim\">Pedagogia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qQuimica=$areaCurri->getQquimica();
									if($qQuimica==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qquimi\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qquimi\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qquimi\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$quimi=$areaCurri->getQuimica();
									if($quimi==1){
										echo "<input type=\"checkbox\" name=\"quimi\" value=\"sim\" checked>Química";
									} else {
										echo "<input type=\"checkbox\" name=\"quimi\" value=\"sim\">Química";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"quimi\" value=\"sim\">Química";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qSaude=$areaCurri->getQsaude();
									if($qSaude==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qsaude\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qsaude\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsaude\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$saude=$areaCurri->getSaude();
									if($saude==1){
										echo "<input type=\"checkbox\" name=\"saude\" value=\"sim\" checked>Saúde";
									} else {
										echo "<input type=\"checkbox\" name=\"saude\" value=\"sim\">Saúde";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"saude\" value=\"sim\">Saúde";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qSociolog=$areaCurri->getQsociologia();
									if($qSociolog==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qsociolo\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qsociolo\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsociolo\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$socio=$areaCurri->getSociologia();
									if($socio==1){
										echo "<input type=\"checkbox\" name=\"sociolo\" value=\"sim\" checked>Sociologia";
									} else {
										echo "<input type=\"checkbox\" name=\"sociolo\" value=\"sim\">Sociologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"sociolo\" value=\"sim\">Sociologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoEscolar){
									$qTuri=$areaCurri->getQturismo();
									if($qTuri==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qturi\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qturi\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qturi\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoEscolar){
									$turi=$areaCurri->getTurismo();
									if($turi==1){
										echo "<input type=\"checkbox\" name=\"turi\" value=\"sim\" checked>Turismo";
									} else {
										echo "<input type=\"checkbox\" name=\"turi\" value=\"sim\">Turismo";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"turi\" value=\"sim\">Turismo";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<label>
								<?php
								DBFactory::getConnection();
								$areaLicen=null;
								if(isset($id_ficha)){
									$query = "SELECT area_licenciatura FROM area_licenciatura_keys WHERE ficha=".$id_ficha;
									$query = mysql_query($query);
									if(mysql_num_rows($query)){
										while($v = mysql_fetch_row($query)){
											$queryNome = "SELECT area_licenciatura FROM area_licenciatura WHERE id=".$v[0];
											$queryNome = mysql_query($queryNome);
											if(mysql_num_rows($queryNome)){
												$result = mysql_result($queryNome,0);
												$areaLicen .= $result.'; ';
											}
										}

										echo "<input type=\"checkbox\" name=\"licenciatura\" value=\"licenciatura\" checked>Licenciatura...";
									}else{
										echo "<input type=\"checkbox\" name=\"licenciatura\" value=\"licenciatura\">Licenciatura...";
									}
								}else{
										echo "<input type=\"checkbox\" name=\"licenciatura\" value=\"licenciatura\">Licenciatura...";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<label>
								<?php
								$outArea=null;
								if(isset($id_ficha)){
									DBFactory::getConnection();
									$query = "SELECT outra_area FROM outra_area_keys WHERE ficha=".$id_ficha;
									$query = mysql_query($query);
									if(mysql_num_rows($query)){
										while($v = mysql_fetch_row($query)){
											$queryNome = "SELECT outra_area FROM outra_area WHERE id=".$v[0];
											$queryNome = mysql_query($queryNome);
											if(mysql_num_rows($queryNome)){
												$result = mysql_result($queryNome,0);
												$outArea .= $result.'; ';
											}
										}
										echo "<input type=\"checkbox\" name=\"outra\" value=\"outra\" checked>Outra área...";
									}else{
										echo "<input type=\"checkbox\" name=\"outra\" value=\"outra\">Outra área...";
									}
								}
								?>
								</label>
							</div>
					</div>
					<script>
					$(function() {
    					function split( val ) {
       	 					return val.split( /;\s*/ );
        				}
       					function extractLast( term ) {
            				return split( term ).pop();
        				}
 
        				$("#arealicen")
        				.bind( "keydown", function( event ) {
                			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    			event.preventDefault();
                			}
            			})
            			.autocomplete({
                			source: function( request, response ) {
                    			$.getJSON( "ajax/arealicen.php", {
                        			term: extractLast( request.term )
                    			}, response );
                			},
                			search: function() {
			                    // custom minLength
			                    var term = extractLast( this.value );
			                    if ( term.length < 2 ) {
			                        return false;
			                    }
			                },
			                focus: function() {
			                    // prevent value inserted on focus
			                    return false;
			                },
			                select: function( event, ui ) {
			                    var terms = split( this.value );
			                    // remove the current input
			                    terms.pop();
			                    // add the selected item
			                    terms.push( ui.item.value );
			                    // add placeholder to get the comma-and-space at the end
			                    terms.push( "" );
			                    this.value = terms.join( "; " );
			                    return false;
			                }
				    	});
				    });
					</script>
					<label class="widelabel <?php if($areaLicen==null){echo"nodisplay";} ?>" for="arealicen">Área em Licenciatura
						<input type="text" class="wideinput" id="arealicen" name="arealicen" value="<?php echo $areaLicen; ?>" placeholder="Nome da Área">
					</label>
                    <br />
                    <script>
					$(function() {
    					function split( val ) {
       	 					return val.split( /;\s*/ );
        				}
       					function extractLast( term ) {
            				return split( term ).pop();
        				}
 
        				$("#outraareaA")
        				.bind( "keydown", function( event ) {
                			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    			event.preventDefault();
                			}
            			})
            			.autocomplete({
                			source: function( request, response ) {
                    			$.getJSON( "ajax/outraarea.php", {
                        			term: extractLast( request.term )
                    			}, response );
                			},
                			search: function() {
			                    // custom minLength
			                    var term = extractLast( this.value );
			                    if ( term.length < 2 ) {
			                        return false;
			                    }
			                },
			                focus: function() {
			                    // prevent value inserted on focus
			                    return false;
			                },
			                select: function( event, ui ) {
			                    var terms = split( this.value );
			                    // remove the current input
			                    terms.pop();
			                    // add the selected item
			                    terms.push( ui.item.value );
			                    // add placeholder to get the comma-and-space at the end
			                    terms.push( "" );
			                    this.value = terms.join( "; " );
			                    return false;
			                }
				    	});
				    });
					</script>
						<label class="widelabel <?php if($outArea==null){echo"nodisplay";}?>" for="outraareaA">Outra Área
							<input type="text" class="wideinput" id="outraareaA" name="outraareaA" value="<?php echo $outArea; ?>" placeholder="Outra Área">
						</label>
				</fieldset>
				<?php
					if($contextoNaoEscolar){
						echo "<fieldset id=\"q3\">";
					} else {
						echo "<fieldset class=\"nodisplay\" id=\"q3\">";
					}
					$publicEnvolv=null;
					if(isset($id_ficha)){
						DBFactory::getConnection();
						$query = "SELECT publico_envolvido FROM publico_envolvido_keys WHERE ficha=".$id_ficha;
						$query = mysql_query($query);
						if(mysql_num_rows($query)){
							while($v = mysql_fetch_row($query)){
								$queryNome = "SELECT publico_envolvido FROM publico_envolvido WHERE id=".$v[0];
								$queryNome = mysql_query($queryNome);
								if(mysql_num_rows($queryNome)){
									$result = mysql_result($queryNome,0);
									$publicEnvolv .= $result.'; ';
								}
							}
						}

						if(!$publicEnvolv || $publicEnvolv==''){
							$query = "SELECT id_publico_envolvido FROM ficha_classificacao WHERE id=".$id_ficha;
							$query = mysql_query($query);
							if(mysql_num_rows($query)){
								while($v = mysql_fetch_row($query)){
									$queryNome = "SELECT publico_envolvido FROM publico_envolvido WHERE id=".$v[0];
									$queryNome = mysql_query($queryNome);
									if(mysql_num_rows($queryNome)){
										$result = mysql_result($queryNome,0);
										$publicEnvolv .= $result.'; ';
									}
								}
							}
						}
					}
				?>
				<script>
					$(document).ready(function(){
					$(function() {
    					function split( val ) {
       	 					return val.split( /;\s*/ );
        				}
       					function extractLast( term ) {
            				return split( term ).pop();
        				}
 
        				$("#naoescolar")
        				.bind( "keydown", function( event ) {
                			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    			event.preventDefault();
                			}
            			})
            			.autocomplete({
                			source: function( request, response ) {
                    			$.getJSON( "ajax/publico.php", {
                        			term: extractLast( request.term )
                    			}, response );
                			},
                			search: function() {
			                    // custom minLength
			                    var term = extractLast( this.value );
			                    if ( term.length < 2 ) {
			                        return false;
			                    }
			                },
			                focus: function() {
			                    // prevent value inserted on focus
			                    return false;
			                },
			                select: function( event, ui ) {
			                    var terms = split( this.value );
			                    // remove the current input
			                    terms.pop();
			                    // add the selected item
			                    terms.push( ui.item.value );
			                    // add placeholder to get the comma-and-space at the end
			                    terms.push( "" );
			                    this.value = terms.join( "; " );
			                    return false;
			                }
				    	});
				    });
					});
					</script>
					<legend>Público Envolvido</legend>
					<label class="widelabel" for="naoescolar">Público Envolvido
							<input type="text" class="wideinput" id="naoescolar" name="naoescolar" value="<?php echo $publicEnvolv; ?>" placeholder="Público envolvido">
					</label>
				</fieldset>
				<?php
					if($contextoNaoEscolar||$abordagemGenerica){
						echo "<fieldset id=\"q4\">";
					} else {
						echo "<fieldset class=\"nodisplay\" id=\"q4\">";
					}
				?>
					<legend>
					<?php
						if($contextoNaoEscolar||$abordagemGenerica){
							$acndao=new Area_conhecimentoDAO();
							$id_areaConh=$fichaSelecionada->getId_area_conhecimento();
							$areaConhe=$acndao->selectDataForCode($id_areaConh);
							$qAreaConhecimento=$areaConhe->getQarea_conhecimento();
							if($qAreaConhecimento==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qAreaConh\" value=\"sim\" checked>";
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qAreaConh\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qAreaConh\" value=\"sim\">";
						}
					?>
					</div>
					Área de Conhecimento</legend>
					<div class="multi" for="area">
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qAgronomia=$areaConhe->getQagronomia();
									if($qAgronomia==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qagronomia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qagronomia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qagronomia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$agron=$areaConhe->getAgronomia();
									if($agron==1){
										echo "<input type=\"checkbox\" name=\"agronomia\" value=\"sim\" checked>Agronomia";
									} else {
										echo "<input type=\"checkbox\" name=\"agronomia\" value=\"sim\">Agronomia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"agronomia\" value=\"sim\">Agronomia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qAntropo=$areaConhe->getQantropologia();
									if($qAntropo==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qantropologia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qantropologia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qantropologia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$antr=$areaConhe->getAntropologia();
									if($antr==1){
										echo "<input type=\"checkbox\" name=\"antropologia\" value=\"sim\" checked>Antropologia";
									} else {
										echo "<input type=\"checkbox\" name=\"antropologia\" value=\"sim\">Antropologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"antropologia\" value=\"sim\">Antropologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qArqUrb=$areaConhe->getQarquitetura_urbanismo();
									if($qArqUrb==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qarquitetura_urbanismo\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qarquitetura_urbanismo\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qarquitetura_urbanismo\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$arqUrb=$areaConhe->getArquitetura_urbanismo();
									if($arqUrb==1){
										echo "<input type=\"checkbox\" name=\"arquitetura_urbanismo\" value=\"sim\" checked>Arquitetura e Urbanismo";
									} else {
										echo "<input type=\"checkbox\" name=\"arquitetura_urbanismo\" value=\"sim\">Arquitetura e Urbanismo";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"arquitetura_urbanismo\" value=\"sim\">Arquitetura e Urbanismo";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qArt=$areaConhe->getQarte();
									if($qArt==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qarte\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qarte\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qarte\" value=\"sim\">";
								}
								?>
									</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$arte=$areaConhe->getArte();
									if($arte==1){
										echo "<input type=\"checkbox\" name=\"arte\" value=\"sim\" checked>Arte";
									} else {
										echo "<input type=\"checkbox\" name=\"arte\" value=\"sim\">Arte";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"arte\" value=\"sim\">Arte";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qBioGer=$areaConhe->getQbiologia_geral();
									if($qBioGer==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qbiologia_geral\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qbiologia_geral\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qbiologia_geral\" value=\"sim\">";
								}
								?>
									</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$biol=$areaConhe->getBiologia_geral();
									if($biol==1){
										echo "<input type=\"checkbox\" name=\"biologia_geral\" value=\"sim\" checked>Biologia Geral";
									} else {
										echo "<input type=\"checkbox\" name=\"biologia_geral\" value=\"sim\">Biologia Geral";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"biologia_geral\" value=\"sim\">Biologia Geral";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qComJor=$areaConhe->getQcomunicacao_jornalismo();
									if($qComJor==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qcomunicacaoejorn\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qcomunicacaoejorn\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcomunicacaoejorn\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$comJor=$areaConhe->getComunicacao_jornalismo();
									if($comJor==1){
										echo "<input type=\"checkbox\" name=\"comunicacaoejorn\" value=\"sim\" checked>Geral";
									} else {
										echo "<input type=\"checkbox\" name=\"comunicacaoejorn\" value=\"sim\">Geral";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"comunicacaoejorn\" value=\"sim\">Geral";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qDir=$areaConhe->getQdireito();
									if($qDir==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qdireito\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qdireito\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qdireito\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$direi=$areaConhe->getDireito();
									if($direi==1){
										echo "<input type=\"checkbox\" name=\"direito\" value=\"sim\" checked>Direito";
									} else {
										echo "<input type=\"checkbox\" name=\"direito\" value=\"sim\">Direito";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"direito\" value=\"sim\">Direito";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qEco=$areaConhe->getQecologia();
									if($qEco==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qecologia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qecologia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qecologia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$ecol=$areaConhe->getEcologia();
									if($ecol==1){
										echo "<input type=\"checkbox\" name=\"ecologia\" value=\"sim\" checked>Ecologia";
									} else {
										echo "<input type=\"checkbox\" name=\"ecologia\" value=\"sim\">Ecologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"ecologia\" value=\"sim\">Ecologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qEduca=$areaConhe->getQeducacao();
									if($qEduca==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qeducacao\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qeducacao\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeducacao\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$educ=$areaConhe->getEducacao();
									if($educ==1){
										echo "<input type=\"checkbox\" name=\"educacao\" value=\"sim\" checked>Educação";
									} else {
										echo "<input type=\"checkbox\" name=\"educacao\" value=\"sim\">Educação";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"educacao\" value=\"sim\">Educação";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qEngSanit=$areaConhe->getQengenharia_sanitaria();
									if($qEngSanit==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qeng_sanitaria\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qeng_sanitaria\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeng_sanitaria\" value=\"sim\">";
								}
								?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										$engSan=$areaConhe->getEngenharia_sanitaria();
										if($engSan==1){
											echo "<input type=\"checkbox\" name=\"eng_sanitaria\" value=\"sim\" checked>Engenharia Sanitária";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_sanitaria\" value=\"sim\">Engenharia Sanitária";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_sanitaria\" value=\"sim\">Engenharia Sanitária";
									}
									?>
									</label>
								</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qFilos=$areaConhe->getQfilosofia();
									if($qFilos==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qfilosofia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qfilosofia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfilosofia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$filos=$areaConhe->getFilosofia();
									if($filos==1){
										echo "<input type=\"checkbox\" name=\"filosofia\" value=\"sim\" checked>Filosofia";
									} else {
										echo "<input type=\"checkbox\" name=\"filosofia\" value=\"sim\">Filosofia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"filosofia\" value=\"sim\">Filosofia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qFisic=$areaConhe->getQfisica();
									if($qFisic==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qfisica\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qfisica\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfisica\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$fisic=$areaConhe->getFisica();
									if($fisic==1){
										echo "<input type=\"checkbox\" name=\"fisica\" value=\"sim\" checked>Física";
									} else {
										echo "<input type=\"checkbox\" name=\"fisica\" value=\"sim\">Física";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"fisica\" value=\"sim\">Física";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qGeoCie=$areaConhe->getQgeociencias();
									if($qGeoCie==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qgeociencias\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qgeociencias\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeociencias\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$geoc=$areaConhe->getGeociencias();
									if($geoc==1){
										echo "<input type=\"checkbox\" name=\"geociencias\" value=\"sim\" checked>Geociencias";
									} else {
										echo "<input type=\"checkbox\" name=\"geociencias\" value=\"sim\">Geociencias";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"geociencias\" value=\"sim\">Geociencias";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qGeog=$areaConhe->getQgeografia();
									if($qGeog==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qgeografia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qgeografia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeografia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$geog=$areaConhe->getGeografia();
									if($geog==1){
										echo "<input type=\"checkbox\" name=\"geografia\" value=\"sim\" checked>Geografia";
									} else {
										echo "<input type=\"checkbox\" name=\"geografia\" value=\"sim\">Geografia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"geografia\" value=\"sim\">Geografia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qHis=$areaConhe->getQhistoria();
									if($qHis==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qhistoria\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qhistoria\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qhistoria\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$hist=$areaConhe->getHistoria();
									if($hist==1){
										echo "<input type=\"checkbox\" name=\"historia\" value=\"sim\" checked>História";
									} else {
										echo "<input type=\"checkbox\" name=\"historia\" value=\"sim\">História";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"historia\" value=\"sim\">História";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qLetr=$areaConhe->getQletras();
									if($qLetr==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qletras\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qletras\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qletras\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$letr=$areaConhe->getLetras();
									if($letr==1){
										echo "<input type=\"checkbox\" name=\"letras\" value=\"sim\" checked>Letras";
									} else {
										echo "<input type=\"checkbox\" name=\"letras\" value=\"sim\">Letras";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"letras\" value=\"sim\">Letras";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qMate=$areaConhe->getQmatematica();
									if($qMate==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qmatematica\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qmatematica\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qmatematica\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$mate=$areaConhe->getMatematica();
									if($mate==1){
										echo "<input type=\"checkbox\" name=\"matematica\" value=\"sim\" checked>Matemática";
									} else {
										echo "<input type=\"checkbox\" name=\"matematica\" value=\"sim\">Matemática";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"matematica\" value=\"sim\">Matemática";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qPsi=$areaConhe->getQpsicologia();
									if($qPsi==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qpsicologia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qpsicologia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qpsicologia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$psic=$areaConhe->getPsicologia();
									if($psic==1){
										echo "<input type=\"checkbox\" name=\"psicologia\" value=\"sim\" checked>Psicologia";
									} else {
										echo "<input type=\"checkbox\" name=\"psicologia\" value=\"sim\">Psicologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"psicologia\" value=\"sim\">Psicologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qQuimi=$areaConhe->getQquimica();
									if($qQuimi==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qquimica\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qquimica\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qquimica\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$quim=$areaConhe->getQuimica();
									if($quim==1){
										echo "<input type=\"checkbox\" name=\"quimica\" value=\"sim\" checked>Química";
									} else {
										echo "<input type=\"checkbox\" name=\"quimica\" value=\"sim\">Química";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"quimica\" value=\"sim\">Química";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qRecFloEngFlo=$areaConhe->getQrec_florestais_eng_florestal();
									if($qRecFloEngFlo==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qrecursos_floresais_eng_florestal\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qrecursos_floresais_eng_florestal\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qrecursos_floresais_eng_florestal\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$recFl=$areaConhe->getRec_florestais_eng_florestal();
									if($recFl==1){
										echo "<input type=\"checkbox\" name=\"recursos_floresais_eng_florestal\" value=\"sim\" checked>Recursos Florestais e Eng. Florestal";
									} else {
										echo "<input type=\"checkbox\" name=\"recursos_floresais_eng_florestal\" value=\"sim\">Recursos Florestais e Eng. Florestal";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"recursos_floresais_eng_florestal\" value=\"sim\">Recursos Florestais e Eng. Florestal";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qSau=$areaConhe->getQsaude_coletiva();
									if($qSau==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qsaude_coletiva\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qsaude_coletiva\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsaude_coletiva\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$sauCol=$areaConhe->getSaude_coletiva();
									if($sauCol==1){
										echo "<input type=\"checkbox\" name=\"saude_coletiva\" value=\"sim\" checked>Saúde Coletiva";
									} else {
										echo "<input type=\"checkbox\" name=\"saude_coletiva\" value=\"sim\">Saúde Coletiva";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"saude_coletiva\" value=\"sim\">Saúde Coletiva";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qSocio=$areaConhe->getQsociologia();
									if($qSocio==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qsociologia\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qsociologia\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsociologia\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$socio=$areaConhe->getSociologia();
									if($socio==1){
										echo "<input type=\"checkbox\" name=\"sociologia\" value=\"sim\" checked>Sociologia";
									} else {
										echo "<input type=\"checkbox\" name=\"sociologia\" value=\"sim\">Sociologia";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"sociologia\" value=\"sim\">Sociologia";
								}
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$qTur=$areaConhe->getQturismo();
									if($qTur==1){
										echo "<div class=\"question qticked\">
										<input type=\"checkbox\" name=\"qturismo\" value=\"sim\" checked>";
									} else {
										echo "<div class=\"question\">
										<input type=\"checkbox\" name=\"qturismo\" value=\"sim\">";
									}
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qturismo\" value=\"sim\">";
								}
								?>
								</div>
								<label>
								<?php
								if($contextoNaoEscolar||$abordagemGenerica){
									$turis=$areaConhe->getTurismo();
									if($turis==1){
										echo "<input type=\"checkbox\" name=\"turismo\" value=\"sim\" checked>Turismo";
									} else {
										echo "<input type=\"checkbox\" name=\"turismo\" value=\"sim\">Turismo";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"turismo\" value=\"sim\">Turismo";
								}
								?>
								</label>
							</div>
							<?php
								//código para verificar se a Área de Conhecimento deve ser expandida, caso em que algum dos seguintes checkbox estaria marcado
								$admin=0;$admRur=0;$astr=0;$bioMe=0;$botan=0;$carRel=0;$cieInf=0;
								$ciePol=0;$cieAtu=0;$comun=0;$demog=0;$desProj=0;$dipl=0;$econDom=0;
								$enfer=0;$engAgric=0;$engCart=0;$engAgrim=0;$engMatMet=0;$engProd=0;$engEle=0;
								$engNavOce=0;$engQui=0;$estSoc=0;$farmaco=0;$fisTerOcp=0;$gene=0;$imuno=0;
								$medic=0;$ocea=0;$paras=0;$probEst=0;$recPesEngPes=0;$relaPubl=0;$serSoc=0;
								$zool=0;$admHosp=0;$arqueo=0;$biofis=0;$bioqui=0;$carrMili=0;$cieComp=0;
								$cieTecAli=0;$cien=0;$cienSoc=0;$decor=0;$desModa=0;$desInd=0;$econ=0;
								$edFis=0;$engAero=0;$engBio=0;$engCiv=0;$engArm=0;$engMin=0;$engTrans=0;
								$engMeca=0;$engNucl=0;$engText=0;$farmacia=0;$fisiol=0;$fonoa=0;$histNat=0;
								$linguis=0;$medVet=0;$morfo=0;$nutri=0;$odont=0;$planUrbRur=0;$quimInd=0;
								$relaInter=0;$secreExec=0;$teolo=0;$zootec=0;$microB=0;$museo=0;
								
								$qadmin=0;$qadmRur=0;$qastr=0;$qbioMe=0;$qbotan=0;$qcarRel=0;$qcieInf=0;
								$qciePol=0;$qcieAtu=0;$qcomun=0;$qdemog=0;$qdesProj=0;$qdipl=0;$qeconDom=0;
								$qenfer=0;$qengAgric=0;$qengCart=0;$qengAgrim=0;$qengMatMet=0;$qengProd=0;$qengEle=0;
								$qengNavOce=0;$qengQui=0;$qestSoc=0;$qfarmaco=0;$qfisTerOcp=0;$qgene=0;$qimuno=0;
								$qmedic=0;$qocea=0;$qparas=0;$qprobEst=0;$qrecPesEngPes=0;$qrelaPubl=0;$qserSoc=0;
								$qzool=0;$qadmHosp=0;$qarqueo=0;$qbiofis=0;$qbioqui=0;$qcarrMili=0;$qcieComp=0;
								$qcieTecAli=0;$qcien=0;$qcienSoc=0;$qdecor=0;$qdesModa=0;$qdesInd=0;$qecon=0;
								$qedFis=0;$qengAero=0;$qengBio=0;$qengCiv=0;$qengArm=0;$qengMin=0;$qengTrans=0;
								$qengMeca=0;$qengNucl=0;$qengText=0;$qfarmacia=0;$qfisiol=0;$qfonoa=0;$qhistNat=0;
								$qlinguis=0;$qmedVet=0;$qmorfo=0;$qnutri=0;$qodont=0;$qplanUrbRur=0;$qquimInd=0;
								$qrelaInter=0;$qsecreExec=0;$qteolo=0;$qzootec=0;$qmicroB=0;$qmuseo=0;
								if($contextoNaoEscolar||$abordagemGenerica){
									$admin=$areaConhe->getAdministracao();
									$admRur=$areaConhe->getAdministracao_rural();
									$astr=$areaConhe->getAstronomia();
									$bioMe=$areaConhe->getBiomedicina();
									$botan=$areaConhe->getBotanica();
									$carRel=$areaConhe->getCarreira_religiosa();
									$cieInf=$areaConhe->getCiencia_informacao();
									$ciePol=$areaConhe->getCiencia_politica();
									$cieAtu=$areaConhe->getCiencias_atuariais();
									$comun=$areaConhe->getComunicacao();
									$demog=$areaConhe->getDemografia();
									$desProj=$areaConhe->getDesenho_projetos();
									$dipl=$areaConhe->getDiplomacia();
									$econDom=$areaConhe->getEconomia_domestica();
									$enfer=$areaConhe->getEnfermagem();
									$engAgric=$areaConhe->getEngenharia_agricola();
									$engCart=$areaConhe->getEngenharia_cartografica();
									$engAgrim=$areaConhe->getEngenharia_agrimensura();
									$engMatMet=$areaConhe->getEngenharia_materiais_metalurgica();
									$engProd=$areaConhe->getEngenharia_producao();
									$engEle=$areaConhe->getEngenharia_eletrica();
									$engNavOce=$areaConhe->getEngenharia_naval_oceanica();
									$engQui=$areaConhe->getEngenharia_quimica();
									$estSoc=$areaConhe->getEstudos_sociais();
									$farmaco=$areaConhe->getFarmacologia();
									$fisTerOcp=$areaConhe->getFisioterapia_terapia_ocupacional();
									$gene=$areaConhe->getGenetica();
									$imuno=$areaConhe->getImunologia();
									$medic=$areaConhe->getMedicina();
									$microB=$areaConhe->getMicrobiologia();
									$museo=$areaConhe->getMuseologia();
									$ocea=$areaConhe->getOceanografia();
									$paras=$areaConhe->getParasitologia();
									$probEst=$areaConhe->getProbabilidade_estatistica();
									$recPesEngPes=$areaConhe->getRecursos_pesqueiros_engenharia_pesca();
									$relaPubl=$areaConhe->getRelacoes_publicas();
									$serSoc=$areaConhe->getServico_social();
									$zool=$areaConhe->getZoologia();
									$admHosp=$areaConhe->getAdministracao_hospitalar();
									$arqueo=$areaConhe->getArqueologia();
									$biofis=$areaConhe->getBiofisica();
									$bioqui=$areaConhe->getBioquimica();
									$carrMili=$areaConhe->getCarreira_militar();
									$cieComp=$areaConhe->getCiencia_computacao();
									$cieTecAli=$areaConhe->getCiencia_tecnologia_alimentos();
									$cien=$areaConhe->getCiencias();
									$cienSoc=$areaConhe->getCiencias_sociais();
									$decor=$areaConhe->getDecoracao();
									$desModa=$areaConhe->getDesenho_moda();
									$desInd=$areaConhe->getDesenho_industrial();
									$econ=$areaConhe->getEconomia();
									$edFis=$areaConhe->getEducacao_fisica();
									$engAero=$areaConhe->getEngenharia_aeroespacial();
									$engBio=$areaConhe->getEngenharia_biomedica();
									$engCiv=$areaConhe->getEngenharia_civil();
									$engArm=$areaConhe->getEngenharia_armamentos();
									$engMin=$areaConhe->getEngenharia_minas();
									$engTrans=$areaConhe->getEngenharia_transportes();
									$engMeca=$areaConhe->getEngenharia_mecatronica();
									$engNucl=$areaConhe->getEngenharia_nuclear();
									$engText=$areaConhe->getEngenharia_textil();
									$farmacia=$areaConhe->getFarmacia();
									$fisiol=$areaConhe->getFisiologia();
									$fonoa=$areaConhe->getFonoaudiologia();
									$histNat=$areaConhe->getHistoria_natural();
									$linguis=$areaConhe->getLinguistica();
									$medVet=$areaConhe->getMedicina_veterinaria();
									$morfo=$areaConhe->getMorfologia();
									$nutri=$areaConhe->getNutricao();
									$odont=$areaConhe->getOdontologia();
									$planUrbRur=$areaConhe->getPlanejamento_urbano_regional();
									$quimInd=$areaConhe->getQuimica_industrial();
									$relaInter=$areaConhe->getRelacoes_internacionais();
									$secreExec=$areaConhe->getSecretariado_executiva();
									$teolo=$areaConhe->getTeologia();
									$zootec=$areaConhe->getZootecnia();
									
									$qadmin=$areaConhe->getQadministracao();
									$qadmRur=$areaConhe->getQadministracao_rural();
									$qastr=$areaConhe->getQastronomia();
									$qbioMe=$areaConhe->getQbiomedicina();
									$qbotan=$areaConhe->getQbotanica();
									$qcarRel=$areaConhe->getQcarreira_religiosa();
									$qcieInf=$areaConhe->getQciencia_informacao();
									$qciePol=$areaConhe->getQciencia_politica();
									$qcieAtu=$areaConhe->getQciencias_atuariais();
									$qcomun=$areaConhe->getQcomunicacao();
									$qdemog=$areaConhe->getQdemografia();
									$qdesProj=$areaConhe->getQdesenho_projetos();
									$qdipl=$areaConhe->getQdiplomacia();
									$qeconDom=$areaConhe->getQeconomia_domestica();
									$qenfer=$areaConhe->getQenfermagem();
									$qengAgric=$areaConhe->getQengenharia_agricola();
									$qengCart=$areaConhe->getQengenharia_cartografica();
									$qengAgrim=$areaConhe->getQengenharia_agrimensura();
									$qengMatMet=$areaConhe->getQengenharia_materiais_metalurgica();
									$qengProd=$areaConhe->getQengenharia_producao();
									$qengEle=$areaConhe->getQengenharia_eletrica();
									$qengNavOce=$areaConhe->getQengenharia_naval_oceanica();
									$qengQui=$areaConhe->getQengenharia_quimica();
									$qestSoc=$areaConhe->getQestudos_sociais();
									$qfarmaco=$areaConhe->getQfarmacologia();
									$qfisTerOcp=$areaConhe->getQfisioterapia_terapia_ocupacional();
									$qgene=$areaConhe->getQgenetica();
									$qimuno=$areaConhe->getQimunologia();
									$qmedic=$areaConhe->getQmedicina();
									$qmicroB=$areaConhe->getQmicrobiologia();
									$qmuseo=$areaConhe->getQmuseologia();
									$qocea=$areaConhe->getQoceanografia();
									$qparas=$areaConhe->getQparasitologia();
									$qprobEst=$areaConhe->getQprobabilidade_estatistica();
									$qrecPesEngPes=$areaConhe->getQrecursos_pesqueiros_engenharia_pesca();
									$qrelaPubl=$areaConhe->getQrelacoes_publicas();
									$qserSoc=$areaConhe->getQservico_social();
									$qzool=$areaConhe->getQzoologia();
									$qadmHosp=$areaConhe->getQadministracao_hospitalar();
									$qarqueo=$areaConhe->getQarqueologia();
									$qbiofis=$areaConhe->getQbiofisica();
									$qbioqui=$areaConhe->getQbioquimica();
									$qcarrMili=$areaConhe->getQcarreira_militar();
									$qcieComp=$areaConhe->getQciencia_computacao();
									$qcieTecAli=$areaConhe->getQciencia_tecnologia_alimentos();
									$qcien=$areaConhe->getQciencias();
									$qcienSoc=$areaConhe->getQciencias_sociais();
									$qdecor=$areaConhe->getQdecoracao();
									$qdesModa=$areaConhe->getQdesenho_moda();
									$qdesInd=$areaConhe->getQdesenho_industrial();
									$qecon=$areaConhe->getQeconomia();
									$qedFis=$areaConhe->getQeducacao_fisica();
									$qengAero=$areaConhe->getQengenharia_aeroespacial();
									$qengBio=$areaConhe->getQengenharia_biomedica();
									$qengCiv=$areaConhe->getQengenharia_civil();
									$qengArm=$areaConhe->getQengenharia_armamentos();
									$qengMin=$areaConhe->getQengenharia_minas();
									$qengTrans=$areaConhe->getQengenharia_transportes();
									$qengMeca=$areaConhe->getQengenharia_mecatronica();
									$qengNucl=$areaConhe->getQengenharia_nuclear();
									$qengText=$areaConhe->getQengenharia_textil();
									$qfarmacia=$areaConhe->getQfarmacia();
									$qfisiol=$areaConhe->getQfisiologia();
									$qfonoa=$areaConhe->getQfonoaudiologia();
									$qhistNat=$areaConhe->getQhistoria_natural();
									$qlinguis=$areaConhe->getQlinguistica();
									$qmedVet=$areaConhe->getQmedicina_veterinaria();
									$qmorfo=$areaConhe->getQmorfologia();
									$qnutri=$areaConhe->getQnutricao();
									$qodont=$areaConhe->getQodontologia();
									$qplanUrbRur=$areaConhe->getQplanejamento_urbano_regional();
									$qquimInd=$areaConhe->getQquimica_industrial();
									$qrelaInter=$areaConhe->getQrelacoes_internacionais();
									$qsecreExec=$areaConhe->getQsecretariado_executiva();
									$qteolo=$areaConhe->getQteologia();
									$qzootec=$areaConhe->getQzootecnia();
									if($admin==1||$admRur==1||$astr==1||$bioMe==1||$botan==1||$carRel==1||$cieInf==1||$ciePol==1||$cieAtu==1||$comun==1||$demog==1||$desProj==1||$dipl==1||$econDom==1||$enfer==1||$engAgric==1||$engCart==1||$engAgrim==1||$engMatMet==1||$engProd==1||$engEle==1||$engNavOce==1||$engQui==1||$estSoc==1||$farmaco==1||$fisTerOcp==1||$gene==1||$imuno==1||$medic==1||$ocea==1||$paras==1||$probEst==1||$recPesEngPes==1||$relaPubl==1||$serSoc==1||$zool==1||$admHosp==1||$arqueo==1||$biofis==1||$bioqui==1||$carrMili==1||$cieComp==1||$cieTecAli==1||$cien==1||$cienSoc==1||$decor==1||$desModa==1||$desInd==1||$econ==1||$edFis==1||$engAero==1||$engBio==1||$engCiv==1||$engArm==1||$engMin==1||$engTrans==1||$engMeca==1||$engNucl==1||$engText==1||$farmacia==1||$fisiol==1||$fonoa==1||$histNat==1||$linguis==1||$medVet==1||$morfo==1||$nutri==1||$odont==1||$planUrbRur==1||$quimInd==1||$relaInter==1||$secreExec==1||$teolo==1||$zootec==1||$microB==1||$museo==1||$qadmin==1||$qadmRur==1||$qastr==1||$qbioMe==1||$qbotan==1||$qcarRel==1||$qcieInf==1||$qciePol==1||$qcieAtu==1||$qcomun==1||$qdemog==1||$qdesProj==1||$qdipl==1||$qeconDom==1||$qenfer==1||$qengAgric==1||$qengCart==1||$qengAgrim==1||$qengMatMet==1||$qengProd==1||$qengEle==1||$qengNavOce==1||$qengQui==1||$qestSoc==1||$qfarmaco==1||$qfisTerOcp==1||$qgene==1||$qimuno==1||$qmedic==1||$qocea==1||$qparas==1||$qprobEst==1||$qrecPesEngPes==1||$qrelaPubl==1||$qserSoc==1||$qzool==1||$qadmHosp==1||$qarqueo==1||$qbiofis==1||$qbioqui==1||$qcarrMili==1||$qcieComp==1||$qcieTecAli==1||$qcien==1||$qcienSoc==1||$qdecor==1||$qdesModa==1||$qdesInd==1||$qecon==1||$qedFis==1||$qengAero==1||$qengBio==1||$qengCiv==1||$qengArm==1||$qengMin==1||$qengTrans==1||$qengMeca==1||$qengNucl==1||$qengText==1||$qfarmacia==1||$qfisiol==1||$qfonoa==1||$qhistNat==1||$qlinguis==1||$qmedVet==1||$qmorfo==1||$qnutri==1||$qodont==1||$qplanUrbRur==1||$qquimInd==1||$qrelaInter==1||$qsecreExec==1||$qteolo==1||$qzootec==1||$qmicroB==1||$qmuseo==1){
										echo "<div style=\"display: block;\" id=\"exp_area_conhecimento\" class=\"nodisplay\">";
									} else {
										echo "<div id=\"exp_area_conhecimento\" class=\"nodisplay\">";
									}
								} else {
									echo "<div id=\"exp_area_conhecimento\" class=\"nodisplay\">";
								}
							?>
								<hr>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qadmin==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qadministracao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($admin==1){
											echo "<input type=\"checkbox\" name=\"administracao\" value=\"sim\" checked>Administração";
										} else {
											echo "<input type=\"checkbox\" name=\"administracao\" value=\"sim\">Administração";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"administracao\" value=\"sim\">Administração";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qadmHosp==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qadministracao_hosp\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao_hosp\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao_hosp\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($admHosp==1){
											echo "<input type=\"checkbox\" name=\"administracao_hosp\" value=\"sim\" checked>Administração Hospitalar";
										} else {
											echo "<input type=\"checkbox\" name=\"administracao_hosp\" value=\"sim\">Administração Hospitalar";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"administracao_hosp\" value=\"sim\">Administração Hospitalar";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qadmRur==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qadministracao_rural\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao_rural\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao_rural\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($admRur==1){
											echo "<input type=\"checkbox\" name=\"administracao_rural\" value=\"sim\" checked>Administração Rural";
										} else {
											echo "<input type=\"checkbox\" name=\"administracao_rural\" value=\"sim\">Administração Rural";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"administracao_rural\" value=\"sim\">Administração Rural";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qarqueo==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qarqueologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qarqueologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qarqueologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($arqueo==1){
											echo "<input type=\"checkbox\" name=\"arqueologia\" value=\"sim\" checked>Arqueologia";
										} else {
											echo "<input type=\"checkbox\" name=\"arqueologia\" value=\"sim\">Arqueologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"arqueologia\" value=\"sim\">Arqueologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qastr==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qastronomia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qastronomia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qastronomia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($astr==1){
											echo "<input type=\"checkbox\" name=\"astronomia\" value=\"sim\" checked>Astronomia";
										} else {
											echo "<input type=\"checkbox\" name=\"astronomia\" value=\"sim\">Astronomia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"astronomia\" value=\"sim\">Astronomia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qbiofis==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qbiofisica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbiofisica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbiofisica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($biofis==1){
											echo "<input type=\"checkbox\" name=\"biofisica\" value=\"sim\" checked>Biofísica";
										} else {
											echo "<input type=\"checkbox\" name=\"biofisica\" value=\"sim\">Biofísica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"biofisica\" value=\"sim\">Biofísica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qbioMe==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qbiomedicina\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbiomedicina\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbiomedicina\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($bioMe==1){
											echo "<input type=\"checkbox\" name=\"biomedicina\" value=\"sim\" checked>Biomedicina";
										} else {
											echo "<input type=\"checkbox\" name=\"biomedicina\" value=\"sim\">Biomedicina";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"biomedicina\" value=\"sim\">Biomedicina";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qbioqui==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qbioquimica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbioquimica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbioquimica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($bioqui==1){
											echo "<input type=\"checkbox\" name=\"bioquimica\" value=\"sim\" checked>Bioquímica";
										} else {
											echo "<input type=\"checkbox\" name=\"bioquimica\" value=\"sim\">Bioquímica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"bioquimica\" value=\"sim\">Bioquímica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qbotan==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qbotanica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbotanica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbotanica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($botan==1){
											echo "<input type=\"checkbox\" name=\"botanica\" value=\"sim\" checked>Botanica";
										} else {
											echo "<input type=\"checkbox\" name=\"botanica\" value=\"sim\">Botanica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"botanica\" value=\"sim\">Botanica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcarrMili==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qcarreira_militar\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcarreira_militar\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcarreira_militar\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($carrMili==1){
											echo "<input type=\"checkbox\" name=\"carreira_militar\" value=\"sim\" checked>Carreira Militar";
										} else {
											echo "<input type=\"checkbox\" name=\"carreira_militar\" value=\"sim\">Carreira Militar";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"carreira_militar\" value=\"sim\">Carreira Militar";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcarRel==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qcarreira_religiosa\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcarreira_religiosa\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcarreira_religiosa\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($carRel==1){
											echo "<input type=\"checkbox\" name=\"carreira_religiosa\" value=\"sim\" checked>Carreira Religiosa";
										} else {
											echo "<input type=\"checkbox\" name=\"carreira_religiosa\" value=\"sim\">Carreira Religiosa";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"carreira_religiosa\" value=\"sim\">Carreira Religiosa";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcieComp==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencia_computacao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_computacao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_computacao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($cieComp==1){
											echo "<input type=\"checkbox\" name=\"ciencia_computacao\" value=\"sim\" checked>Ciência da Computação";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencia_computacao\" value=\"sim\">Ciência da Computação";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencia_computacao\" value=\"sim\">Ciência da Computação";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcieInf==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencia_informacao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_informacao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_informacao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($cieInf==1){
											echo "<input type=\"checkbox\" name=\"ciencia_informacao\" value=\"sim\" checked>Ciência da Informação";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencia_informacao\" value=\"sim\">Ciência da Informação";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencia_informacao\" value=\"sim\">Ciência da Informação";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcieTecAli==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencia_alimentos\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_alimentos\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_alimentos\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($cieTecAli==1){
											echo "<input type=\"checkbox\" name=\"ciencia_alimentos\" value=\"sim\" checked>Ciência e Tecnologia de Alimentos";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencia_alimentos\" value=\"sim\">Ciência e Tecnologia de Alimentos";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencia_alimentos\" value=\"sim\">Ciência e Tecnologia de Alimentos";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qciePol==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencia_politica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_politica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_politica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($ciePol==1){
											echo "<input type=\"checkbox\" name=\"ciencia_politica\" value=\"sim\" checked>Ciência Política";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencia_politica\" value=\"sim\">Ciência Política";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencia_politica\" value=\"sim\">Ciência Política";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcien==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencias\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($cien==1){
											echo "<input type=\"checkbox\" name=\"ciencias\" value=\"sim\" checked>Ciências";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencias\" value=\"sim\">Ciências";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencias\" value=\"sim\">Ciências";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcieAtu==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencias_atuariais\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias_atuariais\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias_atuariais\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($cieAtu==1){
											echo "<input type=\"checkbox\" name=\"ciencias_atuariais\" value=\"sim\" checked>Ciências Atuariais";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencias_atuariais\" value=\"sim\">Ciências Atuariais";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencias_atuariais\" value=\"sim\">Ciências Atuariais";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcienSoc==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qciencias_sociais\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias_sociais\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias_sociais\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($cienSoc==1){
											echo "<input type=\"checkbox\" name=\"ciencias_sociais\" value=\"sim\" checked>Ciências Sociais";
										} else {
											echo "<input type=\"checkbox\" name=\"ciencias_sociais\" value=\"sim\">Ciências Sociais";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"ciencias_sociais\" value=\"sim\">Ciências Sociais";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qcomun==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qcomunicacao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcomunicacao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcomunicacao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($comun==1){
											echo "<input type=\"checkbox\" name=\"comunicacao\" value=\"sim\" checked>Comunicação";
										} else {
											echo "<input type=\"checkbox\" name=\"comunicacao\" value=\"sim\">Comunicação";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"comunicacao\" value=\"sim\">Comunicação";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qdecor==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qdecoracao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdecoracao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdecoracao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($decor==1){
											echo "<input type=\"checkbox\" name=\"decoracao\" value=\"sim\" checked>Decoração";
										} else {
											echo "<input type=\"checkbox\" name=\"decoracao\" value=\"sim\">Decoração";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"decoracao\" value=\"sim\">Decoração";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qdemog==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qdemografia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdemografia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdemografia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($demog==1){
											echo "<input type=\"checkbox\" name=\"demografia\" value=\"sim\" checked>Demografia";
										} else {
											echo "<input type=\"checkbox\" name=\"demografia\" value=\"sim\">Demografia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"demografia\" value=\"sim\">Demografia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qdesModa==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qdesenho_moda\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_moda\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_moda\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($desModa==1){
											echo "<input type=\"checkbox\" name=\"desenho_moda\" value=\"sim\" checked>Desenho de Moda";
										} else {
											echo "<input type=\"checkbox\" name=\"desenho_moda\" value=\"sim\">Desenho de Moda";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"desenho_moda\" value=\"sim\">Desenho de Moda";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qdesProj==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qdesenho_projetos\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_projetos\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_projetos\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($desProj==1){
											echo "<input type=\"checkbox\" name=\"desenho_projetos\" value=\"sim\" checked>Desenho de Projetos";
										} else {
											echo "<input type=\"checkbox\" name=\"desenho_projetos\" value=\"sim\">Desenho de Projetos";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"desenho_projetos\" value=\"sim\">Desenho de Projetos";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qdesInd==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qdesenho_industrial\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_industrial\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_industrial\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($desInd==1){
											echo "<input type=\"checkbox\" name=\"desenho_industrial\" value=\"sim\" checked>Desenho Industrial";
										} else {
											echo "<input type=\"checkbox\" name=\"desenho_industrial\" value=\"sim\">Desenho Industrial";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"desenho_industrial\" value=\"sim\">Desenho Industrial";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qdipl==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qdiplomacia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdiplomacia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdiplomacia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($dipl==1){
											echo "<input type=\"checkbox\" name=\"diplomacia\" value=\"sim\" checked>Diplomacia";
										} else {
											echo "<input type=\"checkbox\" name=\"diplomacia\" value=\"sim\">Diplomacia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"diplomacia\" value=\"sim\">Diplomacia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qecon==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeconomia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeconomia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeconomia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($econ==1){
											echo "<input type=\"checkbox\" name=\"economia\" value=\"sim\" checked>Economia";
										} else {
											echo "<input type=\"checkbox\" name=\"economia\" value=\"sim\">Economia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"economia\" value=\"sim\">Economia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qeconDom==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeconomia_domestica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeconomia_domestica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeconomia_domestica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($econDom==1){
											echo "<input type=\"checkbox\" name=\"economia_domestica\" value=\"sim\" checked>Economia Doméstica";
										} else {
											echo "<input type=\"checkbox\" name=\"economia_domestica\" value=\"sim\">Economia Doméstica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"economia_domestica\" value=\"sim\">Economia Doméstica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qedFis==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeducacao_fisica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeducacao_fisica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeducacao_fisica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($edFis==1){
											echo "<input type=\"checkbox\" name=\"educacao_fisica\" value=\"sim\" checked>Educação Física";
										} else {
											echo "<input type=\"checkbox\" name=\"educacao_fisica\" value=\"sim\">Educação Física";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"educacao_fisica\" value=\"sim\">Educação Física";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qenfer==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qenfermagem\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qenfermagem\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qenfermagem\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($enfer==1){
											echo "<input type=\"checkbox\" name=\"enfermagem\" value=\"sim\" checked>Enfermagem";
										} else {
											echo "<input type=\"checkbox\" name=\"enfermagem\" value=\"sim\">Enfermagem";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"enfermagem\" value=\"sim\">Enfermagem";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengAero==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_aeroespacial\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_aeroespacial\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_aeroespacial\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engAero==1){
											echo "<input type=\"checkbox\" name=\"eng_aeroespacial\" value=\"sim\" checked>Engenharia Aeroespacial";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_aeroespacial\" value=\"sim\">Engenharia Aeroespacial";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_aeroespacial\" value=\"sim\">Engenharia Aeroespacial";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengAgric==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_agricola\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_agricola\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_agricola\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engAgric==1){
											echo "<input type=\"checkbox\" name=\"eng_agricola\" value=\"sim\" checked>Engenharia Agrícola";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_agricola\" value=\"sim\">Engenharia Agrícola";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_agricola\" value=\"sim\">Engenharia Agrícola";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengBio==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_biomedica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_biomedica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_biomedica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engBio==1){
											echo "<input type=\"checkbox\" name=\"eng_biomedica\" value=\"sim\" checked>Engenharia Biomédica";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_biomedica\" value=\"sim\">Engenharia Biomédica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_biomedica\" value=\"sim\">Engenharia Biomédica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengCart==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_cartografica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_cartografica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_cartografica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engCart==1){
											echo "<input type=\"checkbox\" name=\"eng_cartografica\" value=\"sim\" checked>Engenharia Cartográfica";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_cartografica\" value=\"sim\">Engenharia Cartográfica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_cartografica\" value=\"sim\">Engenharia Cartográfica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengCiv==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_civil\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_civil\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_civil\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engCiv==1){
											echo "<input type=\"checkbox\" name=\"eng_civil\" value=\"sim\" checked>Engenharia Civil";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_civil\" value=\"sim\">Engenharia Civil";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_civil\" value=\"sim\">Engenharia Civil";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengAgrim==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_agrimensura\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_agrimensura\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_agrimensura\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engAgrim==1){
											echo "<input type=\"checkbox\" name=\"eng_agrimensura\" value=\"sim\" checked>Engenharia de Agrimensura";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_agrimensura\" value=\"sim\">Engenharia de Agrimensura";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_agrimensura\" value=\"sim\">Engenharia de Agrimensura";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengArm==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_armamentos\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_armamentos\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_armamentos\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engArm==1){
											echo "<input type=\"checkbox\" name=\"eng_armamentos\" value=\"sim\" checked>Engenharia de Armamentos";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_armamentos\" value=\"sim\">Engenharia de Armamentos";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_armamentos\" value=\"sim\">Engenharia de Armamentos";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengMatMet==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_materiais_metalurgica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_materiais_metalurgica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_materiais_metalurgica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engMatMet==1){
											echo "<input type=\"checkbox\" name=\"eng_materiais_metalurgica\" value=\"sim\" checked>Engenharia de Materiais e Metalúrgica";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_materiais_metalurgica\" value=\"sim\">Engenharia de Materiais e Metalúrgica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_materiais_metalurgica\" value=\"sim\">Engenharia de Materiais e Metalúrgica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengMin==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_minas\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_minas\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_minas\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engMin==1){
											echo "<input type=\"checkbox\" name=\"eng_minas\" value=\"sim\" checked>Engenharia de Minas";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_minas\" value=\"sim\">Engenharia de Minas";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_minas\" value=\"sim\">Engenharia de Minas";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengProd==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_producao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_producao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_producao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engProd==1){
											echo "<input type=\"checkbox\" name=\"eng_producao\" value=\"sim\" checked>Engenharia de Produção";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_producao\" value=\"sim\">Engenharia de Produção";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_producao\" value=\"sim\">Engenharia de Produção";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengTrans==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_transportes\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_transportes\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_transportes\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engTrans==1){
											echo "<input type=\"checkbox\" name=\"eng_transportes\" value=\"sim\" checked>Engenharia de Transportes";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_transportes\" value=\"sim\">Engenharia de Transportes";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_transportes\" value=\"sim\">Engenharia de Transportes";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengEle==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_eletrica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_eletrica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_eletrica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engEle==1){
											echo "<input type=\"checkbox\" name=\"eng_eletrica\" value=\"sim\" checked>Engenharia Elétrica";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_eletrica\" value=\"sim\">Engenharia Elétrica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_eletrica\" value=\"sim\">Engenharia Elétrica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengMeca==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_mecatronica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_mecatronica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_mecatronica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engMeca==1){
											echo "<input type=\"checkbox\" name=\"eng_mecatronica\" value=\"sim\" checked>Engenharia Mecatrônica";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_mecatronica\" value=\"sim\">Engenharia Mecatrônica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_mecatronica\" value=\"sim\">Engenharia Mecatrônica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengNavOce==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_navOc\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_navOc\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_navOc\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engNavOce==1){
											echo "<input type=\"checkbox\" name=\"eng_navOc\" value=\"sim\" checked>Engenharia Naval e Oceânica";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_navOc\" value=\"sim\">Engenharia Naval e Oceânica";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_navOc\" value=\"sim\">Engenharia Naval e Oceânica";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengNucl==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_nucl\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_nucl\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_nucl\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engNucl==1){
											echo "<input type=\"checkbox\" name=\"eng_nucl\" value=\"sim\" checked>Engenharia Nuclear";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_nucl\" value=\"sim\">Engenharia Nuclear";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_nucl\" value=\"sim\">Engenharia Nuclear";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengQui==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_quimica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_quimica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_quimica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engQui==1){
											echo "<input type=\"checkbox\" name=\"eng_quimica\" value=\"sim\" checked>Engenharia Química";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_quimica\" value=\"sim\">Engenharia Química";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_quimica\" value=\"sim\">Engenharia Química";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qengText==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qeng_textil\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_textil\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_textil\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($engText==1){
											echo "<input type=\"checkbox\" name=\"eng_textil\" value=\"sim\" checked>Engenharia Têxtil";
										} else {
											echo "<input type=\"checkbox\" name=\"eng_textil\" value=\"sim\">Engenharia Têxtil";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"eng_textil\" value=\"sim\">Engenharia Têxtil";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qestSoc==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qestudos_sociais\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qestudos_sociais\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qestudos_sociais\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($estSoc==1){
											echo "<input type=\"checkbox\" name=\"estudos_sociais\" value=\"sim\" checked>Estudos Sociais";
										} else {
											echo "<input type=\"checkbox\" name=\"estudos_sociais\" value=\"sim\">Estudos Sociais";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"estudos_sociais\" value=\"sim\">Estudos Sociais";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qfarmacia==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qfarmacia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfarmacia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfarmacia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($farmacia==1){
											echo "<input type=\"checkbox\" name=\"farmacia\" value=\"sim\" checked>Farmácia";
										} else {
											echo "<input type=\"checkbox\" name=\"farmacia\" value=\"sim\">Farmácia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"farmacia\" value=\"sim\">Farmácia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qfarmaco==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qfarmacologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfarmacologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfarmacologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($farmaco==1){
											echo "<input type=\"checkbox\" name=\"farmacologia\" value=\"sim\" checked>Farmacologia";
										} else {
											echo "<input type=\"checkbox\" name=\"farmacologia\" value=\"sim\">Farmacologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"farmacologia\" value=\"sim\">Farmacologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qfisiol==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qfisiologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfisiologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfisiologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($fisiol==1){
											echo "<input type=\"checkbox\" name=\"fisiologia\" value=\"sim\" checked>Fisiologia";
										} else {
											echo "<input type=\"checkbox\" name=\"fisiologia\" value=\"sim\">Fisiologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"fisiologia\" value=\"sim\">Fisiologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qfisTerOcp==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qfisioterapia_terapia_ocupacional\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfisioterapia_terapia_ocupacional\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfisioterapia_terapia_ocupacional\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($fisTerOcp==1){
											echo "<input type=\"checkbox\" name=\"fisioterapia_terapia_ocupacional\" value=\"sim\" checked>Fisioterapia e Terapia Ocupacional";
										} else {
											echo "<input type=\"checkbox\" name=\"fisioterapia_terapia_ocupacional\" value=\"sim\">Fisioterapia e Terapia Ocupacional";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"fisioterapia_terapia_ocupacional\" value=\"sim\">Fisioterapia e Terapia Ocupacional";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qfonoa==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qfonoaudiologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfonoaudiologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfonoaudiologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($fonoa==1){
											echo "<input type=\"checkbox\" name=\"fonoaudiologia\" value=\"sim\" checked>Fonoaudiologia";
										} else {
											echo "<input type=\"checkbox\" name=\"fonoaudiologia\" value=\"sim\">Fonoaudiologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"fonoaudiologia\" value=\"sim\">Fonoaudiologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qgene==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qgenetica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qgenetica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qgenetica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($gene==1){
											echo "<input type=\"checkbox\" name=\"genetica\" value=\"sim\" checked>Genética";
										} else {
											echo "<input type=\"checkbox\" name=\"genetica\" value=\"sim\">Genética";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"genetica\" value=\"sim\">Genética";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qhistNat==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qhistoria_natural\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qhistoria_natural\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qhistoria_natural\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($histNat==1){
											echo "<input type=\"checkbox\" name=\"historia_natural\" value=\"sim\" checked>História Natural";
										} else {
											echo "<input type=\"checkbox\" name=\"historia_natural\" value=\"sim\">História Natural";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"historia_natural\" value=\"sim\">História Natural";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qimuno==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qimunologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qimunologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qimunologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($imuno==1){
											echo "<input type=\"checkbox\" name=\"imunologia\" value=\"sim\" checked>Imunologia";
										} else {
											echo "<input type=\"checkbox\" name=\"imunologia\" value=\"sim\">Imunologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"imunologia\" value=\"sim\">Imunologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qlinguis==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qlinguistica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qlinguistica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qlinguistica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($linguis==1){
											echo "<input type=\"checkbox\" name=\"linguistica\" value=\"sim\" checked>Linguística";
										} else {
											echo "<input type=\"checkbox\" name=\"linguistica\" value=\"sim\">Linguística";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"linguistica\" value=\"sim\">Linguística";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qmedic==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qmedicina\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmedicina\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmedicina\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($medic==1){
											echo "<input type=\"checkbox\" name=\"medicina\" value=\"sim\" checked>Medicina";
										} else {
											echo "<input type=\"checkbox\" name=\"medicina\" value=\"sim\">Medicina";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"medicina\" value=\"sim\">Medicina";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qmedVet==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qmedicina_veterinaria\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmedicina_veterinaria\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmedicina_veterinaria\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($medVet==1){
											echo "<input type=\"checkbox\" name=\"medicina_veterinaria\" value=\"sim\" checked>Medicina Veterinária";
										} else {
											echo "<input type=\"checkbox\" name=\"medicina_veterinaria\" value=\"sim\">Medicina Veterinária";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"medicina_veterinaria\" value=\"sim\">Medicina Veterinária";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qmicroB==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qmicrobiologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmicrobiologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmicrobiologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($microB==1){
											echo "<input type=\"checkbox\" name=\"microbiologia\" value=\"sim\" checked>Microbiologia";
										} else {
											echo "<input type=\"checkbox\" name=\"microbiologia\" value=\"sim\">Microbiologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"microbiologia\" value=\"sim\">Microbiologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qmorfo==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qmorfologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmorfologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmorfologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($morfo==1){
											echo "<input type=\"checkbox\" name=\"morfologia\" value=\"sim\" checked>Morfologia";
										} else {
											echo "<input type=\"checkbox\" name=\"morfologia\" value=\"sim\">Morfologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"morfologia\" value=\"sim\">Morfologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qmuseo==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qmuseologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmuseologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmuseologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($museo==1){
											echo "<input type=\"checkbox\" name=\"museologia\" value=\"sim\" checked>Museologia";
										} else {
											echo "<input type=\"checkbox\" name=\"museologia\" value=\"sim\">Museologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"museologia\" value=\"sim\">Museologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qnutri==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qnutricao\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qnutricao\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qnutricao\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($nutri==1){
											echo "<input type=\"checkbox\" name=\"nutricao\" value=\"sim\" checked>Nutrição";
										} else {
											echo "<input type=\"checkbox\" name=\"nutricao\" value=\"sim\">Nutrição";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"nutricao\" value=\"sim\">Nutrição";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qocea==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qoceanografia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qoceanografia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qoceanografia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($ocea==1){
											echo "<input type=\"checkbox\" name=\"oceanografia\" value=\"sim\" checked>Oceanografia";
										} else {
											echo "<input type=\"checkbox\" name=\"oceanografia\" value=\"sim\">Oceanografia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"oceanografia\" value=\"sim\">Oceanografia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qodont==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qodontologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qodontologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qodontologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($odont==1){
											echo "<input type=\"checkbox\" name=\"odontologia\" value=\"sim\" checked>Odontologia";
										} else {
											echo "<input type=\"checkbox\" name=\"odontologia\" value=\"sim\">Odontologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"odontologia\" value=\"sim\">Odontologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qparas==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qparasitologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qparasitologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qparasitologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($paras==1){
											echo "<input type=\"checkbox\" name=\"parasitologia\" value=\"sim\" checked>Parasitologia";
										} else {
											echo "<input type=\"checkbox\" name=\"parasitologia\" value=\"sim\">Parasitologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"parasitologia\" value=\"sim\">Parasitologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qplanUrbRur==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qplanejamento_urbano_regional\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qplanejamento_urbano_regional\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qplanejamento_urbano_regional\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($planUrbRur==1){
											echo "<input type=\"checkbox\" name=\"planejamento_urbano_regional\" value=\"sim\" checked>Planejamento Urbano e Regional";
										} else {
											echo "<input type=\"checkbox\" name=\"planejamento_urbano_regional\" value=\"sim\">Planejamento Urbano e Regional";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"planejamento_urbano_regional\" value=\"sim\">Planejamento Urbano e Regional";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qprobEst==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qprobabilidade_estatistica\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qprobabilidade_estatistica\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qprobabilidade_estatistica\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($probEst==1){
											echo "<input type=\"checkbox\" name=\"probabilidade_estatistica\" value=\"sim\" checked>Probabilidade e Estatística";
										} else {
											echo "<input type=\"checkbox\" name=\"probabilidade_estatistica\" value=\"sim\">Probabilidade e Estatística";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"probabilidade_estatistica\" value=\"sim\">Probabilidade e Estatística";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qquimInd==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qquimica_industrial\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qquimica_industrial\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qquimica_industrial\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($quimInd==1){
											echo "<input type=\"checkbox\" name=\"quimica_industrial\" value=\"sim\" checked>Química Industrial";
										} else {
											echo "<input type=\"checkbox\" name=\"quimica_industrial\" value=\"sim\">Química Industrial";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"quimica_industrial\" value=\"sim\">Química Industrial";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qrecPesEngPes==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qrec_pesqueiros_eng_pesca\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrec_pesqueiros_eng_pesca\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrec_pesqueiros_eng_pesca\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($recPesEngPes==1){
											echo "<input type=\"checkbox\" name=\"rec_pesqueiros_eng_pesca\" value=\"sim\" checked>Recursos Pesqueiros e Engenharia de Pesca ";
										} else {
											echo "<input type=\"checkbox\" name=\"rec_pesqueiros_eng_pesca\" value=\"sim\">Recursos Pesqueiros e Engenharia de Pesca ";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"rec_pesqueiros_eng_pesca\" value=\"sim\">Recursos Pesqueiros e Engenharia de Pesca ";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qrelaInter==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qrelacoes_internacionais\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrelacoes_internacionais\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrelacoes_internacionais\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($relaInter==1){
											echo "<input type=\"checkbox\" name=\"relacoes_internacionais\" value=\"sim\" checked>Relações Internacionais";
										} else {
											echo "<input type=\"checkbox\" name=\"relacoes_internacionais\" value=\"sim\">Relações Internacionais";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"relacoes_internacionais\" value=\"sim\">Relações Internacionais";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qrelaPubl==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qrelacoes_publicas\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrelacoes_publicas\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrelacoes_publicas\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($relaPubl==1){
											echo "<input type=\"checkbox\" name=\"relacoes_publicas\" value=\"sim\" checked>Relações Públicas";
										} else {
											echo "<input type=\"checkbox\" name=\"relacoes_publicas\" value=\"sim\">Relações Públicas";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"relacoes_publicas\" value=\"sim\">Relações Públicas";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qsecreExec==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qsecretariado_executiva\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qsecretariado_executiva\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qsecretariado_executiva\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($secreExec==1){
											echo "<input type=\"checkbox\" name=\"secretariado_executiva\" value=\"sim\" checked>Secretariado Executiva";
										} else {
											echo "<input type=\"checkbox\" name=\"secretariado_executiva\" value=\"sim\">Secretariado Executiva";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"secretariado_executiva\" value=\"sim\">Secretariado Executiva";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qserSoc==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qservico_social\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qservico_social\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qservico_social\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($serSoc==1){
											echo "<input type=\"checkbox\" name=\"servico_social\" value=\"sim\" checked>Serviço Social";
										} else {
											echo "<input type=\"checkbox\" name=\"servico_social\" value=\"sim\">Serviço Social";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"servico_social\" value=\"sim\">Serviço Social";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qteolo==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qteologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qteologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qteologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($teolo==1){
											echo "<input type=\"checkbox\" name=\"teologia\" value=\"sim\" checked>Teologia";
										} else {
											echo "<input type=\"checkbox\" name=\"teologia\" value=\"sim\">Teologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"teologia\" value=\"sim\">Teologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qzool==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qzoologia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qzoologia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qzoologia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($zool==1){
											echo "<input type=\"checkbox\" name=\"zoologia\" value=\"sim\" checked>Zoologia";
										} else {
											echo "<input type=\"checkbox\" name=\"zoologia\" value=\"sim\">Zoologia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"zoologia\" value=\"sim\">Zoologia";
									}
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($qzootec==1){
											echo "<div class=\"question qticked\">
											<input type=\"checkbox\" name=\"qzootecnia\" value=\"sim\" checked>";
										} else {
											echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qzootecnia\" value=\"sim\">";
										}
									} else {
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qzootecnia\" value=\"sim\">";
									}
									?>
									</div>
									<label>
									<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($zootec==1){
											echo "<input type=\"checkbox\" name=\"zootecnia\" value=\"sim\" checked>Zootecnia";
										} else {
											echo "<input type=\"checkbox\" name=\"zootecnia\" value=\"sim\">Zootecnia";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"zootecnia\" value=\"sim\">Zootecnia";
									}
									?>
									</label>
								</div>
							</div>
							<br>
							<div class="questionholder">
								<label>
								<?php
									if($contextoNaoEscolar||$abordagemGenerica){
										if($admin==1||$admRur==1||$astr==1||$bioMe==1||$botan==1||$carRel==1||$cieInf==1||$ciePol==1||$cieAtu==1||$comun==1||$demog==1||$desProj==1||$dipl==1||$econDom==1||$enfer==1||$engAgric==1||$engCart==1||$engAgrim==1||$engMatMet==1||$engProd==1||$engEle==1||$engNavOce==1||$engQui==1||$estSoc==1||$farmaco==1||$fisTerOcp==1||$gene==1||$imuno==1||$medic==1||$ocea==1||$paras==1||$probEst==1||$recPesEngPes==1||$relaPubl==1||$serSoc==1||$zool==1||$admHosp==1||$arqueo==1||$biofis==1||$bioqui==1||$carrMili==1||$cieComp==1||$cieTecAli==1||$cien==1||$cienSoc==1||$decor==1||$desModa==1||$desInd==1||$econ==1||$edFis==1||$engAero==1||$engBio==1||$engCiv==1||$engArm==1||$engMin==1||$engTrans==1||$engMeca==1||$engNucl==1||$engText==1||$farmacia==1||$fisiol==1||$fonoa==1||$histNat==1||$linguis==1||$medVet==1||$morfo==1||$nutri==1||$odont==1||$planUrbRur==1||$quimInd==1||$relaInter==1||$secreExec==1||$teolo==1||$zootec==1||$microB==1||$museo==1||$qadmin==1||$qadmRur==1||$qastr==1||$qbioMe==1||$qbotan==1||$qcarRel==1||$qcieInf==1||$qciePol==1||$qcieAtu==1||$qcomun==1||$qdemog==1||$qdesProj==1||$qdipl==1||$qeconDom==1||$qenfer==1||$qengAgric==1||$qengCart==1||$qengAgrim==1||$qengMatMet==1||$qengProd==1||$qengEle==1||$qengNavOce==1||$qengQui==1||$qestSoc==1||$qfarmaco==1||$qfisTerOcp==1||$qgene==1||$qimuno==1||$qmedic==1||$qocea==1||$qparas==1||$qprobEst==1||$qrecPesEngPes==1||$qrelaPubl==1||$qserSoc==1||$qzool==1||$qadmHosp==1||$qarqueo==1||$qbiofis==1||$qbioqui==1||$qcarrMili==1||$qcieComp==1||$qcieTecAli==1||$qcien==1||$qcienSoc==1||$qdecor==1||$qdesModa==1||$qdesInd==1||$qecon==1||$qedFis==1||$qengAero==1||$qengBio==1||$qengCiv==1||$qengArm==1||$qengMin==1||$qengTrans==1||$qengMeca==1||$qengNucl==1||$qengText==1||$qfarmacia==1||$qfisiol==1||$qfonoa==1||$qhistNat==1||$qlinguis==1||$qmedVet==1||$qmorfo==1||$qnutri==1||$qodont==1||$qplanUrbRur==1||$qquimInd==1||$qrelaInter==1||$qsecreExec==1||$qteolo==1||$qzootec==1||$qmicroB==1||$qmuseo==1){
											echo "<input type=\"checkbox\" name=\"expandir\" value=\"expandir\" checked>Expandir...";
										} else {
											echo "<input type=\"checkbox\" name=\"expandir\" value=\"expandir\">Expandir...";
										}
									} else {
										echo "<input type=\"checkbox\" name=\"expandir\" value=\"expandir\">Expandir...";
									}
									?>
								</label>
							</div>
					</div>
				</fieldset>
				<fieldset>
					<script>
					$(document).ready(function(){
					$(function() {
    					function split( val ) {
       	 					return val.split( /;\s*/ );
        				}
       					function extractLast( term ) {
            				return split( term ).pop();
        				}
 
        				$("#temaamb")
        				.bind( "keydown", function( event ) {
                			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    			event.preventDefault();
                			}
            			})
            			.autocomplete({
                			source: function( request, response ) {
                    			$.getJSON( "ajax/temaamb.php", {
                        			term: extractLast( request.term )
                    			}, response );
                			},
                			search: function() {
			                    // custom minLength
			                    var term = extractLast( this.value );
			                    if ( term.length < 2 ) {
			                        return false;
			                    }
			                },
			                focus: function() {
			                    // prevent value inserted on focus
			                    return false;
			                },
			                select: function( event, ui ) {
			                    var terms = split( this.value );
			                    // remove the current input
			                    terms.pop();
			                    // add the selected item
			                    terms.push( ui.item.value );
			                    // add placeholder to get the comma-and-space at the end
			                    terms.push( "" );
			                    this.value = terms.join( "; " );
			                    return false;
			                }
				    	});
				    });
					});
					</script>
					<legend>Tema Ambiental</legend>
					<?php
						$temaAmbien=null;
						DBFactory::getConnection();
						if(isset($id_ficha)){
							$query = "SELECT tema_ambiental FROM tema_ambiental_keys WHERE ficha=".$id_ficha;
							$query = mysql_query($query);
							if(mysql_num_rows($query)){
								while($v = mysql_fetch_row($query)){
									$queryNome = "SELECT tema_ambiental FROM tema_ambiental WHERE id=".$v[0];
									$queryNome = mysql_query($queryNome);
									if(mysql_num_rows($queryNome)){
										$result = mysql_result($queryNome,0);
										$temaAmbien .= $result.'; ';
									}
								}
							}

							if(!$temaAmbien || $temaAmbien==''){
								$query = "SELECT id_tema_ambiental FROM ficha_classificacao WHERE id=".$id_ficha;
								$query = mysql_query($query);
								if(mysql_num_rows($query)){
									while($v = mysql_fetch_row($query)){
										$queryNome = "SELECT tema_ambiental FROM tema_ambiental WHERE id=".$v[0];
										$queryNome = mysql_query($queryNome);
										if(mysql_num_rows($queryNome)){
											$result = mysql_result($queryNome,0);
											$temaAmbien .= $result.'; ';
										}
									}
								}
							}
						}
					/*	$tadao=new Tema_ambientalDAO();
						if($fichaSelecionada!=null){
							$id_temaAmb=$fichaSelecionada->getId_tema_ambiental();
							if($id_temaAmb){
								$temaAmbien=$tadao->selectDataForCode($id_temaAmb);
							}
						}*/
					?>
					<label class="widelabel" for="temaamb">Tema Ambiental
						<input type="text" class="wideinput" id="temaamb" name="temaamb" value="<?php echo $temaAmbien; ?>" placeholder="Tema Ambiental">
					</label>
				</fieldset>
				<fieldset>
					<legend>
					<?php
						if($fichaSelecionada!=null){
							$tedao=new Tema_estudoDAO();
							$id_temaEs=$fichaSelecionada->getId_tema_estudo();
							$temaEstud=$tedao->selectDataForCode($id_temaEs);
							$qTemaEstudo=$temaEstud->getQtema_estudo();
							if($qTemaEstudo==1){
								echo "<div class=\"question qticked\">
								<input type=\"checkbox\" name=\"qtemaEst\" value=\"sim\" checked>";
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qtemaEst\" value=\"sim\">";
							}
						} else {
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qtemaEst\" value=\"sim\">";
						}
					?>
					</div>Tema de Estudo</legend>
					<div class="multi" for="focotematico">
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qCurrProgProj=$temaEstud->getQcurric_programas_projetos();
								if($qCurrProgProj==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qCurrProgProj\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qCurrProgProj\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qCurrProgProj\" value=\"sim\">";
							}
							?>
							</div>
							<label>
							<?php
								if($fichaSelecionada!=null){
									$curProgProj=$temaEstud->getCurric_programas_projetos();
									if($curProgProj==1){
										echo "<input type=\"checkbox\" name=\"curriculos\" value=\"sim\" checked>Currículos, Programas e Projetos";
									} else {
										echo "<input type=\"checkbox\" name=\"curriculos\" value=\"sim\">Currículos, Programas e Projetos";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"curriculos\" value=\"sim\">Currículos, Programas e Projetos";
								}
							?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qConteMetod=$temaEstud->getQconteudo_metodos();
								if($qConteMetod==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qconteudo\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qconteudo\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qconteudo\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$conteMetd=$temaEstud->getConteudo_metodos();
									if($conteMetd==1){
										echo "<input type=\"checkbox\" name=\"conteudo\" value=\"sim\" checked>Conteúdo e Métodos";
									} else {
										echo "<input type=\"checkbox\" name=\"conteudo\" value=\"sim\">Conteúdo e Métodos";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"conteudo\" value=\"sim\">Conteúdo e Métodos";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qConcep=$temaEstud->getQconcep_repres_percep_formador();
								if($qConcep==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qconcepcoesformador\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qconcepcoesformador\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qconcepcoesformador\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$concep=$temaEstud->getConcep_repres_percep_formador();
									if($concep==1){
										echo "<input type=\"checkbox\" name=\"concepcoesformador\" value=\"sim\" checked>Concepções/Representações/ Percepções do Formador em EA";
									} else {
										echo "<input type=\"checkbox\" name=\"concepcoesformador\" value=\"sim\">Concepções/Representações/ Percepções do Formador em EA";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"concepcoesformador\" value=\"sim\">Concepções/Representações/ Percepções do Formador em EA";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qConcepA=$temaEstud->getQconcep_repres_percep_aprediz();
								if($qConcepA==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qconcepcoesaprendiz\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qconcepcoesaprendiz\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qconcepcoesaprendiz\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$concepA=$temaEstud->getConcep_repres_percep_aprediz();
									if($concepA==1){
										echo "<input type=\"checkbox\" name=\"concepcoesaprendiz\" value=\"sim\" checked>Concepções/Representações/ Percepções do Aprendiz em EA";
									} else {
										echo "<input type=\"checkbox\" name=\"concepcoesaprendiz\" value=\"sim\">Concepções/Representações/ Percepções do Aprendiz em EA";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"concepcoesaprendiz\" value=\"sim\">Concepções/Representações/ Percepções do Aprendiz em EA";
								}
								?>
							</label>	
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qRecDid=$temaEstud->getQrecursos_didaticos();
								if($qRecDid==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qrecursos\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qrecursos\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qrecursos\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$recurDid=$temaEstud->getRecursos_didaticos();
									if($recurDid==1){
										echo "<input type=\"checkbox\" name=\"recursos\" value=\"sim\" checked>Recursos Didáticos";
									} else {
										echo "<input type=\"checkbox\" name=\"recursos\" value=\"sim\">Recursos Didáticos";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"recursos\" value=\"sim\">Recursos Didáticos";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">	
							<?php
							if($fichaSelecionada!=null){
								$qLingCog=$temaEstud->getQlinguagem_cognicao();
								if($qLingCog==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qliguagemcognicao\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qliguagemcognicao\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qliguagemcognicao\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$linguCog=$temaEstud->getLinguagem_cognicao();
									if($linguCog==1){
										echo "<input type=\"checkbox\" name=\"liguagemcognicao\" value=\"sim\" checked>Linguagens/Comunicação/Cognição";
									} else {
										echo "<input type=\"checkbox\" name=\"liguagemcognicao\" value=\"sim\">Linguagens/Comunicação/Cognição";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"liguagemcognicao\" value=\"sim\">Linguagens/Comunicação/Cognição";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qPoliPubl=$temaEstud->getQpoliticas_publicas_ea();
								if($qPoliPubl==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qpoliticas\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qpoliticas\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qpoliticas\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$poliPubl=$temaEstud->getPoliticas_publicas_ea();
									if($poliPubl==1){
										echo "<input type=\"checkbox\" name=\"politicas\" value=\"sim\" checked>Políticas Públicas em EA";
									} else {
										echo "<input type=\"checkbox\" name=\"politicas\" value=\"sim\">Políticas Públicas em EA";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"politicas\" value=\"sim\">Políticas Públicas em EA";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qOrgIns=$temaEstud->getQorgan_instituicao_escolar();
								if($qOrgIns==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qorientacao\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qorientacao\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qorientacao\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$orgIns=$temaEstud->getOrgan_instituicao_escolar();
									if($orgIns==1){
										echo "<input type=\"checkbox\" name=\"orientacao\" value=\"sim\" checked>Organização da Instituição Escolar";
									} else {
										echo "<input type=\"checkbox\" name=\"orientacao\" value=\"sim\">Organização da Instituição Escolar";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"orientacao\" value=\"sim\">Organização da Instituição Escolar";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qOng=$temaEstud->getQorgan_nao_governamental();
								if($qOng==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qong\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qong\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qong\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$ong=$temaEstud->getOrgan_nao_governamental();
									if($ong==1){
										echo "<input type=\"checkbox\" name=\"ong\" value=\"sim\" checked>Organização não Governamental";
									} else {
										echo "<input type=\"checkbox\" name=\"ong\" value=\"sim\">Organização não Governamental";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"ong\" value=\"sim\">Organização não Governamental";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qOrggov=$temaEstud->getQorgan_governamental();
								if($qOrggov==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qorggov\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qorggov\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qorggov\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$orggov=$temaEstud->getOrgan_governamental();
									if($orggov==1){
										echo "<input type=\"checkbox\" name=\"orggov\" value=\"sim\" checked>Organização Governamental";
									} else {
										echo "<input type=\"checkbox\" name=\"orggov\" value=\"sim\">Organização Governamental";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"orggov\" value=\"sim\">Organização Governamental";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qTrabFormProfAg=$temaEstud->getQtrab_form_professores_agentes();
								if($qTrabFormProfAg==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qtrabalho\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qtrabalho\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qtrabalho\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$trabFormProf=$temaEstud->getTrab_form_professores_agentes();
									if($trabFormProf==1){
										echo "<input type=\"checkbox\" name=\"trabalho\" value=\"sim\" checked>Trabalho e Formação de Professores/Agentes";
									} else {
										echo "<input type=\"checkbox\" name=\"trabalho\" value=\"sim\">Trabalho e Formação de Professores/Agentes";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"trabalho\" value=\"sim\">Trabalho e Formação de Professores/Agentes";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qMovSocAmb=$temaEstud->getQmovim_sociais_ambientalistas();
								if($qMovSocAmb==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qmovimentos\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qmovimentos\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qmovimentos\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$movSocAmb=$temaEstud->getMovim_sociais_ambientalistas();
									if($movSocAmb==1){
										echo "<input type=\"checkbox\" name=\"movimentos\" value=\"sim\" checked>Movimentos Sociais/Ambientalistas";
									} else {
										echo "<input type=\"checkbox\" name=\"movimentos\" value=\"sim\">Movimentos Sociais/Ambientalistas";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"movimentos\" value=\"sim\">Movimentos Sociais/Ambientalistas";
								}
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							if($fichaSelecionada!=null){
								$qFund=$temaEstud->getQfundamentos_ea();
								if($qFund==1){
									echo "<div class=\"question qticked\">
									<input type=\"checkbox\" name=\"qfundamentos\" value=\"sim\" checked>";
								} else {
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfundamentos\" value=\"sim\">";
								}
							} else {
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qfundamentos\" value=\"sim\">";
							}
							?>
							</div>
							<label>
								<?php
								if($fichaSelecionada!=null){
									$fundame=$temaEstud->getFundamentos_ea();
									if($fundame==1){
										echo "<input type=\"checkbox\" name=\"fundamentos\" value=\"sim\" checked>Fundamentos em EA";
									} else {
										echo "<input type=\"checkbox\" name=\"fundamentos\" value=\"sim\">Fundamentos em EA";
									}
								} else {
									echo "<input type=\"checkbox\" name=\"fundamentos\" value=\"sim\">Fundamentos em EA";
								}
								?>
							</label>
						</div>
						<div class="questionholder">
						<label>
						<?php
						$outrFoco=null;
						DBFactory::getConnection();
						if(isset($id_ficha)){
							$query = "SELECT foco FROM foco_keys WHERE ficha=".$id_ficha;
							$query = mysql_query($query);
						}else{
							$query = '';
						}
						if($query!=='' && mysql_num_rows($query)){
							while($v = mysql_fetch_row($query)){
								$queryNome = "SELECT foco FROM foco WHERE id=".$v[0];
								$queryNome = mysql_query($queryNome);
								if(mysql_num_rows($queryNome)){
									$result = mysql_result($queryNome,0);
									$outrFoco .= $result.'; ';
								}
							}
							echo "<input type=\"checkbox\" name=\"focotematico\" value=\"outro\" checked>Outro Tema...";
						} else {
							echo "<input type=\"checkbox\" name=\"focotematico\" value=\"outro\">Outro Tema...";
						}
						?>
						</label>
						</div>
					</div>
					<script>
					$(document).ready(function(){
					$(function() {
    					function split( val ) {
       	 					return val.split( /;\s*/ );
        				}
       					function extractLast( term ) {
            				return split( term ).pop();
        				}
 
        				$("#outrofoco")
        				.bind( "keydown", function( event ) {
                			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "autocomplete" ).menu.active ) {
                    			event.preventDefault();
                			}
            			})
            			.autocomplete({
                			source: function( request, response ) {
                    			$.getJSON( "ajax/outrofoco.php", {
                        			term: extractLast( request.term )
                    			}, response );
                			},
                			search: function() {
			                    // custom minLength
			                    var term = extractLast( this.value );
			                    if ( term.length < 2 ) {
			                        return false;
			                    }
			                },
			                focus: function() {
			                    // prevent value inserted on focus
			                    return false;
			                },
			                select: function( event, ui ) {
			                    var terms = split( this.value );
			                    // remove the current input
			                    terms.pop();
			                    // add the selected item
			                    terms.push( ui.item.value );
			                    // add placeholder to get the comma-and-space at the end
			                    terms.push( "" );
			                    this.value = terms.join( "; " );
			                    return false;
			                }
				    	});
				    });
					});
					</script>
                    <div class="questionholder">
					<label class="widelabel <?php if($outrFoco==null){echo"nodisplay";}?>" for="outrofoco">Outro Tema
						<input type="text" class="wideinput" id="outrofoco" name="outrofoco" value="<?php echo $outrFoco; ?>" placeholder="Outro Tema">
					</label>
                    </div>
				</fieldset>
				<fieldset>
					<legend>Resumo</legend>
					<?php
						if($fichaSelecionada!=null){
							$id_resumo=$fichaSelecionada->getId_resumo();
							$rdao=new ResumoDAO();
							$resumo=$rdao->selectDataForCode($id_resumo);
							$texto=$resumo->getResumo();
							echo "<textarea name=\"resumo\">$texto</textarea>";
						} else {
							echo "<textarea name=\"resumo\"></textarea>";
						}
					?>
				</fieldset>
				<fieldset>
					<legend>Detalhes Finais</legend>
					<label class="widelabel" for="observacoes">Observações
						<?php
						if($fichaSelecionada!=null){
							$id_detalhes=$fichaSelecionada->getId_detalhes_finais();
							$dtldao=new Detalhes_finaisDAO();
							$detalhes=$dtldao->selectDataForCode($id_detalhes);
							$obs=$detalhes->getObservacoes();
							echo "<input type=\"text\" class=\"wideinput\" id=\"observacoes\" name=\"observacoes\" placeholder=\"Observações\" value=\"$obs\">";
						} else {
							echo "<input type=\"text\" class=\"wideinput\" id=\"observacoes\" name=\"observacoes\" placeholder=\"Observações\">";
						}
						?>
					</label>
					<label for="palavraschave">Palavras-Chave
						<?php
						if($fichaSelecionada!=null){
							$plchv=$detalhes->getPalavras_chave();
							echo "<input type=\"text\" id=\"palavraschave\" name=\"palavraschave\" placeholder=\"Digite palavras-chave\" value=\"$plchv\">";
						} else {
							echo "<input type=\"text\" id=\"palavraschave\" name=\"palavraschave\" placeholder=\"Digite palavras-chave\">";
						}
						?>	
					</label>
					<label for="linktese">URL Trab. Completo
						<?php
						if($fichaSelecionada!=null){
							$urlTrab=$detalhes->getUrl_trabalho();
							echo "<input type=\"text\" id=\"linktese\" name=\"linktese\" placeholder=\"URL do Trabalho Completo\" value=\"$urlTrab\">";
						} else {
							echo "<input type=\"text\" id=\"linktese\" name=\"linktese\" placeholder=\"URL do Trabalho Completo\">";
						}
						?>
					</label>
					<label class="widelabel" for="linkresumo">URL Banco de Teses CAPES
						<?php
						if($fichaSelecionada!=null){
							$urlRes=$detalhes->getUrl_resumo();
							echo "<input type=\"text\" id=\"linkresumo\" name=\"linkresumo\" placeholder=\"URL Banco CAPES\" value=\"$urlRes\">";
						} else {
							echo "<input type=\"text\" id=\"linkresumo\" name=\"linkresumo\" placeholder=\"URL Banco CAPES\">";
						}
						?>
					</label>
					<label for="classificacao">Doc. Classificado por
						<?php
						if($fichaSelecionada!=null){
							$docClass=$detalhes->getDoc_classificado_por();
							echo "<input type=\"text\" id=\"classificacao\" name=\"classificacao\" placeholder=\"Classificação\" value=\"$docClass\">";
						} else {
							echo "<input type=\"text\" id=\"classificacao\" name=\"classificacao\" placeholder=\"Classificação\">";
						}
						?>
						
					</label>
					<label for="dataclassificacao">Data de Classificação
					<?php
						if($fichaSelecionada!=null){
							$dataClass=date('d/m/Y',$detalhes->getData_classificacao());
							echo "<input type=\"text\" id=\"dataclassificacao\" name=\"dataclassificacao\" placeholder=\"Data da Classificação\" value=\"$dataClass\">";
						} else {
							echo "<input type=\"text\" id=\"classificacao\" name=\"dataclassificacao\" placeholder=\"Classificação\">";
						}
						?>	
					</label>
				</fieldset>
			</fieldset>
			<input type="submit" value="Salvar">
		</form>
	</body>
</html> 