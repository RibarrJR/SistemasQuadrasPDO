<?php 
// acesso as functions.php
include('functions.php');

//recebe os valores por post

$login = $_POST['login'];
$senha = $_POST['senha'];
 
//verifica se o login e senha esta vazio
if (empty($login) || empty($senha))
//se algum dos valores acima for vazio retorna erro pro index	
{header("location:index.php?er=3");
}
//senão prossegue o codigo
else{

 // prepara  a query
if($sql = $mysqli->prepare("SELECT id_adm, Login FROM administrador WHERE Login = ? AND Password= ? ")){
// atribui valores às variáveis da consulta

$sql->bind_param('sd', $login,$senha);
  $sql->execute();
	// atribui o resultado encontrado a variáveis
  $sql->bind_result($id, $login);
	// resultado jogado em sql usando fetch..(populando $sql)
  while ($sql->fetch()) {	 
  } 
	// fim while
	// Total de usuarios retornados
  // Fecha a consulta
	if($sql->num_rows==1){
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id'] = $id;
		$_SESSION['user_name'] = $login;	
		header('location:Adm_control-panel.php');
		}
	else{
		header('location:index.php?er=2');
		?>
<?php
	}
	
  	$sql->close();
	$mysqli->close();

}
}
?>

