<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title>Classificados!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/frameworks/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-light bg-light shadow">
		<div class="container-fluid justify-content-between">
			<div>
				<a href="<?php echo BASE_URL;?>" class="navbar-brand">
					<img src="<?php echo BASE_URL;?>assets/images/logo.png" alt="company name" />
				</a>
			</div>
			<div>
				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
					<a href="<?php echo BASE_URL;?>anuncios"><button class="btn btn-outline-info">Meus anúncios</button></a>
					<a href="<?php echo BASE_URL;?>login/sair"><button class="btn btn-outline-info">Sair <i class="fa fa-sign-out"></i></button></a>
				<?php else:?>
					<a href="<?php echo BASE_URL;?>cadastro"><button class="btn btn-outline-info">Cadastre-se</button></a>
					<a href="<?php echo BASE_URL;?>login"><button class="btn btn-outline-info">Login <i class="fa fa-sign-in"></i></button></a>
				<?php endif;?>
			</div>
		</div>
	</nav>
	<?php $this->loadViewInTemplate($viewName, $viewData);?>
	
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/frameworks/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/frameworks/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/frameworks/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/frameworks/jquery.mask.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js"></script>
</body>
</html>
