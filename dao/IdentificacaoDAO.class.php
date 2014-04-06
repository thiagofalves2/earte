<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Identificacao.class.php");
	
	class IdentificacaoDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$titulo = $obj->getTitulo();
			$autor_nome = $obj->getAutor_nome();
			$autor_sobrenome = $obj->getAutor_sobrenome();
			$orientador = $obj->getOrientador();
			$ano_defesa = $obj->getAno_defesa();
			$numero_paginas = $obj->getNumero_paginas();
			$programa_pos = $obj->getPrograma_pos();
			$ies = $obj->getIes();
			$unidade_setor = $obj->getUnidade_setor();
			$estado = $obj->getEstado();
			$cidade = $obj->getCidade();
			$grau_titulacao_academica = $obj->getGrau_titulacao_academica();
			$dependencia_administrativa = $obj->getDependencia_administrativa();

			$titulo = addslashes($titulo);
			$autor_nome = addslashes($autor_nome);
			$autor_sobrenome = addslashes($autor_sobrenome);
			$orientador = addslashes($orientador);
			$ano_defesa = addslashes($ano_defesa);
			$numero_paginas = addslashes($numero_paginas);
			$programa_pos = addslashes($programa_pos);
			$ies = addslashes($ies);
			$unidade_setor = addslashes($unidade_setor);
			$estado = addslashes($estado);
			$cidade = addslashes($cidade);
			$grau_titulacao_academica = addslashes($grau_titulacao_academica);
			$dependencia_administrativa = addslashes($dependencia_administrativa);
			
			$sql = "INSERT INTO identificacao VALUES('NULL','$titulo','$autor_nome','$autor_sobrenome','$orientador','$ano_defesa','$numero_paginas','$programa_pos','$ies','$unidade_setor','$estado','$cidade','$grau_titulacao_academica','$dependencia_administrativa')";

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
			$titulo = $obj->getTitulo();
			$autor_nome = $obj->getAutor_nome();
			$autor_sobrenome = $obj->getAutor_sobrenome();
			$orientador = $obj->getOrientador();
			$ano_defesa = $obj->getAno_defesa();
			$numero_paginas = $obj->getNumero_paginas();
			$programa_pos = $obj->getPrograma_pos();
			$ies = $obj->getIes();
			$unidade_setor = $obj->getUnidade_setor();
			$estado = $obj->getEstado();
			$cidade = $obj->getCidade();
			$grau_titulacao_academica = $obj->getGrau_titulacao_academica();
			$dependencia_administrativa = $obj->getDependencia_administrativa();

			$titulo = addslashes($titulo);
			$autor_nome = addslashes($autor_nome);
			$autor_sobrenome = addslashes($autor_sobrenome);
			$orientador = addslashes($orientador);
			$ano_defesa = addslashes($ano_defesa);
			$numero_paginas = addslashes($numero_paginas);
			$programa_pos = addslashes($programa_pos);
			$ies = addslashes($ies);
			$unidade_setor = addslashes($unidade_setor);
			$estado = addslashes($estado);
			$cidade = addslashes($cidade);
			$grau_titulacao_academica = addslashes($grau_titulacao_academica);
			$dependencia_administrativa = addslashes($dependencia_administrativa);
			
		    $sql = "UPDATE identificacao SET titulo='$titulo',autor_nome='$autor_nome',autor_sobrenome='$autor_sobrenome',orientador='$orientador',ano_defesa='$ano_defesa',numero_paginas='$numero_paginas',programa_pos='$programa_pos',ies='$ies',unidade_setor='$unidade_setor',estado='$estado',cidade='$cidade',grau_titulacao_academica='$grau_titulacao_academica',dependencia_administrativa='$dependencia_administrativa' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM identificacao WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM identificacao WHERE titulo LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Identificacao($data['id'],$data['titulo'],$data['autor_nome'],$data['autor_sobrenome'],$data['orientador'],$data['ano_defesa'],$data['numero_paginas'],$data['programa_pos'],$data['ies'],$data['unidade_setor'],$data['estado'],$data['cidade'],$data['grau_titulacao_academica'],$data['dependencia_administrativa']);	
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
			$sql = "SELECT * FROM identificacao WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Identificacao($data['id'],$data['titulo'],$data['autor_nome'],$data['autor_sobrenome'],$data['orientador'],$data['ano_defesa'],$data['numero_paginas'],$data['programa_pos'],$data['ies'],$data['unidade_setor'],$data['estado'],$data['cidade'],$data['grau_titulacao_academica'],$data['dependencia_administrativa']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM identificacao ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Identificacao($data['id'],$data['titulo'],$data['autor_nome'],$data['autor_sobrenome'],$data['orientador'],$data['ano_defesa'],$data['numero_paginas'],$data['programa_pos'],$data['ies'],$data['unidade_setor'],$data['estado'],$data['cidade'],$data['grau_titulacao_academica'],$data['dependencia_administrativa']);	
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