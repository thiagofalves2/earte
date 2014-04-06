<?php
  #class Detalhes_finais
  //portable at php5
  //pattern CamelCaps
  
  class Detalhes_finais{
	  
	  private $id;
	  private $observacoes;
	  private $palavras_chave;
	  private $url_trabalho;
	  private $url_resumo;
	  private $doc_classificado_por;
	  private $data_classificacao;

	  public function __construct($id,$observacoes,$palavras_chave,$url_trabalho,$url_resumo,$doc_classificado_por,$data_classificacao){
		self::setId($id);
		self::setObservacoes($observacoes);
		self::setPalavras_chave($palavras_chave);
		self::setUrl_trabalho($url_trabalho);
		self::setUrl_resumo($url_resumo);
		self::setDoc_classificado_por($doc_classificado_por);
		self::setData_classificacao($data_classificacao);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getObservacoes(){
	    return $this->observacoes;
	  }
	  
	  public function setObservacoes($tObservacoes){
	    $this->observacoes = $tObservacoes;
	  }
	  
	  public function getPalavras_chave(){
	    return $this->palavras_chave;
	  }
	  
	  public function setPalavras_chave($tPalavras_chave){
	    $this->palavras_chave = $tPalavras_chave;
	  }
	  
	  public function getUrl_trabalho(){
	    return $this->url_trabalho;
	  }
	  
	  public function setUrl_trabalho($tUrl_trabalho){
	    $this->url_trabalho = $tUrl_trabalho;
	  }
	  
	  public function getUrl_resumo(){
	    return $this->url_resumo;
	  }
	  
	  public function setUrl_resumo($tUrl_resumo){
	    $this->url_resumo = $tUrl_resumo;
	  }
	  
	  public function getDoc_classificado_por(){
	    return $this->doc_classificado_por;
	  }
	  
	  public function setDoc_classificado_por($tDoc_classificado_por){
	    $this->doc_classificado_por = $tDoc_classificado_por;
	  }
	  
	  public function getData_classificacao(){
	    return $this->data_classificacao;
	  }
	  
	  public function setData_classificacao($tData_classificacao){
	    $this->data_classificacao = $tData_classificacao;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Observacoes = ".self::getObservacoes();
		$text.= "Palavras_chave = ".self::getPalavras_chave();
		$text.= "Url_trabalho = ".self::getUrl_trabalho();
		$text.= "Url_resumo = ".self::getUrl_resumo();
		$text.= "Doc_classificado_por = ".self::getDoc_classificado_por();
		$text.= "Data_classificacao = ".self::getData_classificacao();
	    
		return $text;
	  }
	
  }
  
?>