<?php
  #class Identificacao
  //portable at php5
  //pattern CamelCaps
  
  class Identificacao{
	  
	  private $id;
	  private $titulo;
	  private $autor_nome;
	  private $autor_sobrenome;
	  private $orientador;
	  private $ano_defesa;
	  private $numero_paginas;
	  private $programa_pos;
	  private $ies;
	  private $unidade_setor;
	  private $estado;
	  private $cidade;
	  private $grau_titulacao_academica;
	  private $dependencia_administrativa;

	  public function __construct($id,$titulo,$autor_nome,$autor_sobrenome,$orientador,$ano_defesa,$numero_paginas,$programa_pos,$ies,$unidade_setor,$estado,$cidade,$grau_titulacao_academica,$dependencia_administrativa){
		self::setId($id);
		self::setTitulo($titulo);
		self::setAutor_nome($autor_nome);
		self::setAutor_sobrenome($autor_sobrenome);
		self::setOrientador($orientador);
		self::setAno_defesa($ano_defesa);
		self::setNumero_paginas($numero_paginas);
		self::setPrograma_pos($programa_pos);
		self::setIes($ies);
		self::setUnidade_setor($unidade_setor);
		self::setEstado($estado);
		self::setCidade($cidade);
		self::setGrau_titulacao_academica($grau_titulacao_academica);
		self::setDependencia_administrativa($dependencia_administrativa);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getTitulo(){
	    return $this->titulo;
	  }
	  
	  public function setTitulo($tTitulo){
	    $this->titulo = $tTitulo;
	  }
	  
	  public function getAutor_nome(){
	    return $this->autor_nome;
	  }
	  
	  public function setAutor_nome($tAutor_nome){
	    $this->autor_nome = $tAutor_nome;
	  }
	  
	  public function getAutor_sobrenome(){
	    return $this->autor_sobrenome;
	  }
	  
	  public function setAutor_sobrenome($tAutor_sobrenome){
	    $this->autor_sobrenome = $tAutor_sobrenome;
	  }
	  
	  public function getOrientador(){
	    return $this->orientador;
	  }
	  
	  public function setOrientador($tOrientador){
	    $this->orientador = $tOrientador;
	  }
	  
	  public function getAno_defesa(){
	    return $this->ano_defesa;
	  }
	  
	  public function setAno_defesa($tAno_defesa){
	    $this->ano_defesa = $tAno_defesa;
	  }
	  
	  public function getNumero_paginas(){
	    return $this->numero_paginas;
	  }
	  
	  public function setNumero_paginas($tNumero_paginas){
	    $this->numero_paginas = $tNumero_paginas;
	  }
	  
	  public function getPrograma_pos(){
	    return $this->programa_pos;
	  }
	  
	  public function setPrograma_pos($tPrograma_pos){
	    $this->programa_pos = $tPrograma_pos;
	  }
	  
	  public function getIes(){
	    return $this->ies;
	  }
	  
	  public function setIes($tIes){
	    $this->ies = $tIes;
	  }
	  
	  public function getUnidade_setor(){
	    return $this->unidade_setor;
	  }
	  
	  public function setUnidade_setor($tUnidade_setor){
	    $this->unidade_setor = $tUnidade_setor;
	  }
	  
	  public function getEstado(){
	    return $this->estado;
	  }
	  
	  public function setEstado($tEstado){
	    $this->estado = $tEstado;
	  }
	  
	  public function getCidade(){
	    return $this->cidade;
	  }
	  
	  public function setCidade($tCidade){
	    $this->cidade = $tCidade;
	  }
	  
	  public function getGrau_titulacao_academica(){
	    return $this->grau_titulacao_academica;
	  }
	  
	  public function setGrau_titulacao_academica($tGrau_titulacao_academica){
	    $this->grau_titulacao_academica = $tGrau_titulacao_academica;
	  }
	  
	  public function getDependencia_administrativa(){
	    return $this->dependencia_administrativa;
	  }
	  
	  public function setDependencia_administrativa($tDependencia_administrativa){
	    $this->dependencia_administrativa = $tDependencia_administrativa;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Titulo = ".self::getTitulo();
		$text.= "Autor_nome = ".self::getAutor_nome();
		$text.= "Autor_sobrenome = ".self::getAutor_sobrenome();
		$text.= "Orientador = ".self::getOrientador();
		$text.= "Ano_defesa = ".self::getAno_defesa();
		$text.= "Numero_paginas = ".self::getNumero_paginas();
		$text.= "Programa_pos = ".self::getPrograma_pos();
		$text.= "Ies = ".self::getIes();
		$text.= "Unidade_setor = ".self::getUnidade_setor();
		$text.= "Estado = ".self::getEstado();
		$text.= "Cidade = ".self::getCidade();
		$text.= "Grau_titulacao_academica = ".self::getGrau_titulacao_academica();
		$text.= "Dependencia_administrativa = ".self::getDependencia_administrativa();
	    
		return $text;
	  }
	
  }
  
?>