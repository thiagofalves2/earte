/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : projetoearte

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-09-11 20:36:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `area_conhecimento`
-- ----------------------------
DROP TABLE IF EXISTS `area_conhecimento`;
CREATE TABLE `area_conhecimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agronomia` tinyint(1) NOT NULL,
  `arquitetura_urbanismo` tinyint(1) NOT NULL,
  `biologia_geral` tinyint(1) NOT NULL,
  `direito` tinyint(1) NOT NULL,
  `educacao` tinyint(1) NOT NULL,
  `filosofia` tinyint(1) NOT NULL,
  `geociencias` tinyint(1) NOT NULL,
  `historia` tinyint(1) NOT NULL,
  `matematica` tinyint(1) NOT NULL,
  `quimica` tinyint(1) NOT NULL,
  `saude_coletiva` tinyint(1) NOT NULL,
  `turismo` tinyint(1) NOT NULL,
  `antropologia` tinyint(1) NOT NULL,
  `arte` tinyint(1) NOT NULL,
  `comunicacao_jornalismo` tinyint(1) NOT NULL,
  `ecologia` tinyint(1) NOT NULL,
  `engenharia_sanitaria` tinyint(1) NOT NULL,
  `fisica` tinyint(1) NOT NULL,
  `geografia` tinyint(1) NOT NULL,
  `letras` tinyint(1) NOT NULL,
  `psicologia` tinyint(1) NOT NULL,
  `rec_florestais_eng_florestal` tinyint(1) NOT NULL,
  `sociologia` tinyint(1) NOT NULL,
  `administracao` tinyint(1) NOT NULL,
  `administracao_rural` tinyint(1) NOT NULL,
  `astronomia` tinyint(1) NOT NULL,
  `biomedicina` tinyint(1) NOT NULL,
  `botanica` tinyint(1) NOT NULL,
  `carreira_religiosa` tinyint(1) NOT NULL,
  `ciencia_informacao` tinyint(1) NOT NULL,
  `ciencia_politica` tinyint(1) NOT NULL,
  `ciencias_atuariais` tinyint(1) NOT NULL,
  `comunicacao` tinyint(1) NOT NULL,
  `demografia` tinyint(1) NOT NULL,
  `desenho_projetos` tinyint(1) NOT NULL,
  `diplomacia` tinyint(1) NOT NULL,
  `economia_domestica` tinyint(1) NOT NULL,
  `enfermagem` tinyint(1) NOT NULL,
  `engenharia_agricola` tinyint(1) NOT NULL,
  `engenharia_cartografica` tinyint(1) NOT NULL,
  `engenharia_agrimensura` tinyint(1) NOT NULL,
  `engenharia_materiais_metalurgica` tinyint(1) NOT NULL,
  `engenharia_producao` tinyint(1) NOT NULL,
  `engenharia_eletrica` tinyint(1) NOT NULL,
  `engenharia_naval_oceanica` tinyint(1) NOT NULL,
  `engenharia_quimica` tinyint(1) NOT NULL,
  `estudos_sociais` tinyint(1) NOT NULL,
  `farmacologia` tinyint(1) NOT NULL,
  `fisioterapia_terapia_ocupacional` tinyint(1) NOT NULL,
  `genetica` tinyint(1) NOT NULL,
  `imunologia` tinyint(1) NOT NULL,
  `medicina` tinyint(1) NOT NULL,
  `microbiologia` tinyint(1) NOT NULL,
  `museologia` tinyint(1) NOT NULL,
  `oceanografia` tinyint(1) NOT NULL,
  `parasitologia` tinyint(1) NOT NULL,
  `probabilidade_estatistica` tinyint(1) NOT NULL,
  `recursos_pesqueiros_engenharia_pesca` tinyint(1) NOT NULL,
  `relacoes_publicas` tinyint(1) NOT NULL,
  `servico_social` tinyint(1) NOT NULL,
  `zoologia` tinyint(1) NOT NULL,
  `administracao_hospitalar` tinyint(1) NOT NULL,
  `arqueologia` tinyint(1) NOT NULL,
  `biofisica` tinyint(1) NOT NULL,
  `bioquimica` tinyint(1) NOT NULL,
  `carreira_militar` tinyint(1) NOT NULL,
  `ciencia_computacao` tinyint(1) NOT NULL,
  `ciencia_tecnologia_alimentos` tinyint(1) NOT NULL,
  `ciencias` tinyint(1) NOT NULL,
  `ciencias_sociais` tinyint(1) NOT NULL,
  `decoracao` tinyint(1) NOT NULL,
  `desenho_moda` tinyint(1) NOT NULL,
  `desenho_industrial` tinyint(1) NOT NULL,
  `economia` tinyint(1) NOT NULL,
  `educacao_fisica` tinyint(1) NOT NULL,
  `engenharia_aeroespacial` tinyint(1) NOT NULL,
  `engenharia_biomedica` tinyint(1) NOT NULL,
  `engenharia_civil` tinyint(1) NOT NULL,
  `engenharia_armamentos` tinyint(1) NOT NULL,
  `engenharia_minas` tinyint(1) NOT NULL,
  `engenharia_transportes` tinyint(1) NOT NULL,
  `engenharia_mecatronica` tinyint(1) NOT NULL,
  `engenharia_nuclear` tinyint(1) NOT NULL,
  `engenharia_textil` tinyint(1) NOT NULL,
  `farmacia` tinyint(1) NOT NULL,
  `fisiologia` tinyint(1) NOT NULL,
  `fonoaudiologia` tinyint(1) NOT NULL,
  `historia_natural` tinyint(1) NOT NULL,
  `linguistica` tinyint(1) NOT NULL,
  `medicina_veterinaria` tinyint(1) NOT NULL,
  `morfologia` tinyint(1) NOT NULL,
  `nutricao` tinyint(1) NOT NULL,
  `odontologia` tinyint(1) NOT NULL,
  `planejamento_urbano_regional` tinyint(1) NOT NULL,
  `quimica_industrial` tinyint(1) NOT NULL,
  `relacoes_internacionais` tinyint(1) NOT NULL,
  `secretariado_executiva` tinyint(1) NOT NULL,
  `teologia` tinyint(1) NOT NULL,
  `zootecnia` tinyint(1) NOT NULL,
  `qagronomia` tinyint(1) NOT NULL,
  `qarquitetura_urbanismo` tinyint(1) NOT NULL,
  `qbiologia_geral` tinyint(1) NOT NULL,
  `qdireito` tinyint(1) NOT NULL,
  `qeducacao` tinyint(1) NOT NULL,
  `qfilosofia` tinyint(1) NOT NULL,
  `qgeociencias` tinyint(1) NOT NULL,
  `qhistoria` tinyint(1) NOT NULL,
  `qmatematica` tinyint(1) NOT NULL,
  `qquimica` tinyint(1) NOT NULL,
  `qsaude_coletiva` tinyint(1) NOT NULL,
  `qturismo` tinyint(1) NOT NULL,
  `qantropologia` tinyint(1) NOT NULL,
  `qarte` tinyint(1) NOT NULL,
  `qcomunicacao_jornalismo` tinyint(1) NOT NULL,
  `qecologia` tinyint(1) NOT NULL,
  `qengenharia_sanitaria` tinyint(1) NOT NULL,
  `qfisica` tinyint(1) NOT NULL,
  `qgeografia` tinyint(1) NOT NULL,
  `qletras` tinyint(1) NOT NULL,
  `qpsicologia` tinyint(1) NOT NULL,
  `qrec_florestais_eng_florestal` tinyint(1) NOT NULL,
  `qsociologia` tinyint(1) NOT NULL,
  `qadministracao` tinyint(1) NOT NULL,
  `qadministracao_rural` tinyint(1) NOT NULL,
  `qastronomia` tinyint(1) NOT NULL,
  `qbiomedicina` tinyint(1) NOT NULL,
  `qbotanica` tinyint(1) NOT NULL,
  `qcarreira_religiosa` tinyint(1) NOT NULL,
  `qciencia_informacao` tinyint(1) NOT NULL,
  `qciencia_politica` tinyint(1) NOT NULL,
  `qciencias_atuariais` tinyint(1) NOT NULL,
  `qcomunicacao` tinyint(1) NOT NULL,
  `qdemografia` tinyint(1) NOT NULL,
  `qdesenho_projetos` tinyint(1) NOT NULL,
  `qdiplomacia` tinyint(1) NOT NULL,
  `qeconomia_domestica` tinyint(1) NOT NULL,
  `qenfermagem` tinyint(1) NOT NULL,
  `qengenharia_agricola` tinyint(1) NOT NULL,
  `qengenharia_cartografica` tinyint(1) NOT NULL,
  `qengenharia_agrimensura` tinyint(1) NOT NULL,
  `qengenharia_materiais_metalurgica` tinyint(1) NOT NULL,
  `qengenharia_producao` tinyint(1) NOT NULL,
  `qengenharia_eletrica` tinyint(1) NOT NULL,
  `qengenharia_naval_oceanica` tinyint(1) NOT NULL,
  `qengenharia_quimica` tinyint(1) NOT NULL,
  `qestudos_sociais` tinyint(1) NOT NULL,
  `qfarmacologia` tinyint(1) NOT NULL,
  `qfisioterapia_terapia_ocupacional` tinyint(1) NOT NULL,
  `qgenetica` tinyint(1) NOT NULL,
  `qimunologia` tinyint(1) NOT NULL,
  `qmedicina` tinyint(1) NOT NULL,
  `qmicrobiologia` tinyint(1) NOT NULL,
  `qmuseologia` tinyint(1) NOT NULL,
  `qoceanografia` tinyint(1) NOT NULL,
  `qparasitologia` tinyint(1) NOT NULL,
  `qprobabilidade_estatistica` tinyint(1) NOT NULL,
  `qrecursos_pesqueiros_engenharia_pesca` tinyint(1) NOT NULL,
  `qrelacoes_publicas` tinyint(1) NOT NULL,
  `qservico_social` tinyint(1) NOT NULL,
  `qzoologia` tinyint(1) NOT NULL,
  `qadministracao_hospitalar` tinyint(1) NOT NULL,
  `qarqueologia` tinyint(1) NOT NULL,
  `qbiofisica` tinyint(1) NOT NULL,
  `qbioquimica` tinyint(1) NOT NULL,
  `qcarreira_militar` tinyint(1) NOT NULL,
  `qciencia_computacao` tinyint(1) NOT NULL,
  `qciencia_tecnologia_alimentos` tinyint(1) NOT NULL,
  `qciencias` tinyint(1) NOT NULL,
  `qciencias_sociais` tinyint(1) NOT NULL,
  `qdecoracao` tinyint(1) NOT NULL,
  `qdesenho_moda` tinyint(1) NOT NULL,
  `qdesenho_industrial` tinyint(1) NOT NULL,
  `qeconomia` tinyint(1) NOT NULL,
  `qeducacao_fisica` tinyint(1) NOT NULL,
  `qengenharia_aeroespacial` tinyint(1) NOT NULL,
  `qengenharia_biomedica` tinyint(1) NOT NULL,
  `qengenharia_civil` tinyint(1) NOT NULL,
  `qengenharia_armamentos` tinyint(1) NOT NULL,
  `qengenharia_minas` tinyint(1) NOT NULL,
  `qengenharia_transportes` tinyint(1) NOT NULL,
  `qengenharia_mecatronica` tinyint(1) NOT NULL,
  `qengenharia_nuclear` tinyint(1) NOT NULL,
  `qengenharia_textil` tinyint(1) NOT NULL,
  `qfarmacia` tinyint(1) NOT NULL,
  `qfisiologia` tinyint(1) NOT NULL,
  `qfonoaudiologia` tinyint(1) NOT NULL,
  `qhistoria_natural` tinyint(1) NOT NULL,
  `qlinguistica` tinyint(1) NOT NULL,
  `qmedicina_veterinaria` tinyint(1) NOT NULL,
  `qmorfologia` tinyint(1) NOT NULL,
  `qnutricao` tinyint(1) NOT NULL,
  `qodontologia` tinyint(1) NOT NULL,
  `qplanejamento_urbano_regional` tinyint(1) NOT NULL,
  `qquimica_industrial` tinyint(1) NOT NULL,
  `qrelacoes_internacionais` tinyint(1) NOT NULL,
  `qsecretariado_executiva` tinyint(1) NOT NULL,
  `qteologia` tinyint(1) NOT NULL,
  `qzootecnia` tinyint(1) NOT NULL,
  `qarea_conhecimento` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area_conhecimento
