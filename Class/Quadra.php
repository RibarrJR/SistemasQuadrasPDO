<?php

class Quadra{
	
	private $id_local;
	private $modalidade;
	private $nome;
	private $ID_quadra;
	private $descricao;
	

// GETS and SETS
public function getID_quadra(){
	return $this->ID_quadra;
}
public function setID_quadra($value){
	$this->ID_quadra = $value;
}
public function getNome(){
	return $this->nome;
}
public function setNome($value){
	$this->nome = $value;
}
public function getModalidade(){
	return $this->modalidade;
}
public function setModalidade($value){
	$this->modalidade= $value;
}
public function getId_local(){
	return $this->id_local;
}
public function setId_local($value){
	$this->id_local= $value;
}
public function getDescricao(){
	return $this->descricao;
}
public function setDescricao($value){
	$this->descricao= $value;
}

	// methods 
public static function getList(){
	$sql= new Sql();
	return $sql->select("SELECT * FROM quadra order by ID_quadra");
}
	
public static function getList_local($id){
	$sql= new Sql();
	return $sql->select("SELECT quadra.nome, quadra.ID_quadra FROM local,quadra WHERE cidade=:ID and local.ID_local=quadra.id_local",array(
		':ID'=>$id));
}
public static function search($Nome){
	$sql = new Sql();
	return $sql->select("SELECT * FROM quadra WHERE nome LIKE :SEARCH ORDER BY nome",array(
		':SEARCH'=>"%".$Nome."%"
	));
}
public function loadById($id){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM quadra where ID_quadra=:ID", array(
		":ID"=>$id
	));
	
	if (count($results) > 0 ){
				
		$this->setData($results[0]);
		
	}   
}
	public function setData($data){
	
		$this->setId_local($data ['id_local']);
		$this->setModalidade($data ['modalidade']);	
		$this->setNome($data ['nome']);	
		$this->setID_quadra($data ['ID_quadra']);	
		$this->setDescricao($data ['descricao']);	
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