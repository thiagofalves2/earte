<?php

	class DBFactory{
		
		static $connection;
	
		public static function getConnection(){
			
	   		//Configurações do banco de dados
		    $host = 'mysql01.earte.hospedagemdesites.ws';
	   	    $database = 'earte';
		    $user = 'earte';
		    $password = 'PrjtEaRtE12';

			if(! is_resource(self::$connection)){
			  self::$connection = mysql_connect($host,$user,$password);
			}
			
			if(!self::$connection){ 
			  die ("Não foi possivel se conectar ao banco de dados".mysql_error());
			}
			mysql_select_db($database,self::$connection);
		  
			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

			return self::$connection;
		}
		
		public static function query($sql){
			
			$result = mysql_query($sql,self::getConnection());
			return $result;
			
		}
				
		public static function msg(){	
		
			$emessage = mysql_error(self::getConnection());
			$number = mysql_errno(self::getConnection());
			
			if($number != 0 ){
				return $emessage;
			}
			
			return;	
			
		}
		
		public static function closeConnection(){	
		
			mysql_close(self::$connection);
			return;	
			
		}
		
		public static function getLastId(){
		 
		  $result = mysql_query("SELECT last_insert_id() as id");
		 
		  if($result){
			$last = mysql_result($result,0,"id");
			return $last;
		  }else return -1;
		  
		}
		
	}
	
?>