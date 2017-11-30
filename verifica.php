<?php
require_once('config.php');
session_start();

if(isset($_SESSION['logged_inA']) || isset($_SESSION['logged_in']) ){
	if(isset($_SESSION['logged_inA'])){
		if(isset($_GET['confirma'])){
			$hrID=$_GET['ID_hra'];	
			$userID=$_SESSION["user_id"];
			echo $userID;
			echo $hrID;
			if($_GET['confirma']==0){
				$status=0;
				$hr= new Horario();
				$hr->confirmar($status,$hrID);
				$hr->confirmado_por($userID,$hrID);
				header("location:Adm_horarios.php");
			}
			else{
				$status=2;
				$hr= new Horario();
				$hr->confirmar($status,$hrID,$userID);
				$hr->confirmado_por($userID,$hrID);
				header("location:Adm_horarios.php");
			}
		}
	}
}
else{
	if(isset($_POST['login']) && isset($_POST['senha'])){
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$usuario =new User();
		$responseU = $usuario->login($login,$senha);
		$responseA = $usuario->loginA($login,$senha);

		if($responseU==true){
			$_SESSION['logged_in']=true;
		header("location:control_panel.php");
		$_SESSION['user_name']=$usuario->getLogin();
		$_SESSION['user_id']=$usuario->getID();
		}
		else{
			if($responseA ==true){
				$_SESSION['logged_inA']=true;
				$_SESSION['user_name']=$usuario->getLogin();
				$_SESSION['user_id']=$usuario->getID();
				header("location:Adm_control-panel.php");
			}
			else{
			$_SESSION['logged_inA']==false;
			unset($_SESSION);
			header("location:index.php?er=2");	
			}
		}	
	}
}

?>