<?php

class Horario{
	
	private $id_quadra;
	private $status;
	private $hr_start;
	private $hr_fim;
	private $ID_hr;
	private $marcado;
	private $confirmado;
	

// GETS and SETS
public function getID_hr(){
	return $this->ID_hr;
}
public function setID_hr($value){
	$this->ID_hr = $value;
}
public function getStatus(){
	return $this->status;
}
public function setStatus($value){
	$this->status = $value;
}
public function getHr_start(){
	return $this->hr_start;
}
public function setHr_start($value){
	$this->hr_start= $value;
}
public function getHr_fim(){
	return $this->hr_fim;
}
public function setHr_fim($value){
	$this->hr_fim= $value;
}
public function getIDquadra(){
	return $this->id_quadra;
}
public function setIDquadra($value){
	$this->id_quadra= $value;
}

	// methods 
public static function getList(){
	$sql= new Sql();
	return $sql->select("SELECT * FROM horarios order by ID_hr");
}
	
public static function getHRAS($ADM){
	$sql= new Sql();
	return $resp=$sql->select("SELECT ID_hr, hr_start,hr_fim,usuario.login, quadra.nome FROM gerencia_quadras,quadra,horarios,horarios_marcados,usuario WHERE gerencia_quadras.id_adm =:ADM and quadra.id_local=gerencia_quadras.id_local and quadra.id_quadra=horarios.id_quadra and horarios.ID_hr=horarios_marcados.id_hora and horarios_marcados.maracado_por=usuario.id_user and horarios.status=3 order by horarios.hr_start",array(
		":ADM"=>$ADM
	));
	}
public function marcar($id_hr){
	$sql =new Sql();
	$sql ->query("UPDATE horarios SET status=3 WHERE ID_hr=:ID",array(
		":ID"=>$id_hr
		));
}
	
public function marcado_por($id_user,$id_hr){
	$sql =new Sql();
	$sql ->query("INSERT INTO horarios_marcados (id_hora,maracado_por, confirmado_por) VALUES (:IDHR, :IDUSER, NULL);",array(
		"IDUSER"=>$id_user,
		"IDHR"=>$id_hr
	));
	
}
	
public function confirmar($status,$id_hr){
	$sql =new Sql();
	$sql ->query("UPDATE horarios SET status=:STATUS WHERE ID_hr=:ID",array(
		":STATUS"=>$status,
		":ID"=>$id_hr
		));
}
public function confirmado_por($id_user,$id_hr){
	$sql =new Sql();
	$sql ->query("UPDATE horarios_marcados SET confirmado_por=:IDUSER WHERE id_hora=:IDHR",array(
		"IDUSER"=>$id_user,
		"IDHR"=>$id_hr
	));
	
}
	
public static function loadByDisp($id_quadra){
	$sql =new Sql();
	return $sql -> select("SELECT horarios.ID_hr,horarios.hr_start, horarios.hr_fim FROM horarios,quadra WHERE horarios.status=1 and horarios.id_quadra=quadra.ID_quadra and quadra.ID_quadra=:QUADRA",array(
		":QUADRA"=>$id_quadra
	));
}
	
public function loadById($id){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM horarios where ID_hr=:ID", array(
		":ID"=>$id
	));
	
	if (count($results) > 0 ){
				
		$this->setData($results[0]);
		
	}   
}

public function setData($data){
	
		$this->setIDquadra($data ['id_quadra']);
		$this->setStatus($data ['status']);	
		$this->setHr_start($data ['hr_start']);	
		$this->setHr_fim($data ['hr_fim']);	
		$this->setID_hr($data ['ID_hr']);	
}
}
	