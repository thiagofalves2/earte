<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Resumo.class.php");
	
	class ResumoDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$resumo = $obj->getResumo();

			$resumo = addslashes($resumo);
			
			$sql = "INSERT INTO resumo VALUES('NULL','$resumo')";

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
			$resumo = $obj->getResumo();

			$resumo = addslashes($resumo);
			
		    $sql = "UPDATE resumo SET resumo='$resumo' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM resumo WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM resumo WHERE resumo LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Resumo($data['id'],$data['resumo']);	
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
			$sql = "SELECT * FROM resumo WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Resumo($data['id'],$data['resumo']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM resumo ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			$obj=null;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Resumo($data['id'],$data['resumo']);	
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