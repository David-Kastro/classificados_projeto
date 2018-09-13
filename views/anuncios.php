<div class="container mt-3 anuncios">
	<h1>Meus anuncios</h1>
	<hr><br>
	<a href="{$base_url}add/"><button class="btn btn-info mb-3">Adicionar <i class="fa fa-plus"></i></button></a>
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
			
			{if not empty($anuncios)}

				</tbody>
					{foreach from=$anuncios item=$anuncio}
						<tr>
							<td>
								{if not empty($anuncio.url)}
									<img height="100px" src="{$base_url}assets/images/anuncios/{$anuncio.url}">
								{else}
									<img width="130px" height="100px" src="{$base_url}assets/images/default.png">
								{/if}
							</td>
							<td style="vertical-align: middle;">{$anuncio.titulo}</td>
							<td style="vertical-align: middle;">R$ {$anuncio.valor|number_format:2:',':'.'}</td>
							<td style="vertical-align: middle;"><a href="{$base_url}edit/{$anuncio.id}" class="btn btn-outline-dark">Editar</a>&nbsp&nbsp<a class="btn btn-danger" href="{$base_url}anuncios/delete/{$anuncio.id}">Excluir</a></td>
						</tr>
					{/foreach}
				</tbody>

			{else}

				<h4 class="mt-3"><small>Nenhum anuncio publicado!</small></h4>
			
			{/if}

		</table>
	</div>
</div>