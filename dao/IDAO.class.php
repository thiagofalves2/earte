<?php

  //Interface Padrão de uma classe DAO
  interface IDAO{
	  public function insertData($obj);
	  public function deleteData($obj);	
	  public function selectData($word);
	  public function updateData($obj);
	  public function dbMsg();
  }

?>