-- ----------------------------

-- ----------------------------
-- Table structure for `area_curricular`
-- ----------------------------
DROP TABLE IF EXISTS `area_curricular`;
CREATE TABLE `area_curricular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arte` tinyint(1) NOT NULL,
  `ciencias_agrarias` tinyint(1) NOT NULL,
  `ciencias_geologicas` tinyint(1) NOT NULL,
  `comunicacao_jornalismo` tinyint(1) NOT NULL,
  `ecologia` tinyint(1) NOT NULL,
  `educacao_fisica` tinyint(1) NOT NULL,
  `fisica` tinyint(1) NOT NULL,
  `geral` tinyint(1) NOT NULL,
  `lingua_estrangeira` tinyint(1) NOT NULL,
  `matematica` tinyint(1) NOT NULL,
  `quimica` tinyint(1) NOT NULL,
  `sociologia` tinyint(1) NOT NULL,
  `biologia` tinyint(1) NOT NULL,
  `ciencias_computacao` tinyint(1) NOT NULL,
  `ciencias_naturais` tinyint(1) NOT NULL,
  `direito` tinyint(1) NOT NULL,
  `economia` tinyint(1) NOT NULL,
  `filosofia` tinyint(1) NOT NULL,
  `geografia` tinyint(1) NOT NULL,
  `historia` tinyint(1) NOT NULL,
  `lingua_portuguesa` tinyint(1) NOT NULL,
  `pedagogia` tinyint(1) NOT NULL,
  `saude` tinyint(1) NOT NULL,
  `turismo` tinyint(1) NOT NULL,
  `id_area_licenciatura` int(11) DEFAULT NULL,
  `id_outra_area` int(11) DEFAULT NULL,
  `qarte` tinyint(1) NOT NULL,
  `qciencias_agrarias` tinyint(1) NOT NULL,
  `qciencias_geologicas` tinyint(1) NOT NULL,
  `qcomunicacao_jornalismo` tinyint(1) NOT NULL,
  `qecologia` tinyint(1) NOT NULL,
  `qeducacao_fisica` tinyint(1) NOT NULL,
  `qfisica` tinyint(1) NOT NULL,
  `qgeral` tinyint(1) NOT NULL,
  `qlingua_estrangeira` tinyint(1) NOT NULL,
  `qmatematica` tinyint(1) NOT NULL,
  `qquimica` tinyint(1) NOT NULL,
  `qsociologia` tinyint(1) NOT NULL,
  `qbiologia` tinyint(1) NOT NULL,
  `qciencias_computacao` tinyint(1) NOT NULL,
  `qciencias_naturais` tinyint(1) NOT NULL,
  `qdireito` tinyint(1) NOT NULL,
  `qeconomia` tinyint(1) NOT NULL,
  `qfilosofia` tinyint(1) NOT NULL,
  `qgeografia` tinyint(1) NOT NULL,
  `qhistoria` tinyint(1) NOT NULL,
  `qlingua_portuguesa` tinyint(1) NOT NULL,
  `qpedagogia` tinyint(1) NOT NULL,
  `qsaude` tinyint(1) NOT NULL,
  `qturismo` tinyint(1) NOT NULL,
  `qarea_curricular` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area_curricular
