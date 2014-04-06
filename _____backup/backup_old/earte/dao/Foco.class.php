<?php
  #class Foco
  //portable at php5
  //pattern CamelCaps
  
  class Foco{
	  
	  private $id;
	  private $foco;

	  public function __construct($id,$foco){
		self::setId($id);
		self::setFoco($foco);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getFoco(){
	    return $this->foco;
	  }
	  
	  public function setFoco($tFoco){
	    $this->foco = $tFoco;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Foco = ".self::getFoco();
	    
		return $text;
	  }
	
  }
  
?>