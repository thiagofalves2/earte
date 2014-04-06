<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<link href="restrito/style.css" rel="stylesheet" type="text/css" media="screen">
		<link href="restrito/print.css" rel="stylesheet" type="text/css" media="print">
		<script src="restrito/jquery.js" type="text/javascript"></script>
		<script src="restrito/cidades.js" type="text/javascript"></script>
		<script src="restrito/script.js" type="text/javascript"></script>
		<title>Ficha de Classificação</title>
	</head>
	<body>
		<?php
		error_reporting(E_ALL);
		date_default_timezone_set('America/Sao_Paulo');
			include_once("restrito/dao/Ficha_classificacao.class.php");
					include_once("restrito/dao/Ficha_classificacaoDAO.class.php");
					include_once("restrito/dao/Identificacao.class.php");
					include_once("restrito/dao/IdentificacaoDAO.class.php");
					include_once("restrito/dao/Contexto_educacional.class.php");
					include_once("restrito/dao/Contexto_educacionalDAO.class.php");
					include_once("restrito/dao/Modalidades.class.php");
					include_once("restrito/dao/ModalidadesDAO.class.php");
					include_once("restrito/dao/Area_curricular.class.php");
					include_once("restrito/dao/Area_curricularDAO.class.php");
					include_once("restrito/dao/Area_licenciatura.class.php");
					include_once("restrito/dao/Area_licenciaturaDAO.class.php");
					include_once("restrito/dao/Outra_area.class.php");
					include_once("restrito/dao/Outra_areaDAO.class.php");
					include_once("restrito/dao/Publico_envolvido.class.php");
					include_once("restrito/dao/Publico_envolvidoDAO.class.php");
					include_once("restrito/dao/Area_conhecimento.class.php");
					include_once("restrito/dao/Area_conhecimentoDAO.class.php");
					include_once("restrito/dao/Tema_ambiental.class.php");
					include_once("restrito/dao/Tema_ambientalDAO.class.php");
					include_once("restrito/dao/Tema_estudo.class.php");
					include_once("restrito/dao/Tema_estudoDAO.class.php");
					include_once("restrito/dao/Foco.class.php");
					include_once("restrito/dao/FocoDAO.class.php");
					include_once("restrito/dao/Resumo.class.php");
					include_once("restrito/dao/ResumoDAO.class.php");
					include_once("restrito/dao/Detalhes_finais.class.php");
					include_once("restrito/dao/Detalhes_finaisDAO.class.php");
					$fichaSelecionada=null;
		?>
		<a href="index.php">Voltar para a lista</a><br>
		<form name="formulario" action="buscar.php" method="post">
			<fieldset>
				<legend>Ficha de Classificação</legend>
				<label for="codigo">Código
					<?php

						echo "<input type=\"text\" id=\"codigo\" name=\"codigo\" placeholder=\"Código\">";
						echo "<input type=\"text\" name=\"idFicha\" style=\"display:none\" value=\"\">";
					
					?>
				</label>
				<label class="right" for="consolidada">Consolidada
					<?php

						echo "<input type=\"checkbox\" id=\"consolidada\" name=\"consolidada\" value=\"sim\">";
				
					?>
				</label>
				<label class="right" for="fieldset_geral">OU
						<input type="checkbox" id="fieldset_geral" name="fieldset_geral" value="sim">
					</label>
				<br><br>
				<fieldset>
					<label class="right" for="fieldset_ident">OU
						<input type="checkbox" id="fieldset_ident" name="fieldset_ident" value="sim">
					</label>
					<legend>Identificação</legend>
					<label class="largelabel" for="titulo">Título
						<?php
							echo "<input type=\"text\" class=\"largeinput\" id=\"titulo\" name=\"titulo\" placeholder=\"Titulo\">";
						?>
					</label><br>
					<p class="tab">Autor:</p>
					<label for="autor">Nome
						<input type="text" id="autor" name="autor" placeholder="Nome do Autor">
					</label>
					<label class="widelabel" for="sobrenome">Sobrenome
						<?php
							echo "<input type=\"text\" class=\"wideinput\" id=\"sobrenome\" name=\"sobrenome\" placeholder=\"Sobrenome do Autor\">";
						?>
					</label>
					
					<label class="widelabel" for="orientador">Orientador(es)
						<?php
							echo "<input type=\"text\" class=\"wideinput\" id=\"orientador\" name=\"orientador\" placeholder=\"Nome do Orientador\">";
						?>
					</label><br>
					<label for="ano_inicial">Ano da Defesa Inicial
						<select name="ano_inicial">
							<option value="">Selecione um valor</option>
						<?php
							for($i=1940;$i<=2030;$i++){
								echo "<option value=\"$i\">$i</option>";
							}
						?>
						</select>
					</label>
					<label for="ano_final">Ano da Defesa Final
						<select name="ano_final">
							<option value="">Selecione um valor</option>
						<?php
							for($i=1940;$i<=2030;$i++){
								echo "<option value=\"$i\">$i</option>";
							}
						?>
						</select>
					</label>
					<label for="ndepaginas">Número de Páginas
						<?php
							echo "<input type=\"text\" id=\"ndepaginas\" name=\"ndepaginas\" placeholder=\"Nº de Páginas\">";
						?>
					</label>
					<label class="widelabel" for="programapos">Programa de Pós
						<?php
							echo "<input type=\"text\" class=\"wideinput\" id=\"programapos\" name=\"programapos\" placeholder=\"Programa de Pós\">";
						?>
					</label>
					<label for="siglaies">IES
						<?php
							echo "<input type=\"text\" id=\"siglaies\" name=\"siglaies\" placeholder=\"Sigla da IES\">";
						?>
					</label>
					<label for="unidadesetor">Unidade/Setor
						<?php
							echo "<input type=\"text\" id=\"unidadesetor\" name=\"unidadesetor\" placeholder=\"Unidade ou Setor\">";
						?>
					</label>
					<label for="estado">Estado
						<?php
							echo "<input type=\"text\" id=\"estado\" name=\"estado\" placeholder=\"Sigla do Estado\">";
						?>
					</label>
					<label for="cidade">Cidade
						<?php
							echo "<input type=\"text\" id=\"cidade\" name=\"cidade\" placeholder=\"Nome da Cidade\">";
						?>
					</label>
					<label class="widelabel" for="grautitulacao">Grau de Titulação Acadêmica
						<select name="grautitulacao">
							<?php
								echo "<option value=\"\" selected>Selecione uma opção...</option>
									<option value=\"mestrado\">Mestrado Acadêmico</option>
									<option value=\"doutorado\">Doutorado</option>
									<option value=\"profissional\">Mestrado Profissional</option>";
							?>
						</select>
					</label>
					<label for="depadm">Dependência Administrativa
						<select name="depadm">
							<?php
								echo "<option value=\"\" selected>Selecione...</option>
									<option value=\"municipal\">Municipal</option>
									<option value=\"estadual\">Estadual</option>
									<option value=\"federal\">Federal</option>
									<option value=\"particular\">Particular</option>";
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
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qcontextEdu\" value=\"sim\">";
						?>
						
					</div>Contexto Educacional</legend>
					<label class="right" for="fieldset_q0">OU
						<input type="checkbox" id="fieldset_q0" name="fieldset_q0" value="sim">
					</label>
					<div class="multi" for="opt">
					<div class="questionholder">
						<?php
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qnaoEscolar\" value=\"sim\">";
						?>
						</div>
						<label>
						<?php
							echo "<input type=\"checkbox\" name=\"opt1\" value=\"naoescolar\">Contexto Não Escolar";
						?>
						</label>
					</div>
                    <div class="questionholder">
						<?php
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qescolar\" value=\"sim\">";
						?>
						</div>
						<label>
						<?php
							echo "<input type=\"checkbox\" name=\"opt2\" value=\"escolar\">Contexto Escolar";
						?>
						</label>
					</div>
					<div class="questionholder">
						<?php
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qgenerica\" value=\"sim\">";
						?>
						</div>
						<label>
						<?php
							echo "<input type=\"checkbox\" name=\"opt3\" value=\"generica\">Abordagem Genérica";
						?>
						</label>
						</div>
					</div>
				</fieldset>
				<?php
						echo "<fieldset class=\"nodisplay\" id=\"q1\">";
					
				?>				
					<legend>
					<?php
						echo "<div class=\"question\">
						<input type=\"checkbox\" name=\"qmodalidade\" value=\"sim\">";
									?>
				</div>Modalidades</legend>
					<label class="right" for="fieldset_q1">OU
						<input type="checkbox" id="fieldset_q1" name="fieldset_q1" value="sim">
					</label>
					<div class="multi" for="modalidades">
						<div class="questionholderreg">
							<?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qregular\" value=\"sim\">";
							?>
								</div>
							<label>
							<?php
							$regular=0;
								echo "<input type=\"checkbox\" name=\"regular\" value=\"regular\">Regular";
							?>
							</label>
						</div>
						<?php
						
							echo "<div class=\"multi nodisplay\" id=\"q6\">";
					?>
						<div class="questionholderreg">
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qedinfantil\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"edinfantil\" value=\"sim\">Educação Infantil";
							?>
							</label>
                            <br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qefundamental1a4\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"efundamental1a4\" value=\"sim\">Ensino Fundamental 1ª a 4ª/1º ao 5º";
							?>
							</label>
							<br />
                        	<?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qefundamental5a8\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"efundamental5a8\" value=\"sim\">Ensino Fundamental 5ª a 8ª/6º ao 9º";
							?>
							</label>
                        	<br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qemedio\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"emedio\" value=\"sim\">Ensino Médio";
							?>
							</label>
                            <br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qesuperior\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"esuperior\" value=\"sim\">Educação Superior";
							?>
							</label>
                            <br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qagne\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"agne\" value=\"sim\">Abordagem Genérica dos Níveis Escolares";
							?>
							</label>
                        </div>
					</div>	
						<div class="questionholder">
							<?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeja\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"eja\" value=\"sim\">EJA";
							?>
							</label>
                            <br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeducespecial\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"educespecial\" value=\"sim\">Educação Especial";
							?>
							</label>
                            <br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeducindigena\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"educindigena\" value=\"sim\">Educação Indígena";
							?>
							</label>
                            <br />
                            <?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qeducprofetecno\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
								echo "<input type=\"checkbox\" name=\"educprofetecno\" value=\"sim\">Educação Profissional e Tecnológica";
							?>
							</label>
						</div>
					</div>
				</fieldset>
				<?php
						echo "<fieldset class=\"nodisplay\" id=\"q2\">";
				?>
					<legend>
					<?php
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qareaCurr\" value=\"sim\">";
					?>
					</div>
					Área Curricular</legend>
					<label class="right" for="fieldset_q2">OU
						<input type="checkbox" id="fieldset_q2" name="fieldset_q2" value="sim">
					</label>
					<div class="multi" for="area">
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qartee\" value=\"sim\">";
								?>
									</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"artee\" value=\"sim\">Arte";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qbiologia\" value=\"sim\">";
								?>
									</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"biologia\" value=\"sim\">Biologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcienciasagrarias\" value=\"sim\">";
								?>
									</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"cienciasagrarias\" value=\"sim\">Ciências Agrárias";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qciecom\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"ciecom\" value=\"sim\">Ciências da Computação";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcienciasgeologicas\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"cienciasgeologicas\" value=\"sim\">Ciências Geológicas";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcienciasnaturais\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"cienciasnaturais\" value=\"sim\">Ciências Naturais";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcomunejorn\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"comunejorn\" value=\"sim\">Comunicação e Jornalismo";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qdirei\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"direi\" value=\"sim\">Direito";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qecol\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"ecol\" value=\"sim\">Ecologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeconomi\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"economi\" value=\"sim\">Economia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qedfi\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"edfi\" value=\"sim\">Educação Física";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfiloso\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"filoso\" value=\"sim\">Filosofia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfisi\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"fisi\" value=\"sim\">Física";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeogr\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"geogr\" value=\"sim\">Geografia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeral\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"geral\" value=\"sim\">Geral";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qhisto\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"histo\" value=\"sim\">História";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qlinguaestrangeira\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"linguaestrangeira\" value=\"sim\">Língua Estrangeira";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qlinguaportuguesa\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"linguaportuguesa\" value=\"sim\">Língua Portuguesa";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qmatema\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"matema\" value=\"sim\">Matemática";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qpedagogia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"pedagogia\" value=\"sim\">Pedagogia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qquimi\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"quimi\" value=\"sim\">Química";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsaude\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"saude\" value=\"sim\">Saúde";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsociolo\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"sociolo\" value=\"sim\">Sociologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qturi\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"turi\" value=\"sim\">Turismo";
								?>
								</label>
							</div>
							<div class="questionholder">
								<label>
								<?php
								$areaLicen=null;
									echo "<input type=\"checkbox\" name=\"licenciatura\" value=\"licenciatura\">Licenciatura...";
								?>
								</label>
							</div>
							<div class="questionholder">
								<label>
								<?php
								$outArea=null;
									echo "<input type=\"checkbox\" name=\"outra\" value=\"outra\">Outra área...";
								?>
								</label>
							</div>
					</div>
					<label class=" widelabel nodisplay" for="arealicen">Área em Licenciatura
						<input type="text" class="wideinput" id="arealicen" name="arealicen" placeholder="Nome da Área">
					</label>
                    <br />
                    <div id="outraareaSA">
						<label class="widelabel nodisplay" for="outraareaA">Outra Área
							<input type="text" class="wideinput" id="outraareaA" name="outraareaA" placeholder="Outra Área">
						</label>
					</div>
				</fieldset>
				<?php
						echo "<fieldset class=\"nodisplay\" id=\"q3\">";
				?>
					<legend>Público Envolvido</legend>
					<label class="right" for="fieldset_q3">OU
						<input type="checkbox" id="fieldset_q3" name="fieldset_q3" value="sim">
					</label>
					<label class="widelabel" for="naoescolar">Público Envolvido
							<input type="text" class="wideinput" id="naoescolar" name="naoescolar" placeholder="Público envolvido">
					</label>
				</fieldset>
				<?php
						echo "<fieldset class=\"nodisplay\" id=\"q4\">";
				?>
					<legend>
					<?php
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qAreaConh\" value=\"sim\">";
					?>
					</div>
					Área de Conhecimento</legend>
					<label class="right" for="fieldset_q4">OU
						<input type="checkbox" id="fieldset_q4" name="fieldset_q4" value="sim">
					</label>
					<div class="multi" for="area">
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qagronomia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"agronomia\" value=\"sim\">Agronomia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qantropologia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"antropologia\" value=\"sim\">Antropologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qarquitetura_urbanismo\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"arquitetura_urbanismo\" value=\"sim\">Arquitetura e Urbanismo";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qarte\" value=\"sim\">";
								?>
									</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"arte\" value=\"sim\">Arte";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qbiologia_geral\" value=\"sim\">";
								?>
									</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"biologia_geral\" value=\"sim\">Biologia Geral";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qcomunicacaoejorn\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"comunicacaoejorn\" value=\"sim\">Geral";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qdireito\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"direito\" value=\"sim\">Direito";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qecologia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"ecologia\" value=\"sim\">Ecologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeducacao\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"educacao\" value=\"sim\">Educação";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qeng_sanitaria\" value=\"sim\">";
								?>
									</div>
									<label>
									<?php
										echo "<input type=\"checkbox\" name=\"eng_sanitaria\" value=\"sim\">Engenharia Sanitária";
									?>
									</label>
								</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfilosofia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"filosofia\" value=\"sim\">Filosofia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qfisica\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"fisica\" value=\"sim\">Física";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeociencias\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"geociencias\" value=\"sim\">Geociencias";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qgeografia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"geografia\" value=\"sim\">Geografia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qhistoria\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"historia\" value=\"sim\">História";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qletras\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"letras\" value=\"sim\">Letras";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qmatematica\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"matematica\" value=\"sim\">Matemática";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qpsicologia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"psicologia\" value=\"sim\">Psicologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qquimica\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"quimica\" value=\"sim\">Química";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qrecursos_floresais_eng_florestal\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"recursos_floresais_eng_florestal\" value=\"sim\">Recursos Florestais e Eng. Florestal";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsaude_coletiva\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"saude_coletiva\" value=\"sim\">Saúde Coletiva";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qsociologia\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"sociologia\" value=\"sim\">Sociologia";
								?>
								</label>
							</div>
							<div class="questionholder">
								<?php
									echo "<div class=\"question\">
									<input type=\"checkbox\" name=\"qturismo\" value=\"sim\">";
								?>
								</div>
								<label>
								<?php
									echo "<input type=\"checkbox\" name=\"turismo\" value=\"sim\">Turismo";
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
							
									echo "<div id=\"exp_area_conhecimento\" class=\"nodisplay\">";
							?>
								<hr>
								<div class="questionholder">
									<?php
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
										echo "<input type=\"checkbox\" name=\"administracao\" value=\"sim\">Administração";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao_hosp\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"administracao_hosp\" value=\"sim\">Administração Hospitalar";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qadministracao_rural\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"administracao_rural\" value=\"sim\">Administração Rural";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qarqueologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"arqueologia\" value=\"sim\">Arqueologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qastronomia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"astronomia\" value=\"sim\">Astronomia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbiofisica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"biofisica\" value=\"sim\">Biofísica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbiomedicina\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"biomedicina\" value=\"sim\">Biomedicina";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbioquimica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"bioquimica\" value=\"sim\">Bioquímica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qbotanica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"botanica\" value=\"sim\">Botanica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcarreira_militar\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"carreira_militar\" value=\"sim\">Carreira Militar";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcarreira_religiosa\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"carreira_religiosa\" value=\"sim\">Carreira Religiosa";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_computacao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"ciencia_computacao\" value=\"sim\">Ciência da Computação";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_informacao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
										echo "<input type=\"checkbox\" name=\"ciencia_informacao\" value=\"sim\">Ciência da Informação";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_alimentos\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"ciencia_alimentos\" value=\"sim\">Ciência e Tecnologia de Alimentos";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencia_politica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
										echo "<input type=\"checkbox\" name=\"ciencia_politica\" value=\"sim\">Ciência Política";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"ciencias\" value=\"sim\">Ciências";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias_atuariais\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"ciencias_atuariais\" value=\"sim\">Ciências Atuariais";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qciencias_sociais\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"ciencias_sociais\" value=\"sim\">Ciências Sociais";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qcomunicacao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"comunicacao\" value=\"sim\">Comunicação";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdecoracao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"decoracao\" value=\"sim\">Decoração";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdemografia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"demografia\" value=\"sim\">Demografia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_moda\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"desenho_moda\" value=\"sim\">Desenho de Moda";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_projetos\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"desenho_projetos\" value=\"sim\">Desenho de Projetos";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdesenho_industrial\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"desenho_industrial\" value=\"sim\">Desenho Industrial";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qdiplomacia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"diplomacia\" value=\"sim\">Diplomacia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeconomia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"economia\" value=\"sim\">Economia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeconomia_domestica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"economia_domestica\" value=\"sim\">Economia Doméstica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeducacao_fisica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"educacao_fisica\" value=\"sim\">Educação Física";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qenfermagem\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"enfermagem\" value=\"sim\">Enfermagem";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_aeroespacial\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_aeroespacial\" value=\"sim\">Engenharia Aeroespacial";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_agricola\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_agricola\" value=\"sim\">Engenharia Agrícola";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_biomedica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_biomedica\" value=\"sim\">Engenharia Biomédica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_cartografica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_cartografica\" value=\"sim\">Engenharia Cartográfica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
								
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_civil\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_civil\" value=\"sim\">Engenharia Civil";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_agrimensura\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_agrimensura\" value=\"sim\">Engenharia de Agrimensura";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_armamentos\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_armamentos\" value=\"sim\">Engenharia de Armamentos";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_materiais_metalurgica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_materiais_metalurgica\" value=\"sim\">Engenharia de Materiais e Metalúrgica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
								
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_minas\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_minas\" value=\"sim\">Engenharia de Minas";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_producao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_producao\" value=\"sim\">Engenharia de Produção";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_transportes\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_transportes\" value=\"sim\">Engenharia de Transportes";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_eletrica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_eletrica\" value=\"sim\">Engenharia Elétrica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_mecatronica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_mecatronica\" value=\"sim\">Engenharia Mecatrônica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_navOc\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
								
										echo "<input type=\"checkbox\" name=\"eng_navOc\" value=\"sim\">Engenharia Naval e Oceânica";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_nucl\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_nucl\" value=\"sim\">Engenharia Nuclear";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_quimica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_quimica\" value=\"sim\">Engenharia Química";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qeng_textil\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"eng_textil\" value=\"sim\">Engenharia Têxtil";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qestudos_sociais\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"estudos_sociais\" value=\"sim\">Estudos Sociais";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfarmacia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"farmacia\" value=\"sim\">Farmácia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfarmacologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"farmacologia\" value=\"sim\">Farmacologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfisiologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"fisiologia\" value=\"sim\">Fisiologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfisioterapia_terapia_ocupacional\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"fisioterapia_terapia_ocupacional\" value=\"sim\">Fisioterapia e Terapia Ocupacional";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qfonoaudiologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"fonoaudiologia\" value=\"sim\">Fonoaudiologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qgenetica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"genetica\" value=\"sim\">Genética";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qhistoria_natural\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
								
										echo "<input type=\"checkbox\" name=\"historia_natural\" value=\"sim\">História Natural";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qimunologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"imunologia\" value=\"sim\">Imunologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qlinguistica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"linguistica\" value=\"sim\">Linguística";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmedicina\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"medicina\" value=\"sim\">Medicina";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmedicina_veterinaria\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"medicina_veterinaria\" value=\"sim\">Medicina Veterinária";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmicrobiologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"microbiologia\" value=\"sim\">Microbiologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmorfologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"morfologia\" value=\"sim\">Morfologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qmuseologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"museologia\" value=\"sim\">Museologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qnutricao\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"nutricao\" value=\"sim\">Nutrição";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qoceanografia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
										echo "<input type=\"checkbox\" name=\"oceanografia\" value=\"sim\">Oceanografia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qodontologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"odontologia\" value=\"sim\">Odontologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qparasitologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"parasitologia\" value=\"sim\">Parasitologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qplanejamento_urbano_regional\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"planejamento_urbano_regional\" value=\"sim\">Planejamento Urbano e Regional";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qprobabilidade_estatistica\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"probabilidade_estatistica\" value=\"sim\">Probabilidade e Estatística";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qquimica_industrial\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"quimica_industrial\" value=\"sim\">Química Industrial";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrec_pesqueiros_eng_pesca\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"rec_pesqueiros_eng_pesca\" value=\"sim\">Recursos Pesqueiros e Engenharia de Pesca ";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrelacoes_internacionais\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"relacoes_internacionais\" value=\"sim\">Relações Internacionais";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qrelacoes_publicas\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"relacoes_publicas\" value=\"sim\">Relações Públicas";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qsecretariado_executiva\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"secretariado_executiva\" value=\"sim\">Secretariado Executiva";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qservico_social\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"servico_social\" value=\"sim\">Serviço Social";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qteologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"teologia\" value=\"sim\">Teologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
									
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qzoologia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"zoologia\" value=\"sim\">Zoologia";
									?>
									</label>
								</div>
								<div class="questionholder">
									<?php
										echo "<div class=\"question\">
											<input type=\"checkbox\" name=\"qzootecnia\" value=\"sim\">";
									?>
									</div>
									<label>
									<?php
									
										echo "<input type=\"checkbox\" name=\"zootecnia\" value=\"sim\">Zootecnia";
									?>
									</label>
								</div>
							</div>
							<br>
							<div class="questionholder">
								<label>
								<?php
									
										echo "<input type=\"checkbox\" name=\"expandir\" value=\"expandir\">Expandir...";
									?>
								</label>
							</div>
					</div>
				</fieldset>
				<fieldset>
					<legend>Tema Ambiental</legend>
					<label class="right" for="fieldset_ambi">OU
						<input type="checkbox" id="fieldset_ambi" name="fieldset_ambi" value="sim">
					</label>
					<label class="widelabel" for="temaamb">Tema Ambiental
							<input type="text" class="wideinput" id="temaamb" name="temaamb" placeholder="Tema Ambiental">
					</label>
				</fieldset>
				<fieldset>
					<legend>
					<?php
						
							echo "<div class=\"question\">
							<input type=\"checkbox\" name=\"qtemaEst\" value=\"sim\">";
					?>
					</div>Tema de Estudo</legend>
					<label class="right" for="fieldset_estu">OU
						<input type="checkbox" id="fieldset_estu" name="fieldset_estu" value="sim">
					</label>
					<div class="multi" for="focotematico">
						<div class="questionholderfoco">
							<?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qCurrProgProj\" value=\"sim\">";
							?>
							</div>
							<label>
							<?php
									echo "<input type=\"checkbox\" name=\"curriculos\" value=\"sim\">Currículos, Programas e Projetos";
							?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qconteudo\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"conteudo\" value=\"sim\">Conteúdo e Métodos";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qconcepcoesformador\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"concepcoesformador\" value=\"sim\">Concepções/Representações/ Percepções do Formador em EA";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qconcepcoesaprendiz\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"concepcoesaprendiz\" value=\"sim\">Concepções/Representações/ Percepções do Aprendiz em EA";
								?>
							</label>	
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qrecursos\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"recursos\" value=\"sim\">Recursos Didáticos";
								?>
							</label>
						</div>
						<div class="questionholderfoco">	
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qliguagemcognicao\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"liguagemcognicao\" value=\"sim\">Linguagens/Comunicação/Cognição";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qpoliticas\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"politicas\" value=\"sim\">Políticas Públicas em EA";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qorientacao\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"orientacao\" value=\"sim\">Organização da Instituição Escolar";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qong\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"ong\" value=\"sim\">Organização não Governamental";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qorggov\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"orggov\" value=\"sim\">Organização Governamental";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qtrabalho\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"trabalho\" value=\"sim\">Trabalho e Formação de Professores/Agentes";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qmovimentos\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"movimentos\" value=\"sim\">Movimentos Sociais/Ambientalistas";
								?>
							</label>
						</div>
						<div class="questionholderfoco">
							<?php
							
								echo "<div class=\"question\">
								<input type=\"checkbox\" name=\"qfundamentos\" value=\"sim\">";
							?>
							</div>
							<label>
								<?php
								
									echo "<input type=\"checkbox\" name=\"fundamentos\" value=\"sim\">Fundamentos em EA";
								?>
							</label>
						</div>
						<div class="questionholder">
						<label>
						<?php
							
							echo "<input type=\"checkbox\" name=\"focotematico\" value=\"outro\">Outro Tema...";
						?>
						</label>
						</div>
					</div>
                    <div class="questionholder">
					<label class="widelabel nodisplay" for="outrofoco">Outro Tema
						<input type="text" class="wideinput" id="outrofoco" name="outrofoco" placeholder="Outro Tema">
					</label>
                    </div>
				</fieldset>
				<fieldset>
					<legend>Resumo</legend>
					<?php
						
							echo "<textarea name=\"resumo\"></textarea>";
					?>
				</fieldset>
				<fieldset>
					<legend>Detalhes Finais</legend>
					<label class="right" for="fieldset_final">OU
						<input type="checkbox" id="fieldset_final" name="fieldset_final" value="sim">
					</label>
					<label class="widelabel" for="observacoes">Observações
						<?php
						
							echo "<input type=\"text\" class=\"wideinput\" id=\"observacoes\" name=\"observacoes\" placeholder=\"Observações\">";
						?>
					</label>
					<label for="palavraschave">Palavras-Chave
						<?php
						
							echo "<input type=\"text\" id=\"palavraschave\" name=\"palavraschave\" placeholder=\"Digite palavras-chave\">";
						?>	
					</label>
					<label for="linktese">URL Trab. Completo
						<?php
						
							echo "<input type=\"text\" id=\"linktese\" name=\"linktese\" placeholder=\"URL do Trabalho Completo\">";
						?>
					</label>
					<label class="widelabel" for="linkresumo">URL Banco de Teses CAPES
						<?php
							echo "<input type=\"text\" id=\"linkresumo\" name=\"linkresumo\" placeholder=\"URL Banco CAPES\">";
						?>
					</label>
					<label for="classificacao">Doc. Classificado por
						<?php
							echo "<input type=\"text\" id=\"classificacao\" name=\"classificacao\" placeholder=\"Classificação\">";
						?>
						
					</label>
					<label for="dataclassificacao">Data de Classificação
					<?php
							echo "<input type=\"text\" id=\"classificacao\" name=\"dataclassificacao\" placeholder=\"Classificação\">";
						?>	
					</label>
				</fieldset>
			</fieldset>
			<input type="submit" value="Buscar">
		</form>
	</body>
</html> 