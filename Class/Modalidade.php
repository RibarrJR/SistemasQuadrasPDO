<?php

class Modalidade{
	
	private $Nome;
	private $ID_mod;

// GETS and SETS
public function getID_mod(){
	return $this->ID_mod;
}
public function setID_mod($value){
	$this->ID_mod = $value;
}
public function getNome(){
	return $this->Nome;
}
public function setNome($value){
	$this->Nome= $value;
}

	// methods 
public static function getList(){
	$sql= new Sql();
	return $sql->select("SELECT * FROM modalidades order by ID_mod");
}
public static function search($Nome){
	$sql = new Sql();
	return $sql->select("SELECT * FROM modalidades WHERE Nome LIKE :SEARCH ORDER BY Nome",array(
		':SEARCH'=>"%".$Nome."%"
	));
}
public function loadById($id){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM modalidades where ID_mod=:ID", array(
		":ID"=>$id
	));
	
	if (count($results) > 0 ){
				
		$this->setData($results[0]);
		
	}   
}
	public function setData($data){
	
		$this->setID_mod($data ['ID_mod']);
		$this->setNome($data ['Nome']);	
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