<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Area_curricular.class.php");
	
	class Area_curricularDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$arte = $obj->getArte();
			$ciencias_agrarias = $obj->getCiencias_agrarias();
			$ciencias_geologicas = $obj->getCiencias_geologicas();
			$comunicacao_jornalismo = $obj->getComunicacao_jornalismo();
			$ecologia = $obj->getEcologia();
			$educacao_fisica = $obj->getEducacao_fisica();
			$fisica = $obj->getFisica();
			$geral = $obj->getGeral();
			$lingua_estrangeira = $obj->getLingua_estrangeira();
			$matematica = $obj->getMatematica();
			$quimica = $obj->getQuimica();
			$sociologia = $obj->getSociologia();
			$biologia = $obj->getBiologia();
			$ciencias_computacao = $obj->getCiencias_computacao();
			$ciencias_naturais = $obj->getCiencias_naturais();
			$direito = $obj->getDireito();
			$economia = $obj->getEconomia();
			$filosofia = $obj->getFilosofia();
			$geografia = $obj->getGeografia();
			$historia = $obj->getHistoria();
			$lingua_portuguesa = $obj->getLingua_portuguesa();
			$pedagogia = $obj->getPedagogia();
			$saude = $obj->getSaude();
			$turismo = $obj->getTurismo();
			$qarte = $obj->getQarte();
			$qciencias_agrarias = $obj->getQciencias_agrarias();
			$qciencias_geologicas = $obj->getQciencias_geologicas();
			$qcomunicacao_jornalismo = $obj->getQcomunicacao_jornalismo();
			$qecologia = $obj->getQecologia();
			$qeducacao_fisica = $obj->getQeducacao_fisica();
			$qfisica = $obj->getQfisica();
			$qgeral = $obj->getQgeral();
			$qlingua_estrangeira = $obj->getQlingua_estrangeira();
			$qmatematica = $obj->getQmatematica();
			$qquimica = $obj->getQquimica();
			$qsociologia = $obj->getQsociologia();
			$qbiologia = $obj->getQbiologia();
			$qciencias_computacao = $obj->getQciencias_computacao();
			$qciencias_naturais = $obj->getQciencias_naturais();
			$qdireito = $obj->getQdireito();
			$qeconomia = $obj->getQeconomia();
			$qfilosofia = $obj->getQfilosofia();
			$qgeografia = $obj->getQgeografia();
			$qhistoria = $obj->getQhistoria();
			$qlingua_portuguesa = $obj->getQlingua_portuguesa();
			$qpedagogia = $obj->getQpedagogia();
			$qsaude = $obj->getQsaude();
			$qturismo = $obj->getQturismo();
			$qarea_curricular = $obj->getQarea_curricular();
			$id_area_licenciatura = $obj->getId_area_licenciatura();
			$id_outra_area = $obj->getId_outra_area();

			$arte = addslashes($arte);
			$ciencias_agrarias = addslashes($ciencias_agrarias);
			$ciencias_geologicas = addslashes($ciencias_geologicas);
			$comunicacao_jornalismo = addslashes($comunicacao_jornalismo);
			$ecologia = addslashes($ecologia);
			$educacao_fisica = addslashes($educacao_fisica);
			$fisica = addslashes($fisica);
			$geral = addslashes($geral);
			$lingua_estrangeira = addslashes($lingua_estrangeira);
			$matematica = addslashes($matematica);
			$quimica = addslashes($quimica);
			$sociologia = addslashes($sociologia);
			$biologia = addslashes($biologia);
			$ciencias_computacao = addslashes($ciencias_computacao);
			$ciencias_naturais = addslashes($ciencias_naturais);
			$direito = addslashes($direito);
			$economia = addslashes($economia);
			$filosofia = addslashes($filosofia);
			$geografia = addslashes($geografia);
			$historia = addslashes($historia);
			$lingua_portuguesa = addslashes($lingua_portuguesa);
			$pedagogia = addslashes($pedagogia);
			$saude = addslashes($saude);
			$turismo = addslashes($turismo);
			$qarte = addslashes($qarte);
			$qciencias_agrarias = addslashes($qciencias_agrarias);
			$qciencias_geologicas = addslashes($qciencias_geologicas);
			$qcomunicacao_jornalismo = addslashes($qcomunicacao_jornalismo);
			$qecologia = addslashes($qecologia);
			$qeducacao_fisica = addslashes($qeducacao_fisica);
			$qfisica = addslashes($qfisica);
			$qgeral = addslashes($qgeral);
			$qlingua_estrangeira = addslashes($qlingua_estrangeira);
			$qmatematica = addslashes($qmatematica);
			$qquimica = addslashes($qquimica);
			$qsociologia = addslashes($qsociologia);
			$qbiologia = addslashes($qbiologia);
			$qciencias_computacao = addslashes($qciencias_computacao);
			$qciencias_naturais = addslashes($qciencias_naturais);
			$qdireito = addslashes($qdireito);
			$qeconomia = addslashes($qeconomia);
			$qfilosofia = addslashes($qfilosofia);
			$qgeografia = addslashes($qgeografia);
			$qhistoria = addslashes($qhistoria);
			$qlingua_portuguesa = addslashes($qlingua_portuguesa);
			$qpedagogia = addslashes($qpedagogia);
			$qsaude = addslashes($qsaude);
			$qturismo = addslashes($qturismo);
			$qarea_curricular = addslashes($qarea_curricular);
			$id_area_licenciatura = addslashes($id_area_licenciatura);
			$id_outra_area = addslashes($id_outra_area);
			
			$sql = "INSERT INTO area_curricular VALUES('NULL','$arte','$ciencias_agrarias','$ciencias_geologicas','$comunicacao_jornalismo','$ecologia','$educacao_fisica','$fisica','$geral','$lingua_estrangeira','$matematica','$quimica','$sociologia','$biologia','$ciencias_computacao','$ciencias_naturais','$direito','$economia','$filosofia','$geografia','$historia','$lingua_portuguesa','$pedagogia','$saude','$turismo','$id_area_licenciatura','$id_outra_area','$qarte','$qciencias_agrarias','$qciencias_geologicas','$qcomunicacao_jornalismo','$qecologia','$qeducacao_fisica','$qfisica','$qgeral','$qlingua_estrangeira','$qmatematica','$qquimica','$qsociologia','$qbiologia','$qciencias_computacao','$qciencias_naturais','$qdireito','$qeconomia','$qfilosofia','$qgeografia','$qhistoria','$qlingua_portuguesa','$qpedagogia','$qsaude','$qturismo','$qarea_curricular')";

			DBFactory::getConnection();
			$result = DBFactory::query($sql);
			
			echo DBFactory::msg(DBFactory::getConnection());
			self::setLastId();
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function updateData($obj){
			DBFactory::getConnection();
			
			$id = $obj->getId();
			$id = (int) $id;
			$id = mysql_real_escape_string($id);
			$arte = $obj->getArte();
			$ciencias_agrarias = $obj->getCiencias_agrarias();
			$ciencias_geologicas = $obj->getCiencias_geologicas();
			$comunicacao_jornalismo = $obj->getComunicacao_jornalismo();
			$ecologia = $obj->getEcologia();
			$educacao_fisica = $obj->getEducacao_fisica();
			$fisica = $obj->getFisica();
			$geral = $obj->getGeral();
			$lingua_estrangeira = $obj->getLingua_estrangeira();
			$matematica = $obj->getMatematica();
			$quimica = $obj->getQuimica();
			$sociologia = $obj->getSociologia();
			$biologia = $obj->getBiologia();
			$ciencias_computacao = $obj->getCiencias_computacao();
			$ciencias_naturais = $obj->getCiencias_naturais();
			$direito = $obj->getDireito();
			$economia = $obj->getEconomia();
			$filosofia = $obj->getFilosofia();
			$geografia = $obj->getGeografia();
			$historia = $obj->getHistoria();
			$lingua_portuguesa = $obj->getLingua_portuguesa();
			$pedagogia = $obj->getPedagogia();
			$saude = $obj->getSaude();
			$turismo = $obj->getTurismo();
			$qarte = $obj->getQarte();
			$qciencias_agrarias = $obj->getQciencias_agrarias();
			$qciencias_geologicas = $obj->getQciencias_geologicas();
			$qcomunicacao_jornalismo = $obj->getQcomunicacao_jornalismo();
			$qecologia = $obj->getQecologia();
			$qeducacao_fisica = $obj->getQeducacao_fisica();
			$qfisica = $obj->getQfisica();
			$qgeral = $obj->getQgeral();
			$qlingua_estrangeira = $obj->getQlingua_estrangeira();
			$qmatematica = $obj->getQmatematica();
			$qquimica = $obj->getQquimica();
			$qsociologia = $obj->getQsociologia();
			$qbiologia = $obj->getQbiologia();
			$qciencias_computacao = $obj->getQciencias_computacao();
			$qciencias_naturais = $obj->getQciencias_naturais();
			$qdireito = $obj->getQdireito();
			$qeconomia = $obj->getQeconomia();
			$qfilosofia = $obj->getQfilosofia();
			$qgeografia = $obj->getQgeografia();
			$qhistoria = $obj->getQhistoria();
			$qlingua_portuguesa = $obj->getQlingua_portuguesa();
			$qpedagogia = $obj->getQpedagogia();
			$qsaude = $obj->getQsaude();
			$qturismo = $obj->getQturismo();
			$qarea_curricular = $obj->getQarea_curricular();
			$id_area_licenciatura = $obj->getId_area_licenciatura();
			$id_outra_area = $obj->getId_outra_area();

			$arte = addslashes($arte);
			$ciencias_agrarias = addslashes($ciencias_agrarias);
			$ciencias_geologicas = addslashes($ciencias_geologicas);
			$comunicacao_jornalismo = addslashes($comunicacao_jornalismo);
			$ecologia = addslashes($ecologia);
			$educacao_fisica = addslashes($educacao_fisica);
			$fisica = addslashes($fisica);
			$geral = addslashes($geral);
			$lingua_estrangeira = addslashes($lingua_estrangeira);
			$matematica = addslashes($matematica);
			$quimica = addslashes($quimica);
			$sociologia = addslashes($sociologia);
			$biologia = addslashes($biologia);
			$ciencias_computacao = addslashes($ciencias_computacao);
			$ciencias_naturais = addslashes($ciencias_naturais);
			$direito = addslashes($direito);
			$economia = addslashes($economia);
			$filosofia = addslashes($filosofia);
			$geografia = addslashes($geografia);
			$historia = addslashes($historia);
			$lingua_portuguesa = addslashes($lingua_portuguesa);
			$pedagogia = addslashes($pedagogia);
			$saude = addslashes($saude);
			$turismo = addslashes($turismo);
			$qarte = addslashes($qarte);
			$qciencias_agrarias = addslashes($qciencias_agrarias);
			$qciencias_geologicas = addslashes($qciencias_geologicas);
			$qcomunicacao_jornalismo = addslashes($qcomunicacao_jornalismo);
			$qecologia = addslashes($qecologia);
			$qeducacao_fisica = addslashes($qeducacao_fisica);
			$qfisica = addslashes($qfisica);
			$qgeral = addslashes($qgeral);
			$qlingua_estrangeira = addslashes($qlingua_estrangeira);
			$qmatematica = addslashes($qmatematica);
			$qquimica = addslashes($qquimica);
			$qsociologia = addslashes($qsociologia);
			$qbiologia = addslashes($qbiologia);
			$qciencias_computacao = addslashes($qciencias_computacao);
			$qciencias_naturais = addslashes($qciencias_naturais);
			$qdireito = addslashes($qdireito);
			$qeconomia = addslashes($qeconomia);
			$qfilosofia = addslashes($qfilosofia);
			$qgeografia = addslashes($qgeografia);
			$qhistoria = addslashes($qhistoria);
			$qlingua_portuguesa = addslashes($qlingua_portuguesa);
			$qpedagogia = addslashes($qpedagogia);
			$qsaude = addslashes($qsaude);
			$qturismo = addslashes($qturismo);
			$qarea_curricular = addslashes($qarea_curricular);
			$id_area_licenciatura = addslashes($id_area_licenciatura);
			$id_outra_area = addslashes($id_outra_area);
			
		    $sql = "UPDATE area_curricular SET arte='$arte',ciencias_agrarias='$ciencias_agrarias',ciencias_geologicas='$ciencias_geologicas',comunicacao_jornalismo='$comunicacao_jornalismo',ecologia='$ecologia',educacao_fisica='$educacao_fisica',fisica='$fisica',geral='$geral',lingua_estrangeira='$lingua_estrangeira',matematica='$matematica',quimica='$quimica',sociologia='$sociologia',biologia='$biologia',ciencias_computacao='$ciencias_computacao',ciencias_naturais='$ciencias_naturais',direito='$direito',economia='$economia',filosofia='$filosofia',geografia='$geografia',historia='$historia',lingua_portuguesa='$lingua_portuguesa',pedagogia='$pedagogia',saude='$saude',turismo='$turismo',qarte='$qarte',qciencias_agrarias='$qciencias_agrarias',qciencias_geologicas='$qciencias_geologicas',qcomunicacao_jornalismo='$qcomunicacao_jornalismo',qecologia='$qecologia',qeducacao_fisica='$qeducacao_fisica',qfisica='$qfisica',qgeral='$qgeral',qlingua_estrangeira='$qlingua_estrangeira',qmatematica='$qmatematica',qquimica='$qquimica',qsociologia='$qsociologia',qbiologia='$qbiologia',qciencias_computacao='$qciencias_computacao',qciencias_naturais='$qciencias_naturais',qdireito='$qdireito',qeconomia='$qeconomia',qfilosofia='$qfilosofia',qgeografia='$qgeografia',qhistoria='$qhistoria',qlingua_portuguesa='$qlingua_portuguesa',qpedagogia='$qpedagogia',qsaude='$qsaude',qturismo='$qturismo',qarea_curricular='$qarea_curricular',id_area_licenciatura='$id_area_licenciatura',id_outra_area='$id_outra_area' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM area_curricular WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM area_curricular WHERE arte LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Area_curricular($data['id'],$data['arte'],$data['ciencias_agrarias'],$data['ciencias_geologicas'],$data['comunicacao_jornalismo'],$data['ecologia'],$data['educacao_fisica'],$data['fisica'],$data['geral'],$data['lingua_estrangeira'],$data['matematica'],$data['quimica'],$data['sociologia'],$data['biologia'],$data['ciencias_computacao'],$data['ciencias_naturais'],$data['direito'],$data['economia'],$data['filosofia'],$data['geografia'],$data['historia'],$data['lingua_portuguesa'],$data['pedagogia'],$data['saude'],$data['turismo'],$data['qarte'],$data['qciencias_agrarias'],$data['qciencias_geologicas'],$data['qcomunicacao_jornalismo'],$data['qecologia'],$data['qeducacao_fisica'],$data['qfisica'],$data['qgeral'],$data['qlingua_estrangeira'],$data['qmatematica'],$data['qquimica'],$data['qsociologia'],$data['qbiologia'],$data['qciencias_computacao'],$data['qciencias_naturais'],$data['qdireito'],$data['qeconomia'],$data['qfilosofia'],$data['qgeografia'],$data['qhistoria'],$data['qlingua_portuguesa'],$data['qpedagogia'],$data['qsaude'],$data['qturismo'],$data['qarea_curricular'],$data['id_area_licenciatura'],$data['id_outra_area']);	
				$i++;
			}
			
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function selectDataForCode($id){
			
			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			
			$id = (int) $id;
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM area_curricular WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Area_curricular($data['id'],$data['arte'],$data['ciencias_agrarias'],$data['ciencias_geologicas'],$data['comunicacao_jornalismo'],$data['ecologia'],$data['educacao_fisica'],$data['fisica'],$data['geral'],$data['lingua_estrangeira'],$data['matematica'],$data['quimica'],$data['sociologia'],$data['biologia'],$data['ciencias_computacao'],$data['ciencias_naturais'],$data['direito'],$data['economia'],$data['filosofia'],$data['geografia'],$data['historia'],$data['lingua_portuguesa'],$data['pedagogia'],$data['saude'],$data['turismo'],$data['qarte'],$data['qciencias_agrarias'],$data['qciencias_geologicas'],$data['qcomunicacao_jornalismo'],$data['qecologia'],$data['qeducacao_fisica'],$data['qfisica'],$data['qgeral'],$data['qlingua_estrangeira'],$data['qmatematica'],$data['qquimica'],$data['qsociologia'],$data['qbiologia'],$data['qciencias_computacao'],$data['qciencias_naturais'],$data['qdireito'],$data['qeconomia'],$data['qfilosofia'],$data['qgeografia'],$data['qhistoria'],$data['qlingua_portuguesa'],$data['qpedagogia'],$data['qsaude'],$data['qturismo'],$data['qarea_curricular'],$data['id_area_licenciatura'],$data['id_outra_area']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM area_curricular ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Area_curricular($data['id'],$data['arte'],$data['ciencias_agrarias'],$data['ciencias_geologicas'],$data['comunicacao_jornalismo'],$data['ecologia'],$data['educacao_fisica'],$data['fisica'],$data['geral'],$data['lingua_estrangeira'],$data['matematica'],$data['quimica'],$data['sociologia'],$data['biologia'],$data['ciencias_computacao'],$data['ciencias_naturais'],$data['direito'],$data['economia'],$data['filosofia'],$data['geografia'],$data['historia'],$data['lingua_portuguesa'],$data['pedagogia'],$data['saude'],$data['turismo'],$data['qarte'],$data['qciencias_agrarias'],$data['qciencias_geologicas'],$data['qcomunicacao_jornalismo'],$data['qecologia'],$data['qeducacao_fisica'],$data['qfisica'],$data['qgeral'],$data['qlingua_estrangeira'],$data['qmatematica'],$data['qquimica'],$data['qsociologia'],$data['qbiologia'],$data['qciencias_computacao'],$data['qciencias_naturais'],$data['qdireito'],$data['qeconomia'],$data['qfilosofia'],$data['qgeografia'],$data['qhistoria'],$data['qlingua_portuguesa'],$data['qpedagogia'],$data['qsaude'],$data['qturismo'],$data['qarea_curricular'],$data['id_area_licenciatura'],$data['id_outra_area']);	
				$i++;
			}
			
			DBFactory::closeConnection();
			
			return $obj;
		}	
	    
		public function dbMsg(){
			return DBFactory::msg();
		}
		
		public static function getLastInsertedId(){
			return self::$lastId;		
		}

		private static function setLastId(){
			$aux = DBFactory::getLastId();
			if ($aux != -1){
				self::$lastId = $aux;
			}else{
				echo "Erro ao alterar LastID";
			}
		}
		
	}
?>