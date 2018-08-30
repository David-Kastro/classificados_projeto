<div class="container mt-3">
	<h1>Cadastre-se</h1>
	<hr>

	<?php

	if(isset($_POST['nome']) && !empty($_POST['nome'])){
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$tel = addslashes($_POST['tel']);

		if(!empty($_POST['email']) && !empty($_POST['senha'])){
			if($u->cadastrar($nome, $email, $senha, $tel)){

				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times</button>
					<strong>Sucesso! </strong>Usuário cadastrado.
					<a href="<?php echo BASE_URL;?>login" class="alert-link">Ir para a página de login</a>
				</div>
				<?php

			}else{

				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times</button>
					<strong>Aviso! </strong>Email já cadastrado...
				</div>
				<?php
			}
			
		}else{

			?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times</button>
				<strong>Aviso! </strong>Preencha todos os campos.
			</div>
			<?php
		}
	}

	?>

	<form id="cadastro" method="POST">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input class="form-control" type="text" name="nome" id="nome" required>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="text" name="email" id="email" required>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input class="form-control" type="password" name="senha" id="senha" required>
		</div>
		<div class="form-group">
			<label for="tel">Telefone</label>
			<input class="form-control" type="text" name="tel" id="tel">
		</div>
		<button class="btn btn-info mt-3" type="submit">Cadastrar</button>
	</form>
</div>