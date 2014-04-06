<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Outra_area.class.php");
	
	class Outra_areaDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$outra_area = $obj->getOutra_area();

			$outra_area = addslashes($outra_area);
			
			$sql = "INSERT INTO outra_area VALUES('NULL','$outra_area')";

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
			$outra_area = $obj->getOutra_area();

			$outra_area = addslashes($outra_area);
			
		    $sql = "UPDATE outra_area SET outra_area='$outra_area' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM outra_area WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM outra_area WHERE outra_area LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Outra_area($data['id'],$data['outra_area']);	
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
			$sql = "SELECT * FROM outra_area WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Outra_area($data['id'],$data['outra_area']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM outra_area ORDER BY id ASC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			$obj=null;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Outra_area($data['id'],$data['outra_area']);	
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