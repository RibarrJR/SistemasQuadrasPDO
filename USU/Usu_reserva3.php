<?php 
session_start();
require("../Class/Horario.php");
require("../Class/Sql.php");
if($_SESSION['logged_in']==true){
if(isset($_POST['id_quadra'])){
	$idq=$_POST['id_quadra'];
	$_SESSION['id_quadra']=$idq;
	
}
	
if(isset($_SESSION['id_quadra'])){
	$idq=$_SESSION['id_quadra'];

require_once("../config.php");
include("Usu_header.php");
include("Usu_menu.php");
	
?>
<div class="container">
	<div class="container">
		<a href="Usu_reserva2.php"><button class="btn btn-secondary btn-lg  center">Voltar</button></a>
	</div>
	<table class="table table-small table-responsive-md table-dark table-striped">
		<thead class="thead-dark">
		
			<tr>
				<th scope="col"><span>#</span></th>
				<th scope="col"><img src="../Img/icons/inicios_1x.png" data-toggle="tooltip" data-placement="top" title="Inicio Do horario"><img/></th>
				<th scope="col"><img src="../Img/icons/fins_1x.png" data-toggle="tooltip" data-placement="top" title="Fim do horario"></th>
				<th scope="col"><img src="../Img/icons/info.png" data-toggle="tooltip" data-placement="top" title="Opções"></th>

			</tr>
		</thead>
		<tbody>
			<?php
$hr = Horario::loadByDisp($idq);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);
					$i=0;
foreach($objeto_php as $key =>$colecao){
	$i++;
	
	?>
				<tr class="table">

					<?php
	echo "<td>".$i."</td>";
	echo "<td>".$colecao->hr_start."</td>";
	echo "<td>".$colecao->hr_fim."</td>";
	?>

						<td><a href="../verifica.php?ID_hra=<?php echo $colecao->ID_hr; ?>" data-toggle="tooltip" data-placement="right" title="Enviar requisição!"><i style="font-size:36px;" class="material-icons md-36 enviar" >send</i></a>
						</td>
				</tr>


				<?php
}
			?>

		</tbody>
	</table>
</div>


<?php
}
}else{
header("location:../index.php?er=1");
}

?>
