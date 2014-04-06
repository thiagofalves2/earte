<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Modalidades.class.php");
	
	class ModalidadesDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$regular = $obj->getRegular();
			$eja = $obj->getEja();
			$educacao_especial = $obj->getEducacao_especial();
			$educacao_indigena = $obj->getEducacao_indigena();
			$educacao_profissional_tecnologica = $obj->getEducacao_profissional_tecnologica();
			$educacao_infantil = $obj->getEducacao_infantil();
			$ensino_fundamental_1_4_1_5 = $obj->getEnsino_fundamental_1_4_1_5();
			$ensino_fundamental_5_8_6_9 = $obj->getEnsino_fundamental_5_8_6_9();
			$ensino_medio = $obj->getEnsino_medio();
			$educacao_superior = $obj->getEducacao_superior();
			$abordagem_generica_niveis_escolares = $obj->getAbordagem_generica_niveis_escolares();
			$qregular = $obj->getQregular();
			$qeja = $obj->getQeja();
			$qeducacao_especial = $obj->getQeducacao_especial();
			$qeducacao_indigena = $obj->getQeducacao_indigena();
			$qeducacao_profissional_tecnologica = $obj->getQeducacao_profissional_tecnologica();
			$qeducacao_infantil = $obj->getQeducacao_infantil();
			$qensino_fundamental_1_4_1_5 = $obj->getQensino_fundamental_1_4_1_5();
			$qensino_fundamental_5_8_6_9 = $obj->getQensino_fundamental_5_8_6_9();
			$qensino_medio = $obj->getQensino_medio();
			$qeducacao_superior = $obj->getQeducacao_superior();
			$qabordagem_generica_niveis_escolares = $obj->getQabordagem_generica_niveis_escolares();

			$regular = addslashes($regular);
			$eja = addslashes($eja);
			$educacao_especial = addslashes($educacao_especial);
			$educacao_indigena = addslashes($educacao_indigena);
			$educacao_profissional_tecnologica = addslashes($educacao_profissional_tecnologica);
			$educacao_infantil = addslashes($educacao_infantil);
			$ensino_fundamental_1_4_1_5 = addslashes($ensino_fundamental_1_4_1_5);
			$ensino_fundamental_5_8_6_9 = addslashes($ensino_fundamental_5_8_6_9);
			$ensino_medio = addslashes($ensino_medio);
			$educacao_superior = addslashes($educacao_superior);
			$abordagem_generica_niveis_escolares = addslashes($abordagem_generica_niveis_escolares);
			$qregular = addslashes($qregular);
			$qeja = addslashes($qeja);
			$qeducacao_especial = addslashes($qeducacao_especial);
			$qeducacao_indigena = addslashes($qeducacao_indigena);
			$qeducacao_profissional_tecnologica = addslashes($qeducacao_profissional_tecnologica);
			$qeducacao_infantil = addslashes($qeducacao_infantil);
			$qensino_fundamental_1_4_1_5 = addslashes($qensino_fundamental_1_4_1_5);
			$qensino_fundamental_5_8_6_9 = addslashes($qensino_fundamental_5_8_6_9);
			$qensino_medio = addslashes($qensino_medio);
			$qeducacao_superior = addslashes($qeducacao_superior);
			$qabordagem_generica_niveis_escolares = addslashes($qabordagem_generica_niveis_escolares);
			
			$sql = "INSERT INTO modalidade VALUES('NULL','$regular','$eja','$educacao_especial','$educacao_indigena','$educacao_profissional_tecnologica','$educacao_infantil','$ensino_fundamental_1_4_1_5','$ensino_fundamental_5_8_6_9','$ensino_medio','$educacao_superior','$abordagem_generica_niveis_escolares','$qregular','$qeja','$qeducacao_especial','$qeducacao_indigena','$qeducacao_profissional_tecnologica','$qeducacao_infantil','$qensino_fundamental_1_4_1_5','$qensino_fundamental_5_8_6_9','$qensino_medio','$qeducacao_superior','$qabordagem_generica_niveis_escolares')";

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
			$regular = $obj->getRegular();
			$eja = $obj->getEja();
			$educacao_especial = $obj->getEducacao_especial();
			$educacao_indigena = $obj->getEducacao_indigena();
			$educacao_profissional_tecnologica = $obj->getEducacao_profissional_tecnologica();
			$educacao_infantil = $obj->getEducacao_infantil();
			$ensino_fundamental_1_4_1_5 = $obj->getEnsino_fundamental_1_4_1_5();
			$ensino_fundamental_5_8_6_9 = $obj->getEnsino_fundamental_5_8_6_9();
			$ensino_medio = $obj->getEnsino_medio();
			$educacao_superior = $obj->getEducacao_superior();
			$abordagem_generica_niveis_escolares = $obj->getAbordagem_generica_niveis_escolares();
			$qregular = $obj->getQregular();
			$qeja = $obj->getQeja();
			$qeducacao_especial = $obj->getQeducacao_especial();
			$qeducacao_indigena = $obj->getQeducacao_indigena();
			$qeducacao_profissional_tecnologica = $obj->getQeducacao_profissional_tecnologica();
			$qeducacao_infantil = $obj->getQeducacao_infantil();
			$qensino_fundamental_1_4_1_5 = $obj->getQensino_fundamental_1_4_1_5();
			$qensino_fundamental_5_8_6_9 = $obj->getQensino_fundamental_5_8_6_9();
			$qensino_medio = $obj->getQensino_medio();
			$qeducacao_superior = $obj->getQeducacao_superior();
			$qabordagem_generica_niveis_escolares = $obj->getQabordagem_generica_niveis_escolares();

			$regular = addslashes($regular);
			$eja = addslashes($eja);
			$educacao_especial = addslashes($educacao_especial);
			$educacao_indigena = addslashes($educacao_indigena);
			$educacao_profissional_tecnologica = addslashes($educacao_profissional_tecnologica);
			$educacao_infantil = addslashes($educacao_infantil);
			$ensino_fundamental_1_4_1_5 = addslashes($ensino_fundamental_1_4_1_5);
			$ensino_fundamental_5_8_6_9 = addslashes($ensino_fundamental_5_8_6_9);
			$ensino_medio = addslashes($ensino_medio);
			$educacao_superior = addslashes($educacao_superior);
			$abordagem_generica_niveis_escolares = addslashes($abordagem_generica_niveis_escolares);
			$qregular = addslashes($qregular);
			$qeja = addslashes($qeja);
			$qeducacao_especial = addslashes($qeducacao_especial);
			$qeducacao_indigena = addslashes($qeducacao_indigena);
			$qeducacao_profissional_tecnologica = addslashes($qeducacao_profissional_tecnologica);
			$qeducacao_infantil = addslashes($qeducacao_infantil);
			$qensino_fundamental_1_4_1_5 = addslashes($qensino_fundamental_1_4_1_5);
			$qensino_fundamental_5_8_6_9 = addslashes($qensino_fundamental_5_8_6_9);
			$qensino_medio = addslashes($qensino_medio);
			$qeducacao_superior = addslashes($qeducacao_superior);
			$qabordagem_generica_niveis_escolares = addslashes($qabordagem_generica_niveis_escolares);
			
		    $sql = "UPDATE modalidade SET regular='$regular',eja='$eja',educacao_especial='$educacao_especial',educacao_indigena='$educacao_indigena',educacao_profissional_tecnologica='$educacao_profissional_tecnologica',educacao_infantil='$educacao_infantil',ensino_fundamental_1_4_1_5='$ensino_fundamental_1_4_1_5',ensino_fundamental_5_8_6_9='$ensino_fundamental_5_8_6_9',ensino_medio='$ensino_medio',educacao_superior='$educacao_superior',abordagem_generica_niveis_escolares='$abordagem_generica_niveis_escolares',qregular='$qregular',qeja='$qeja',qeducacao_especial='$qeducacao_especial',qeducacao_indigena='$qeducacao_indigena',qeducacao_profissional_tecnologica='$qeducacao_profissional_tecnologica',qeducacao_infantil='$qeducacao_infantil',qensino_fundamental_1_4_1_5='$qensino_fundamental_1_4_1_5',qensino_fundamental_5_8_6_9='$qensino_fundamental_5_8_6_9',qensino_medio='$qensino_medio',qeducacao_superior='$qeducacao_superior',qabordagem_generica_niveis_escolares='$qabordagem_generica_niveis_escolares' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM modalidade WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM modalidade WHERE regular LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Modalidades($data['id'],$data['regular'],$data['eja'],$data['educacao_especial'],$data['educacao_indigena'],$data['educacao_profissional_tecnologica'],$data['educacao_infantil'],$data['ensino_fundamental_1_4_1_5'],$data['ensino_fundamental_5_8_6_9'],$data['ensino_medio'],$data['educacao_superior'],$data['abordagem_generica_niveis_escolares'],$data['qregular'],$data['qeja'],$data['qeducacao_especial'],$data['qeducacao_indigena'],$data['qeducacao_profissional_tecnologica'],$data['qeducacao_infantil'],$data['qensino_fundamental_1_4_1_5'],$data['qensino_fundamental_5_8_6_9'],$data['qensino_medio'],$data['qeducacao_superior'],$data['qabordagem_generica_niveis_escolares']);	
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
			$sql = "SELECT * FROM modalidade WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Modalidades($data['id'],$data['regular'],$data['eja'],$data['educacao_especial'],$data['educacao_indigena'],$data['educacao_profissional_tecnologica'],$data['educacao_infantil'],$data['ensino_fundamental_1_4_1_5'],$data['ensino_fundamental_5_8_6_9'],$data['ensino_medio'],$data['educacao_superior'],$data['abordagem_generica_niveis_escolares'],$data['qregular'],$data['qeja'],$data['qeducacao_especial'],$data['qeducacao_indigena'],$data['qeducacao_profissional_tecnologica'],$data['qeducacao_infantil'],$data['qensino_fundamental_1_4_1_5'],$data['qensino_fundamental_5_8_6_9'],$data['qensino_medio'],$data['qeducacao_superior'],$data['qabordagem_generica_niveis_escolares']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM modalidade ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Modalidades($data['id'],$data['regular'],$data['eja'],$data['educacao_especial'],$data['educacao_indigena'],$data['educacao_profissional_tecnologica'],$data['educacao_infantil'],$data['ensino_fundamental_1_4_1_5'],$data['ensino_fundamental_5_8_6_9'],$data['ensino_medio'],$data['educacao_superior'],$data['abordagem_generica_niveis_escolares'],$data['qregular'],$data['qeja'],$data['qeducacao_especial'],$data['qeducacao_indigena'],$data['qeducacao_profissional_tecnologica'],$data['qeducacao_infantil'],$data['qensino_fundamental_1_4_1_5'],$data['qensino_fundamental_5_8_6_9'],$data['qensino_medio'],$data['qeducacao_superior'],$data['qabordagem_generica_niveis_escolares']);	
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