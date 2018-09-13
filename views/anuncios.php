<div class="container mt-3 anuncios">
	<h1>Meus anuncios</h1>
	<hr><br>
	<a href="<?php echo BASE_URL;?>add/"><button class="btn btn-info mb-3">Adicionar <i class="fa fa-plus"></i></button></a>
	<div class="table-responsive-md">
		<table class="table table-striped shadow-lg">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Titulo</th>
					<th>Valor</th>
					<th>Ações</th>
				</tr>
			</thead>
			<?php
			if(!empty($anuncios)){
				?>
				</tbody>
				<?php
					foreach ($anuncios as $anuncio) {
						?>
						<tr>
							<td>
								<?php if(!empty($anuncio['url'])):?>
									<img height="100px" src="<?php echo BASE_URL;?>assets/images/anuncios/<?php echo $anuncio['url'];?>">
								<?php else:?>
									<img width="130px" height="100px" src="<?php echo BASE_URL;?>assets/images/default.png">
								<?php endif;?>
							</td>
							<td style="vertical-align: middle;"><?php echo $anuncio['titulo'];?></td>
							<td style="vertical-align: middle;">R$ <?php echo number_format($anuncio['valor'], 2, ',', '.');?></td>
							<td style="vertical-align: middle;"><a href="<?php echo BASE_URL;?>edit/<?php echo $anuncio['id']?>" class="btn btn-outline-dark">Editar</a>&nbsp&nbsp<a class="btn btn-danger" href="<?php echo BASE_URL;?>anuncios/delete/<?php echo $anuncio['id']?>">Excluir</a></td>
						</tr>
						<?php
					}
				?>
				</tbody>
				<?php
			}else{
				?>
				<h4 class="mt-3"><small>Nenhum anuncio publicado!</small></h4>
				<?php
			}
			?>
		</table>
	</div>
</div>