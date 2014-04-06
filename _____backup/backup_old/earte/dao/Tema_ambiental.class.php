<?php
  #class Tema_ambiental
  //portable at php5
  //pattern CamelCaps
  
  class Tema_ambiental{
	  
	  private $id;
	  private $tema_ambiental;

	  public function __construct($id,$tema_ambiental){
		self::setId($id);
		self::setTema_ambiental($tema_ambiental);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getTema_ambiental(){
	    return $this->tema_ambiental;
	  }
	  
	  public function setTema_ambiental($tTema_ambiental){
	    $this->tema_ambiental = $tTema_ambiental;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Tema_ambiental = ".self::getTema_ambiental();
	    
		return $text;
	  }
	
  }
  
?>