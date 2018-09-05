<div class="container-fluid back">
	<div class="row">
		<div class="col-md-5 grid1">
			<div id="slide" class="carousel slide shadow mt-5 ml-3 mb-3" data-ride="carousel">
				
				<ul class="carousel-indicators indicators">
					{for $x=0 to ($qtd_images-1)}
						<li data-target="#slide" data-slide-to="{$x}" class="{if $x eq 0}active{/if}"></li>
					{/for}
				</ul>

				<div class="carousel-inner">
					{if not empty($anuncio.imagens)}
						{for $x=0 to ($qtd_images-1)}
						<div class="carousel-item {if $x eq 0}active{/if}">
							<img class="img-fluid" src="{$base_url}assets/images/anuncios/{$anuncio.imagens.$x.url}">
						</div>
						{/for}
					{else}
						<div class="carousel-item active">
							<img class="img-fluid" src="{$base_url}assets/images/default.png">
						</div>
					{/if}
				</div>

				<a class="carousel-control-prev slide-icon" href="#slide" data-slide="prev">
					<i class="fa fa-chevron-circle-left"></i>
				</a>
				<a class="carousel-control-next slide-icon" href="#slide" data-slide="next">
					<i class="fa fa-chevron-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-md-7 mt-5">
			<div class="preco">
				<div class="tri"></div>
				<div class="rec">R$ {$anuncio.valor|number_format:2:',':'.'}</div>
			</div>
			<div class="produto-info">
				<h1>{$anuncio.titulo}</h1>
				<h3><small>Categoria: {$anuncio.categoria|utf8_encode|ucfirst}</small></h3>
				<br>
				<h4>Preço: R$ {$anuncio.valor|number_format:2:',':'.'}</h4>
				<div class="card anunciante">
					<div class="card-header"><strong>Dados do Anunciante</strong></div>
					<div class="card-body">
						<p><i class="fa fa-user"></i>&nbsp&nbsp{$usuario.nome}</p>
						<p><i class="fa fa-envelope"></i>&nbsp&nbsp{$usuario.email}</p>
						<p><i class="fa fa-phone"></i>&nbsp&nbsp{$usuario.telefone}</p>
					</div>
				</div>
				<div class="descricao">
					<div class="pt-2">
						<h4>Descriçao do Produto</h4>
					</div>
					<p class="pb-2">{$anuncio.descricao}</p>
				</div>
			</div>
		</div>
	</div>
</div>