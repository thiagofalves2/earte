<?php
  #class Outra_area
  //portable at php5
  //pattern CamelCaps
  
  class Outra_area{
	  
	  private $id;
	  private $outra_area;

	  public function __construct($id,$outra_area){
		self::setId($id);
		self::setOutra_area($outra_area);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getOutra_area(){
	    return $this->outra_area;
	  }
	  
	  public function setOutra_area($tOutra_area){
	    $this->outra_area = $tOutra_area;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Outra_area = ".self::getOutra_area();
	    
		return $text;
	  }
	
  }
  
?>