-- ----------------------------

-- ----------------------------
-- Table structure for `area_licenciatura`
-- ----------------------------
DROP TABLE IF EXISTS `area_licenciatura`;
CREATE TABLE `area_licenciatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_licenciatura` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area_licenciatura
-- ----------------------------

-- ----------------------------
-- Table structure for `contexto_educacional`
-- ----------------------------
DROP TABLE IF EXISTS `contexto_educacional`;
CREATE TABLE `contexto_educacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contexto_nao_escolar` tinyint(1) NOT NULL,
  `abordagem_generica` tinyint(1) NOT NULL,
  `contexto_escolar` tinyint(1) NOT NULL,
  `qcontexto_nao_escolar` tinyint(1) NOT NULL,
  `qabordagem_generica` tinyint(1) NOT NULL,
  `qcontexto_escolar` tinyint(1) NOT NULL,
  `qcontexto_educacional` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contexto_educacional
-- ----------------------------

-- ----------------------------
-- Table structure for `detalhes_finais`
-- ----------------------------
DROP TABLE IF EXISTS `detalhes_finais`;
CREATE TABLE `detalhes_finais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observacoes` text NOT NULL,
  `palavras_chave` text NOT NULL,
  `url_trabalho` text NOT NULL,
  `url_resumo` text NOT NULL,
  `doc_classificado_por` text NOT NULL,
  `data_classificacao` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalhes_finais
