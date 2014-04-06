<?php
	require_once("IDAO.class.php");
	require_once("DBFactory.class.php");
	include_once("Tema_estudo.class.php");
	
	class Tema_estudoDAO implements IDAO{
	    
		private static $lastId;
		
		public function insertData($obj){
			$curric_programas_projetos = $obj->getCurric_programas_projetos();
			$conteudo_metodos = $obj->getConteudo_metodos();
			$concep_repres_percep_formador = $obj->getConcep_repres_percep_formador();
			$concep_repres_percep_aprediz = $obj->getConcep_repres_percep_aprediz();
			$recursos_didaticos = $obj->getRecursos_didaticos();
			$linguagem_cognicao = $obj->getLinguagem_cognicao();
			$politicas_publicas_ea = $obj->getPoliticas_publicas_ea();
			$organ_instituicao_escolar = $obj->getOrgan_instituicao_escolar();
			$organ_nao_governamental = $obj->getOrgan_nao_governamental();
			$organ_governamental = $obj->getOrgan_governamental();
			$trab_form_professores_agentes = $obj->getTrab_form_professores_agentes();
			$movim_sociais_ambientalistas = $obj->getMovim_sociais_ambientalistas();
			$fundamentos_ea = $obj->getFundamentos_ea();
			$qcurric_programas_projetos = $obj->getQcurric_programas_projetos();
			$qconteudo_metodos = $obj->getQconteudo_metodos();
			$qconcep_repres_percep_formador = $obj->getQconcep_repres_percep_formador();
			$qconcep_repres_percep_aprediz = $obj->getQconcep_repres_percep_aprediz();
			$qrecursos_didaticos = $obj->getQrecursos_didaticos();
			$qlinguagem_cognicao = $obj->getQlinguagem_cognicao();
			$qpoliticas_publicas_ea = $obj->getQpoliticas_publicas_ea();
			$qorgan_instituicao_escolar = $obj->getQorgan_instituicao_escolar();
			$qorgan_nao_governamental = $obj->getQorgan_nao_governamental();
			$qorgan_governamental = $obj->getQorgan_governamental();
			$qtrab_form_professores_agentes = $obj->getQtrab_form_professores_agentes();
			$qmovim_sociais_ambientalistas = $obj->getQmovim_sociais_ambientalistas();
			$qfundamentos_ea = $obj->getQfundamentos_ea();
			$qtema_estudo = $obj->getQtema_estudo();
			$id_foco = $obj->getId_foco();

			$curric_programas_projetos = addslashes($curric_programas_projetos);
			$conteudo_metodos = addslashes($conteudo_metodos);
			$concep_repres_percep_formador = addslashes($concep_repres_percep_formador);
			$concep_repres_percep_aprediz = addslashes($concep_repres_percep_aprediz);
			$recursos_didaticos = addslashes($recursos_didaticos);
			$linguagem_cognicao = addslashes($linguagem_cognicao);
			$politicas_publicas_ea = addslashes($politicas_publicas_ea);
			$organ_instituicao_escolar = addslashes($organ_instituicao_escolar);
			$organ_nao_governamental = addslashes($organ_nao_governamental);
			$organ_governamental = addslashes($organ_governamental);
			$trab_form_professores_agentes = addslashes($trab_form_professores_agentes);
			$movim_sociais_ambientalistas = addslashes($movim_sociais_ambientalistas);
			$fundamentos_ea = addslashes($fundamentos_ea);
			$qcurric_programas_projetos = addslashes($qcurric_programas_projetos);
			$qconteudo_metodos = addslashes($qconteudo_metodos);
			$qconcep_repres_percep_formador = addslashes($qconcep_repres_percep_formador);
			$qconcep_repres_percep_aprediz = addslashes($qconcep_repres_percep_aprediz);
			$qrecursos_didaticos = addslashes($qrecursos_didaticos);
			$qlinguagem_cognicao = addslashes($qlinguagem_cognicao);
			$qpoliticas_publicas_ea = addslashes($qpoliticas_publicas_ea);
			$qorgan_instituicao_escolar = addslashes($qorgan_instituicao_escolar);
			$qorgan_nao_governamental = addslashes($qorgan_nao_governamental);
			$qorgan_governamental = addslashes($qorgan_governamental);
			$qtrab_form_professores_agentes = addslashes($qtrab_form_professores_agentes);
			$qmovim_sociais_ambientalistas = addslashes($qmovim_sociais_ambientalistas);
			$qfundamentos_ea = addslashes($qfundamentos_ea);
			$qtema_estudo = addslashes($qtema_estudo);
			$id_foco = addslashes($id_foco);
			
			$sql = "INSERT INTO tema_estudo VALUES('NULL','$curric_programas_projetos','$conteudo_metodos','$concep_repres_percep_formador','$concep_repres_percep_aprediz','$recursos_didaticos','$linguagem_cognicao','$politicas_publicas_ea','$organ_instituicao_escolar','$organ_nao_governamental','$organ_governamental','$trab_form_professores_agentes','$movim_sociais_ambientalistas','$fundamentos_ea','$id_foco','$qcurric_programas_projetos','$qconteudo_metodos','$qconcep_repres_percep_formador','$qconcep_repres_percep_aprediz','$qrecursos_didaticos','$qlinguagem_cognicao','$qpoliticas_publicas_ea','$qorgan_instituicao_escolar','$qorgan_nao_governamental','$qorgan_governamental','$qtrab_form_professores_agentes','$qmovim_sociais_ambientalistas','$qfundamentos_ea','$qtema_estudo')";

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
			$curric_programas_projetos = $obj->getCurric_programas_projetos();
			$conteudo_metodos = $obj->getConteudo_metodos();
			$concep_repres_percep_formador = $obj->getConcep_repres_percep_formador();
			$concep_repres_percep_aprediz = $obj->getConcep_repres_percep_aprediz();
			$recursos_didaticos = $obj->getRecursos_didaticos();
			$linguagem_cognicao = $obj->getLinguagem_cognicao();
			$politicas_publicas_ea = $obj->getPoliticas_publicas_ea();
			$organ_instituicao_escolar = $obj->getOrgan_instituicao_escolar();
			$organ_nao_governamental = $obj->getOrgan_nao_governamental();
			$organ_governamental = $obj->getOrgan_governamental();
			$trab_form_professores_agentes = $obj->getTrab_form_professores_agentes();
			$movim_sociais_ambientalistas = $obj->getMovim_sociais_ambientalistas();
			$fundamentos_ea = $obj->getFundamentos_ea();
			$qcurric_programas_projetos = $obj->getQcurric_programas_projetos();
			$qconteudo_metodos = $obj->getQconteudo_metodos();
			$qconcep_repres_percep_formador = $obj->getQconcep_repres_percep_formador();
			$qconcep_repres_percep_aprediz = $obj->getQconcep_repres_percep_aprediz();
			$qrecursos_didaticos = $obj->getQrecursos_didaticos();
			$qlinguagem_cognicao = $obj->getQlinguagem_cognicao();
			$qpoliticas_publicas_ea = $obj->getQpoliticas_publicas_ea();
			$qorgan_instituicao_escolar = $obj->getQorgan_instituicao_escolar();
			$qorgan_nao_governamental = $obj->getQorgan_nao_governamental();
			$qorgan_governamental = $obj->getQorgan_governamental();
			$qtrab_form_professores_agentes = $obj->getQtrab_form_professores_agentes();
			$qmovim_sociais_ambientalistas = $obj->getQmovim_sociais_ambientalistas();
			$qfundamentos_ea = $obj->getQfundamentos_ea();
			$qtema_estudo = $obj->getQtema_estudo();
			$id_foco = $obj->getId_foco();

			$curric_programas_projetos = addslashes($curric_programas_projetos);
			$conteudo_metodos = addslashes($conteudo_metodos);
			$concep_repres_percep_formador = addslashes($concep_repres_percep_formador);
			$concep_repres_percep_aprediz = addslashes($concep_repres_percep_aprediz);
			$recursos_didaticos = addslashes($recursos_didaticos);
			$linguagem_cognicao = addslashes($linguagem_cognicao);
			$politicas_publicas_ea = addslashes($politicas_publicas_ea);
			$organ_instituicao_escolar = addslashes($organ_instituicao_escolar);
			$organ_nao_governamental = addslashes($organ_nao_governamental);
			$organ_governamental = addslashes($organ_governamental);
			$trab_form_professores_agentes = addslashes($trab_form_professores_agentes);
			$movim_sociais_ambientalistas = addslashes($movim_sociais_ambientalistas);
			$fundamentos_ea = addslashes($fundamentos_ea);
			$qcurric_programas_projetos = addslashes($qcurric_programas_projetos);
			$qconteudo_metodos = addslashes($qconteudo_metodos);
			$qconcep_repres_percep_formador = addslashes($qconcep_repres_percep_formador);
			$qconcep_repres_percep_aprediz = addslashes($qconcep_repres_percep_aprediz);
			$qrecursos_didaticos = addslashes($qrecursos_didaticos);
			$qlinguagem_cognicao = addslashes($qlinguagem_cognicao);
			$qpoliticas_publicas_ea = addslashes($qpoliticas_publicas_ea);
			$qorgan_instituicao_escolar = addslashes($qorgan_instituicao_escolar);
			$qorgan_nao_governamental = addslashes($qorgan_nao_governamental);
			$qorgan_governamental = addslashes($qorgan_governamental);
			$qtrab_form_professores_agentes = addslashes($qtrab_form_professores_agentes);
			$qmovim_sociais_ambientalistas = addslashes($qmovim_sociais_ambientalistas);
			$qfundamentos_ea = addslashes($qfundamentos_ea);
			$qtema_estudo = addslashes($qtema_estudo);
			$id_foco = addslashes($id_foco);
			
		    $sql = "UPDATE tema_estudo SET curric_programas_projetos='$curric_programas_projetos',conteudo_metodos='$conteudo_metodos',concep_repres_percep_formador='$concep_repres_percep_formador',concep_repres_percep_aprediz='$concep_repres_percep_aprediz',recursos_didaticos='$recursos_didaticos',linguagem_cognicao='$linguagem_cognicao',politicas_publicas_ea='$politicas_publicas_ea',organ_instituicao_escolar='$organ_instituicao_escolar',organ_nao_governamental='$organ_nao_governamental',organ_governamental='$organ_governamental',trab_form_professores_agentes='$trab_form_professores_agentes',movim_sociais_ambientalistas='$movim_sociais_ambientalistas',fundamentos_ea='$fundamentos_ea',qcurric_programas_projetos='$qcurric_programas_projetos',qconteudo_metodos='$qconteudo_metodos',qconcep_repres_percep_formador='$qconcep_repres_percep_formador',qconcep_repres_percep_aprediz='$qconcep_repres_percep_aprediz',qrecursos_didaticos='$qrecursos_didaticos',qlinguagem_cognicao='$qlinguagem_cognicao',qpoliticas_publicas_ea='$qpoliticas_publicas_ea',qorgan_instituicao_escolar='$qorgan_instituicao_escolar',qorgan_nao_governamental='$qorgan_nao_governamental',qorgan_governamental='$qorgan_governamental',qtrab_form_professores_agentes='$qtrab_form_professores_agentes',qmovim_sociais_ambientalistas='$qmovim_sociais_ambientalistas',qfundamentos_ea='$qfundamentos_ea',qtema_estudo='$qtema_estudo',id_foco='$id_foco' WHERE id = $id";
	
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			
			return $result;
		}
		
		public function deleteData($obj){
			DBFactory::getConnection();
			$id = $obj->getId();
			
			$sql = "DELETE FROM tema_estudo WHERE id='$id'";
			$result = DBFactory::query($sql);
			
			DBFactory::closeConnection();
			return $result;
		}
		
		public function selectData($word){
			DBFactory::getConnection();
			
			$word = addslashes($word);
			
			$sql = "SELECT * FROM tema_estudo WHERE curric_programas_projetos LIKE '$word%'";
			$result = DBFactory::query($sql);
			
			$i=0;
			
			while($data = mysql_fetch_array($result,MYSQL_ASSOC)){
				$obj[$i] = new Tema_estudo($data['id'],$data['curric_programas_projetos'],$data['conteudo_metodos'],$data['concep_repres_percep_formador'],$data['concep_repres_percep_aprediz'],$data['recursos_didaticos'],$data['linguagem_cognicao'],$data['politicas_publicas_ea'],$data['organ_instituicao_escolar'],$data['organ_nao_governamental'],$data['organ_governamental'],$data['trab_form_professores_agentes'],$data['movim_sociais_ambientalistas'],$data['fundamentos_ea'],$data['qcurric_programas_projetos'],$data['qconteudo_metodos'],$data['qconcep_repres_percep_formador'],$data['qconcep_repres_percep_aprediz'],$data['qrecursos_didaticos'],$data['qlinguagem_cognicao'],$data['qpoliticas_publicas_ea'],$data['qorgan_instituicao_escolar'],$data['qorgan_nao_governamental'],$data['qorgan_governamental'],$data['qtrab_form_professores_agentes'],$data['qmovim_sociais_ambientalistas'],$data['qfundamentos_ea'],$data['qtema_estudo'],$data['id_foco']);	
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
			$sql = "SELECT * FROM tema_estudo WHERE id=$id";

			$result = mysql_query($sql);
			
			$i = 0;
			$data = mysql_fetch_array($result);
			$obj = new Tema_estudo($data['id'],$data['curric_programas_projetos'],$data['conteudo_metodos'],$data['concep_repres_percep_formador'],$data['concep_repres_percep_aprediz'],$data['recursos_didaticos'],$data['linguagem_cognicao'],$data['politicas_publicas_ea'],$data['organ_instituicao_escolar'],$data['organ_nao_governamental'],$data['organ_governamental'],$data['trab_form_professores_agentes'],$data['movim_sociais_ambientalistas'],$data['fundamentos_ea'],$data['qcurric_programas_projetos'],$data['qconteudo_metodos'],$data['qconcep_repres_percep_formador'],$data['qconcep_repres_percep_aprediz'],$data['qrecursos_didaticos'],$data['qlinguagem_cognicao'],$data['qpoliticas_publicas_ea'],$data['qorgan_instituicao_escolar'],$data['qorgan_nao_governamental'],$data['qorgan_governamental'],$data['qtrab_form_professores_agentes'],$data['qmovim_sociais_ambientalistas'],$data['qfundamentos_ea'],$data['qtema_estudo'],$data['id_foco']);
	
			DBFactory::closeConnection();
			
			return $obj;
		}
		
		public function allData(){
			$sql = "SELECT * FROM tema_estudo ORDER BY id DESC";

			DBFactory::getConnection();
			echo DBFactory::msg(DBFactory::getConnection());
			$result = mysql_query($sql);
			
			$i = 0;
			while($data = mysql_fetch_array($result)){
				$obj[$i] = new Tema_estudo($data['id'],$data['curric_programas_projetos'],$data['conteudo_metodos'],$data['concep_repres_percep_formador'],$data['concep_repres_percep_aprediz'],$data['recursos_didaticos'],$data['linguagem_cognicao'],$data['politicas_publicas_ea'],$data['organ_instituicao_escolar'],$data['organ_nao_governamental'],$data['organ_governamental'],$data['trab_form_professores_agentes'],$data['movim_sociais_ambientalistas'],$data['fundamentos_ea'],$data['qcurric_programas_projetos'],$data['qconteudo_metodos'],$data['qconcep_repres_percep_formador'],$data['qconcep_repres_percep_aprediz'],$data['qrecursos_didaticos'],$data['qlinguagem_cognicao'],$data['qpoliticas_publicas_ea'],$data['qorgan_instituicao_escolar'],$data['qorgan_nao_governamental'],$data['qorgan_governamental'],$data['qtrab_form_professores_agentes'],$data['qmovim_sociais_ambientalistas'],$data['qfundamentos_ea'],$data['qtema_estudo'],$data['id_foco']);	
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