<div class="container mt-3">
	<h1>Login</h1>
	<hr>
	
	<?php
	if(empty($_SESSION['cLogin'])){

		if(isset($_POST['email'], $_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])){
			$email = addslashes($_POST['email']);
			$senha = $_POST['senha'];

			if(!empty($_POST['senha'])){

				if($u->login($email, $senha)){

					?>
					<script type="text/javascript">window.location.href="<?php echo BASE_URL;?>"</script>
					<?php
				
				}else{

					?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times</button>
						<strong>Ops!</strong> E-mail e/ou senha incorretos, tente novamente!
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

	}else{

		?>
		<script type="text/javascript">window.location.href="<?php echo BASE_URL;?>"</script>
		<?php
	}
	?>

	<form id="cadastro" method="POST">
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="text" name="email" id="email" required>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input class="form-control" type="password" name="senha" id="senha" required>
		</div>
		<button class="btn btn-info mt-3" type="submit">Entrar</button>
	</form>

</div>