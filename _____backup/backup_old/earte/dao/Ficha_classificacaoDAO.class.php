<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Ficha_classificacao.class.php");
	
	class Ficha_classificacaoDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$codigo = $obj->getCodigo();
			$consolidada = $obj->getConsolidada();
			$id_identificacao = $obj->getId_identificacao();
			$id_contexto_educacional = $obj->getId_contexto_educacional();
			$id_tema_ambiental = $obj->getId_tema_ambiental();
			$id_tema_estudo = $obj->getId_tema_estudo();
			$id_resumo = $obj->getId_resumo();
			$id_detalhes_finais = $obj->getId_detalhes_finais();
			$id_publico_envolvido = $obj->getId_publico_envolvido();
			$id_area_conhecimento = $obj->getId_area_conhecimento();
			$id_modalidades = $obj->getId_modalidades();
			$id_area_curricular = $obj->getId_area_curricular();

			$codigo = addslashes($codigo);
			$consolidada = addslashes($consolidada);
			$id_identificacao = addslashes($id_identificacao);
			$id_contexto_educacional = addslashes($id_contexto_educacional);
			$id_tema_ambiental = addslashes($id_tema_ambiental);
			$id_tema_estudo = addslashes($id_tema_estudo);
			$id_resumo = addslashes($id_resumo);
			$id_detalhes_finais = addslashes($id_detalhes_finais);
			$id_publico_envolvido = addslashes($id_publico_envolvido);
			$id_area_conhecimento = addslashes($id_area_conhecimento);
			$id_modalidades = addslashes($id_modalidades);
			$id_area_curricular = addslashes($id_area_curricular);
			
			$sql = "INSERT INTO ficha_classificacao VALUES('NULL','$codigo','$consolidada','$id_identificacao','$id_contexto_educacional','$id_tema_ambiental','$id_tema_estudo','$id_resumo','$id_detalhes_finais','$id_publico_envolvido','$id_area_conhecimento','$id_modalidades','$id_area_curricular')";

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
			$codigo = $obj->getCodigo();
			$consolidada = $obj->getConsolidada();
			$id_identificacao = $obj->getId_identificacao();
			$id_contexto_educacional = $obj->getId_contexto_educacional();
			$id_tema_ambiental = $obj->getId_tema_ambiental();
			$id_tema_estudo = $obj->getId_tema_estudo();
			$id_resumo = $obj->getId_resumo();
			$id_detalhes_finais = $obj->getId_detalhes_finais();
			$id_publico_envolvido = $obj->getId_publico_envolvido();
			$id_area_conhecimento = $obj->getId_area_conhecimento();
			$id_modalidades = $obj->getId_modalidades();
			$id_area_curricular = $obj->getId_area_curricular();

			$codigo = addslashes($codigo);
			$consolidada = addslashes($consolidada);
			$id_identificacao = addslashes($id_identificacao);
			$id_contexto_educacional = addslashes($id_contexto_educacional);
			$id_tema_ambiental = addslashes($id_tema_ambiental);
			$id_tema_estudo = addslashes($id_tema_estudo);
			$id_resumo = addslashes($id_resumo);
			$id_detalhes_finais = addslashes($id_detalhes_finais);
			$id_publico_envolvido = addslashes($id_publico_envolvido);
			$id_area_conhecimento = addslashes($id_area_conhecimento);
			$id_modalidades = addslashes($id_modalidades);
			$id_area_curricular = addslashes($id_area_curricular);
			
		    $sql = "UPDATE ficha_classificacao SET codigo='$codigo',consolidada='$consolidada',id_identificacao='$id_identificacao',id_contexto_educacional='$id_contexto_educacional',id_tema_ambiental='$id_tema_ambiental',id_tema_estudo='$id_tema_estudo',id_resumo='$id_resumo',id_detalhes_finais='$id_detalhes_finais',id_publico_envolvido='$id_publico_envolvido',id_area_conhecimento='$id_area_conhecimento',id_modalidades='$id_modalidades',id_area_curricular='$id_area_curricular' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM ficha_classificacao WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM ficha_classificacao WHERE codigo LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Ficha_classificacao($data['id'],$data['codigo'],$data['consolidada'],$data['id_identificacao'],$data['id_contexto_educacional'],$data['id_tema_ambiental'],$data['id_tema_estudo'],$data['id_resumo'],$data['id_detalhes_finais'],$data['id_publico_envolvido'],$data['id_area_conhecimento'],$data['id_modalidades'],$data['id_area_curricular']);	
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
			$sql = "SELECT * FROM ficha_classificacao WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Ficha_classificacao($data['id'],$data['codigo'],$data['consolidada'],$data['id_identificacao'],$data['id_contexto_educacional'],$data['id_tema_ambiental'],$data['id_tema_estudo'],$data['id_resumo'],$data['id_detalhes_finais'],$data['id_publico_envolvido'],$data['id_area_conhecimento'],$data['id_modalidades'],$data['id_area_curricular']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM ficha_classificacao ORDER BY id ASC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			$obj=null;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Ficha_classificacao($data['id'],$data['codigo'],$data['consolidada'],$data['id_identificacao'],$data['id_contexto_educacional'],$data['id_tema_ambiental'],$data['id_tema_estudo'],$data['id_resumo'],$data['id_detalhes_finais'],$data['id_publico_envolvido'],$data['id_area_conhecimento'],$data['id_modalidades'],$data['id_area_curricular']);	
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