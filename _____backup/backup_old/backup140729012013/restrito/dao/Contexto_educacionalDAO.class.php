<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Contexto_educacional.class.php");
	
	class Contexto_educacionalDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$contexto_nao_escolar = $obj->getContexto_nao_escolar();
			$abordagem_generica = $obj->getAbordagem_generica();
			$contexto_escolar = $obj->getContexto_escolar();
			$qcontexto_nao_escolar = $obj->getQcontexto_nao_escolar();
			$qabordagem_generica = $obj->getQabordagem_generica();
			$qcontexto_escolar = $obj->getQcontexto_escolar();
			$qcontexto_educacional = $obj->getQcontexto_educacional();

			$contexto_nao_escolar = addslashes($contexto_nao_escolar);
			$abordagem_generica = addslashes($abordagem_generica);
			$contexto_escolar = addslashes($contexto_escolar);
			$qcontexto_nao_escolar = addslashes($qcontexto_nao_escolar);
			$qabordagem_generica = addslashes($qabordagem_generica);
			$qcontexto_escolar = addslashes($qcontexto_escolar);
			$qcontexto_educacional = addslashes($qcontexto_educacional);
			
			$sql = "INSERT INTO contexto_educacional VALUES('NULL','$contexto_nao_escolar','$abordagem_generica','$contexto_escolar','$qcontexto_nao_escolar','$qabordagem_generica','$qcontexto_escolar','$qcontexto_educacional')";

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
			$contexto_nao_escolar = $obj->getContexto_nao_escolar();
			$abordagem_generica = $obj->getAbordagem_generica();
			$contexto_escolar = $obj->getContexto_escolar();
			$qcontexto_nao_escolar = $obj->getQcontexto_nao_escolar();
			$qabordagem_generica = $obj->getQabordagem_generica();
			$qcontexto_escolar = $obj->getQcontexto_escolar();
			$qcontexto_educacional = $obj->getQcontexto_educacional();

			$contexto_nao_escolar = addslashes($contexto_nao_escolar);
			$abordagem_generica = addslashes($abordagem_generica);
			$contexto_escolar = addslashes($contexto_escolar);
			$qcontexto_nao_escolar = addslashes($qcontexto_nao_escolar);
			$qabordagem_generica = addslashes($qabordagem_generica);
			$qcontexto_escolar = addslashes($qcontexto_escolar);
			$qcontexto_educacional = addslashes($qcontexto_educacional);
			
		    $sql = "UPDATE contexto_educacional SET contexto_nao_escolar='$contexto_nao_escolar',abordagem_generica='$abordagem_generica',contexto_escolar='$contexto_escolar',qcontexto_nao_escolar='$qcontexto_nao_escolar',qabordagem_generica='$qabordagem_generica',qcontexto_escolar='$qcontexto_escolar', qcontexto_educacional='$qcontexto_educacional' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM contexto_educacional WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM contexto_educacional WHERE contexto_nao_escolar LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Contexto_educacional($data['id'],$data['contexto_nao_escolar'],$data['abordagem_generica'],$data['contexto_escolar'],$data['qcontexto_nao_escolar'],$data['qabordagem_generica'],$data['qcontexto_escolar']);	
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
			$sql = "SELECT * FROM contexto_educacional WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Contexto_educacional($data['id'],$data['contexto_nao_escolar'],$data['abordagem_generica'],$data['contexto_escolar'],$data['qcontexto_nao_escolar'],$data['qabordagem_generica'],$data['qcontexto_escolar'],$data['qcontexto_educacional']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM contexto_educacional ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Contexto_educacional($data['id'],$data['contexto_nao_escolar'],$data['abordagem_generica'],$data['contexto_escolar'],$data['qcontexto_nao_escolar'],$data['qabordagem_generica'],$data['qcontexto_escolar'],$data['qcontexto_educacional']);	
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