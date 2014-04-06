<?php
  #class Ficha_classificacao
  //portable at php5
  //pattern CamelCaps
  
  class Ficha_classificacao{
	  
	  private $id;
	  private $codigo;
	  private $consolidada;
	  private $id_identificacao;
	  private $id_contexto_educacional;
	  private $id_tema_ambiental;
	  private $id_tema_estudo;
	  private $id_resumo;
	  private $id_detalhes_finais;
	  private $id_publico_envolvido;
	  private $id_area_conhecimento;
	  private $id_modalidades;
	  private $id_area_curricular;

	  public function __construct($id,$codigo,$consolidada,$id_identificacao,$id_contexto_educacional,$id_tema_ambiental,$id_tema_estudo,$id_resumo,$id_detalhes_finais,$id_publico_envolvido,$id_area_conhecimento,$id_modalidades,$id_area_curricular){
		self::setId($id);
		self::setCodigo($codigo);
		self::setConsolidada($consolidada);
		self::setId_identificacao($id_identificacao);
		self::setId_contexto_educacional($id_contexto_educacional);
		self::setId_tema_ambiental($id_tema_ambiental);
		self::setId_tema_estudo($id_tema_estudo);
		self::setId_resumo($id_resumo);
		self::setId_detalhes_finais($id_detalhes_finais);
		self::setId_publico_envolvido($id_publico_envolvido);
		self::setId_area_conhecimento($id_area_conhecimento);
		self::setId_modalidades($id_modalidades);
		self::setId_area_curricular($id_area_curricular);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getCodigo(){
	    return $this->codigo;
	  }
	  
	  public function setCodigo($tCodigo){
	    $this->codigo = $tCodigo;
	  }
	  
	  public function getConsolidada(){
	    return $this->consolidada;
	  }
	  
	  public function setConsolidada($tConsolidada){
	    $this->consolidada = $tConsolidada;
	  }
	  
	  public function getId_identificacao(){
	    return $this->id_identificacao;
	  }
	  
	  public function setId_identificacao($tId_identificacao){
	    $this->id_identificacao = $tId_identificacao;
	  }
	  
	  public function getId_contexto_educacional(){
	    return $this->id_contexto_educacional;
	  }
	  
	  public function setId_contexto_educacional($tId_contexto_educacional){
	    $this->id_contexto_educacional = $tId_contexto_educacional;
	  }
	  
	  public function getId_tema_ambiental(){
	    return $this->id_tema_ambiental;
	  }
	  
	  public function setId_tema_ambiental($tId_tema_ambiental){
	    $this->id_tema_ambiental = $tId_tema_ambiental;
	  }
	  
	  public function getId_tema_estudo(){
	    return $this->id_tema_estudo;
	  }
	  
	  public function setId_tema_estudo($tId_tema_estudo){
	    $this->id_tema_estudo = $tId_tema_estudo;
	  }
	  
	  public function getId_resumo(){
	    return $this->id_resumo;
	  }
	  
	  public function setId_resumo($tId_resumo){
	    $this->id_resumo = $tId_resumo;
	  }
	  
	  public function getId_detalhes_finais(){
	    return $this->id_detalhes_finais;
	  }
	  
	  public function setId_detalhes_finais($tId_detalhes_finais){
	    $this->id_detalhes_finais = $tId_detalhes_finais;
	  }
	  
	  public function getId_publico_envolvido(){
	    return $this->id_publico_envolvido;
	  }
	  
	  public function setId_publico_envolvido($tId_publico_envolvido){
	    $this->id_publico_envolvido = $tId_publico_envolvido;
	  }
	  
	  public function getId_area_conhecimento(){
	    return $this->id_area_conhecimento;
	  }
	  
	  public function setId_area_conhecimento($tId_area_conhecimento){
	    $this->id_area_conhecimento = $tId_area_conhecimento;
	  }
	  
	  public function getId_modalidades(){
	    return $this->id_modalidades;
	  }
	  
	  public function setId_modalidades($tId_modalidades){
	    $this->id_modalidades = $tId_modalidades;
	  }
	  
	  public function getId_area_curricular(){
	    return $this->id_area_curricular;
	  }
	  
	  public function setId_area_curricular($tId_area_curricular){
	    $this->id_area_curricular = $tId_area_curricular;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Codigo = ".self::getCodigo();
		$text.= "Consolidada = ".self::getConsolidada();
		$text.= "Id_identificacao = ".self::getId_identificacao();
		$text.= "Id_contexto_educacional = ".self::getId_contexto_educacional();
		$text.= "Id_tema_ambiental = ".self::getId_tema_ambiental();
		$text.= "Id_tema_estudo = ".self::getId_tema_estudo();
		$text.= "Id_resumo = ".self::getId_resumo();
		$text.= "Id_detalhes_finais = ".self::getId_detalhes_finais();
		$text.= "Id_publico_envolvido = ".self::getId_publico_envolvido();
		$text.= "Id_area_conhecimento = ".self::getId_area_conhecimento();
		$text.= "Id_modalidades = ".self::getId_modalidades();
		$text.= "Id_area_curricular = ".self::getId_area_curricular();
	    
		return $text;
	  }
	
  }
  
?>