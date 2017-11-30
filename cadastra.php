<?php
require_once("Adm_headerLogin.php");

?>
<body>
	<div class="main">
		<div class="conteudo-cadastro">
			<form method="post" action="usuario_cadastra.php">
				<div class="form-group">
					<label for="login">Login</label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Digite o Login">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Digite o E-Mail">
				</div>
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o Telefone">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a Senha">
				</div>
				<div class="form-group">
					<label for="confirma">Confirmar Senha</label>
					<input type="password" class="form-control" id="confirma" name="confirma" placeholder="Confirmar senha">
				</div>
				<div class="form-group">
					<a href="index.php"><small class="form-text  link">Voltar</small></a>
				</div>
				<div class="form-group">
					<button type="submit" class="loga btn btn ">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
