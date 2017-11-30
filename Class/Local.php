<?php

class Local{
	
	private $cidade;
	private $ID_local;
	private $nome_local;
	private $telefone;
	private $endereco;
	


// GETS and SETS
public function getID_local(){
	return $this->ID_local;
}
public function setID_local($value){
	$this->ID_local = $value;
}
public function getCidade(){
	return $this->cidade;
}
public function setCidade($value){
	$this->cidade = $value;
}
public function getTelefone(){
	return $this->telefone;
}
public function setTelefone($value){
	$this->telefone = $value;
}
public function getNome_local(){
	return $this->nome_local;
}
public function setNome_local($value){
	$this->nome_local = $value;
}
public function getEndereco(){
	return $this->endereco;
}
public function setEndereco($value){
	$this->endereco = $value;
}

	// methods 
public static function getList(){
	$sql= new Sql();
	return $sql->select("SELECT * FROM local order by ID_local");
}
public static function search($Nome){
	$sql = new Sql();
	return $sql->select("SELECT * FROM local WHERE nome_local LIKE :SEARCH ORDER BY nome_local",array(
		':SEARCH'=>"%".$Nome."%"
	));
}
public function loadById($id){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM local where ID_local=:ID", array(
		":ID"=>$id
	));
	
	if (count($results) > 0 ){
				
		$this->setData($results[0]);
		
	}   
}
	public function setData($data){
	
		$this->setendereco($data ['endereco']);
		$this->setTelefone($data ['telefone']);
		$this->setNome_local($data['nome_local']);
		$this->setID_local($data['ID_local']);
		$this->setCidade($data ['cidade']);
		
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