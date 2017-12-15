<?php
	session_start();
if($_SESSION['logged_in']==true){
	


require_once("../config.php");
require_once("../Class/User.php");
require_once("../Class/Sql.php");
require_once("Usu_header.php");
require_once("Usu_menu.php");
$id=$_SESSION["user_id"];
	$user = new User();
	$user->loadById($id);
if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["telefone"]) && isset($_POST["senha"]) && isset($_POST["confirma"]) && isset($_POST["novasenha"]))
		{
			 $login=$_POST["login"];
			 $email=$_POST["email"];
			 $telefone=$_POST["telefone"];
			 $senha=$_POST["senha"];
			 $confirma=$_POST["confirma"];
			 $novasenha=$_POST["novasenha"];
			 if($senha==$user->getSenha()){
				if($novasenha==$confirma){
				$user->update($login,$novasenha,$telefone,$email);

				?>
				<div class="container">
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Sucesso na alteração dos dados
  </div>
</div>
			<?php
				}
				else{
					?><div class="container">
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Senhas novas não coincidem !
  </div>
</div>
			<?php	}			

			}else{
?>

		<div class="container">
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Sua senha está errada !
  </div>
</div>
<?php
			}
		}

	?>
	<body>
		<div class="main">
			<div class="conteudo-perfil">
				<form method="post" action="Usu_perfil.php">
					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" class="form-control" id="login" name="login" value="<?php echo $login=$user->getLogin(); ?>" placeholder="Digite o Login">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $login=$user->getEmail(); ?>" placeholder="Digite o E-Mail">
					</div>
					<div class="form-group">
						<label for="telefone">Telefone</label>
						<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $login=$user->getTelefone(); ?>" placeholder="Digite o Telefone">
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" name="senha" value="" placeholder="Digite sua senha">
					</div>
					<div class="form-group">
						<label for="senha">Nova Senha</label>
						<input type="password" class="form-control" id="nova senha" name="novasenha" value="" placeholder="Digite a Nova Senha">
					</div>
					<div class="form-group">
						<label for="confirma">Confirmar Nova Senha</label>
						<input type="password" class="form-control" id="confirma" name="confirma" placeholder="Confirmar Nova senha">
					</div>
					<div class="form-group">
						<button type="submit" class="loga btn btn ">Enviar</button>
					</div>
				</form>
			</div>
		</div>
		<?php }?>
	</body>

	</html>
