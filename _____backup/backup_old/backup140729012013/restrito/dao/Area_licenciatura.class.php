<?php
  #class Area_licenciatura
  //portable at php5
  //pattern CamelCaps
  
  class Area_licenciatura{
	  
	  private $id;
	  private $area_licenciatura;

	  public function __construct($id,$area_licenciatura){
		self::setId($id);
		self::setArea_licenciatura($area_licenciatura);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getArea_licenciatura(){
	    return $this->area_licenciatura;
	  }
	  
	  public function setArea_licenciatura($tArea_licenciatura){
	    $this->area_licenciatura = $tArea_licenciatura;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Area_licenciatura = ".self::getArea_licenciatura();
	    
		return $text;
	  }
	
  }
  
?>