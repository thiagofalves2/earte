<?php
  #class Resumo
  //portable at php5
  //pattern CamelCaps
  
  class Resumo{
	  
	  private $id;
	  private $resumo;

	  public function __construct($id,$resumo){
		self::setId($id);
		self::setResumo($resumo);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getResumo(){
	    return $this->resumo;
	  }
	  
	  public function setResumo($tResumo){
	    $this->resumo = $tResumo;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Resumo = ".self::getResumo();
	    
		return $text;
	  }
	
  }
  
?>