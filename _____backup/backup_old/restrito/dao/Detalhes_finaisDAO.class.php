<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Detalhes_finais.class.php");
	
	class Detalhes_finaisDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$observacoes = $obj->getObservacoes();
			$palavras_chave = $obj->getPalavras_chave();
			$url_trabalho = $obj->getUrl_trabalho();
			$url_resumo = $obj->getUrl_resumo();
			$doc_classificado_por = $obj->getDoc_classificado_por();
			$data_classificacao = $obj->getData_classificacao();

			$observacoes = addslashes($observacoes);
			$palavras_chave = addslashes($palavras_chave);
			$url_trabalho = addslashes($url_trabalho);
			$url_resumo = addslashes($url_resumo);
			$doc_classificado_por = addslashes($doc_classificado_por);
			$data_classificacao = addslashes($data_classificacao);
			
			$sql = "INSERT INTO detalhes_finais VALUES('NULL','$observacoes','$palavras_chave','$url_trabalho','$url_resumo','$doc_classificado_por','$data_classificacao')";

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
			$observacoes = $obj->getObservacoes();
			$palavras_chave = $obj->getPalavras_chave();
			$url_trabalho = $obj->getUrl_trabalho();
			$url_resumo = $obj->getUrl_resumo();
			$doc_classificado_por = $obj->getDoc_classificado_por();
			$data_classificacao = $obj->getData_classificacao();

			$observacoes = addslashes($observacoes);
			$palavras_chave = addslashes($palavras_chave);
			$url_trabalho = addslashes($url_trabalho);
			$url_resumo = addslashes($url_resumo);
			$doc_classificado_por = addslashes($doc_classificado_por);
			$data_classificacao = addslashes($data_classificacao);
			
		    $sql = "UPDATE detalhes_finais SET observacoes='$observacoes',palavras_chave='$palavras_chave',url_trabalho='$url_trabalho',url_resumo='$url_resumo',doc_classificado_por='$doc_classificado_por',data_classificacao='$data_classificacao' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM detalhes_finais WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM detalhes_finais WHERE observacoes LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Detalhes_finais($data['id'],$data['observacoes'],$data['palavras_chave'],$data['url_trabalho'],$data['url_resumo'],$data['doc_classificado_por'],$data['data_classificacao']);	
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
			$sql = "SELECT * FROM detalhes_finais WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Detalhes_finais($data['id'],$data['observacoes'],$data['palavras_chave'],$data['url_trabalho'],$data['url_resumo'],$data['doc_classificado_por'],$data['data_classificacao']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM detalhes_finais ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			$obj=null;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Detalhes_finais($data['id'],$data['observacoes'],$data['palavras_chave'],$data['url_trabalho'],$data['url_resumo'],$data['doc_classificado_por'],$data['data_classificacao']);	
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