<div class="container-fluid back">
	<div class="row">
		<div class="col-md-5 grid1">
			<div id="slide" class="carousel slide shadow mt-5 ml-3 mb-3" data-ride="carousel">
				
				<ul class="carousel-indicators indicators">
					<?php for($x=0;$x<$qtd_images;$x++):?>
						<li data-target="#slide" data-slide-to="<?php echo $x;?>" class="<?php if($x == 0):echo "active";endif;?>"></li>
					<?php endfor;?>
				</ul>

				<div class="carousel-inner">
					<?php if(!empty($anuncio['imagens'])):?>
						<?php for($x=0;$x<$qtd_images;$x++):?>
						<div class="carousel-item <?php if($x == 0):echo "active";endif;?>">
							<img class="img-fluid" src="<?php echo BASE_URL;?>assets/images/anuncios/<?php echo $anuncio['imagens'][$x]['url'];?>">
						</div>
						<?php endfor;?>
					<?php else:?>
						<div class="carousel-item active">
							<img class="img-fluid" src="<?php echo BASE_URL;?>assets/images/default.png">
						</div>
					<?php endif;?>
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
				<div class="rec">R$ <?php echo number_format($anuncio['valor'], 2, ',', '.');?></div>
			</div>
			<div class="produto-info">
				<h1><?php echo $anuncio['titulo'];?></h1>
				<h3><small>Categoria: <?php echo ucfirst(utf8_encode($anuncio['categoria']));?></small></h3>
				<br>
				<h4>Preço: R$ <?php echo number_format($anuncio['valor'], 2, ',', '.');?></h4>
				<div class="card anunciante">
					<div class="card-header"><strong>Dados do Anunciante</strong></div>
					<div class="card-body">
						<p><i class="fa fa-user"></i>&nbsp&nbsp<?php echo $usuario['nome'];?></p>
						<p><i class="fa fa-envelope"></i>&nbsp&nbsp<?php echo $usuario['email'];?></p>
						<p><i class="fa fa-phone"></i>&nbsp&nbsp<?php echo $usuario['telefone'];?></p>
					</div>
				</div>
				<div class="descricao">
					<div class="pt-2">
						<h4>Descriçao do Produto</h4>
					</div>
					<p class="pb-2"><?php echo $anuncio['descricao']?></p>
				</div>
			</div>
		</div>
	</div>
</div>