-- ----------------------------

-- ----------------------------
-- Table structure for `ficha_classificacao`
-- ----------------------------
DROP TABLE IF EXISTS `ficha_classificacao`;
CREATE TABLE `ficha_classificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `consolidada` tinyint(1) NOT NULL,
  `id_identificacao` int(11) NOT NULL,
  `id_contexto_educacional` int(11) NOT NULL,
  `id_tema_ambiental` int(11) NOT NULL,
  `id_tema_estudo` int(11) NOT NULL,
  `id_resumo` int(11) NOT NULL,
  `id_detalhes_finais` int(11) NOT NULL,
  `id_publico_envolvido` int(11) NOT NULL,
  `id_area_conhecimento` int(11) NOT NULL,
  `id_modalidades` int(11) NOT NULL,
  `id_area_curricular` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ficha_classificacao
-- ----------------------------

-- ----------------------------
-- Table structure for `foco`
-- ----------------------------
DROP TABLE IF EXISTS `foco`;
CREATE TABLE `foco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foco` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foco
-- ----------------------------

-- ----------------------------
-- Table structure for `identificacao`
-- ----------------------------
DROP TABLE IF EXISTS `identificacao`;
CREATE TABLE `identificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `autor_nome` varchar(100) NOT NULL,
  `autor_sobrenome` varchar(100) NOT NULL,
  `orientador` varchar(100) NOT NULL,
  `ano_defesa` smallint(6) NOT NULL,
  `numero_paginas` int(11) NOT NULL,
  `programa_pos` varchar(100) NOT NULL,
  `ies` varchar(40) NOT NULL,
  `unidade_setor` varchar(40) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `grau_titulacao_academica` text NOT NULL,
  `dependencia_administrativa` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of identificacao
