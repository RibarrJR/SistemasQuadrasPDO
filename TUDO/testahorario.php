<?php
require_once("functions.php");
session_start();
$id=$_session["user_id"];

if($sql = $mysqli->prepare("SELECT login, hr_fim FROM horarios,horarios_marcados WHERE =?")){
// atribui valores às variáveis da consulta

$sql->bind_param('sd', $login,$senha);
  $sql->execute();
	// atribui o resultado encontrado a variáveis
  $sql->bind_result($id, $login);
	// resultado jogado em sql usando fetch..(populando $sql)
  while ($sql->fetch()) {	

  }

?>
