<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Tema_ambiental.class.php");
	
	class Tema_ambientalDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$tema_ambiental = $obj->getTema_ambiental();

			$tema_ambiental = addslashes($tema_ambiental);
			
			$sql = "INSERT INTO tema_ambiental VALUES('NULL','$tema_ambiental')";

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
			$tema_ambiental = $obj->getTema_ambiental();

			$tema_ambiental = addslashes($tema_ambiental);
			
		    $sql = "UPDATE tema_ambiental SET tema_ambiental='$tema_ambiental' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM tema_ambiental WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM tema_ambiental WHERE tema_ambiental LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Tema_ambiental($data['id'],$data['tema_ambiental']);	
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
			$sql = "SELECT * FROM tema_ambiental WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Tema_ambiental($data['id'],$data['tema_ambiental']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM tema_ambiental ORDER BY id ASC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			$obj=null;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Tema_ambiental($data['id'],$data['tema_ambiental']);	
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