-- ----------------------------

-- ----------------------------
-- Table structure for `modalidade`
-- ----------------------------
DROP TABLE IF EXISTS `modalidade`;
CREATE TABLE `modalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regular` tinyint(1) NOT NULL,
  `eja` tinyint(1) NOT NULL,
  `educacao_especial` tinyint(1) NOT NULL,
  `educacao_indigena` tinyint(1) NOT NULL,
  `educacao_profissional_tecnologica` tinyint(1) NOT NULL,
  `educacao_infantil` tinyint(1) NOT NULL,
  `ensino_fundamental_1_4_1_5` tinyint(1) NOT NULL,
  `ensino_fundamental_5_8_6_9` tinyint(1) NOT NULL,
  `ensino_medio` tinyint(1) NOT NULL,
  `educacao_superior` tinyint(1) NOT NULL,
  `abordagem_generica_niveis_escolares` tinyint(1) NOT NULL,
  `qregular` tinyint(1) NOT NULL,
  `qeja` tinyint(1) NOT NULL,
  `qeducacao_especial` tinyint(1) NOT NULL,
  `qeducacao_indigena` tinyint(1) NOT NULL,
  `qeducacao_profissional_tecnologica` tinyint(1) NOT NULL,
  `qeducacao_infantil` tinyint(1) NOT NULL,
  `qensino_fundamental_1_4_1_5` tinyint(1) NOT NULL,
  `qensino_fundamental_5_8_6_9` tinyint(1) NOT NULL,
  `qensino_medio` tinyint(1) NOT NULL,
  `qeducacao_superior` tinyint(1) NOT NULL,
  `qabordagem_generica_niveis_escolares` tinyint(1) NOT NULL,
  `qmodalidade` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modalidade
