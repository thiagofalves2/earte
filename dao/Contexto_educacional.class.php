<?php
  #class Contexto_educacional
  //portable at php5
  //pattern CamelCaps
  
  class Contexto_educacional{
	  
	  private $id;
	  private $contexto_nao_escolar;
	  private $abordagem_generica;
	  private $contexto_escolar;
	  private $qcontexto_nao_escolar;
	  private $qabordagem_generica;
	  private $qcontexto_escolar;
	  private $qcontexto_educacional;

	  public function __construct($id,$contexto_nao_escolar,$abordagem_generica,$contexto_escolar,$qcontexto_nao_escolar,$qabordagem_generica,$qcontexto_escolar,$qcontexto_educacional){
		self::setId($id);
		self::setContexto_nao_escolar($contexto_nao_escolar);
		self::setAbordagem_generica($abordagem_generica);
		self::setContexto_escolar($contexto_escolar);
		self::setQcontexto_nao_escolar($qcontexto_nao_escolar);
		self::setQabordagem_generica($qabordagem_generica);
		self::setQcontexto_escolar($qcontexto_escolar);
		self::setQcontexto_educacional($qcontexto_educacional);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getContexto_nao_escolar(){
	    return $this->contexto_nao_escolar;
	  }
	  
	  public function setContexto_nao_escolar($tContexto_nao_escolar){
	    $this->contexto_nao_escolar = $tContexto_nao_escolar;
	  }
	  
	  public function getAbordagem_generica(){
	    return $this->abordagem_generica;
	  }
	  
	  public function setAbordagem_generica($tAbordagem_generica){
	    $this->abordagem_generica = $tAbordagem_generica;
	  }
	  
	  public function getContexto_escolar(){
	    return $this->contexto_escolar;
	  }
	  
	  public function setContexto_escolar($tContexto_escolar){
	    $this->contexto_escolar = $tContexto_escolar;
	  }
	  
	  public function getQcontexto_nao_escolar(){
	    return $this->qcontexto_nao_escolar;
	  }
	  
	  public function setQcontexto_nao_escolar($tQcontexto_nao_escolar){
	    $this->qcontexto_nao_escolar = $tQcontexto_nao_escolar;
	  }
	  
	  public function getQabordagem_generica(){
	    return $this->qabordagem_generica;
	  }
	  
	  public function setQabordagem_generica($tQabordagem_generica){
	    $this->qabordagem_generica = $tQabordagem_generica;
	  }
	  
	  public function getQcontexto_escolar(){
	    return $this->qcontexto_escolar;
	  }
	  
	  public function setQcontexto_escolar($tQcontexto_escolar){
	    $this->qcontexto_escolar = $tQcontexto_escolar;
	  }
	  
	  public function getQcontexto_educacional(){
	    return $this->qcontexto_educacional;
	  }
	  
	  public function setQcontexto_educacional($tQcontexto_educacional){
	    $this->qcontexto_educacional = $tQcontexto_educacional;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Contexto_nao_escolar = ".self::getContexto_nao_escolar();
		$text.= "Abordagem_generica = ".self::getAbordagem_generica();
		$text.= "Contexto_escolar = ".self::getContexto_escolar();
		$text.= "Qcontexto_nao_escolar = ".self::getQcontexto_nao_escolar();
		$text.= "Qabordagem_generica = ".self::getQabordagem_generica();
		$text.= "Qcontexto_escolar = ".self::getQcontexto_escolar();
	    $text.= "Qcontexto_educacional = ".self::getQcontexto_educacional();
		
		return $text;
	  }
	
  }
  
?>