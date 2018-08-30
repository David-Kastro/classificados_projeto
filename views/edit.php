<?php
if (isset($_POST['titulo']) && !empty($_POST['titulo'])){
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = str_replace('.', '', $_POST['valor']);
	$valor = addslashes(str_replace(',', '.', $valor));
	$estado = addslashes($_POST['estado']);
	$descricao = addslashes($_POST['descricao']);
	if(!empty($_FILES['imagens']['name'][0])){
		$imagens = $_FILES['imagens'];
	}else{
		$imagens = array();
	}
	

	if(!empty($_POST['valor']) && !empty($_POST['categoria'])){
		$a->updateAnuncio($titulo, $categoria, $valor, $estado, $descricao, $imagens, $anuncio['id']);
		$imagens = array();

		?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times</button>
			Anúncio editado com sucesso!
		</div>
		<?php

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
<div class="container mt-3">
	<h1>Meus anuncios - Adicionar</h1>
	<hr><br>
	<form id="add-anuncio" method="POST" enctype="multipart/form-data">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group w-50">
					<label for="categoria">Categoria:</label>
					<select class="form-control form-control-sm" id="categoria" name="categoria">
						<?php
						foreach ($categorias as $categoria):
							?>
							<option value="<?php echo $categoria['id'];?>" <?php echo ($anuncio['id_categoria'] == $categoria['id'])?"selected":"" ?>><?php echo ucfirst(utf8_encode($categoria['nome']));?></option>
							<?php
						endforeach;
						?>

					</select>
				</div>
				<div class="form-group">
					<label for="titulo">Título:</label>
					<input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $anuncio['titulo']?>" required>
				</div>
				Valor:<br>
				<div class="input-group mt-2 mb-2 w-50">
					<div class="input-group-prepend">
						<span class="input-group-text">R$</span>
					</div>
					<input class="form-control money" type="text" name="valor" placeholder="Apenas números" value="<?php echo number_format($anuncio['valor'], 2, ',', '.')?>" required>
				</div>

				<div class="form-group">
					<label for="descricao">Descrição:</label>
					<textarea class="form-control" name="descricao" id="descricao" rows="4"><?php echo $anuncio['descricao']?></textarea>
				</div>
				<div class="form-group w-50">
					<label for="estado">Estado de conservação:</label>
					<select class="form-control form-control-sm" id="estado" name="estado">
						<option value="" <?php echo ($anuncio['estado'] == '')?"selected":"" ?>>Não Especificado</option>
						<option value="1" <?php echo ($anuncio['estado'] == 1)?"selected":"" ?>>Novo</option>
						<option value="2" <?php echo ($anuncio['estado'] == 2)?"selected":"" ?>>Usado</option>
					</select>
				</div>		
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="add-fotos">Adicionar fotos:</label>
					<input id="add-fotos" type="file" class="form-control" name="imagens[]" multiple>
				</div>
				<div class="card shadow">
					<div class="card-header text-center"><h5>Fotos do anuncio</h5></div>
					<div class="card-body anuncio-fotos text-center">
						<?php
						if(!empty($anuncio['imagens'])){
							foreach ($anuncio['imagens'] as $imagem) {
								?>
								<div class="foto-div ml-2 mt-2 border shadow">
									<img class="border" src="<?php echo BASE_URL;?>assets/images/anuncios/<?php echo $imagem['url']?>">
									<a href="<?php echo BASE_URL;?>edit/delete/<?php echo $imagem['id_imagem']?>/<?php echo $anuncio['id']?>" class="btn btn-outline-secondary">Excluir</a>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<button class="btn btn-info mt-5 publicar" type="submit">Atualizar</button>
	</form><br><br><br><br><br><br><br><hr>