-- ----------------------------

-- ----------------------------
-- Table structure for `outra_area`
-- ----------------------------
DROP TABLE IF EXISTS `outra_area`;
CREATE TABLE `outra_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outra_area` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of outra_area
-- ----------------------------

-- ----------------------------
-- Table structure for `publico_envolvido`
-- ----------------------------
DROP TABLE IF EXISTS `publico_envolvido`;
CREATE TABLE `publico_envolvido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publico_envolvido` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of publico_envolvido
-- ----------------------------

-- ----------------------------
-- Table structure for `resumo`
-- ----------------------------
DROP TABLE IF EXISTS `resumo`;
CREATE TABLE `resumo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resumo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resumo
-- ----------------------------

-- ----------------------------
-- Table structure for `sem_resumos`
-- ----------------------------
DROP TABLE IF EXISTS `sem_resumos`;
CREATE TABLE `sem_resumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(3516) DEFAULT NULL,
  `sobrenome` varchar(18) DEFAULT NULL,
  `orientador` varchar(90) DEFAULT NULL,
  `pos` varchar(62) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sem_resumos
-- ----------------------------

-- ----------------------------
-- Table structure for `tema_ambiental`
-- ----------------------------
DROP TABLE IF EXISTS `tema_ambiental`;
CREATE TABLE `tema_ambiental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema_ambiental` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tema_ambiental
-- ----------------------------

-- ----------------------------
-- Table structure for `tema_estudo`
-- ----------------------------
DROP TABLE IF EXISTS `tema_estudo`;
CREATE TABLE `tema_estudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curric_programas_projetos` tinyint(1) NOT NULL,
  `conteudo_metodos` tinyint(1) NOT NULL,
  `concep_repres_percep_formador` tinyint(1) NOT NULL,
  `concep_repres_percep_aprediz` tinyint(1) NOT NULL,
  `recursos_didaticos` tinyint(1) NOT NULL,
  `linguagem_cognicao` tinyint(1) NOT NULL,
  `politicas_publicas_ea` tinyint(1) NOT NULL,
  `organ_instituicao_escolar` tinyint(1) NOT NULL,
  `organ_nao_governamental` tinyint(1) NOT NULL,
  `organ_governamental` tinyint(1) NOT NULL,
  `trab_form_professores_agentes` tinyint(1) NOT NULL,
  `movim_sociais_ambientalistas` tinyint(1) NOT NULL,
  `fundamentos_ea` tinyint(1) NOT NULL,
  `id_foco` int(11) DEFAULT NULL,
  `qcurric_programas_projetos` tinyint(1) NOT NULL,
  `qconteudo_metodos` tinyint(1) NOT NULL,
  `qconcep_repres_percep_formador` tinyint(1) NOT NULL,
  `qconcep_repres_percep_aprediz` tinyint(1) NOT NULL,
  `qrecursos_didaticos` tinyint(1) NOT NULL,
  `qlinguagem_cognicao` tinyint(1) NOT NULL,
  `qpoliticas_publicas_ea` tinyint(1) NOT NULL,
  `qorgan_instituicao_escolar` tinyint(1) NOT NULL,
  `qorgan_nao_governamental` tinyint(1) NOT NULL,
  `qorgan_governamental` tinyint(1) NOT NULL,
  `qtrab_form_professores_agentes` tinyint(1) NOT NULL,
  `qmovim_sociais_ambientalistas` tinyint(1) NOT NULL,
  `qfundamentos_ea` tinyint(1) NOT NULL,
  `qtema_estudo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2151 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tema_estudo
-- ----------------------------
