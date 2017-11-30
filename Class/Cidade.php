<?php

class Cidade{
	
	private $Nome;
	private $CEP;
	private $ID_city;


// GETS and SETS
public function getID_city(){
	return $this->ID_city;
}
public function setID_city($value){
	$this->ID_city = $value;
}
public function getCEP(){
	return $this->CEP;
}
public function setCEP($value){
	$this->CEP = $value;
}
public function getNome(){
	return $this->Nome;
}
public function setNome($value){
	$this->Nome = $value;
}

	// methods 
public static function getList(){
	$sql= new Sql();
	return $sql->select("SELECT * FROM cidade order by id_city");
}
public static function search($Nome){
	$sql = new Sql();
	return $sql->select("SELECT * FROM cidade WHERE Nome LIKE :SEARCH ORDER BY Nome",array(
		':SEARCH'=>"%".$Nome."%"
	));
}
public function loadById($id){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM cidade where ID_city=:ID", array(
		":ID"=>$id
	));
	
	if (count($results) > 0 ){				
		$this->setData($results[0]);		
	}   
}

public function setData($data){
	
		$this->setID_city($data['ID_city']);
		$this->setNome($data['Nome']);
		$this->setCEP($data ['CEP']);
}
}
//	
//	public function update($Nome,$CEP,$ID_city){
//	$this->setNome($Nome);
//	$this->setCEP($CEP);
//	$this->setID_city($ID_city);
//	
//	$sql= new Sql();
//	$sql->query("UPDATE cidade SET Nome=:Nome, CEP=:CEP WHERE ID_city=:ID",array(
//		':Nome'=>$this->getNome(),
//		':CEP'=>$this->getCEP(),
//		':ID'=>$this->getID_city()
//	));
//}	