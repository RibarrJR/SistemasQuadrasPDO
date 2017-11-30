

<?php
require_once("config.php");
//Carrega um usuario
//$root = new User();
//$root->loadById(1);
//echo $root;

//Carrega TODOS
//$lista = User::getList();
//echo json_encode($lista);

//Carregauma lista buscando pelo nome
//
//$search =User::search("");
//$obj= json_encode($search);
//$objeto_php = json_decode($obj);
//
//foreach($objeto_php as $key =>$colecao){
//	
//	echo "O Login é:".$colecao->login;
//	echo "</br>";
//	echo "Telefone:".$colecao->telefone;
//	echo "</br>";
//	echo "</br>";
//}

//carrega usuario usando login e senha
//$usuario =new User();
//$usuario->login("Junior","jr18");
//echo ($usuario);

//inserindo usuario novo
//$user = new User();
//
//$user ->setLogin("Olier");
//$user ->setSenha("olier2");
//$user->setTelefone('519897588');
//$user->setEmail('j_ribar@hotma.com');
//$user->insert();
//
//echo $user;
//
//altera usuarios
//$usuario=new User();
//$usuario->loadByID(22);
//$usuario->update("Julior","ir3","519383948","jul@gmail.com");
//echo $usuario;
//deleta usuario

//$usuario= new User();
//$usuario ->loadById(3);
//$usuario->delete();
//echo $usuario;
/*============================= CIDADE ==============================*/
//printa as cidades pelo id

//$cidade= new Cidade();
//$cidade->loadByID(1);
////$cidade->update("Julior","ir3","519383948","jul@gmail.com");
//print_r( $cidade);

//carrega todasas cidades
$lista = Cidade::getList();
echo json_encode($lista);


/*============================= LOCAL ==============================*/

//$local= new Local();
//$local->loadByID(1);
//$cidade->update("Julior","ir3","519383948","jul@gmail.com");
//print_r( $local);

//$lista = Local::getList();
//echo json_encode($lista);

/*========================= Modalidade ==============================*/

//$modal= new Modalidade();
//$modal->loadByID(1);
//print_r( $modal);

/*========================= Quadra ==============================*/

//$qd= new Quadra();
//$qd->loadByID(1);
//print_r( $qd);
/*========================= Horarios ==============================*/

$hr =Horario::loadByDisp(1);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);
foreach($objeto_php as $key =>$colecao){
	
	echo "Inicio:".$colecao->hr_start;
	echo "</br>";
	echo "Fim:".$colecao->hr_fim;
	echo "</br>";
	echo "</br>";
}
//$hr= new Horario();
//$hr->loadByID(1);
//print_r( $hr);
//$hr->loadByDisp(1);

//print_r( $hr);
?>