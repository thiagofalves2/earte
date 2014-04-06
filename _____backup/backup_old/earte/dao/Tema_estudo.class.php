<?php
  #class Tema_estudo
  //portable at php5
  //pattern CamelCaps
  
  class Tema_estudo{
	  
	  private $id;
	  private $curric_programas_projetos;
	  private $conteudo_metodos;
	  private $concep_repres_percep_formador;
	  private $concep_repres_percep_aprediz;
	  private $recursos_didaticos;
	  private $linguagem_cognicao;
	  private $politicas_publicas_ea;
	  private $organ_instituicao_escolar;
	  private $organ_nao_governamental;
	  private $organ_governamental;
	  private $trab_form_professores_agentes;
	  private $movim_sociais_ambientalistas;
	  private $fundamentos_ea;
	  private $qcurric_programas_projetos;
	  private $qconteudo_metodos;
	  private $qconcep_repres_percep_formador;
	  private $qconcep_repres_percep_aprediz;
	  private $qrecursos_didaticos;
	  private $qlinguagem_cognicao;
	  private $qpoliticas_publicas_ea;
	  private $qorgan_instituicao_escolar;
	  private $qorgan_nao_governamental;
	  private $qorgan_governamental;
	  private $qtrab_form_professores_agentes;
	  private $qmovim_sociais_ambientalistas;
	  private $qfundamentos_ea;
	  private $qtema_estudo;
	  private $id_foco;

	  public function __construct($id,$curric_programas_projetos,$conteudo_metodos,$concep_repres_percep_formador,$concep_repres_percep_aprediz,$recursos_didaticos,$linguagem_cognicao,$politicas_publicas_ea,$organ_instituicao_escolar,$organ_nao_governamental,$organ_governamental,$trab_form_professores_agentes,$movim_sociais_ambientalistas,$fundamentos_ea,$qcurric_programas_projetos,$qconteudo_metodos,$qconcep_repres_percep_formador,$qconcep_repres_percep_aprediz,$qrecursos_didaticos,$qlinguagem_cognicao,$qpoliticas_publicas_ea,$qorgan_instituicao_escolar,$qorgan_nao_governamental,$qorgan_governamental,$qtrab_form_professores_agentes,$qmovim_sociais_ambientalistas,$qfundamentos_ea,$qtema_estudo,$id_foco){
		self::setId($id);
		self::setCurric_programas_projetos($curric_programas_projetos);
		self::setConteudo_metodos($conteudo_metodos);
		self::setConcep_repres_percep_formador($concep_repres_percep_formador);
		self::setConcep_repres_percep_aprediz($concep_repres_percep_aprediz);
		self::setRecursos_didaticos($recursos_didaticos);
		self::setLinguagem_cognicao($linguagem_cognicao);
		self::setPoliticas_publicas_ea($politicas_publicas_ea);
		self::setOrgan_instituicao_escolar($organ_instituicao_escolar);
		self::setOrgan_nao_governamental($organ_nao_governamental);
		self::setOrgan_governamental($organ_governamental);
		self::setTrab_form_professores_agentes($trab_form_professores_agentes);
		self::setMovim_sociais_ambientalistas($movim_sociais_ambientalistas);
		self::setFundamentos_ea($fundamentos_ea);
		self::setQcurric_programas_projetos($qcurric_programas_projetos);
		self::setQconteudo_metodos($qconteudo_metodos);
		self::setQconcep_repres_percep_formador($qconcep_repres_percep_formador);
		self::setQconcep_repres_percep_aprediz($qconcep_repres_percep_aprediz);
		self::setQrecursos_didaticos($qrecursos_didaticos);
		self::setQlinguagem_cognicao($qlinguagem_cognicao);
		self::setQpoliticas_publicas_ea($qpoliticas_publicas_ea);
		self::setQorgan_instituicao_escolar($qorgan_instituicao_escolar);
		self::setQorgan_nao_governamental($qorgan_nao_governamental);
		self::setQorgan_governamental($qorgan_governamental);
		self::setQtrab_form_professores_agentes($qtrab_form_professores_agentes);
		self::setQmovim_sociais_ambientalistas($qmovim_sociais_ambientalistas);
		self::setQfundamentos_ea($qfundamentos_ea);
		self::setQtema_estudo($qtema_estudo);
		self::setId_foco($id_foco);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getCurric_programas_projetos(){
	    return $this->curric_programas_projetos;
	  }
	  
	  public function setCurric_programas_projetos($tCurric_programas_projetos){
	    $this->curric_programas_projetos = $tCurric_programas_projetos;
	  }
	  
	  public function getConteudo_metodos(){
	    return $this->conteudo_metodos;
	  }
	  
	  public function setConteudo_metodos($tConteudo_metodos){
	    $this->conteudo_metodos = $tConteudo_metodos;
	  }
	  
	  public function getConcep_repres_percep_formador(){
	    return $this->concep_repres_percep_formador;
	  }
	  
	  public function setConcep_repres_percep_formador($tConcep_repres_percep_formador){
	    $this->concep_repres_percep_formador = $tConcep_repres_percep_formador;
	  }
	  
	  public function getConcep_repres_percep_aprediz(){
	    return $this->concep_repres_percep_aprediz;
	  }
	  
	  public function setConcep_repres_percep_aprediz($tConcep_repres_percep_aprediz){
	    $this->concep_repres_percep_aprediz = $tConcep_repres_percep_aprediz;
	  }
	  
	  public function getRecursos_didaticos(){
	    return $this->recursos_didaticos;
	  }
	  
	  public function setRecursos_didaticos($tRecursos_didaticos){
	    $this->recursos_didaticos = $tRecursos_didaticos;
	  }
	  
	  public function getLinguagem_cognicao(){
	    return $this->linguagem_cognicao;
	  }
	  
	  public function setLinguagem_cognicao($tLinguagem_cognicao){
	    $this->linguagem_cognicao = $tLinguagem_cognicao;
	  }
	  
	  public function getPoliticas_publicas_ea(){
	    return $this->politicas_publicas_ea;
	  }
	  
	  public function setPoliticas_publicas_ea($tPoliticas_publicas_ea){
	    $this->politicas_publicas_ea = $tPoliticas_publicas_ea;
	  }
	  
	  public function getOrgan_instituicao_escolar(){
	    return $this->organ_instituicao_escolar;
	  }
	  
	  public function setOrgan_instituicao_escolar($tOrgan_instituicao_escolar){
	    $this->organ_instituicao_escolar = $tOrgan_instituicao_escolar;
	  }
	  
	  public function getOrgan_nao_governamental(){
	    return $this->organ_nao_governamental;
	  }
	  
	  public function setOrgan_nao_governamental($tOrgan_nao_governamental){
	    $this->organ_nao_governamental = $tOrgan_nao_governamental;
	  }
	  
	  public function getOrgan_governamental(){
	    return $this->organ_governamental;
	  }
	  
	  public function setOrgan_governamental($tOrgan_governamental){
	    $this->organ_governamental = $tOrgan_governamental;
	  }
	  
	  public function getTrab_form_professores_agentes(){
	    return $this->trab_form_professores_agentes;
	  }
	  
	  public function setTrab_form_professores_agentes($tTrab_form_professores_agentes){
	    $this->trab_form_professores_agentes = $tTrab_form_professores_agentes;
	  }
	  
	  public function getMovim_sociais_ambientalistas(){
	    return $this->movim_sociais_ambientalistas;
	  }
	  
	  public function setMovim_sociais_ambientalistas($tMovim_sociais_ambientalistas){
	    $this->movim_sociais_ambientalistas = $tMovim_sociais_ambientalistas;
	  }
	  
	  public function getFundamentos_ea(){
	    return $this->fundamentos_ea;
	  }
	  
	  public function setFundamentos_ea($tFundamentos_ea){
	    $this->fundamentos_ea = $tFundamentos_ea;
	  }
	  
	  public function getQcurric_programas_projetos(){
	    return $this->qcurric_programas_projetos;
	  }
	  
	  public function setQcurric_programas_projetos($tQcurric_programas_projetos){
	    $this->qcurric_programas_projetos = $tQcurric_programas_projetos;
	  }
	  
	  public function getQconteudo_metodos(){
	    return $this->qconteudo_metodos;
	  }
	  
	  public function setQconteudo_metodos($tQconteudo_metodos){
	    $this->qconteudo_metodos = $tQconteudo_metodos;
	  }
	  
	  public function getQconcep_repres_percep_formador(){
	    return $this->qconcep_repres_percep_formador;
	  }
	  
	  public function setQconcep_repres_percep_formador($tQconcep_repres_percep_formador){
	    $this->qconcep_repres_percep_formador = $tQconcep_repres_percep_formador;
	  }
	  
	  public function getQconcep_repres_percep_aprediz(){
	    return $this->qconcep_repres_percep_aprediz;
	  }
	  
	  public function setQconcep_repres_percep_aprediz($tQconcep_repres_percep_aprediz){
	    $this->qconcep_repres_percep_aprediz = $tQconcep_repres_percep_aprediz;
	  }
	  
	  public function getQrecursos_didaticos(){
	    return $this->qrecursos_didaticos;
	  }
	  
	  public function setQrecursos_didaticos($tQrecursos_didaticos){
	    $this->qrecursos_didaticos = $tQrecursos_didaticos;
	  }
	  
	  public function getQlinguagem_cognicao(){
	    return $this->qlinguagem_cognicao;
	  }
	  
	  public function setQlinguagem_cognicao($tQlinguagem_cognicao){
	    $this->qlinguagem_cognicao = $tQlinguagem_cognicao;
	  }
	  
	  public function getQpoliticas_publicas_ea(){
	    return $this->qpoliticas_publicas_ea;
	  }
	  
	  public function setQpoliticas_publicas_ea($tQpoliticas_publicas_ea){
	    $this->qpoliticas_publicas_ea = $tQpoliticas_publicas_ea;
	  }
	  
	  public function getQorgan_instituicao_escolar(){
	    return $this->qorgan_instituicao_escolar;
	  }
	  
	  public function setQorgan_instituicao_escolar($tQorgan_instituicao_escolar){
	    $this->qorgan_instituicao_escolar = $tQorgan_instituicao_escolar;
	  }
	  
	  public function getQorgan_nao_governamental(){
	    return $this->qorgan_nao_governamental;
	  }
	  
	  public function setQorgan_nao_governamental($tQorgan_nao_governamental){
	    $this->qorgan_nao_governamental = $tQorgan_nao_governamental;
	  }
	  
	  public function getQorgan_governamental(){
	    return $this->qorgan_governamental;
	  }
	  
	  public function setQorgan_governamental($tQorgan_governamental){
	    $this->qorgan_governamental = $tQorgan_governamental;
	  }
	  
	  public function getQtrab_form_professores_agentes(){
	    return $this->qtrab_form_professores_agentes;
	  }
	  
	  public function setQtrab_form_professores_agentes($tQtrab_form_professores_agentes){
	    $this->qtrab_form_professores_agentes = $tQtrab_form_professores_agentes;
	  }
	  
	  public function getQmovim_sociais_ambientalistas(){
	    return $this->qmovim_sociais_ambientalistas;
	  }
	  
	  public function setQmovim_sociais_ambientalistas($tQmovim_sociais_ambientalistas){
	    $this->qmovim_sociais_ambientalistas = $tQmovim_sociais_ambientalistas;
	  }
	  
	  public function getQfundamentos_ea(){
	    return $this->qfundamentos_ea;
	  }
	  
	  public function setQfundamentos_ea($tQfundamentos_ea){
	    $this->qfundamentos_ea = $tQfundamentos_ea;
	  }
	  
	  public function getQtema_estudo(){
	    return $this->qtema_estudo;
	  }
	  
	  public function setQtema_estudo($tQtema_estudo){
	    $this->qtema_estudo = $tQtema_estudo;
	  }
	  
	  public function getId_foco(){
	    return $this->id_foco;
	  }
	  
	  public function setId_foco($tId_foco){
	    $this->id_foco = $tId_foco;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Curric_programas_projetos = ".self::getCurric_programas_projetos();
		$text.= "Conteudo_metodos = ".self::getConteudo_metodos();
		$text.= "Concep_repres_percep_formador = ".self::getConcep_repres_percep_formador();
		$text.= "Concep_repres_percep_aprediz = ".self::getConcep_repres_percep_aprediz();
		$text.= "Recursos_didaticos = ".self::getRecursos_didaticos();
		$text.= "Linguagem_cognicao = ".self::getLinguagem_cognicao();
		$text.= "Politicas_publicas_ea = ".self::getPoliticas_publicas_ea();
		$text.= "Organ_instituicao_escolar = ".self::getOrgan_instituicao_escolar();
		$text.= "Organ_nao_governamental = ".self::getOrgan_nao_governamental();
		$text.= "Organ_governamental = ".self::getOrgan_governamental();
		$text.= "Trab_form_professores_agentes = ".self::getTrab_form_professores_agentes();
		$text.= "Movim_sociais_ambientalistas = ".self::getMovim_sociais_ambientalistas();
		$text.= "Fundamentos_ea = ".self::getFundamentos_ea();
		$text.= "Qcurric_programas_projetos = ".self::getQcurric_programas_projetos();
		$text.= "Qconteudo_metodos = ".self::getQconteudo_metodos();
		$text.= "Qconcep_repres_percep_formador = ".self::getQconcep_repres_percep_formador();
		$text.= "Qconcep_repres_percep_aprediz = ".self::getQconcep_repres_percep_aprediz();
		$text.= "Qrecursos_didaticos = ".self::getQrecursos_didaticos();
		$text.= "Qlinguagem_cognicao = ".self::getQlinguagem_cognicao();
		$text.= "Qpoliticas_publicas_ea = ".self::getQpoliticas_publicas_ea();
		$text.= "Qorgan_instituicao_escolar = ".self::getQorgan_instituicao_escolar();
		$text.= "Qorgan_nao_governamental = ".self::getQorgan_nao_governamental();
		$text.= "Qorgan_governamental = ".self::getQorgan_governamental();
		$text.= "Qtrab_form_professores_agentes = ".self::getQtrab_form_professores_agentes();
		$text.= "Qmovim_sociais_ambientalistas = ".self::getQmovim_sociais_ambientalistas();
		$text.= "Qfundamentos_ea = ".self::getQfundamentos_ea();
		$text.= "Qtema_estudo = ".self::getQtema_estudo();
		$text.= "Id_foco = ".self::getId_foco();
	    
		return $text;
	  }
	
  }
  
?>