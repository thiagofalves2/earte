<?php
  #class Area_curricular
  //portable at php5
  //pattern CamelCaps
  
  class Area_curricular{
	  
	  private $id;
	  private $arte;
	  private $ciencias_agrarias;
	  private $ciencias_geologicas;
	  private $comunicacao_jornalismo;
	  private $ecologia;
	  private $educacao_fisica;
	  private $fisica;
	  private $geral;
	  private $lingua_estrangeira;
	  private $matematica;
	  private $quimica;
	  private $sociologia;
	  private $biologia;
	  private $ciencias_computacao;
	  private $ciencias_naturais;
	  private $direito;
	  private $economia;
	  private $filosofia;
	  private $geografia;
	  private $historia;
	  private $lingua_portuguesa;
	  private $pedagogia;
	  private $saude;
	  private $turismo;
	  private $qarte;
	  private $qciencias_agrarias;
	  private $qciencias_geologicas;
	  private $qcomunicacao_jornalismo;
	  private $qecologia;
	  private $qeducacao_fisica;
	  private $qfisica;
	  private $qgeral;
	  private $qlingua_estrangeira;
	  private $qmatematica;
	  private $qquimica;
	  private $qsociologia;
	  private $qbiologia;
	  private $qciencias_computacao;
	  private $qciencias_naturais;
	  private $qdireito;
	  private $qeconomia;
	  private $qfilosofia;
	  private $qgeografia;
	  private $qhistoria;
	  private $qlingua_portuguesa;
	  private $qpedagogia;
	  private $qsaude;
	  private $qturismo;
	  private $qarea_curricular;
	  private $id_area_licenciatura;
	  private $id_outra_area;

	  public function __construct($id,$arte,$ciencias_agrarias,$ciencias_geologicas,$comunicacao_jornalismo,$ecologia,$educacao_fisica,$fisica,$geral,$lingua_estrangeira,$matematica,$quimica,$sociologia,$biologia,$ciencias_computacao,$ciencias_naturais,$direito,$economia,$filosofia,$geografia,$historia,$lingua_portuguesa,$pedagogia,$saude,$turismo,$qarte,$qciencias_agrarias,$qciencias_geologicas,$qcomunicacao_jornalismo,$qecologia,$qeducacao_fisica,$qfisica,$qgeral,$qlingua_estrangeira,$qmatematica,$qquimica,$qsociologia,$qbiologia,$qciencias_computacao,$qciencias_naturais,$qdireito,$qeconomia,$qfilosofia,$qgeografia,$qhistoria,$qlingua_portuguesa,$qpedagogia,$qsaude,$qturismo,$qarea_curricular,$id_area_licenciatura,$id_outra_area){
		self::setId($id);
		self::setArte($arte);
		self::setCiencias_agrarias($ciencias_agrarias);
		self::setCiencias_geologicas($ciencias_geologicas);
		self::setComunicacao_jornalismo($comunicacao_jornalismo);
		self::setEcologia($ecologia);
		self::setEducacao_fisica($educacao_fisica);
		self::setFisica($fisica);
		self::setGeral($geral);
		self::setLingua_estrangeira($lingua_estrangeira);
		self::setMatematica($matematica);
		self::setQuimica($quimica);
		self::setSociologia($sociologia);
		self::setBiologia($biologia);
		self::setCiencias_computacao($ciencias_computacao);
		self::setCiencias_naturais($ciencias_naturais);
		self::setDireito($direito);
		self::setEconomia($economia);
		self::setFilosofia($filosofia);
		self::setGeografia($geografia);
		self::setHistoria($historia);
		self::setLingua_portuguesa($lingua_portuguesa);
		self::setPedagogia($pedagogia);
		self::setSaude($saude);
		self::setTurismo($turismo);
		self::setQarte($qarte);
		self::setQciencias_agrarias($qciencias_agrarias);
		self::setQciencias_geologicas($qciencias_geologicas);
		self::setQcomunicacao_jornalismo($qcomunicacao_jornalismo);
		self::setQecologia($qecologia);
		self::setQeducacao_fisica($qeducacao_fisica);
		self::setQfisica($qfisica);
		self::setQgeral($qgeral);
		self::setQlingua_estrangeira($qlingua_estrangeira);
		self::setQmatematica($qmatematica);
		self::setQquimica($qquimica);
		self::setQsociologia($qsociologia);
		self::setQbiologia($qbiologia);
		self::setQciencias_computacao($qciencias_computacao);
		self::setQciencias_naturais($qciencias_naturais);
		self::setQdireito($qdireito);
		self::setQeconomia($qeconomia);
		self::setQfilosofia($qfilosofia);
		self::setQgeografia($qgeografia);
		self::setQhistoria($qhistoria);
		self::setQlingua_portuguesa($qlingua_portuguesa);
		self::setQpedagogia($qpedagogia);
		self::setQsaude($qsaude);
		self::setQturismo($qturismo);
		self::setQarea_curricular($qarea_curricular);
		self::setId_area_licenciatura($id_area_licenciatura);
		self::setId_outra_area($id_outra_area);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getArte(){
	    return $this->arte;
	  }
	  
	  public function setArte($tArte){
	    $this->arte = $tArte;
	  }
	  
	  public function getCiencias_agrarias(){
	    return $this->ciencias_agrarias;
	  }
	  
	  public function setCiencias_agrarias($tCiencias_agrarias){
	    $this->ciencias_agrarias = $tCiencias_agrarias;
	  }
	  
	  public function getCiencias_geologicas(){
	    return $this->ciencias_geologicas;
	  }
	  
	  public function setCiencias_geologicas($tCiencias_geologicas){
	    $this->ciencias_geologicas = $tCiencias_geologicas;
	  }
	  
	  public function getComunicacao_jornalismo(){
	    return $this->comunicacao_jornalismo;
	  }
	  
	  public function setComunicacao_jornalismo($tComunicacao_jornalismo){
	    $this->comunicacao_jornalismo = $tComunicacao_jornalismo;
	  }
	  
	  public function getEcologia(){
	    return $this->ecologia;
	  }
	  
	  public function setEcologia($tEcologia){
	    $this->ecologia = $tEcologia;
	  }
	  
	  public function getEducacao_fisica(){
	    return $this->educacao_fisica;
	  }
	  
	  public function setEducacao_fisica($tEducacao_fisica){
	    $this->educacao_fisica = $tEducacao_fisica;
	  }
	  
	  public function getFisica(){
	    return $this->fisica;
	  }
	  
	  public function setFisica($tFisica){
	    $this->fisica = $tFisica;
	  }
	  
	  public function getGeral(){
	    return $this->geral;
	  }
	  
	  public function setGeral($tGeral){
	    $this->geral = $tGeral;
	  }
	  
	  public function getLingua_estrangeira(){
	    return $this->lingua_estrangeira;
	  }
	  
	  public function setLingua_estrangeira($tLingua_estrangeira){
	    $this->lingua_estrangeira = $tLingua_estrangeira;
	  }
	  
	  public function getMatematica(){
	    return $this->matematica;
	  }
	  
	  public function setMatematica($tMatematica){
	    $this->matematica = $tMatematica;
	  }
	  
	  public function getQuimica(){
	    return $this->quimica;
	  }
	  
	  public function setQuimica($tQuimica){
	    $this->quimica = $tQuimica;
	  }
	  
	  public function getSociologia(){
	    return $this->sociologia;
	  }
	  
	  public function setSociologia($tSociologia){
	    $this->sociologia = $tSociologia;
	  }
	  
	  public function getBiologia(){
	    return $this->biologia;
	  }
	  
	  public function setBiologia($tBiologia){
	    $this->biologia = $tBiologia;
	  }
	  
	  public function getCiencias_computacao(){
	    return $this->ciencias_computacao;
	  }
	  
	  public function setCiencias_computacao($tCiencias_computacao){
	    $this->ciencias_computacao = $tCiencias_computacao;
	  }
	  
	  public function getCiencias_naturais(){
	    return $this->ciencias_naturais;
	  }
	  
	  public function setCiencias_naturais($tCiencias_naturais){
	    $this->ciencias_naturais = $tCiencias_naturais;
	  }
	  
	  public function getDireito(){
	    return $this->direito;
	  }
	  
	  public function setDireito($tDireito){
	    $this->direito = $tDireito;
	  }
	  
	  public function getEconomia(){
	    return $this->economia;
	  }
	  
	  public function setEconomia($tEconomia){
	    $this->economia = $tEconomia;
	  }
	  
	  public function getFilosofia(){
	    return $this->filosofia;
	  }
	  
	  public function setFilosofia($tFilosofia){
	    $this->filosofia = $tFilosofia;
	  }
	  
	  public function getGeografia(){
	    return $this->geografia;
	  }
	  
	  public function setGeografia($tGeografia){
	    $this->geografia = $tGeografia;
	  }
	  
	  public function getHistoria(){
	    return $this->historia;
	  }
	  
	  public function setHistoria($tHistoria){
	    $this->historia = $tHistoria;
	  }
	  
	  public function getLingua_portuguesa(){
	    return $this->lingua_portuguesa;
	  }
	  
	  public function setLingua_portuguesa($tLingua_portuguesa){
	    $this->lingua_portuguesa = $tLingua_portuguesa;
	  }
	  
	  public function getPedagogia(){
	    return $this->pedagogia;
	  }
	  
	  public function setPedagogia($tPedagogia){
	    $this->pedagogia = $tPedagogia;
	  }
	  
	  public function getSaude(){
	    return $this->saude;
	  }
	  
	  public function setSaude($tSaude){
	    $this->saude = $tSaude;
	  }
	  
	  public function getTurismo(){
	    return $this->turismo;
	  }
	  
	  public function setTurismo($tTurismo){
	    $this->turismo = $tTurismo;
	  }
	  
	  public function getQarte(){
	    return $this->qarte;
	  }
	  
	  public function setQarte($tQarte){
	    $this->qarte = $tQarte;
	  }
	  
	  public function getQciencias_agrarias(){
	    return $this->qciencias_agrarias;
	  }
	  
	  public function setQciencias_agrarias($tQciencias_agrarias){
	    $this->qciencias_agrarias = $tQciencias_agrarias;
	  }
	  
	  public function getQciencias_geologicas(){
	    return $this->qciencias_geologicas;
	  }
	  
	  public function setQciencias_geologicas($tQciencias_geologicas){
	    $this->qciencias_geologicas = $tQciencias_geologicas;
	  }
	  
	  public function getQcomunicacao_jornalismo(){
	    return $this->qcomunicacao_jornalismo;
	  }
	  
	  public function setQcomunicacao_jornalismo($tQcomunicacao_jornalismo){
	    $this->qcomunicacao_jornalismo = $tQcomunicacao_jornalismo;
	  }
	  
	  public function getQecologia(){
	    return $this->qecologia;
	  }
	  
	  public function setQecologia($tQecologia){
	    $this->qecologia = $tQecologia;
	  }
	  
	  public function getQeducacao_fisica(){
	    return $this->qeducacao_fisica;
	  }
	  
	  public function setQeducacao_fisica($tQeducacao_fisica){
	    $this->qeducacao_fisica = $tQeducacao_fisica;
	  }
	  
	  public function getQfisica(){
	    return $this->qfisica;
	  }
	  
	  public function setQfisica($tQfisica){
	    $this->qfisica = $tQfisica;
	  }
	  
	  public function getQgeral(){
	    return $this->qgeral;
	  }
	  
	  public function setQgeral($tQgeral){
	    $this->qgeral = $tQgeral;
	  }
	  
	  public function getQlingua_estrangeira(){
	    return $this->qlingua_estrangeira;
	  }
	  
	  public function setQlingua_estrangeira($tQlingua_estrangeira){
	    $this->qlingua_estrangeira = $tQlingua_estrangeira;
	  }
	  
	  public function getQmatematica(){
	    return $this->qmatematica;
	  }
	  
	  public function setQmatematica($tQmatematica){
	    $this->qmatematica = $tQmatematica;
	  }
	  
	  public function getQquimica(){
	    return $this->qquimica;
	  }
	  
	  public function setQquimica($tQquimica){
	    $this->qquimica = $tQquimica;
	  }
	  
	  public function getQsociologia(){
	    return $this->qsociologia;
	  }
	  
	  public function setQsociologia($tQsociologia){
	    $this->qsociologia = $tQsociologia;
	  }
	  
	  public function getQbiologia(){
	    return $this->qbiologia;
	  }
	  
	  public function setQbiologia($tQbiologia){
	    $this->qbiologia = $tQbiologia;
	  }
	  
	  public function getQciencias_computacao(){
	    return $this->qciencias_computacao;
	  }
	  
	  public function setQciencias_computacao($tQciencias_computacao){
	    $this->qciencias_computacao = $tQciencias_computacao;
	  }
	  
	  public function getQciencias_naturais(){
	    return $this->qciencias_naturais;
	  }
	  
	  public function setQciencias_naturais($tQciencias_naturais){
	    $this->qciencias_naturais = $tQciencias_naturais;
	  }
	  
	  public function getQdireito(){
	    return $this->qdireito;
	  }
	  
	  public function setQdireito($tQdireito){
	    $this->qdireito = $tQdireito;
	  }
	  
	  public function getQeconomia(){
	    return $this->qeconomia;
	  }
	  
	  public function setQeconomia($tQeconomia){
	    $this->qeconomia = $tQeconomia;
	  }
	  
	  public function getQfilosofia(){
	    return $this->qfilosofia;
	  }
	  
	  public function setQfilosofia($tQfilosofia){
	    $this->qfilosofia = $tQfilosofia;
	  }
	  
	  public function getQgeografia(){
	    return $this->qgeografia;
	  }
	  
	  public function setQgeografia($tQgeografia){
	    $this->qgeografia = $tQgeografia;
	  }
	  
	  public function getQhistoria(){
	    return $this->qhistoria;
	  }
	  
	  public function setQhistoria($tQhistoria){
	    $this->qhistoria = $tQhistoria;
	  }
	  
	  public function getQlingua_portuguesa(){
	    return $this->qlingua_portuguesa;
	  }
	  
	  public function setQlingua_portuguesa($tQlingua_portuguesa){
	    $this->qlingua_portuguesa = $tQlingua_portuguesa;
	  }
	  
	  public function getQpedagogia(){
	    return $this->qpedagogia;
	  }
	  
	  public function setQpedagogia($tQpedagogia){
	    $this->qpedagogia = $tQpedagogia;
	  }
	  
	  public function getQsaude(){
	    return $this->qsaude;
	  }
	  
	  public function setQsaude($tQsaude){
	    $this->qsaude = $tQsaude;
	  }
	  
	  public function getQturismo(){
	    return $this->qturismo;
	  }
	  
	  public function setQturismo($tQturismo){
	    $this->qturismo = $tQturismo;
	  }
	  
	  public function getQarea_curricular(){
	    return $this->qarea_curricular;
	  }
	  
	  public function setQarea_curricular($tQarea_curricular){
	    $this->qarea_curricular = $tQarea_curricular;
	  }
	  
	  public function getId_area_licenciatura(){
	    return $this->id_area_licenciatura;
	  }
	  
	  public function setId_area_licenciatura($tId_area_licenciatura){
	    $this->id_area_licenciatura = $tId_area_licenciatura;
	  }
	  
	  public function getId_outra_area(){
	    return $this->id_outra_area;
	  }
	  
	  public function setId_outra_area($tId_outra_area){
	    $this->id_outra_area = $tId_outra_area;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Arte = ".self::getArte();
		$text.= "Ciencias_agrarias = ".self::getCiencias_agrarias();
		$text.= "Ciencias_geologicas = ".self::getCiencias_geologicas();
		$text.= "Comunicacao_jornalismo = ".self::getComunicacao_jornalismo();
		$text.= "Ecologia = ".self::getEcologia();
		$text.= "Educacao_fisica = ".self::getEducacao_fisica();
		$text.= "Fisica = ".self::getFisica();
		$text.= "Geral = ".self::getGeral();
		$text.= "Lingua_estrangeira = ".self::getLingua_estrangeira();
		$text.= "Matematica = ".self::getMatematica();
		$text.= "Quimica = ".self::getQuimica();
		$text.= "Sociologia = ".self::getSociologia();
		$text.= "Biologia = ".self::getBiologia();
		$text.= "Ciencias_computacao = ".self::getCiencias_computacao();
		$text.= "Ciencias_naturais = ".self::getCiencias_naturais();
		$text.= "Direito = ".self::getDireito();
		$text.= "Economia = ".self::getEconomia();
		$text.= "Filosofia = ".self::getFilosofia();
		$text.= "Geografia = ".self::getGeografia();
		$text.= "Historia = ".self::getHistoria();
		$text.= "Lingua_portuguesa = ".self::getLingua_portuguesa();
		$text.= "Pedagogia = ".self::getPedagogia();
		$text.= "Saude = ".self::getSaude();
		$text.= "Turismo = ".self::getTurismo();
		$text.= "Qarte = ".self::getQarte();
		$text.= "Qciencias_agrarias = ".self::getQciencias_agrarias();
		$text.= "Qciencias_geologicas = ".self::getQciencias_geologicas();
		$text.= "Qcomunicacao_jornalismo = ".self::getQcomunicacao_jornalismo();
		$text.= "Qecologia = ".self::getQecologia();
		$text.= "Qeducacao_fisica = ".self::getQeducacao_fisica();
		$text.= "Qfisica = ".self::getQfisica();
		$text.= "Qgeral = ".self::getQgeral();
		$text.= "Qlingua_estrangeira = ".self::getQlingua_estrangeira();
		$text.= "Qmatematica = ".self::getQmatematica();
		$text.= "Qquimica = ".self::getQquimica();
		$text.= "Qsociologia = ".self::getQsociologia();
		$text.= "Qbiologia = ".self::getQbiologia();
		$text.= "Qciencias_computacao = ".self::getQciencias_computacao();
		$text.= "Qciencias_naturais = ".self::getQciencias_naturais();
		$text.= "Qdireito = ".self::getQdireito();
		$text.= "Qeconomia = ".self::getQeconomia();
		$text.= "Qfilosofia = ".self::getQfilosofia();
		$text.= "Qgeografia = ".self::getQgeografia();
		$text.= "Qhistoria = ".self::getQhistoria();
		$text.= "Qlingua_portuguesa = ".self::getQlingua_portuguesa();
		$text.= "Qpedagogia = ".self::getQpedagogia();
		$text.= "Qsaude = ".self::getQsaude();
		$text.= "Qturismo = ".self::getQturismo();
		$text.= "Qarea_curricular = ".self::getQarea_curricular();
		$text.= "Id_area_licenciatura = ".self::getId_area_licenciatura();
		$text.= "Id_outra_area = ".self::getId_outra_area();
	    
		return $text;
	  }
	
  }
  
?>