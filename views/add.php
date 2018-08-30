<?php 
if (isset($_POST['titulo']) && !empty($_POST['titulo'])){
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = str_replace('.', '', $_POST['valor']);
	$valor = addslashes(str_replace(',', '.', $valor));
	$estado = addslashes($_POST['estado']);
	$descricao = addslashes($_POST['descricao']);
	
	if(!empty($_POST['valor']) && !empty($_POST['categoria'])){
		$a->setAnuncio($titulo, $categoria, $valor, $estado, $descricao);

		?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times</button>
			Anúncio publicado com sucesso!
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
							<option value="<?php echo $categoria['id'];?>"><?php echo ucfirst(utf8_encode($categoria['nome']));?></option>
							<?php
						endforeach;
						?>

					</select>
				</div>
				<div class="form-group">
					<label for="titulo">Título:</label>
					<input class="form-control" type="text" name="titulo" id="titulo" required>
				</div>
				Valor:<br>
				<div class="input-group mt-2 mb-2 w-50">
					<div class="input-group-prepend">
						<span class="input-group-text">R$</span>
					</div>
					<input class="form-control money" type="text" name="valor" placeholder="Apenas números" required>
				</div>

				<div class="form-group">
					<label for="descricao">Descrição:</label>
					<textarea class="form-control" name="descricao" id="descricao" rows="4"></textarea>
				</div>
				<div class="form-group w-50">
					<label for="estado">Estado de conservação:</label>
					<select class="form-control form-control-sm" id="estado" name="estado">
						<option value="">Não Especificado</option>
						<option value="1">Novo</option>
						<option value="2">Usado</option>
					</select>
				</div>		
			</div>
		</div>
		<button class="btn btn-info mt-5 publicar" type="submit">Publicar</button>
	</form><br><br><br><br><br><br><br><hr>
</div>