<?php
  #class Publico_envolvido
  //portable at php5
  //pattern CamelCaps
  
  class Publico_envolvido{
	  
	  private $id;
	  private $publico_envolvido;

	  public function __construct($id,$publico_envolvido){
		self::setId($id);
		self::setPublico_envolvido($publico_envolvido);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getPublico_envolvido(){
	    return $this->publico_envolvido;
	  }
	  
	  public function setPublico_envolvido($tPublico_envolvido){
	    $this->publico_envolvido = $tPublico_envolvido;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Publico_envolvido = ".self::getPublico_envolvido();
	    
		return $text;
	  }
	
  }
  
?>