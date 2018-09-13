<div>
	<div class="container-fluid jumbotron text-center banner">
		<h2>Nós temos hoje {$total_anuncios} anúncios.</h2>
		<p>E mais de {$qtd_usuarios} usuarios cadastrados.</p>
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

						{foreach from=$categorias item=$categoria}
							<option value="{$categoria.id}" {if $filtros.categoria eq $categoria.id}selected="selected"{/if}>
								{$categoria.nome|utf8_encode|ucfirst}
							</option>
						{/foreach}

					</select>
				</div>
				<div class="form-group">
					<label for="val-filter">Preço:</label>
					<select class="form-control" id="val-filter" name="filtros[valor]">
						<option value="">Todos</option>
						<option value="0-50" {if $filtros.valor eq '0-50'}selected="selected"{/if}>Abaixo de R$50</option>
						<option value="50-100" {if $filtros.valor eq '50-100'}selected="selected"{/if}>Entre R$50 e 100</option>
						<option value="100-500" {if $filtros.valor eq '100-500'}selected="selected"{/if}>Entre R$100 e 500</option>
						<option value="500-1000" {if $filtros.valor eq '500-1000'}selected="selected"{/if}>Entre R$500 e 1.000</option>
						<option value="1000-5000" {if $filtros.valor eq '1000-5000'}selected="selected"{/if}>Entre R$1.000 e 5.000</option>
						<option value="5000-10000" {if $filtros.valor eq '5000-10000'}selected="selected"{/if}>Entre R$5.000 e 10.000</option>
						<option value="10000-999999999" {if $filtros.valor eq '10000-999999999'}selected="selected"{/if}>Acima de R$10.000</option>
					</select>
				</div>
				<label for="est-filter">Estado de conservação:</label>
				<div id="est-filter">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="" {if $filtros.estado eq ''}checked="checked"{/if}>Todos
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="0" {if $filtros.estado eq '0'}checked="checked"{/if}>Não Especificado
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="1" {if $filtros.estado eq '1'}checked="checked"{/if}>Novo
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="2" {if $filtros.estado eq '2'}checked="checked"{/if}>Usado
						</label>
					</div>										
				</div>
			</form>
		</div>
		<div class="col-md-7">
			<h5>Últimos anúncios</h5>
			<table class="table table-striped shadow-lg last-anuncios">
				{if not empty($anuncios)}
					<tbody>
						{foreach from=$anuncios item=$anuncio}
							<tr>
								<td>
									{if not empty($anuncio.url)}
										<a href="{$base_url}produto/{$anuncio.id}"><img height="80px" src="{$base_url}assets/images/anuncios/{$anuncio.url}"></a>
									{else}
										<a href="{$base_url}produto/{$anuncio.id}"><img width="100px" height="80px" src="{$base_url}assets/images/default.png"></a>
									{/if}
								</td>
								<td style="vertical-align: middle;"><a href="{$base_url}produto/{$anuncio.id}">{$anuncio.titulo}</a><br><small>{$anuncio.categoria|utf8_encode|ucfirst}<small></td>
								<td style="vertical-align: middle;">R$ {$anuncio.valor|number_format:2:',':'.'}</td>
							</tr>
						{/foreach}
					</tbody>
				{else}
					<h4 class="mt-3"><small>Nenhum anuncio publicado!</small></h4>
				{/if}
			</table>
			{if $qtd_anuncios gt $anuncio_page}
				<ul class="pagination justify-content-center">

					{$url_get = $smarty.get}
					
					<li class="page-item {if $p eq 1}disabled{/if}">
						<a class="page-link" href="{$base_url}?{$url_get.p = ($p - 1)}{$url_get|http_build_query}">Anterior</a>
					</li>

					{for $x=0 to ($max_pages - 1)}
						<li class="page-item {if ($x + 1) eq $p}active{/if}">
							<a class="page-link" href="{$base_url}?{$url_get.p = ($x + 1)}{$url_get|http_build_query}">{$x + 1}</a>
						</li>
					{/for}

					<li class="page-item {if $p eq $max_pages}disabled{/if}">
						<a class="page-link" href="{$base_url}?{$url_get.p = ($p + 1)}{$url_get|http_build_query}">Próximo</a>
					</li>
				</ul>
			{/if}
		</div>
	</div>
</div>