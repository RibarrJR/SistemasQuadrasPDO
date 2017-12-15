<?php
require_once('config.php');
session_start();

if(isset($_SESSION['logged_inA'])){
		if(isset($_GET['cancela'])){
			$hrID=$_GET['ID_hra'];	
			$userID=NULL;
			if($_GET['ID_hra']){
				$status=0;
				$hr= new Horario();
				$hr->confirmar($status,$hrID);
				$hr->confirmado_por($userID,$hrID);
				$hr->deleteMarcado($hrID);
				header("location:ADM/Adm_horarios.php");
			}
			else{	
				echo "não foi possivel cancelar";
		header("Refresh=5; url=ADM/Adm_control-panel.php");
			}
		}else{
			header("location:ADM/Adm_control-panel.php");
		}
	}
	else{

		echo "impossivel excluir Horario";
	}




	?>