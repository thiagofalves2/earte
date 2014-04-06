<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Publico_envolvido.class.php");
	
	class Publico_envolvidoDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$publico_envolvido = $obj->getPublico_envolvido();

			$publico_envolvido = addslashes($publico_envolvido);
			
			$sql = "INSERT INTO publico_envolvido VALUES('NULL','$publico_envolvido')";

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
			$publico_envolvido = $obj->getPublico_envolvido();

			$publico_envolvido = addslashes($publico_envolvido);
			
		    $sql = "UPDATE publico_envolvido SET publico_envolvido='$publico_envolvido' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM publico_envolvido WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM publico_envolvido WHERE publico_envolvido LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Publico_envolvido($data['id'],$data['publico_envolvido']);	
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
			$sql = "SELECT * FROM publico_envolvido WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Publico_envolvido($data['id'],$data['publico_envolvido']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM publico_envolvido ORDER BY id ASC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			$obj=null;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Publico_envolvido($data['id'],$data['publico_envolvido']);	
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