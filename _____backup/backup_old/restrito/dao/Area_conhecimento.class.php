<?php
  #class Area_conhecimento
  //portable at php5
  //pattern CamelCaps
  
  class Area_conhecimento{
	  
	  private $id;
	  private $agronomia;
	  private $arquitetura_urbanismo;
	  private $biologia_geral;
	  private $direito;
	  private $educacao;
	  private $filosofia;
	  private $geociencias;
	  private $historia;
	  private $matematica;
	  private $quimica;
	  private $saude_coletiva;
	  private $turismo;
	  private $antropologia;
	  private $arte;
	  private $comunicacao_jornalismo;
	  private $ecologia;
	  private $engenharia_sanitaria;
	  private $fisica;
	  private $geografia;
	  private $letras;
	  private $psicologia;
	  private $rec_florestais_eng_florestal;
	  private $sociologia;
	  private $administracao;
	  private $administracao_rural;
	  private $astronomia;
	  private $biomedicina;
	  private $botanica;
	  private $carreira_religiosa;
	  private $ciencia_informacao;
	  private $ciencia_politica;
	  private $ciencias_atuariais;
	  private $comunicacao;
	  private $demografia;
	  private $desenho_projetos;
	  private $diplomacia;
	  private $economia_domestica;
	  private $enfermagem;
	  private $engenharia_agricola;
	  private $engenharia_cartografica;
	  private $engenharia_agrimensura;
	  private $engenharia_materiais_metalurgica;
	  private $engenharia_producao;
	  private $engenharia_eletrica;
	  private $engenharia_naval_oceanica;
	  private $engenharia_quimica;
	  private $estudos_sociais;
	  private $farmacologia;
	  private $fisioterapia_terapia_ocupacional;
	  private $genetica;
	  private $imunologia;
	  private $medicina;
	  private $microbiologia;
	  private $museologia;
	  private $oceanografia;
	  private $parasitologia;
	  private $probabilidade_estatistica;
	  private $recursos_pesqueiros_engenharia_pesca;
	  private $relacoes_publicas;
	  private $servico_social;
	  private $zoologia;
	  private $administracao_hospitalar;
	  private $arqueologia;
	  private $biofisica;
	  private $bioquimica;
	  private $carreira_militar;
	  private $ciencia_computacao;
	  private $ciencia_tecnologia_alimentos;
	  private $ciencias;
	  private $ciencias_sociais;
	  private $decoracao;
	  private $desenho_moda;
	  private $desenho_industrial;
	  private $economia;
	  private $educacao_fisica;
	  private $engenharia_aeroespacial;
	  private $engenharia_biomedica;
	  private $engenharia_civil;
	  private $engenharia_armamentos;
	  private $engenharia_minas;
	  private $engenharia_transportes;
	  private $engenharia_mecatronica;
	  private $engenharia_nuclear;
	  private $engenharia_textil;
	  private $farmacia;
	  private $fisiologia;
	  private $fonoaudiologia;
	  private $historia_natural;
	  private $linguistica;
	  private $medicina_veterinaria;
	  private $morfologia;
	  private $nutricao;
	  private $odontologia;
	  private $planejamento_urbano_regional;
	  private $quimica_industrial;
	  private $relacoes_internacionais;
	  private $secretariado_executiva;
	  private $teologia;
	  private $zootecnia;
	  private $qagronomia;
	  private $qarquitetura_urbanismo;
	  private $qbiologia_geral;
	  private $qdireito;
	  private $qeducacao;
	  private $qfilosofia;
	  private $qgeociencias;
	  private $qhistoria;
	  private $qmatematica;
	  private $qquimica;
	  private $qsaude_coletiva;
	  private $qturismo;
	  private $qantropologia;
	  private $qarte;
	  private $qcomunicacao_jornalismo;
	  private $qecologia;
	  private $qengenharia_sanitaria;
	  private $qfisica;
	  private $qgeografia;
	  private $qletras;
	  private $qpsicologia;
	  private $qrec_florestais_eng_florestal;
	  private $qsociologia;
	  private $qadministracao;
	  private $qadministracao_rural;
	  private $qastronomia;
	  private $qbiomedicina;
	  private $qbotanica;
	  private $qcarreira_religiosa;
	  private $qciencia_informacao;
	  private $qciencia_politica;
	  private $qciencias_atuariais;
	  private $qcomunicacao;
	  private $qdemografia;
	  private $qdesenho_projetos;
	  private $qdiplomacia;
	  private $qeconomia_domestica;
	  private $qenfermagem;
	  private $qengenharia_agricola;
	  private $qengenharia_cartografica;
	  private $qengenharia_agrimensura;
	  private $qengenharia_materiais_metalurgica;
	  private $qengenharia_producao;
	  private $qengenharia_eletrica;
	  private $qengenharia_naval_oceanica;
	  private $qengenharia_quimica;
	  private $qestudos_sociais;
	  private $qfarmacologia;
	  private $qfisioterapia_terapia_ocupacional;
	  private $qgenetica;
	  private $qimunologia;
	  private $qmedicina;
	  private $qmicrobiologia;
	  private $qmuseologia;
	  private $qoceanografia;
	  private $qparasitologia;
	  private $qprobabilidade_estatistica;
	  private $qrecursos_pesqueiros_engenharia_pesca;
	  private $qrelacoes_publicas;
	  private $qservico_social;
	  private $qzoologia;
	  private $qadministracao_hospitalar;
	  private $qarqueologia;
	  private $qbiofisica;
	  private $qbioquimica;
	  private $qcarreira_militar;
	  private $qciencia_computacao;
	  private $qciencia_tecnologia_alimentos;
	  private $qciencias;
	  private $qciencias_sociais;
	  private $qdecoracao;
	  private $qdesenho_moda;
	  private $qdesenho_industrial;
	  private $qeconomia;
	  private $qeducacao_fisica;
	  private $qengenharia_aeroespacial;
	  private $qengenharia_biomedica;
	  private $qengenharia_civil;
	  private $qengenharia_armamentos;
	  private $qengenharia_minas;
	  private $qengenharia_transportes;
	  private $qengenharia_mecatronica;
	  private $qengenharia_nuclear;
	  private $qengenharia_textil;
	  private $qfarmacia;
	  private $qfisiologia;
	  private $qfonoaudiologia;
	  private $qhistoria_natural;
	  private $qlinguistica;
	  private $qmedicina_veterinaria;
	  private $qmorfologia;
	  private $qnutricao;
	  private $qodontologia;
	  private $qplanejamento_urbano_regional;
	  private $qquimica_industrial;
	  private $qrelacoes_internacionais;
	  private $qsecretariado_executiva;
	  private $qteologia;
	  private $qzootecnia;
	  private $qarea_conhecimento;

	  public function __construct($id,$agronomia,$arquitetura_urbanismo,$biologia_geral,$direito,$educacao,$filosofia,$geociencias,$historia,$matematica,$quimica,$saude_coletiva,$turismo,$antropologia,$arte,$comunicacao_jornalismo,$ecologia,$engenharia_sanitaria,$fisica,$geografia,$letras,$psicologia,$rec_florestais_eng_florestal,$sociologia,$administracao,$administracao_rural,$astronomia,$biomedicina,$botanica,$carreira_religiosa,$ciencia_informacao,$ciencia_politica,$ciencias_atuariais,$comunicacao,$demografia,$desenho_projetos,$diplomacia,$economia_domestica,$enfermagem,$engenharia_agricola,$engenharia_cartografica,$engenharia_agrimensura,$engenharia_materiais_metalurgica,$engenharia_producao,$engenharia_eletrica,$engenharia_naval_oceanica,$engenharia_quimica,$estudos_sociais,$farmacologia,$fisioterapia_terapia_ocupacional,$genetica,$imunologia,$medicina,$microbiologia,$museologia,$oceanografia,$parasitologia,$probabilidade_estatistica,$recursos_pesqueiros_engenharia_pesca,$relacoes_publicas,$servico_social,$zoologia,$administracao_hospitalar,$arqueologia,$biofisica,$bioquimica,$carreira_militar,$ciencia_computacao,$ciencia_tecnologia_alimentos,$ciencias,$ciencias_sociais,$decoracao,$desenho_moda,$desenho_industrial,$economia,$educacao_fisica,$engenharia_aeroespacial,$engenharia_biomedica,$engenharia_civil,$engenharia_armamentos,$engenharia_minas,$engenharia_transportes,$engenharia_mecatronica,$engenharia_nuclear,$engenharia_textil,$farmacia,$fisiologia,$fonoaudiologia,$historia_natural,$linguistica,$medicina_veterinaria,$morfologia,$nutricao,$odontologia,$planejamento_urbano_regional,$quimica_industrial,$relacoes_internacionais,$secretariado_executiva,$teologia,$zootecnia,$qagronomia,$qarquitetura_urbanismo,$qbiologia_geral,$qdireito,$qeducacao,$qfilosofia,$qgeociencias,$qhistoria,$qmatematica,$qquimica,$qsaude_coletiva,$qturismo,$qantropologia,$qarte,$qcomunicacao_jornalismo,$qecologia,$qengenharia_sanitaria,$qfisica,$qgeografia,$qletras,$qpsicologia,$qrec_florestais_eng_florestal,$qsociologia,$qadministracao,$qadministracao_rural,$qastronomia,$qbiomedicina,$qbotanica,$qcarreira_religiosa,$qciencia_informacao,$qciencia_politica,$qciencias_atuariais,$qcomunicacao,$qdemografia,$qdesenho_projetos,$qdiplomacia,$qeconomia_domestica,$qenfermagem,$qengenharia_agricola,$qengenharia_cartografica,$qengenharia_agrimensura,$qengenharia_materiais_metalurgica,$qengenharia_producao,$qengenharia_eletrica,$qengenharia_naval_oceanica,$qengenharia_quimica,$qestudos_sociais,$qfarmacologia,$qfisioterapia_terapia_ocupacional,$qgenetica,$qimunologia,$qmedicina,$qmicrobiologia,$qmuseologia,$qoceanografia,$qparasitologia,$qprobabilidade_estatistica,$qrecursos_pesqueiros_engenharia_pesca,$qrelacoes_publicas,$qservico_social,$qzoologia,$qadministracao_hospitalar,$qarqueologia,$qbiofisica,$qbioquimica,$qcarreira_militar,$qciencia_computacao,$qciencia_tecnologia_alimentos,$qciencias,$qciencias_sociais,$qdecoracao,$qdesenho_moda,$qdesenho_industrial,$qeconomia,$qeducacao_fisica,$qengenharia_aeroespacial,$qengenharia_biomedica,$qengenharia_civil,$qengenharia_armamentos,$qengenharia_minas,$qengenharia_transportes,$qengenharia_mecatronica,$qengenharia_nuclear,$qengenharia_textil,$qfarmacia,$qfisiologia,$qfonoaudiologia,$qhistoria_natural,$qlinguistica,$qmedicina_veterinaria,$qmorfologia,$qnutricao,$qodontologia,$qplanejamento_urbano_regional,$qquimica_industrial,$qrelacoes_internacionais,$qsecretariado_executiva,$qteologia,$qzootecnia,$qarea_conhecimento){
		self::setId($id);
		self::setAgronomia($agronomia);
		self::setArquitetura_urbanismo($arquitetura_urbanismo);
		self::setBiologia_geral($biologia_geral);
		self::setDireito($direito);
		self::setEducacao($educacao);
		self::setFilosofia($filosofia);
		self::setGeociencias($geociencias);
		self::setHistoria($historia);
		self::setMatematica($matematica);
		self::setQuimica($quimica);
		self::setSaude_coletiva($saude_coletiva);
		self::setTurismo($turismo);
		self::setAntropologia($antropologia);
		self::setArte($arte);
		self::setComunicacao_jornalismo($comunicacao_jornalismo);
		self::setEcologia($ecologia);
		self::setEngenharia_sanitaria($engenharia_sanitaria);
		self::setFisica($fisica);
		self::setGeografia($geografia);
		self::setLetras($letras);
		self::setPsicologia($psicologia);
		self::setRec_florestais_eng_florestal($rec_florestais_eng_florestal);
		self::setSociologia($sociologia);
		self::setAdministracao($administracao);
		self::setAdministracao_rural($administracao_rural);
		self::setAstronomia($astronomia);
		self::setBiomedicina($biomedicina);
		self::setBotanica($botanica);
		self::setCarreira_religiosa($carreira_religiosa);
		self::setCiencia_informacao($ciencia_informacao);
		self::setCiencia_politica($ciencia_politica);
		self::setCiencias_atuariais($ciencias_atuariais);
		self::setComunicacao($comunicacao);
		self::setDemografia($demografia);
		self::setDesenho_projetos($desenho_projetos);
		self::setDiplomacia($diplomacia);
		self::setEconomia_domestica($economia_domestica);
		self::setEnfermagem($enfermagem);
		self::setEngenharia_agricola($engenharia_agricola);
		self::setEngenharia_cartografica($engenharia_cartografica);
		self::setEngenharia_agrimensura($engenharia_agrimensura);
		self::setEngenharia_materiais_metalurgica($engenharia_materiais_metalurgica);
		self::setEngenharia_producao($engenharia_producao);
		self::setEngenharia_eletrica($engenharia_eletrica);
		self::setEngenharia_naval_oceanica($engenharia_naval_oceanica);
		self::setEngenharia_quimica($engenharia_quimica);
		self::setEstudos_sociais($estudos_sociais);
		self::setFarmacologia($farmacologia);
		self::setFisioterapia_terapia_ocupacional($fisioterapia_terapia_ocupacional);
		self::setGenetica($genetica);
		self::setImunologia($imunologia);
		self::setMedicina($medicina);
		self::setMicrobiologia($microbiologia);
		self::setMuseologia($museologia);
		self::setOceanografia($oceanografia);
		self::setParasitologia($parasitologia);
		self::setProbabilidade_estatistica($probabilidade_estatistica);
		self::setRecursos_pesqueiros_engenharia_pesca($recursos_pesqueiros_engenharia_pesca);
		self::setRelacoes_publicas($relacoes_publicas);
		self::setServico_social($servico_social);
		self::setZoologia($zoologia);
		self::setAdministracao_hospitalar($administracao_hospitalar);
		self::setArqueologia($arqueologia);
		self::setBiofisica($biofisica);
		self::setBioquimica($bioquimica);
		self::setCarreira_militar($carreira_militar);
		self::setCiencia_computacao($ciencia_computacao);
		self::setCiencia_tecnologia_alimentos($ciencia_tecnologia_alimentos);
		self::setCiencias($ciencias);
		self::setCiencias_sociais($ciencias_sociais);
		self::setDecoracao($decoracao);
		self::setDesenho_moda($desenho_moda);
		self::setDesenho_industrial($desenho_industrial);
		self::setEconomia($economia);
		self::setEducacao_fisica($educacao_fisica);
		self::setEngenharia_aeroespacial($engenharia_aeroespacial);
		self::setEngenharia_biomedica($engenharia_biomedica);
		self::setEngenharia_civil($engenharia_civil);
		self::setEngenharia_armamentos($engenharia_armamentos);
		self::setEngenharia_minas($engenharia_minas);
		self::setEngenharia_transportes($engenharia_transportes);
		self::setEngenharia_mecatronica($engenharia_mecatronica);
		self::setEngenharia_nuclear($engenharia_nuclear);
		self::setEngenharia_textil($engenharia_textil);
		self::setFarmacia($farmacia);
		self::setFisiologia($fisiologia);
		self::setFonoaudiologia($fonoaudiologia);
		self::setHistoria_natural($historia_natural);
		self::setLinguistica($linguistica);
		self::setMedicina_veterinaria($medicina_veterinaria);
		self::setMorfologia($morfologia);
		self::setNutricao($nutricao);
		self::setOdontologia($odontologia);
		self::setPlanejamento_urbano_regional($planejamento_urbano_regional);
		self::setQuimica_industrial($quimica_industrial);
		self::setRelacoes_internacionais($relacoes_internacionais);
		self::setSecretariado_executiva($secretariado_executiva);
		self::setTeologia($teologia);
		self::setZootecnia($zootecnia);
		self::setQagronomia($qagronomia);
		self::setQarquitetura_urbanismo($qarquitetura_urbanismo);
		self::setQbiologia_geral($qbiologia_geral);
		self::setQdireito($qdireito);
		self::setQeducacao($qeducacao);
		self::setQfilosofia($qfilosofia);
		self::setQgeociencias($qgeociencias);
		self::setQhistoria($qhistoria);
		self::setQmatematica($qmatematica);
		self::setQquimica($qquimica);
		self::setQsaude_coletiva($qsaude_coletiva);
		self::setQturismo($qturismo);
		self::setQantropologia($qantropologia);
		self::setQarte($qarte);
		self::setQcomunicacao_jornalismo($qcomunicacao_jornalismo);
		self::setQecologia($qecologia);
		self::setQengenharia_sanitaria($qengenharia_sanitaria);
		self::setQfisica($qfisica);
		self::setQgeografia($qgeografia);
		self::setQletras($qletras);
		self::setQpsicologia($qpsicologia);
		self::setQrec_florestais_eng_florestal($qrec_florestais_eng_florestal);
		self::setQsociologia($qsociologia);
		self::setQadministracao($qadministracao);
		self::setQadministracao_rural($qadministracao_rural);
		self::setQastronomia($qastronomia);
		self::setQbiomedicina($qbiomedicina);
		self::setQbotanica($qbotanica);
		self::setQcarreira_religiosa($qcarreira_religiosa);
		self::setQciencia_informacao($qciencia_informacao);
		self::setQciencia_politica($qciencia_politica);
		self::setQciencias_atuariais($qciencias_atuariais);
		self::setQcomunicacao($qcomunicacao);
		self::setQdemografia($qdemografia);
		self::setQdesenho_projetos($qdesenho_projetos);
		self::setQdiplomacia($qdiplomacia);
		self::setQeconomia_domestica($qeconomia_domestica);
		self::setQenfermagem($qenfermagem);
		self::setQengenharia_agricola($qengenharia_agricola);
		self::setQengenharia_cartografica($qengenharia_cartografica);
		self::setQengenharia_agrimensura($qengenharia_agrimensura);
		self::setQengenharia_materiais_metalurgica($qengenharia_materiais_metalurgica);
		self::setQengenharia_producao($qengenharia_producao);
		self::setQengenharia_eletrica($qengenharia_eletrica);
		self::setQengenharia_naval_oceanica($qengenharia_naval_oceanica);
		self::setQengenharia_quimica($qengenharia_quimica);
		self::setQestudos_sociais($qestudos_sociais);
		self::setQfarmacologia($qfarmacologia);
		self::setQfisioterapia_terapia_ocupacional($qfisioterapia_terapia_ocupacional);
		self::setQgenetica($qgenetica);
		self::setQimunologia($qimunologia);
		self::setQmedicina($qmedicina);
		self::setQmicrobiologia($qmicrobiologia);
		self::setQmuseologia($qmuseologia);
		self::setQoceanografia($qoceanografia);
		self::setQparasitologia($qparasitologia);
		self::setQprobabilidade_estatistica($qprobabilidade_estatistica);
		self::setQrecursos_pesqueiros_engenharia_pesca($qrecursos_pesqueiros_engenharia_pesca);
		self::setQRelacoes_publicas($qrelacoes_publicas);
		self::setQservico_social($qservico_social);
		self::setQzoologia($qzoologia);
		self::setQadministracao_hospitalar($qadministracao_hospitalar);
		self::setQarqueologia($qarqueologia);
		self::setQbiofisica($qbiofisica);
		self::setQbioquimica($qbioquimica);
		self::setQcarreira_militar($qcarreira_militar);
		self::setQciencia_computacao($qciencia_computacao);
		self::setQciencia_tecnologia_alimentos($qciencia_tecnologia_alimentos);
		self::setQciencias($qciencias);
		self::setQciencias_sociais($qciencias_sociais);
		self::setQdecoracao($qdecoracao);
		self::setQdesenho_moda($qdesenho_moda);
		self::setQdesenho_industrial($qdesenho_industrial);
		self::setQeconomia($qeconomia);
		self::setQeducacao_fisica($qeducacao_fisica);
		self::setQengenharia_aeroespacial($qengenharia_aeroespacial);
		self::setQengenharia_biomedica($qengenharia_biomedica);
		self::setQengenharia_civil($qengenharia_civil);
		self::setQengenharia_armamentos($qengenharia_armamentos);
		self::setQengenharia_minas($qengenharia_minas);
		self::setQengenharia_transportes($qengenharia_transportes);
		self::setQengenharia_mecatronica($qengenharia_mecatronica);
		self::setQengenharia_nuclear($qengenharia_nuclear);
		self::setQengenharia_textil($qengenharia_textil);
		self::setQfarmacia($qfarmacia);
		self::setQfisiologia($qfisiologia);
		self::setQfonoaudiologia($qfonoaudiologia);
		self::setQhistoria_natural($qhistoria_natural);
		self::setQlinguistica($qlinguistica);
		self::setQmedicina_veterinaria($qmedicina_veterinaria);
		self::setQmorfologia($qmorfologia);
		self::setQnutricao($qnutricao);
		self::setQodontologia($qodontologia);
		self::setQplanejamento_urbano_regional($qplanejamento_urbano_regional);
		self::setQquimica_industrial($qquimica_industrial);
		self::setQrelacoes_internacionais($qrelacoes_internacionais);
		self::setQsecretariado_executiva($qsecretariado_executiva);
		self::setQteologia($qteologia);
		self::setQzootecnia($qzootecnia);
		self::setQarea_conhecimento($qarea_conhecimento);
	  }
	  
	  //Setters e Getters
	  public function getId(){
	    return $this->id;
	  }
	  
	  public function setId($tId){
	    $this->id = $tId;
	  }
	  
	  public function getAgronomia(){
	    return $this->agronomia;
	  }
	  
	  public function setAgronomia($tAgronomia){
	    $this->agronomia = $tAgronomia;
	  }
	  
	  public function getArquitetura_urbanismo(){
	    return $this->arquitetura_urbanismo;
	  }
	  
	  public function setArquitetura_urbanismo($tArquitetura_urbanismo){
	    $this->arquitetura_urbanismo = $tArquitetura_urbanismo;
	  }
	  
	  public function getBiologia_geral(){
	    return $this->biologia_geral;
	  }
	  
	  public function setBiologia_geral($tBiologia_geral){
	    $this->biologia_geral = $tBiologia_geral;
	  }
	  
	  public function getDireito(){
	    return $this->direito;
	  }
	  
	  public function setDireito($tDireito){
	    $this->direito = $tDireito;
	  }
	  
	  public function getEducacao(){
	    return $this->educacao;
	  }
	  
	  public function setEducacao($tEducacao){
	    $this->educacao = $tEducacao;
	  }
	  
	  public function getFilosofia(){
	    return $this->filosofia;
	  }
	  
	  public function setFilosofia($tFilosofia){
	    $this->filosofia = $tFilosofia;
	  }
	  
	  public function getGeociencias(){
	    return $this->geociencias;
	  }
	  
	  public function setGeociencias($tGeociencias){
	    $this->geociencias = $tGeociencias;
	  }
	  
	  public function getHistoria(){
	    return $this->historia;
	  }
	  
	  public function setHistoria($tHistoria){
	    $this->historia = $tHistoria;
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
	  
	  public function getSaude_coletiva(){
	    return $this->saude_coletiva;
	  }
	  
	  public function setSaude_coletiva($tSaude_coletiva){
	    $this->saude_coletiva = $tSaude_coletiva;
	  }
	  
	  public function getTurismo(){
	    return $this->turismo;
	  }
	  
	  public function setTurismo($tTurismo){
	    $this->turismo = $tTurismo;
	  }
	  
	  public function getAntropologia(){
	    return $this->antropologia;
	  }
	  
	  public function setAntropologia($tAntropologia){
	    $this->antropologia = $tAntropologia;
	  }
	  
	  public function getArte(){
	    return $this->arte;
	  }
	  
	  public function setArte($tArte){
	    $this->arte = $tArte;
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
	  
	  public function getEngenharia_sanitaria(){
	    return $this->engenharia_sanitaria;
	  }
	  
	  public function setEngenharia_sanitaria($tEngenharia_sanitaria){
	    $this->engenharia_sanitaria = $tEngenharia_sanitaria;
	  }
	  
	  public function getFisica(){
	    return $this->fisica;
	  }
	  
	  public function setFisica($tFisica){
	    $this->fisica = $tFisica;
	  }
	  
	  public function getGeografia(){
	    return $this->geografia;
	  }
	  
	  public function setGeografia($tGeografia){
	    $this->geografia = $tGeografia;
	  }
	  
	  public function getLetras(){
	    return $this->letras;
	  }
	  
	  public function setLetras($tLetras){
	    $this->letras = $tLetras;
	  }
	  
	  public function getPsicologia(){
	    return $this->psicologia;
	  }
	  
	  public function setPsicologia($tPsicologia){
	    $this->psicologia = $tPsicologia;
	  }
	  
	  public function getRec_florestais_eng_florestal(){
	    return $this->rec_florestais_eng_florestal;
	  }
	  
	  public function setRec_florestais_eng_florestal($tRec_florestais_eng_florestal){
	    $this->rec_florestais_eng_florestal = $tRec_florestais_eng_florestal;
	  }
	  
	  public function getSociologia(){
	    return $this->sociologia;
	  }
	  
	  public function setSociologia($tSociologia){
	    $this->sociologia = $tSociologia;
	  }
	  
	  public function getAdministracao(){
	    return $this->administracao;
	  }
	  
	  public function setAdministracao($tAdministracao){
	    $this->administracao = $tAdministracao;
	  }
	  
	  public function getAdministracao_rural(){
	    return $this->administracao_rural;
	  }
	  
	  public function setAdministracao_rural($tAdministracao_rural){
	    $this->administracao_rural = $tAdministracao_rural;
	  }
	  
	  public function getAstronomia(){
	    return $this->astronomia;
	  }
	  
	  public function setAstronomia($tAstronomia){
	    $this->astronomia = $tAstronomia;
	  }
	  
	  public function getBiomedicina(){
	    return $this->biomedicina;
	  }
	  
	  public function setBiomedicina($tBiomedicina){
	    $this->biomedicina = $tBiomedicina;
	  }
	  
	  public function getBotanica(){
	    return $this->botanica;
	  }
	  
	  public function setBotanica($tBotanica){
	    $this->botanica = $tBotanica;
	  }
	  
	  public function getCarreira_religiosa(){
	    return $this->carreira_religiosa;
	  }
	  
	  public function setCarreira_religiosa($tCarreira_religiosa){
	    $this->carreira_religiosa = $tCarreira_religiosa;
	  }
	  
	  public function getCiencia_informacao(){
	    return $this->ciencia_informacao;
	  }
	  
	  public function setCiencia_informacao($tCiencia_informacao){
	    $this->ciencia_informacao = $tCiencia_informacao;
	  }
	  
	  public function getCiencia_politica(){
	    return $this->ciencia_politica;
	  }
	  
	  public function setCiencia_politica($tCiencia_politica){
	    $this->ciencia_politica = $tCiencia_politica;
	  }
	  
	  public function getCiencias_atuariais(){
	    return $this->ciencias_atuariais;
	  }
	  
	  public function setCiencias_atuariais($tCiencias_atuariais){
	    $this->ciencias_atuariais = $tCiencias_atuariais;
	  }
	  
	  public function getComunicacao(){
	    return $this->comunicacao;
	  }
	  
	  public function setComunicacao($tComunicacao){
	    $this->comunicacao = $tComunicacao;
	  }
	  
	  public function getDemografia(){
	    return $this->demografia;
	  }
	  
	  public function setDemografia($tDemografia){
	    $this->demografia = $tDemografia;
	  }
	  
	  public function getDesenho_projetos(){
	    return $this->desenho_projetos;
	  }
	  
	  public function setDesenho_projetos($tDesenho_projetos){
	    $this->desenho_projetos = $tDesenho_projetos;
	  }
	  
	  public function getDiplomacia(){
	    return $this->diplomacia;
	  }
	  
	  public function setDiplomacia($tDiplomacia){
	    $this->diplomacia = $tDiplomacia;
	  }
	  
	  public function getEconomia_domestica(){
	    return $this->economia_domestica;
	  }
	  
	  public function setEconomia_domestica($tEconomia_domestica){
	    $this->economia_domestica = $tEconomia_domestica;
	  }
	  
	  public function getEnfermagem(){
	    return $this->enfermagem;
	  }
	  
	  public function setEnfermagem($tEnfermagem){
	    $this->enfermagem = $tEnfermagem;
	  }
	  
	  public function getEngenharia_agricola(){
	    return $this->engenharia_agricola;
	  }
	  
	  public function setEngenharia_agricola($tEngenharia_agricola){
	    $this->engenharia_agricola = $tEngenharia_agricola;
	  }
	  
	  public function getEngenharia_cartografica(){
	    return $this->engenharia_cartografica;
	  }
	  
	  public function setEngenharia_cartografica($tEngenharia_cartografica){
	    $this->engenharia_cartografica = $tEngenharia_cartografica;
	  }
	  
	  public function getEngenharia_agrimensura(){
	    return $this->engenharia_agrimensura;
	  }
	  
	  public function setEngenharia_agrimensura($tEngenharia_agrimensura){
	    $this->engenharia_agrimensura = $tEngenharia_agrimensura;
	  }
	  
	  public function getEngenharia_materiais_metalurgica(){
	    return $this->engenharia_materiais_metalurgica;
	  }
	  
	  public function setEngenharia_materiais_metalurgica($tEngenharia_materiais_metalurgica){
	    $this->engenharia_materiais_metalurgica = $tEngenharia_materiais_metalurgica;
	  }
	  
	  public function getEngenharia_producao(){
	    return $this->engenharia_producao;
	  }
	  
	  public function setEngenharia_producao($tEngenharia_producao){
	    $this->engenharia_producao = $tEngenharia_producao;
	  }
	  
	  public function getEngenharia_eletrica(){
	    return $this->engenharia_eletrica;
	  }
	  
	  public function setEngenharia_eletrica($tEngenharia_eletrica){
	    $this->engenharia_eletrica = $tEngenharia_eletrica;
	  }
	  
	  public function getEngenharia_naval_oceanica(){
	    return $this->engenharia_naval_oceanica;
	  }
	  
	  public function setEngenharia_naval_oceanica($tEngenharia_naval_oceanica){
	    $this->engenharia_naval_oceanica = $tEngenharia_naval_oceanica;
	  }
	  
	  public function getEngenharia_quimica(){
	    return $this->engenharia_quimica;
	  }
	  
	  public function setEngenharia_quimica($tEngenharia_quimica){
	    $this->engenharia_quimica = $tEngenharia_quimica;
	  }
	  
	  public function getEstudos_sociais(){
	    return $this->estudos_sociais;
	  }
	  
	  public function setEstudos_sociais($tEstudos_sociais){
	    $this->estudos_sociais = $tEstudos_sociais;
	  }
	  
	  public function getFarmacologia(){
	    return $this->farmacologia;
	  }
	  
	  public function setFarmacologia($tFarmacologia){
	    $this->farmacologia = $tFarmacologia;
	  }
	  
	  public function getFisioterapia_terapia_ocupacional(){
	    return $this->fisioterapia_terapia_ocupacional;
	  }
	  
	  public function setFisioterapia_terapia_ocupacional($tFisioterapia_terapia_ocupacional){
	    $this->fisioterapia_terapia_ocupacional = $tFisioterapia_terapia_ocupacional;
	  }
	  
	  public function getGenetica(){
	    return $this->genetica;
	  }
	  
	  public function setGenetica($tGenetica){
	    $this->genetica = $tGenetica;
	  }
	  
	  public function getImunologia(){
	    return $this->imunologia;
	  }
	  
	  public function setImunologia($tImunologia){
	    $this->imunologia = $tImunologia;
	  }
	  
	  public function getMedicina(){
	    return $this->medicina;
	  }
	  
	  public function setMedicina($tMedicina){
	    $this->medicina = $tMedicina;
	  }
	  
	  public function getMicrobiologia(){
	    return $this->microbiologia;
	  }
	  
	  public function setMicrobiologia($tMicrobiologia){
	    $this->microbiologia = $tMicrobiologia;
	  }
	  
	  public function getMuseologia(){
	    return $this->museologia;
	  }
	  
	  public function setMuseologia($tMuseologia){
	    $this->museologia = $tMuseologia;
	  }
	  
	  public function getOceanografia(){
	    return $this->oceanografia;
	  }
	  
	  public function setOceanografia($tOceanografia){
	    $this->oceanografia = $tOceanografia;
	  }
	  
	  public function getParasitologia(){
	    return $this->parasitologia;
	  }
	  
	  public function setParasitologia($tParasitologia){
	    $this->parasitologia = $tParasitologia;
	  }
	  
	  public function getProbabilidade_estatistica(){
	    return $this->probabilidade_estatistica;
	  }
	  
	  public function setProbabilidade_estatistica($tProbabilidade_estatistica){
	    $this->probabilidade_estatistica = $tProbabilidade_estatistica;
	  }
	  
	  public function getRecursos_pesqueiros_engenharia_pesca(){
	    return $this->recursos_pesqueiros_engenharia_pesca;
	  }
	  
	  public function setRecursos_pesqueiros_engenharia_pesca($tRecursos_pesqueiros_engenharia_pesca){
	    $this->recursos_pesqueiros_engenharia_pesca = $tRecursos_pesqueiros_engenharia_pesca;
	  }
	  
	  public function getRelacoes_publicas(){
	    return $this->relacoes_publicas;
	  }
	  
	  public function setRelacoes_publicas($tRelacoes_publicas){
	    $this->relacoes_publicas = $tRelacoes_publicas;
	  }
	  
	  public function getServico_social(){
	    return $this->servico_social;
	  }
	  
	  public function setServico_social($tServico_social){
	    $this->servico_social = $tServico_social;
	  }
	  
	  public function getZoologia(){
	    return $this->zoologia;
	  }
	  
	  public function setZoologia($tZoologia){
	    $this->zoologia = $tZoologia;
	  }
	  
	  public function getAdministracao_hospitalar(){
	    return $this->administracao_hospitalar;
	  }
	  
	  public function setAdministracao_hospitalar($tAdministracao_hospitalar){
	    $this->administracao_hospitalar = $tAdministracao_hospitalar;
	  }
	  
	  public function getArqueologia(){
	    return $this->arqueologia;
	  }
	  
	  public function setArqueologia($tArqueologia){
	    $this->arqueologia = $tArqueologia;
	  }
	  
	  public function getBiofisica(){
	    return $this->biofisica;
	  }
	  
	  public function setBiofisica($tBiofisica){
	    $this->biofisica = $tBiofisica;
	  }
	  
	  public function getBioquimica(){
	    return $this->bioquimica;
	  }
	  
	  public function setBioquimica($tBioquimica){
	    $this->bioquimica = $tBioquimica;
	  }
	  
	  public function getCarreira_militar(){
	    return $this->carreira_militar;
	  }
	  
	  public function setCarreira_militar($tCarreira_militar){
	    $this->carreira_militar = $tCarreira_militar;
	  }
	  
	  public function getCiencia_computacao(){
	    return $this->ciencia_computacao;
	  }
	  
	  public function setCiencia_computacao($tCiencia_computacao){
	    $this->ciencia_computacao = $tCiencia_computacao;
	  }
	  
	  public function getCiencia_tecnologia_alimentos(){
	    return $this->ciencia_tecnologia_alimentos;
	  }
	  
	  public function setCiencia_tecnologia_alimentos($tCiencia_tecnologia_alimentos){
	    $this->ciencia_tecnologia_alimentos = $tCiencia_tecnologia_alimentos;
	  }
	  
	  public function getCiencias(){
	    return $this->ciencias;
	  }
	  
	  public function setCiencias($tCiencias){
	    $this->ciencias = $tCiencias;
	  }
	  
	  public function getCiencias_sociais(){
	    return $this->ciencias_sociais;
	  }
	  
	  public function setCiencias_sociais($tCiencias_sociais){
	    $this->ciencias_sociais = $tCiencias_sociais;
	  }
	  
	  public function getDecoracao(){
	    return $this->decoracao;
	  }
	  
	  public function setDecoracao($tDecoracao){
	    $this->decoracao = $tDecoracao;
	  }
	  
	  public function getDesenho_moda(){
	    return $this->desenho_moda;
	  }
	  
	  public function setDesenho_moda($tDesenho_moda){
	    $this->desenho_moda = $tDesenho_moda;
	  }
	  
	  public function getDesenho_industrial(){
	    return $this->desenho_industrial;
	  }
	  
	  public function setDesenho_industrial($tDesenho_industrial){
	    $this->desenho_industrial = $tDesenho_industrial;
	  }
	  
	  public function getEconomia(){
	    return $this->economia;
	  }
	  
	  public function setEconomia($tEconomia){
	    $this->economia = $tEconomia;
	  }
	  
	  public function getEducacao_fisica(){
	    return $this->educacao_fisica;
	  }
	  
	  public function setEducacao_fisica($tEducacao_fisica){
	    $this->educacao_fisica = $tEducacao_fisica;
	  }
	  
	  public function getEngenharia_aeroespacial(){
	    return $this->engenharia_aeroespacial;
	  }
	  
	  public function setEngenharia_aeroespacial($tEngenharia_aeroespacial){
	    $this->engenharia_aeroespacial = $tEngenharia_aeroespacial;
	  }
	  
	  public function getEngenharia_biomedica(){
	    return $this->engenharia_biomedica;
	  }
	  
	  public function setEngenharia_biomedica($tEngenharia_biomedica){
	    $this->engenharia_biomedica = $tEngenharia_biomedica;
	  }
	  
	  public function getEngenharia_civil(){
	    return $this->engenharia_civil;
	  }
	  
	  public function setEngenharia_civil($tEngenharia_civil){
	    $this->engenharia_civil = $tEngenharia_civil;
	  }
	  
	  public function getEngenharia_armamentos(){
	    return $this->engenharia_armamentos;
	  }
	  
	  public function setEngenharia_armamentos($tEngenharia_armamentos){
	    $this->engenharia_armamentos = $tEngenharia_armamentos;
	  }
	  
	  public function getEngenharia_minas(){
	    return $this->engenharia_minas;
	  }
	  
	  public function setEngenharia_minas($tEngenharia_minas){
	    $this->engenharia_minas = $tEngenharia_minas;
	  }
	  
	  public function getEngenharia_transportes(){
	    return $this->engenharia_transportes;
	  }
	  
	  public function setEngenharia_transportes($tEngenharia_transportes){
	    $this->engenharia_transportes = $tEngenharia_transportes;
	  }
	  
	  public function getEngenharia_mecatronica(){
	    return $this->engenharia_mecatronica;
	  }
	  
	  public function setEngenharia_mecatronica($tEngenharia_mecatronica){
	    $this->engenharia_mecatronica = $tEngenharia_mecatronica;
	  }
	  
	  public function getEngenharia_nuclear(){
	    return $this->engenharia_nuclear;
	  }
	  
	  public function setEngenharia_nuclear($tEngenharia_nuclear){
	    $this->engenharia_nuclear = $tEngenharia_nuclear;
	  }
	  
	  public function getEngenharia_textil(){
	    return $this->engenharia_textil;
	  }
	  
	  public function setEngenharia_textil($tEngenharia_textil){
	    $this->engenharia_textil = $tEngenharia_textil;
	  }
	  
	  public function getFarmacia(){
	    return $this->farmacia;
	  }
	  
	  public function setFarmacia($tFarmacia){
	    $this->farmacia = $tFarmacia;
	  }
	  
	  public function getFisiologia(){
	    return $this->fisiologia;
	  }
	  
	  public function setFisiologia($tFisiologia){
	    $this->fisiologia = $tFisiologia;
	  }
	  
	  public function getFonoaudiologia(){
	    return $this->fonoaudiologia;
	  }
	  
	  public function setFonoaudiologia($tFonoaudiologia){
	    $this->fonoaudiologia = $tFonoaudiologia;
	  }
	  
	  public function getHistoria_natural(){
	    return $this->historia_natural;
	  }
	  
	  public function setHistoria_natural($tHistoria_natural){
	    $this->historia_natural = $tHistoria_natural;
	  }
	  
	  public function getLinguistica(){
	    return $this->linguistica;
	  }
	  
	  public function setLinguistica($tLinguistica){
	    $this->linguistica = $tLinguistica;
	  }
	  
	  public function getMedicina_veterinaria(){
	    return $this->medicina_veterinaria;
	  }
	  
	  public function setMedicina_veterinaria($tMedicina_veterinaria){
	    $this->medicina_veterinaria = $tMedicina_veterinaria;
	  }
	  
	  public function getMorfologia(){
	    return $this->morfologia;
	  }
	  
	  public function setMorfologia($tMorfologia){
	    $this->morfologia = $tMorfologia;
	  }
	  
	  public function getNutricao(){
	    return $this->nutricao;
	  }
	  
	  public function setNutricao($tNutricao){
	    $this->nutricao = $tNutricao;
	  }
	  
	  public function getOdontologia(){
	    return $this->odontologia;
	  }
	  
	  public function setOdontologia($tOdontologia){
	    $this->odontologia = $tOdontologia;
	  }
	  
	  public function getPlanejamento_urbano_regional(){
	    return $this->planejamento_urbano_regional;
	  }
	  
	  public function setPlanejamento_urbano_regional($tPlanejamento_urbano_regional){
	    $this->planejamento_urbano_regional = $tPlanejamento_urbano_regional;
	  }
	  
	  public function getQuimica_industrial(){
	    return $this->quimica_industrial;
	  }
	  
	  public function setQuimica_industrial($tQuimica_industrial){
	    $this->quimica_industrial = $tQuimica_industrial;
	  }
	  
	  public function getRelacoes_internacionais(){
	    return $this->relacoes_internacionais;
	  }
	  
	  public function setRelacoes_internacionais($tRelacoes_internacionais){
	    $this->relacoes_internacionais = $tRelacoes_internacionais;
	  }
	  
	  public function getSecretariado_executiva(){
	    return $this->secretariado_executiva;
	  }
	  
	  public function setSecretariado_executiva($tSecretariado_executiva){
	    $this->secretariado_executiva = $tSecretariado_executiva;
	  }
	  
	  public function getTeologia(){
	    return $this->teologia;
	  }
	  
	  public function setTeologia($tTeologia){
	    $this->teologia = $tTeologia;
	  }
	  
	  public function getZootecnia(){
	    return $this->zootecnia;
	  }
	  
	  public function setZootecnia($tZootecnia){
	    $this->zootecnia = $tZootecnia;
	  }
	  
	  public function getQagronomia(){
	    return $this->qagronomia;
	  }
	  
	  public function setQagronomia($tQagronomia){
	    $this->qagronomia = $tQagronomia;
	  }
	  
	  public function getQarquitetura_urbanismo(){
	    return $this->qarquitetura_urbanismo;
	  }
	  
	  public function setQarquitetura_urbanismo($tQarquitetura_urbanismo){
	    $this->qarquitetura_urbanismo = $tQarquitetura_urbanismo;
	  }
	  
	  public function getQbiologia_geral(){
	    return $this->qbiologia_geral;
	  }
	  
	  public function setQbiologia_geral($tQbiologia_geral){
	    $this->qbiologia_geral = $tQbiologia_geral;
	  }
	  
	  public function getQdireito(){
	    return $this->qdireito;
	  }
	  
	  public function setQdireito($tQdireito){
	    $this->qdireito = $tQdireito;
	  }
	  
	  public function getQeducacao(){
	    return $this->qeducacao;
	  }
	  
	  public function setQeducacao($tQeducacao){
	    $this->qeducacao = $tQeducacao;
	  }
	  
	  public function getQfilosofia(){
	    return $this->qfilosofia;
	  }
	  
	  public function setQfilosofia($tQfilosofia){
	    $this->qfilosofia = $tQfilosofia;
	  }
	  
	  public function getQgeociencias(){
	    return $this->qgeociencias;
	  }
	  
	  public function setQgeociencias($tQgeociencias){
	    $this->qgeociencias = $tQgeociencias;
	  }
	  
	  public function getQhistoria(){
	    return $this->qhistoria;
	  }
	  
	  public function setQhistoria($tQhistoria){
	    $this->qhistoria = $tQhistoria;
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
	  
	  public function getQsaude_coletiva(){
	    return $this->qsaude_coletiva;
	  }
	  
	  public function setQsaude_coletiva($tQsaude_coletiva){
	    $this->qsaude_coletiva = $tQsaude_coletiva;
	  }
	  
	  public function getQturismo(){
	    return $this->qturismo;
	  }
	  
	  public function setQturismo($tQturismo){
	    $this->qturismo = $tQturismo;
	  }
	  
	  public function getQantropologia(){
	    return $this->qantropologia;
	  }
	  
	  public function setQantropologia($tQantropologia){
	    $this->qantropologia = $tQantropologia;
	  }
	  
	  public function getQarte(){
	    return $this->qarte;
	  }
	  
	  public function setQarte($tQarte){
	    $this->qarte = $tQarte;
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
	  
	  public function getQengenharia_sanitaria(){
	    return $this->qengenharia_sanitaria;
	  }
	  
	  public function setQengenharia_sanitaria($tQengenharia_sanitaria){
	    $this->qengenharia_sanitaria = $tQengenharia_sanitaria;
	  }
	  
	  public function getQfisica(){
	    return $this->qfisica;
	  }
	  
	  public function setQfisica($tQfisica){
	    $this->qfisica = $tQfisica;
	  }
	  
	  public function getQgeografia(){
	    return $this->qgeografia;
	  }
	  
	  public function setQgeografia($tQgeografia){
	    $this->qgeografia = $tQgeografia;
	  }
	  
	  public function getQletras(){
	    return $this->qletras;
	  }
	  
	  public function setQletras($tQletras){
	    $this->qletras = $tQletras;
	  }
	  
	  public function getQpsicologia(){
	    return $this->qpsicologia;
	  }
	  
	  public function setQpsicologia($tQpsicologia){
	    $this->qpsicologia = $tQpsicologia;
	  }
	  
	  public function getQrec_florestais_eng_florestal(){
	    return $this->qrec_florestais_eng_florestal;
	  }
	  
	  public function setQrec_florestais_eng_florestal($tQrec_florestais_eng_florestal){
	    $this->qrec_florestais_eng_florestal = $tQrec_florestais_eng_florestal;
	  }
	  
	  public function getQsociologia(){
	    return $this->qsociologia;
	  }
	  
	  public function setQsociologia($tQsociologia){
	    $this->qsociologia = $tQsociologia;
	  }
	  
	  public function getQadministracao(){
	    return $this->qadministracao;
	  }
	  
	  public function setQadministracao($tQadministracao){
	    $this->qadministracao = $tQadministracao;
	  }
	  
	  public function getQadministracao_rural(){
	    return $this->qadministracao_rural;
	  }
	  
	  public function setQadministracao_rural($tQadministracao_rural){
	    $this->qadministracao_rural = $tQadministracao_rural;
	  }
	  
	  public function getQastronomia(){
	    return $this->qastronomia;
	  }
	  
	  public function setQastronomia($tQastronomia){
	    $this->qastronomia = $tQastronomia;
	  }
	  
	  public function getQbiomedicina(){
	    return $this->qbiomedicina;
	  }
	  
	  public function setQbiomedicina($tQbiomedicina){
	    $this->qbiomedicina = $tQbiomedicina;
	  }
	  
	  public function getQbotanica(){
	    return $this->qbotanica;
	  }
	  
	  public function setQbotanica($tQbotanica){
	    $this->qbotanica = $tQbotanica;
	  }
	  
	  public function getQcarreira_religiosa(){
	    return $this->qcarreira_religiosa;
	  }
	  
	  public function setQcarreira_religiosa($tQcarreira_religiosa){
	    $this->qcarreira_religiosa = $tQcarreira_religiosa;
	  }
	  
	  public function getQciencia_informacao(){
	    return $this->qciencia_informacao;
	  }
	  
	  public function setQciencia_informacao($tQciencia_informacao){
	    $this->qciencia_informacao = $tQciencia_informacao;
	  }
	  
	  public function getQciencia_politica(){
	    return $this->qciencia_politica;
	  }
	  
	  public function setQciencia_politica($tQciencia_politica){
	    $this->qciencia_politica = $tQciencia_politica;
	  }
	  
	  public function getQciencias_atuariais(){
	    return $this->qciencias_atuariais;
	  }
	  
	  public function setQciencias_atuariais($tQciencias_atuariais){
	    $this->qciencias_atuariais = $tQciencias_atuariais;
	  }
	  
	  public function getQcomunicacao(){
	    return $this->qcomunicacao;
	  }
	  
	  public function setQcomunicacao($tQcomunicacao){
	    $this->qcomunicacao = $tQcomunicacao;
	  }
	  
	  public function getQdemografia(){
	    return $this->qdemografia;
	  }
	  
	  public function setQdemografia($tQdemografia){
	    $this->qdemografia = $tQdemografia;
	  }
	  
	  public function getQdesenho_projetos(){
	    return $this->qdesenho_projetos;
	  }
	  
	  public function setQdesenho_projetos($tQdesenho_projetos){
	    $this->qdesenho_projetos = $tQdesenho_projetos;
	  }
	  
	  public function getQdiplomacia(){
	    return $this->qdiplomacia;
	  }
	  
	  public function setQdiplomacia($tQdiplomacia){
	    $this->qdiplomacia = $tQdiplomacia;
	  }
	  
	  public function getQeconomia_domestica(){
	    return $this->qeconomia_domestica;
	  }
	  
	  public function setQeconomia_domestica($tQeconomia_domestica){
	    $this->qeconomia_domestica = $tQeconomia_domestica;
	  }
	  
	  public function getQenfermagem(){
	    return $this->qenfermagem;
	  }
	  
	  public function setQenfermagem($tQenfermagem){
	    $this->qenfermagem = $tQenfermagem;
	  }
	  
	  public function getQengenharia_agricola(){
	    return $this->qengenharia_agricola;
	  }
	  
	  public function setQengenharia_agricola($tQengenharia_agricola){
	    $this->qengenharia_agricola = $tQengenharia_agricola;
	  }
	  
	  public function getQengenharia_cartografica(){
	    return $this->qengenharia_cartografica;
	  }
	  
	  public function setQengenharia_cartografica($tQengenharia_cartografica){
	    $this->qengenharia_cartografica = $tQengenharia_cartografica;
	  }
	  
	  public function getQengenharia_agrimensura(){
	    return $this->qengenharia_agrimensura;
	  }
	  
	  public function setQengenharia_agrimensura($tQengenharia_agrimensura){
	    $this->qengenharia_agrimensura = $tQengenharia_agrimensura;
	  }
	  
	  public function getQengenharia_materiais_metalurgica(){
	    return $this->qengenharia_materiais_metalurgica;
	  }
	  
	  public function setQengenharia_materiais_metalurgica($tQengenharia_materiais_metalurgica){
	    $this->qengenharia_materiais_metalurgica = $tQengenharia_materiais_metalurgica;
	  }
	  
	  public function getQengenharia_producao(){
	    return $this->qengenharia_producao;
	  }
	  
	  public function setQengenharia_producao($tQengenharia_producao){
	    $this->qengenharia_producao = $tQengenharia_producao;
	  }
	  
	  public function getQengenharia_eletrica(){
	    return $this->qengenharia_eletrica;
	  }
	  
	  public function setQengenharia_eletrica($tQengenharia_eletrica){
	    $this->qengenharia_eletrica = $tQengenharia_eletrica;
	  }
	  
	  public function getQengenharia_naval_oceanica(){
	    return $this->qengenharia_naval_oceanica;
	  }
	  
	  public function setQengenharia_naval_oceanica($tQengenharia_naval_oceanica){
	    $this->qengenharia_naval_oceanica = $tQengenharia_naval_oceanica;
	  }
	  
	  public function getQengenharia_quimica(){
	    return $this->qengenharia_quimica;
	  }
	  
	  public function setQengenharia_quimica($tQengenharia_quimica){
	    $this->qengenharia_quimica = $tQengenharia_quimica;
	  }
	  
	  public function getQestudos_sociais(){
	    return $this->qestudos_sociais;
	  }
	  
	  public function setQestudos_sociais($tQestudos_sociais){
	    $this->qestudos_sociais = $tQestudos_sociais;
	  }
	  
	  public function getQfarmacologia(){
	    return $this->qfarmacologia;
	  }
	  
	  public function setQfarmacologia($tQfarmacologia){
	    $this->qfarmacologia = $tQfarmacologia;
	  }
	  
	  public function getQfisioterapia_terapia_ocupacional(){
	    return $this->qfisioterapia_terapia_ocupacional;
	  }
	  
	  public function setQfisioterapia_terapia_ocupacional($tQfisioterapia_terapia_ocupacional){
	    $this->qfisioterapia_terapia_ocupacional = $tQfisioterapia_terapia_ocupacional;
	  }
	  
	  public function getQgenetica(){
	    return $this->qgenetica;
	  }
	  
	  public function setQgenetica($tQgenetica){
	    $this->qgenetica = $tQgenetica;
	  }
	  
	  public function getQimunologia(){
	    return $this->qimunologia;
	  }
	  
	  public function setQimunologia($tQimunologia){
	    $this->qimunologia = $tQimunologia;
	  }
	  
	  public function getQmedicina(){
	    return $this->qmedicina;
	  }
	  
	  public function setQmedicina($tQmedicina){
	    $this->qmedicina = $tQmedicina;
	  }
	  
	  public function getQmicrobiologia(){
	    return $this->qmicrobiologia;
	  }
	  
	  public function setQmicrobiologia($tQmicrobiologia){
	    $this->qmicrobiologia = $tQmicrobiologia;
	  }
	  
	  public function getQmuseologia(){
	    return $this->qmuseologia;
	  }
	  
	  public function setQmuseologia($tQmuseologia){
	    $this->qmuseologia = $tQmuseologia;
	  }
	  
	  public function getQoceanografia(){
	    return $this->qoceanografia;
	  }
	  
	  public function setQoceanografia($tQoceanografia){
	    $this->qoceanografia = $tQoceanografia;
	  }
	  
	  public function getQparasitologia(){
	    return $this->qparasitologia;
	  }
	  
	  public function setQparasitologia($tQparasitologia){
	    $this->qparasitologia = $tQparasitologia;
	  }
	  
	  public function getQprobabilidade_estatistica(){
	    return $this->qprobabilidade_estatistica;
	  }
	  
	  public function setQprobabilidade_estatistica($tQprobabilidade_estatistica){
	    $this->qprobabilidade_estatistica = $tQprobabilidade_estatistica;
	  }
	  
	  public function getQrecursos_pesqueiros_engenharia_pesca(){
	    return $this->qrecursos_pesqueiros_engenharia_pesca;
	  }
	  
	  public function setQrecursos_pesqueiros_engenharia_pesca($tQrecursos_pesqueiros_engenharia_pesca){
	    $this->qrecursos_pesqueiros_engenharia_pesca = $tQrecursos_pesqueiros_engenharia_pesca;
	  }
	  
	  public function getQrelacoes_publicas(){
	    return $this->qrelacoes_publicas;
	  }
	  
	  public function setQrelacoes_publicas($tQrelacoes_publicas){
	    $this->qrelacoes_publicas = $tQrelacoes_publicas;
	  }
	  
	  public function getQservico_social(){
	    return $this->qservico_social;
	  }
	  
	  public function setQservico_social($tQservico_social){
	    $this->qservico_social = $tQservico_social;
	  }
	  
	  public function getQzoologia(){
	    return $this->qzoologia;
	  }
	  
	  public function setQzoologia($tQzoologia){
	    $this->qzoologia = $tQzoologia;
	  }
	  
	  public function getQadministracao_hospitalar(){
	    return $this->qadministracao_hospitalar;
	  }
	  
	  public function setQadministracao_hospitalar($tQadministracao_hospitalar){
	    $this->qadministracao_hospitalar = $tQadministracao_hospitalar;
	  }
	  
	  public function getQarqueologia(){
	    return $this->qarqueologia;
	  }
	  
	  public function setQarqueologia($tQarqueologia){
	    $this->qarqueologia = $tQarqueologia;
	  }
	  
	  public function getQbiofisica(){
	    return $this->qbiofisica;
	  }
	  
	  public function setQbiofisica($tQbiofisica){
	    $this->qbiofisica = $tQbiofisica;
	  }
	  
	  public function getQbioquimica(){
	    return $this->qbioquimica;
	  }
	  
	  public function setQbioquimica($tQbioquimica){
	    $this->qbioquimica = $tQbioquimica;
	  }
	  
	  public function getQcarreira_militar(){
	    return $this->qcarreira_militar;
	  }
	  
	  public function setQcarreira_militar($tQcarreira_militar){
	    $this->qcarreira_militar = $tQcarreira_militar;
	  }
	  
	  public function getQciencia_computacao(){
	    return $this->qciencia_computacao;
	  }
	  
	  public function setQciencia_computacao($tQciencia_computacao){
	    $this->qciencia_computacao = $tQciencia_computacao;
	  }
	  
	  public function getQciencia_tecnologia_alimentos(){
	    return $this->qciencia_tecnologia_alimentos;
	  }
	  
	  public function setQciencia_tecnologia_alimentos($tQciencia_tecnologia_alimentos){
	    $this->qciencia_tecnologia_alimentos = $tQciencia_tecnologia_alimentos;
	  }
	  
	  public function getQciencias(){
	    return $this->qciencias;
	  }
	  
	  public function setQciencias($tQciencias){
	    $this->qciencias = $tQciencias;
	  }
	  
	  public function getQciencias_sociais(){
	    return $this->qciencias_sociais;
	  }
	  
	  public function setQciencias_sociais($tQciencias_sociais){
	    $this->qciencias_sociais = $tQciencias_sociais;
	  }
	  
	  public function getQdecoracao(){
	    return $this->qdecoracao;
	  }
	  
	  public function setQdecoracao($tQdecoracao){
	    $this->qdecoracao = $tQdecoracao;
	  }
	  
	  public function getQdesenho_moda(){
	    return $this->qdesenho_moda;
	  }
	  
	  public function setQdesenho_moda($tQdesenho_moda){
	    $this->qdesenho_moda = $tQdesenho_moda;
	  }
	  
	  public function getQdesenho_industrial(){
	    return $this->qdesenho_industrial;
	  }
	  
	  public function setQdesenho_industrial($tQdesenho_industrial){
	    $this->qdesenho_industrial = $tQdesenho_industrial;
	  }
	  
	  public function getQeconomia(){
	    return $this->qeconomia;
	  }
	  
	  public function setQeconomia($tQeconomia){
	    $this->qeconomia = $tQeconomia;
	  }
	  
	  public function getQeducacao_fisica(){
	    return $this->qeducacao_fisica;
	  }
	  
	  public function setQeducacao_fisica($tQeducacao_fisica){
	    $this->qeducacao_fisica = $tQeducacao_fisica;
	  }
	  
	  public function getQengenharia_aeroespacial(){
	    return $this->qengenharia_aeroespacial;
	  }
	  
	  public function setQengenharia_aeroespacial($tQengenharia_aeroespacial){
	    $this->qengenharia_aeroespacial = $tQengenharia_aeroespacial;
	  }
	  
	  public function getQengenharia_biomedica(){
	    return $this->qengenharia_biomedica;
	  }
	  
	  public function setQengenharia_biomedica($tQengenharia_biomedica){
	    $this->qengenharia_biomedica = $tQengenharia_biomedica;
	  }
	  
	  public function getQengenharia_civil(){
	    return $this->qengenharia_civil;
	  }
	  
	  public function setQengenharia_civil($tQengenharia_civil){
	    $this->qengenharia_civil = $tQengenharia_civil;
	  }
	  
	  public function getQengenharia_armamentos(){
	    return $this->qengenharia_armamentos;
	  }
	  
	  public function setQengenharia_armamentos($tQengenharia_armamentos){
	    $this->qengenharia_armamentos = $tQengenharia_armamentos;
	  }
	  
	  public function getQengenharia_minas(){
	    return $this->qengenharia_minas;
	  }
	  
	  public function setQengenharia_minas($tQengenharia_minas){
	    $this->qengenharia_minas = $tQengenharia_minas;
	  }
	  
	  public function getQengenharia_transportes(){
	    return $this->qengenharia_transportes;
	  }
	  
	  public function setQengenharia_transportes($tQengenharia_transportes){
	    $this->qengenharia_transportes = $tQengenharia_transportes;
	  }
	  
	  public function getQengenharia_mecatronica(){
	    return $this->qengenharia_mecatronica;
	  }
	  
	  public function setQengenharia_mecatronica($tQengenharia_mecatronica){
	    $this->qengenharia_mecatronica = $tQengenharia_mecatronica;
	  }
	  
	  public function getQengenharia_nuclear(){
	    return $this->qengenharia_nuclear;
	  }
	  
	  public function setQengenharia_nuclear($tQengenharia_nuclear){
	    $this->qengenharia_nuclear = $tQengenharia_nuclear;
	  }
	  
	  public function getQengenharia_textil(){
	    return $this->qengenharia_textil;
	  }
	  
	  public function setQengenharia_textil($tQengenharia_textil){
	    $this->qengenharia_textil = $tQengenharia_textil;
	  }
	  
	  public function getQfarmacia(){
	    return $this->qfarmacia;
	  }
	  
	  public function setQfarmacia($tQfarmacia){
	    $this->qfarmacia = $tQfarmacia;
	  }
	  
	  public function getQfisiologia(){
	    return $this->qfisiologia;
	  }
	  
	  public function setQfisiologia($tQfisiologia){
	    $this->qfisiologia = $tQfisiologia;
	  }
	  
	  public function getQfonoaudiologia(){
	    return $this->qfonoaudiologia;
	  }
	  
	  public function setQfonoaudiologia($tQfonoaudiologia){
	    $this->qfonoaudiologia = $tQfonoaudiologia;
	  }
	  
	  public function getQhistoria_natural(){
	    return $this->qhistoria_natural;
	  }
	  
	  public function setQhistoria_natural($tQhistoria_natural){
	    $this->qhistoria_natural = $tQhistoria_natural;
	  }
	  
	  public function getQlinguistica(){
	    return $this->qlinguistica;
	  }
	  
	  public function setQlinguistica($tQlinguistica){
	    $this->qlinguistica = $tQlinguistica;
	  }
	  
	  public function getQmedicina_veterinaria(){
	    return $this->qmedicina_veterinaria;
	  }
	  
	  public function setQmedicina_veterinaria($tQmedicina_veterinaria){
	    $this->qmedicina_veterinaria = $tQmedicina_veterinaria;
	  }
	  
	  public function getQmorfologia(){
	    return $this->qmorfologia;
	  }
	  
	  public function setQmorfologia($tQmorfologia){
	    $this->qmorfologia = $tQmorfologia;
	  }
	  
	  public function getQnutricao(){
	    return $this->qnutricao;
	  }
	  
	  public function setQnutricao($tQnutricao){
	    $this->qnutricao = $tQnutricao;
	  }
	  
	  public function getQodontologia(){
	    return $this->qodontologia;
	  }
	  
	  public function setQodontologia($tQodontologia){
	    $this->qodontologia = $tQodontologia;
	  }
	  
	  public function getQplanejamento_urbano_regional(){
	    return $this->qplanejamento_urbano_regional;
	  }
	  
	  public function setQplanejamento_urbano_regional($tQplanejamento_urbano_regional){
	    $this->qplanejamento_urbano_regional = $tQplanejamento_urbano_regional;
	  }
	  
	  public function getQquimica_industrial(){
	    return $this->qquimica_industrial;
	  }
	  
	  public function setQquimica_industrial($tQquimica_industrial){
	    $this->qquimica_industrial = $tQquimica_industrial;
	  }
	  
	  public function getQrelacoes_internacionais(){
	    return $this->qrelacoes_internacionais;
	  }
	  
	  public function setQrelacoes_internacionais($tQrelacoes_internacionais){
	    $this->qrelacoes_internacionais = $tQrelacoes_internacionais;
	  }
	  
	  public function getQsecretariado_executiva(){
	    return $this->qsecretariado_executiva;
	  }
	  
	  public function setQsecretariado_executiva($tQsecretariado_executiva){
	    $this->qsecretariado_executiva = $tQsecretariado_executiva;
	  }
	  
	  public function getQteologia(){
	    return $this->qteologia;
	  }
	  
	  public function setQteologia($tQteologia){
	    $this->qteologia = $tQteologia;
	  }
	  
	  public function getQzootecnia(){
	    return $this->qzootecnia;
	  }
	  
	  public function setQzootecnia($tQzootecnia){
	    $this->qzootecnia = $tQzootecnia;
	  }
	  
	  public function getQarea_conhecimento(){
	    return $this->qarea_conhecimento;
	  }
	  
	  public function setQarea_conhecimento($tQarea_conhecimento){
	    $this->qarea_conhecimento = $tQarea_conhecimento;
	  }
	  
	  public function toString(){
		$text= "Id = ".self::getId();
		$text.= "Agronomia = ".self::getAgronomia();
		$text.= "Arquitetura_urbanismo = ".self::getArquitetura_urbanismo();
		$text.= "Biologia_geral = ".self::getBiologia_geral();
		$text.= "Direito = ".self::getDireito();
		$text.= "Educacao = ".self::getEducacao();
		$text.= "Filosofia = ".self::getFilosofia();
		$text.= "Geociencias = ".self::getGeociencias();
		$text.= "Historia = ".self::getHistoria();
		$text.= "Matematica = ".self::getMatematica();
		$text.= "Quimica = ".self::getQuimica();
		$text.= "Saude_coletiva = ".self::getSaude_coletiva();
		$text.= "Turismo = ".self::getTurismo();
		$text.= "Antropologia = ".self::getAntropologia();
		$text.= "Arte = ".self::getArte();
		$text.= "Comunicacao_jornalismo = ".self::getComunicacao_jornalismo();
		$text.= "Ecologia = ".self::getEcologia();
		$text.= "Engenharia_sanitaria = ".self::getEngenharia_sanitaria();
		$text.= "Fisica = ".self::getFisica();
		$text.= "Geografia = ".self::getGeografia();
		$text.= "Letras = ".self::getLetras();
		$text.= "Psicologia = ".self::getPsicologia();
		$text.= "Rec_florestais_eng_florestal = ".self::getRec_florestais_eng_florestal();
		$text.= "Sociologia = ".self::getSociologia();
		$text.= "Administracao = ".self::getAdministracao();
		$text.= "Administracao_rural = ".self::getAdministracao_rural();
		$text.= "Astronomia = ".self::getAstronomia();
		$text.= "Biomedicina = ".self::getBiomedicina();
		$text.= "Botanica = ".self::getBotanica();
		$text.= "Carreira_religiosa = ".self::getCarreira_religiosa();
		$text.= "Ciencia_informacao = ".self::getCiencia_informacao();
		$text.= "Ciencia_politica = ".self::getCiencia_politica();
		$text.= "Ciencias_atuariais = ".self::getCiencias_atuariais();
		$text.= "Comunicacao = ".self::getComunicacao();
		$text.= "Demografia = ".self::getDemografia();
		$text.= "Desenho_projetos = ".self::getDesenho_projetos();
		$text.= "Diplomacia = ".self::getDiplomacia();
		$text.= "Economia_domestica = ".self::getEconomia_domestica();
		$text.= "Enfermagem = ".self::getEnfermagem();
		$text.= "Engenharia_agricola = ".self::getEngenharia_agricola();
		$text.= "Engenharia_cartografica = ".self::getEngenharia_cartografica();
		$text.= "Engenharia_agrimensura = ".self::getEngenharia_agrimensura();
		$text.= "Engenharia_materiais_metalurgica = ".self::getEngenharia_materiais_metalurgica();
		$text.= "Engenharia_producao = ".self::getEngenharia_producao();
		$text.= "Engenharia_eletrica = ".self::getEngenharia_eletrica();
		$text.= "Engenharia_naval_oceanica = ".self::getEngenharia_naval_oceanica();
		$text.= "Engenharia_quimica = ".self::getEngenharia_quimica();
		$text.= "Estudos_sociais = ".self::getEstudos_sociais();
		$text.= "Farmacologia = ".self::getFarmacologia();
		$text.= "Fisioterapia_terapia_ocupacional = ".self::getFisioterapia_terapia_ocupacional();
		$text.= "Genetica = ".self::getGenetica();
		$text.= "Imunologia = ".self::getImunologia();
		$text.= "Medicina = ".self::getMedicina();
		$text.= "Microbiologia = ".self::getMicrobiologia();
		$text.= "Museologia = ".self::getMuseologia();
		$text.= "Oceanografia = ".self::getOceanografia();
		$text.= "Parasitologia = ".self::getParasitologia();
		$text.= "Probabilidade_estatistica = ".self::getProbabilidade_estatistica();
		$text.= "Recursos_pesqueiros_engenharia_pesca = ".self::getRecursos_pesqueiros_engenharia_pesca();
		$text.= "Relacoes_publicas = ".self::getRelacoes_publicas();
		$text.= "Servico_social = ".self::getServico_social();
		$text.= "Zoologia = ".self::getZoologia();
		$text.= "Administracao_hospitalar = ".self::getAdministracao_hospitalar();
		$text.= "Arqueologia = ".self::getArqueologia();
		$text.= "Biofisica = ".self::getBiofisica();
		$text.= "Bioquimica = ".self::getBioquimica();
		$text.= "Carreira_militar = ".self::getCarreira_militar();
		$text.= "Ciencia_computacao = ".self::getCiencia_computacao();
		$text.= "Ciencia_tecnologia_alimentos = ".self::getCiencia_tecnologia_alimentos();
		$text.= "Ciencias = ".self::getCiencias();
		$text.= "Ciencias_sociais = ".self::getCiencias_sociais();
		$text.= "Decoracao = ".self::getDecoracao();
		$text.= "Desenho_moda = ".self::getDesenho_moda();
		$text.= "Desenho_industrial = ".self::getDesenho_industrial();
		$text.= "Economia = ".self::getEconomia();
		$text.= "Educacao_fisica = ".self::getEducacao_fisica();
		$text.= "Engenharia_aeroespacial = ".self::getEngenharia_aeroespacial();
		$text.= "Engenharia_biomedica = ".self::getEngenharia_biomedica();
		$text.= "Engenharia_civil = ".self::getEngenharia_civil();
		$text.= "Engenharia_armamentos = ".self::getEngenharia_armamentos();
		$text.= "Engenharia_minas = ".self::getEngenharia_minas();
		$text.= "Engenharia_transportes = ".self::getEngenharia_transportes();
		$text.= "Engenharia_mecatronica = ".self::getEngenharia_mecatronica();
		$text.= "Engenharia_nuclear = ".self::getEngenharia_nuclear();
		$text.= "Engenharia_textil = ".self::getEngenharia_textil();
		$text.= "Farmacia = ".self::getFarmacia();
		$text.= "Fisiologia = ".self::getFisiologia();
		$text.= "Fonoaudiologia = ".self::getFonoaudiologia();
		$text.= "Historia_natural = ".self::getHistoria_natural();
		$text.= "Linguistica = ".self::getLinguistica();
		$text.= "Medicina_veterinaria = ".self::getMedicina_veterinaria();
		$text.= "Morfologia = ".self::getMorfologia();
		$text.= "Nutricao = ".self::getNutricao();
		$text.= "Odontologia = ".self::getOdontologia();
		$text.= "Planejamento_urbano_regional = ".self::getPlanejamento_urbano_regional();
		$text.= "Quimica_industrial = ".self::getQuimica_industrial();
		$text.= "Relacoes_internacionais = ".self::getRelacoes_internacionais();
		$text.= "Secretariado_executiva = ".self::getSecretariado_executiva();
		$text.= "Teologia = ".self::getTeologia();
		$text.= "Zootecnia = ".self::getZootecnia();
		$text.= "Qagronomia = ".self::getQagronomia();
		$text.= "Qarquitetura_urbanismo = ".self::getQarquitetura_urbanismo();
		$text.= "Qbiologia_geral = ".self::getQbiologia_geral();
		$text.= "Qdireito = ".self::getQdireito();
		$text.= "Qeducacao = ".self::getQeducacao();
		$text.= "Qfilosofia = ".self::getQfilosofia();
		$text.= "Qgeociencias = ".self::getQgeociencias();
		$text.= "Qhistoria = ".self::getQhistoria();
		$text.= "Qmatematica = ".self::getQmatematica();
		$text.= "Qquimica = ".self::getQquimica();
		$text.= "Qsaude_coletiva = ".self::getQsaude_coletiva();
		$text.= "Qturismo = ".self::getQturismo();
		$text.= "Qantropologia = ".self::getQantropologia();
		$text.= "Qarte = ".self::getQarte();
		$text.= "Qcomunicacao_jornalismo = ".self::getQcomunicacao_jornalismo();
		$text.= "Qecologia = ".self::getQecologia();
		$text.= "Qengenharia_sanitaria = ".self::getQengenharia_sanitaria();
		$text.= "Qfisica = ".self::getQfisica();
		$text.= "Qgeografia = ".self::getQgeografia();
		$text.= "Qletras = ".self::getQletras();
		$text.= "Qpsicologia = ".self::getQpsicologia();
		$text.= "Qrec_florestais_eng_florestal = ".self::getQrec_florestais_eng_florestal();
		$text.= "Qsociologia = ".self::getQsociologia();
		$text.= "Qadministracao = ".self::getQadministracao();
		$text.= "Qadministracao_rural = ".self::getQadministracao_rural();
		$text.= "Qastronomia = ".self::getQastronomia();
		$text.= "Qbiomedicina = ".self::getQbiomedicina();
		$text.= "Qbotanica = ".self::getQbotanica();
		$text.= "Qcarreira_religiosa = ".self::getQcarreira_religiosa();
		$text.= "Qciencia_informacao = ".self::getQciencia_informacao();
		$text.= "Qciencia_politica = ".self::getQciencia_politica();
		$text.= "Qciencias_atuariais = ".self::getQciencias_atuariais();
		$text.= "Qcomunicacao = ".self::getQcomunicacao();
		$text.= "Qdemografia = ".self::getQdemografia();
		$text.= "Qdesenho_projetos = ".self::getQdesenho_projetos();
		$text.= "Qdiplomacia = ".self::getQdiplomacia();
		$text.= "Qeconomia_domestica = ".self::getQeconomia_domestica();
		$text.= "Qenfermagem = ".self::getQenfermagem();
		$text.= "Qengenharia_agricola = ".self::getQengenharia_agricola();
		$text.= "Qengenharia_cartografica = ".self::getQengenharia_cartografica();
		$text.= "Qengenharia_agrimensura = ".self::getQengenharia_agrimensura();
		$text.= "Qengenharia_materiais_metalurgica = ".self::getQengenharia_materiais_metalurgica();
		$text.= "Qengenharia_producao = ".self::getQengenharia_producao();
		$text.= "Qengenharia_eletrica = ".self::getQengenharia_eletrica();
		$text.= "Qengenharia_naval_oceanica = ".self::getQengenharia_naval_oceanica();
		$text.= "Qengenharia_quimica = ".self::getQengenharia_quimica();
		$text.= "Qestudos_sociais = ".self::getQestudos_sociais();
		$text.= "Qfarmacologia = ".self::getQfarmacologia();
		$text.= "Qfisioterapia_terapia_ocupacional = ".self::getQfisioterapia_terapia_ocupacional();
		$text.= "Qgenetica = ".self::getQgenetica();
		$text.= "Qimunologia = ".self::getQimunologia();
		$text.= "Qmedicina = ".self::getQmedicina();
		$text.= "Qmicrobiologia = ".self::getQmicrobiologia();
		$text.= "Qmuseologia = ".self::getQmuseologia();
		$text.= "Qoceanografia = ".self::getQoceanografia();
		$text.= "Qparasitologia = ".self::getQparasitologia();
		$text.= "Qprobabilidade_estatistica = ".self::getQprobabilidade_estatistica();
		$text.= "Qrecursos_pesqueiros_engenharia_pesca = ".self::getQrecursos_pesqueiros_engenharia_pesca();
		$text.= "Qrelacoes_publicas = ".self::getQrelacoes_publicas();
		$text.= "Qservico_social = ".self::getQservico_social();
		$text.= "Qzoologia = ".self::getQzoologia();
		$text.= "Qadministracao_hospitalar = ".self::getQadministracao_hospitalar();
		$text.= "Qarqueologia = ".self::getQarqueologia();
		$text.= "Qbiofisica = ".self::getQbiofisica();
		$text.= "Qbioquimica = ".self::getQbioquimica();
		$text.= "Qcarreira_militar = ".self::getQcarreira_militar();
		$text.= "Qciencia_computacao = ".self::getQciencia_computacao();
		$text.= "Qciencia_tecnologia_alimentos = ".self::getQciencia_tecnologia_alimentos();
		$text.= "Qciencias = ".self::getQciencias();
		$text.= "Qciencias_sociais = ".self::getQciencias_sociais();
		$text.= "Qdecoracao = ".self::getQdecoracao();
		$text.= "Qdesenho_moda = ".self::getQdesenho_moda();
		$text.= "Qdesenho_industrial = ".self::getQdesenho_industrial();
		$text.= "Qeconomia = ".self::getQeconomia();
		$text.= "Qeducacao_fisica = ".self::getQeducacao_fisica();
		$text.= "Qengenharia_aeroespacial = ".self::getQengenharia_aeroespacial();
		$text.= "Qengenharia_biomedica = ".self::getQengenharia_biomedica();
		$text.= "Qengenharia_civil = ".self::getQengenharia_civil();
		$text.= "Qengenharia_armamentos = ".self::getQengenharia_armamentos();
		$text.= "Qengenharia_minas = ".self::getQengenharia_minas();
		$text.= "Qengenharia_transportes = ".self::getQengenharia_transportes();
		$text.= "Qengenharia_mecatronica = ".self::getQengenharia_mecatronica();
		$text.= "Qengenharia_nuclear = ".self::getQengenharia_nuclear();
		$text.= "Qengenharia_textil = ".self::getQengenharia_textil();
		$text.= "Qfarmacia = ".self::getQfarmacia();
		$text.= "Qfisiologia = ".self::getQfisiologia();
		$text.= "Qfonoaudiologia = ".self::getQfonoaudiologia();
		$text.= "Qhistoria_natural = ".self::getQhistoria_natural();
		$text.= "Qlinguistica = ".self::getQlinguistica();
		$text.= "Qmedicina_veterinaria = ".self::getQmedicina_veterinaria();
		$text.= "Qmorfologia = ".self::getQmorfologia();
		$text.= "Qnutricao = ".self::getQnutricao();
		$text.= "Qodontologia = ".self::getQodontologia();
		$text.= "Qplanejamento_urbano_regional = ".self::getQplanejamento_urbano_regional();
		$text.= "Qquimica_industrial = ".self::getQquimica_industrial();
		$text.= "Qrelacoes_internacionais = ".self::getQrelacoes_internacionais();
		$text.= "Qsecretariado_executiva = ".self::getQsecretariado_executiva();
		$text.= "Qteologia = ".self::getQteologia();
		$text.= "Qzootecnia = ".self::getQzootecnia();
	    $text.= "Qarea_conhecimento = ".self::getQarea_conhecimento();
		
		return $text;
	  }
	
  }
  
?>