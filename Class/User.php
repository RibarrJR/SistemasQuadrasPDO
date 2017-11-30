<?php

class User{
	
	private $id_user;
	private $telefone;
	private $login;
	private $moral;
	private $senha;
	private $email;

public static function getList(){
	$sql= new Sql();
	return $sql->select("SELECT * FROM usuario order by id_user");
}
public static function search($login){
	$sql = new Sql();
	return $sql->select("SELECT * FROM usuario WHERE login LIKE :SEARCH ORDER BY login",array(
		':SEARCH'=>"%".$login."%"
	));
}

	
public function getID(){
	return $this->id_user;
}
public function setID($value){
	$this->id_user = $value;
}
public function getLogin(){
	return $this->login;
}
public function setLogin($value){
	$this->login = $value;
}
public function getSenha(){
	return $this->senha;
}
public function setSenha($value){
	$this->senha = $value;
}
public function getEmail(){
	return $this->email;
}
public function setEmail($value){
	$this->email = $value;
}
public function getTelefone(){
	return $this->telefone;
}
public function setTelefone($value){
	$this->telefone = $value;
}
public function getMoral(){
	return $this->moral;
}
public function setMoral($value){
	$this->moral = $value;
}

public function loadById($id){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM usuario where id_user=:ID", array(
		":ID"=>$id
	));
	
	if (count($results) > 0 ){
				
		$this->setData($results[0]);
		
	}   
}
	
	
public function loginA ($login,$senha){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM administrador WHERE Login=:LOGIN AND Password =:SENHA", array(
		":LOGIN"=>$login,
		":SENHA"=>$senha
	));
	
	if (count($results) > 0 ){
		$this->setDataA($results[0]);	
		return true;
			
	} else{
		return false;
	}
}
	
	
public function login ($login,$senha){
	
	$sql =new Sql();
	
	$results = $sql -> select("SELECT * FROM usuario WHERE login=:LOGIN AND senha =:SENHA", array(
		":LOGIN"=>$login,
		":SENHA"=>$senha
	));
	
	if (count($results) > 0 ){
		$this->setData($results[0]);			
		return true;
		
	} else{
		return false;
	}
}
	
public function setData($data){
		$this->setID($data['id_user']);
		$this->setTelefone($data['telefone']);
		$this->setLogin($data ['login']);
		$this->setMoral($data['moral']);
		$this->setSenha($data['senha']);
		$this->setEmail($data['email']);
}
	public function setDataA($data){
		$this->setID($data['ID_adm']);
		$this->setLogin($data['Login']);
		$this->setSenha($data['Password']);
		$this->setEmail($data['Email']);
		$this->setTelefone($data['Telefone']);
		
		
	}
	
public function update($login,$senha,$telefone,$email){
	$this->setLogin($login);
	$this->setSenha($senha);
	$this->setTelefone($telefone);
	$this->setEmail($email);
	
	$sql= new Sql();
	$sql->query("UPDATE usuario SET login=:LOGIN, senha=:SENHA,telefone=:TEL,email=:EMAIL WHERE id_user=:ID",array(
		':LOGIN'=>$this->getLogin(),
		':SENHA'=>$this->getSenha(),
		':TEL'=>$this->getTelefone(),
		':EMAIL'=>$this->getEmail(),
		':ID'=>$this->getID()
	));
}	
	
public function delete(){
	$sql= new Sql();
	$sql->query("DELETE FROM usuario WHERE id_user=:ID",array(
		':ID'=> $this->getID()
		));
	$this->setID(0);
	$this->setLogin("");
	$this->setSenha("");
	$this->setTelefone("");
	$this->setMoral("");
	$this->setEmail("");
	}
	
	
public function insert(){
	$sql= new Sql();
	$results =$sql->select("CALL sp_usuarios_insert(:LOGIN,:SENHA,:TEL,:EMAIL)",array(
	
	':LOGIN'=>$this->getLogin(),
	':SENHA'=>$this->getSenha(),
	':TEL'=>$this->getTelefone(),
	':EMAIL'=>$this->getEmail(),
	));	
	if(count($results)>0){	
		$this->setData($results[0]);
	}	
}
	
	
public function __toString(){
	
	return json_encode(array(
		"id_user"=>$this->getID(),	
		"telefone"=>$this->getTelefone(),
		"login"=>$this->getLogin(),	
		"moral"=>$this->getMoral(),
		"senha"=>$this->getSenha(),
		"email"=>$this->getEmail()
	));
}}
?>