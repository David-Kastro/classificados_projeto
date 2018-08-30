<div>
	<div class="container-fluid jumbotron text-center banner">
		<h2>Nós temos hoje <?php echo $total_anuncios;?> anúncios.</h2>
		<p>E mais de <?php echo $qtd_usuarios;?> usuarios cadastrados.</p>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<form method="GET">
				<h5 style="display: inline-block;"><i class="fa fa-cog"></i> Pesquisa avançada</h5>
				<button type="submit" class="float-right btn btn-outline-dark filter-button">Filtrar <i class="fa fa-angle-double-right"></i></button>
				<div class="form-group">
					<label for="ctg-filter">Categoria:</label>
					<select class="form-control" id="ctg-filter" name="filtros[categoria]">
						<option value="">Todos</option>
						<?php
						foreach ($categorias as $categoria):
							?>
							<option value="<?php echo $categoria['id'];?>" <?php echo ($filtros['categoria']==$categoria['id'])?"selected":""?>><?php echo ucfirst(utf8_encode($categoria['nome']));?></option>
							<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<label for="val-filter">Preço:</label>
					<select class="form-control" id="val-filter" name="filtros[valor]">
						<option value="">Todos</option>
						<option value="0-50" <?php echo ($filtros['valor']=='0-50')?"selected":""?>>Abaixo de R$50</option>
						<option value="50-100" <?php echo ($filtros['valor']=='50-100')?"selected":""?>>Entre R$50 e 100</option>
						<option value="100-500" <?php echo ($filtros['valor']=='100-500')?"selected":""?>>Entre R$100 e 500</option>
						<option value="500-1000" <?php echo ($filtros['valor']=='500-1000')?"selected":""?>>Entre R$500 e 1.000</option>
						<option value="1000-5000" <?php echo ($filtros['valor']=='1000-5000')?"selected":""?>>Entre R$1.000 e 5.000</option>
						<option value="5000-10000" <?php echo ($filtros['valor']=='5000-10000')?"selected":""?>>Entre R$5.000 e 10.000</option>
						<option value="10000-999999999" <?php echo ($filtros['valor']=='10000-999999999')?"selected":""?>>Acima de R$10.000</option>
					</select>
				</div>
				<label for="est-filter">Estado de conservação:</label>
				<div id="est-filter">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="" <?php echo ($filtros['estado']=='')?"checked":""?>>Todos
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="0" <?php echo ($filtros['estado']=='0')?"checked":""?>>Não Especificado
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="1" <?php echo ($filtros['estado']=='1')?"checked":""?>>Novo
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="2" <?php echo ($filtros['estado']=='2')?"checked":""?>>Usado
						</label>
					</div>										
				</div>
			</form>
		</div>
		<div class="col-md-7">
			<h5>Últimos anúncios</h5>
			<table class="table table-striped shadow-lg last-anuncios">
				<?php if(!empty($anuncios)):?>
					<tbody>
						<?php foreach($anuncios as $anuncio):?>
							<tr>
								<td>
									<?php if(!empty($anuncio['url'])):?>
										<a href="<?php echo BASE_URL;?>produto/open/<?php echo $anuncio['id']?>"><img height="80px" src="<?php echo BASE_URL;?>assets/images/anuncios/<?php echo $anuncio['url'];?>"></a>
									<?php else:?>
										<a href="<?php echo BASE_URL;?>produto/open/<?php echo $anuncio['id']?>"><img width="100px" height="80px" src="<?php echo BASE_URL;?>assets/images/default.png"></a>
									<?php endif;?>
								</td>
								<td style="vertical-align: middle;"><a href="<?php echo BASE_URL;?>produto/open/<?php echo $anuncio['id']?>"><?php echo $anuncio['titulo'];?></a><br><small><?php echo ucfirst(utf8_encode($anuncio['categoria']))?><small></td>
								<td style="vertical-align: middle;">R$ <?php echo number_format($anuncio['valor'], 2, ',', '.');?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				<?php else:?>
					<h4 class="mt-3"><small>Nenhum anuncio publicado!</small></h4>
				<?php endif;?>
			</table>
			<?php if($qtd_anuncios > $anuncio_page):?>
				<ul class="pagination justify-content-center">
					<?php
					$url_get = $_GET;
					?>
					<li class="page-item <?php if($p == 1):echo "disabled";endif;?>">
						<a class="page-link" href="<?php echo BASE_URL;?>?<?php $url_get['p'] = ($p - 1); echo http_build_query($url_get);?>">Anterior</a>
					</li>

					<?php for($x=0;$x<$max_pages;$x++):?>
						<li class="page-item <?php if(($x + 1) == $p):echo "active";endif;?>">
							<a class="page-link" href="<?php echo BASE_URL;?>?<?php $url_get['p'] = ($x + 1); echo http_build_query($url_get);?>"><?php echo $x + 1;?></a>
						</li>
					<?php endfor;?>

					<li class="page-item <?php if($p == $max_pages):echo "disabled";endif;?>">
						<a class="page-link" href="<?php echo BASE_URL;?>?<?php $url_get['p'] = ($p + 1); echo http_build_query($url_get);?>">Próximo</a>
					</li>
				</ul>
			<?php endif;?>
		</div>
	</div>
</div>