<?php
  #class Modalidades
  //portable at php5
  //pattern CamelCaps
  
  class Modalidades{
	  
	  private $id;
	  private $regular;
	  private $eja;
	  private $educacao_especial;
	  private $educacao_indigena;
	  private $educacao_profissional_tecnologica;
	  private $educacao_infantil;
	  private $ensino_fundamental_1_4_1_5;
	  private $ensino_fundamental_5_8_6_9;
	  private $ensino_medio;
	  private $educacao_superior;
	  private $abordagem_generica_niveis_escolares;
	  private $qregular;
	  private $qeja;
	  private $qeducacao_especial;
	  private $qeducacao_indigena;
	  private $qeducacao_profissional_tecnologica;
	  private $qeducacao_infantil;
	  private $qensino_fundamental_1_4_1_5;
	  private $qensino_fundamental_5_8_6_9;
	  private $qensino_medio;
	  private $qeducacao_superior;
	  private $qabordagem_generica_niveis_escolares;
	  private $qmodalidade;

	  public function __construct($id,$regular,$eja,$educacao_especial,$educacao_indigena,$educacao_profissional_tecnologica,$educacao_infantil,$ensino_fundamental_1_4_1_5,$ensino_fundamental_5_8_6_9,$ensino_medio,$educacao_superior,$abordagem_generica_niveis_escolares,$qregular,$qeja,$qeducacao_especial,$qeducacao_indigena,$qeducacao_profissional_tecnologica,$qeducacao_infantil,$qensino_fundamental_1_4_1_5,$qensino_fundamental_5_8_6_9,$qensino_medio,$qeducacao_superior,$qabordagem_generica_niveis_escolares,$qmodalidade){
		self::setId($id);
		self::setRegular($regular);
		self::setEja($eja);
		self::setEducacao_especial($educacao_especial);
		self::setEducacao_indigena($educacao_indigena);
		self::setEducacao_profissional_tecnologica($educacao_profissional_tecnologica);
		self::setEducacao_infantil($educacao_infantil);
		self::setEnsino_fundamental_1_4_1_5($ensino_fundamental_1_4_1_5);
		self::setEnsino_fundamental_5_8_6_9($ensino_fundamental_5_8_6_9);
		self::setEnsino_medio($ensino_medio);
		self::setEducacao_superior($educacao_superior);
		self::setAbordagem_generica_niveis_escolares($abordagem_generica_niveis_escolares);
		self::setQregular($qregular);
		self::setQeja($qeja);
		self::setQeducacao_especial($qeducacao_especial);
		self::setQeducacao_indigena($qeducacao_indigena);
		self::setQeducacao_profissional_tecnologica($qeducacao_profissional_tecnologica);
		self::setQeducacao_infantil($qeducacao_infantil);
		self::setQensino_fundamental_1_4_1_5($qensino_fundamental_1_4_1_5);
		self::setQensino_fundamental_5_8_6_9($qensino_fundamental_5_8_6_9);
		self::setQensino_medio($qensino_medio);
		self::setQeducacao_superior($qeducacao_superior);
		self::setQabordagem_generica_niveis_escolares($qabordagem_generica_niveis_escolares);
		self::setQmodalidade($qmodalidade);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getRegular(){
	    return $this->regular;
	  }
	  
	  public function setRegular($tRegular){
	    $this->regular = $tRegular;
	  }
	  
	  public function getEja(){
	    return $this->eja;
	  }
	  
	  public function setEja($tEja){
	    $this->eja = $tEja;
	  }
	  
	  public function getEducacao_especial(){
	    return $this->educacao_especial;
	  }
	  
	  public function setEducacao_especial($tEducacao_especial){
	    $this->educacao_especial = $tEducacao_especial;
	  }
	  
	  public function getEducacao_indigena(){
	    return $this->educacao_indigena;
	  }
	  
	  public function setEducacao_indigena($tEducacao_indigena){
	    $this->educacao_indigena = $tEducacao_indigena;
	  }
	  
	  public function getEducacao_profissional_tecnologica(){
	    return $this->educacao_profissional_tecnologica;
	  }
	  
	  public function setEducacao_profissional_tecnologica($tEducacao_profissional_tecnologica){
	    $this->educacao_profissional_tecnologica = $tEducacao_profissional_tecnologica;
	  }
	  
	  public function getEducacao_infantil(){
	    return $this->educacao_infantil;
	  }
	  
	  public function setEducacao_infantil($tEducacao_infantil){
	    $this->educacao_infantil = $tEducacao_infantil;
	  }
	  
	  public function getEnsino_fundamental_1_4_1_5(){
	    return $this->ensino_fundamental_1_4_1_5;
	  }
	  
	  public function setEnsino_fundamental_1_4_1_5($tEnsino_fundamental_1_4_1_5){
	    $this->ensino_fundamental_1_4_1_5 = $tEnsino_fundamental_1_4_1_5;
	  }
	  
	  public function getEnsino_fundamental_5_8_6_9(){
	    return $this->ensino_fundamental_5_8_6_9;
	  }
	  
	  public function setEnsino_fundamental_5_8_6_9($tEnsino_fundamental_5_8_6_9){
	    $this->ensino_fundamental_5_8_6_9 = $tEnsino_fundamental_5_8_6_9;
	  }
	  
	  public function getEnsino_medio(){
	    return $this->ensino_medio;
	  }
	  
	  public function setEnsino_medio($tEnsino_medio){
	    $this->ensino_medio = $tEnsino_medio;
	  }
	  
	  public function getEducacao_superior(){
	    return $this->educacao_superior;
	  }
	  
	  public function setEducacao_superior($tEducacao_superior){
	    $this->educacao_superior = $tEducacao_superior;
	  }
	  
	  public function getAbordagem_generica_niveis_escolares(){
	    return $this->abordagem_generica_niveis_escolares;
	  }
	  
	  public function setAbordagem_generica_niveis_escolares($tAbordagem_generica_niveis_escolares){
	    $this->abordagem_generica_niveis_escolares = $tAbordagem_generica_niveis_escolares;
	  }
	  
	  public function getQregular(){
	    return $this->qregular;
	  }
	  
	  public function setQregular($tQregular){
	    $this->qregular = $tQregular;
	  }
	  
	  public function getQeja(){
	    return $this->qeja;
	  }
	  
	  public function setQeja($tQeja){
	    $this->qeja = $tQeja;
	  }
	  
	  public function getQeducacao_especial(){
	    return $this->qeducacao_especial;
	  }
	  
	  public function setQeducacao_especial($tQeducacao_especial){
	    $this->qeducacao_especial = $tQeducacao_especial;
	  }
	  
	  public function getQeducacao_indigena(){
	    return $this->qeducacao_indigena;
	  }
	  
	  public function setQeducacao_indigena($tQeducacao_indigena){
	    $this->qeducacao_indigena = $tQeducacao_indigena;
	  }
	  
	  public function getQeducacao_profissional_tecnologica(){
	    return $this->qeducacao_profissional_tecnologica;
	  }
	  
	  public function setQeducacao_profissional_tecnologica($tQeducacao_profissional_tecnologica){
	    $this->qeducacao_profissional_tecnologica = $tQeducacao_profissional_tecnologica;
	  }
	  
	  public function getQeducacao_infantil(){
	    return $this->qeducacao_infantil;
	  }
	  
	  public function setQeducacao_infantil($tQeducacao_infantil){
	    $this->qeducacao_infantil = $tQeducacao_infantil;
	  }
	  
	  public function getQensino_fundamental_1_4_1_5(){
	    return $this->qensino_fundamental_1_4_1_5;
	  }
	  
	  public function setQensino_fundamental_1_4_1_5($tQensino_fundamental_1_4_1_5){
	    $this->qensino_fundamental_1_4_1_5 = $tQensino_fundamental_1_4_1_5;
	  }
	  
	  public function getQensino_fundamental_5_8_6_9(){
	    return $this->qensino_fundamental_5_8_6_9;
	  }
	  
	  public function setQensino_fundamental_5_8_6_9($tQensino_fundamental_5_8_6_9){
	    $this->qensino_fundamental_5_8_6_9 = $tQensino_fundamental_5_8_6_9;
	  }
	  
	  public function getQensino_medio(){
	    return $this->qensino_medio;
	  }
	  
	  public function setQensino_medio($tQensino_medio){
	    $this->qensino_medio = $tQensino_medio;
	  }
	  
	  public function getQeducacao_superior(){
	    return $this->qeducacao_superior;
	  }
	  
	  public function setQeducacao_superior($tQeducacao_superior){
	    $this->qeducacao_superior = $tQeducacao_superior;
	  }
	  
	  public function getQabordagem_generica_niveis_escolares(){
	    return $this->qabordagem_generica_niveis_escolares;
	  }
	  
	  public function setQabordagem_generica_niveis_escolares($tQabordagem_generica_niveis_escolares){
	    $this->qabordagem_generica_niveis_escolares = $tQabordagem_generica_niveis_escolares;
	  }
	  
	  public function getQmodalidade(){
	    return $this->qmodalidade;
	  }
	  
	  public function setQmodalidade($tQmodalidade){
	    $this->qmodalidade = $tQmodalidade;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Regular = ".self::getRegular();
		$text.= "Eja = ".self::getEja();
		$text.= "Educacao_especial = ".self::getEducacao_especial();
		$text.= "Educacao_indigena = ".self::getEducacao_indigena();
		$text.= "Educacao_profissional_tecnologica = ".self::getEducacao_profissional_tecnologica();
		$text.= "Educacao_infantil = ".self::getEducacao_infantil();
		$text.= "Ensino_fundamental_1_4_1_5 = ".self::getEnsino_fundamental_1_4_1_5();
		$text.= "Ensino_fundamental_5_8_6_9 = ".self::getEnsino_fundamental_5_8_6_9();
		$text.= "Ensino_medio = ".self::getEnsino_medio();
		$text.= "Educacao_superior = ".self::getEducacao_superior();
		$text.= "Abordagem_generica_niveis_escolares = ".self::getAbordagem_generica_niveis_escolares();
		$text.= "Qregular = ".self::getQregular();
		$text.= "Qeja = ".self::getQeja();
		$text.= "Qeducacao_especial = ".self::getQeducacao_especial();
		$text.= "Qeducacao_indigena = ".self::getQeducacao_indigena();
		$text.= "Qeducacao_profissional_tecnologica = ".self::getQeducacao_profissional_tecnologica();
		$text.= "Qeducacao_infantil = ".self::getQeducacao_infantil();
		$text.= "Qensino_fundamental_1_4_1_5 = ".self::getQensino_fundamental_1_4_1_5();
		$text.= "Qensino_fundamental_5_8_6_9 = ".self::getQensino_fundamental_5_8_6_9();
		$text.= "Qensino_medio = ".self::getQensino_medio();
		$text.= "Qeducacao_superior = ".self::getQeducacao_superior();
		$text.= "Qabordagem_generica_niveis_escolares = ".self::getQabordagem_generica_niveis_escolares();
	    $text.= "Qmodalidade = ".self::getQmodalidade();
		
		return $text;
	  }
	
  }
  
?>