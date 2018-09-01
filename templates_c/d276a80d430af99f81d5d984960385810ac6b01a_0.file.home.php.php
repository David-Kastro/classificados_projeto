<?php
/* Smarty version 3.1.32, created on 2018-09-02 00:20:44
  from 'C:\wamp\www\projeto2\views\home.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8b10bc823b14_31176645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd276a80d430af99f81d5d984960385810ac6b01a' => 
    array (
      0 => 'C:\\wamp\\www\\projeto2\\views\\home.php',
      1 => 1535840442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8b10bc823b14_31176645 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
	<div class="container-fluid jumbotron text-center banner">
		<h2>Nós temos hoje <?php echo $_smarty_tpl->tpl_vars['total_anuncios']->value;?>
 anúncios.</h2>
		<p>E mais de <?php echo $_smarty_tpl->tpl_vars['qtd_usuarios']->value;?>
 usuarios cadastrados.</p>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['categoria'] == $_smarty_tpl->tpl_vars['categoria']->value['id']) {?>selected="selected"<?php }?>>
								<?php echo ucfirst(utf8_encode($_smarty_tpl->tpl_vars['categoria']->value['nome']));?>

							</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					</select>
				</div>
				<div class="form-group">
					<label for="val-filter">Preço:</label>
					<select class="form-control" id="val-filter" name="filtros[valor]">
						<option value="">Todos</option>
						<option value="0-50" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '0-50') {?>selected="selected"<?php }?>>Abaixo de R$50</option>
						<option value="50-100" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '50-100') {?>selected="selected"<?php }?>>Entre R$50 e 100</option>
						<option value="100-500" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '100-500') {?>selected="selected"<?php }?>>Entre R$100 e 500</option>
						<option value="500-1000" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '500-1000') {?>selected="selected"<?php }?>>Entre R$500 e 1.000</option>
						<option value="1000-5000" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '1000-5000') {?>selected="selected"<?php }?>>Entre R$1.000 e 5.000</option>
						<option value="5000-10000" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '5000-10000') {?>selected="selected"<?php }?>>Entre R$5.000 e 10.000</option>
						<option value="10000-999999999" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['valor'] == '10000-999999999') {?>selected="selected"<?php }?>>Acima de R$10.000</option>
					</select>
				</div>
				<label for="est-filter">Estado de conservação:</label>
				<div id="est-filter">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == '') {?>checked="checked"<?php }?>>Todos
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="0" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == '0') {?>checked="checked"<?php }?>>Não Especificado
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="1" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == '1') {?>checked="checked"<?php }?>>Novo
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="filtros[estado]" value="2" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == '2') {?>checked="checked"<?php }?>>Usado
						</label>
					</div>										
				</div>
			</form>
		</div>
		<div class="col-md-7">
			<h5>Últimos anúncios</h5>
			<table class="table table-striped shadow-lg last-anuncios">
				<?php if (!empty($_smarty_tpl->tpl_vars['anuncios']->value)) {?>
					<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['anuncios']->value, 'anuncio');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['anuncio']->value) {
?>
							<tr>
								<td>
									<?php if (!empty($_smarty_tpl->tpl_vars['anuncio']->value['url'])) {?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
produto/open/<?php echo $_smarty_tpl->tpl_vars['anuncio']->value['id'];?>
"><img height="80px" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/anuncios/<?php echo $_smarty_tpl->tpl_vars['anuncio']->value['url'];?>
"></a>
									<?php } else { ?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
produto/open/<?php echo $_smarty_tpl->tpl_vars['anuncio']->value['id'];?>
"><img width="100px" height="80px" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/images/default.png"></a>
									<?php }?>
								</td>
								<td style="vertical-align: middle;"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
produto/open/<?php echo $_smarty_tpl->tpl_vars['anuncio']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['anuncio']->value['titulo'];?>
</a><br><small><?php echo ucfirst(utf8_encode($_smarty_tpl->tpl_vars['anuncio']->value['categoria']));?>
<small></td>
								<td style="vertical-align: middle;">R$ <?php echo number_format($_smarty_tpl->tpl_vars['anuncio']->value['valor'],2,',','.');?>
</td>
							</tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</tbody>
				<?php } else { ?>
					<h4 class="mt-3"><small>Nenhum anuncio publicado!</small></h4>
				<?php }?>
			</table>
			<?php if ($_smarty_tpl->tpl_vars['qtd_anuncios']->value > $_smarty_tpl->tpl_vars['anuncio_page']->value) {?>
				<ul class="pagination justify-content-center">

					<?php $_smarty_tpl->_assignInScope('url_get', $_GET);?>
					
					<li class="page-item <?php if ($_smarty_tpl->tpl_vars['p']->value == 1) {?>disabled<?php }?>">
						<a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
?<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['url_get']) ? $_smarty_tpl->tpl_vars['url_get']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['p'] = ($_smarty_tpl->tpl_vars['p']->value-1);
$_smarty_tpl->_assignInScope('url_get', $_tmp_array);
echo http_build_query($_smarty_tpl->tpl_vars['url_get']->value);?>
">Anterior</a>
					</li>

					<?php
$_smarty_tpl->tpl_vars['x'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['x']->step = 1;$_smarty_tpl->tpl_vars['x']->total = (int) ceil(($_smarty_tpl->tpl_vars['x']->step > 0 ? ($_smarty_tpl->tpl_vars['max_pages']->value-1)+1 - (0) : 0-(($_smarty_tpl->tpl_vars['max_pages']->value-1))+1)/abs($_smarty_tpl->tpl_vars['x']->step));
if ($_smarty_tpl->tpl_vars['x']->total > 0) {
for ($_smarty_tpl->tpl_vars['x']->value = 0, $_smarty_tpl->tpl_vars['x']->iteration = 1;$_smarty_tpl->tpl_vars['x']->iteration <= $_smarty_tpl->tpl_vars['x']->total;$_smarty_tpl->tpl_vars['x']->value += $_smarty_tpl->tpl_vars['x']->step, $_smarty_tpl->tpl_vars['x']->iteration++) {
$_smarty_tpl->tpl_vars['x']->first = $_smarty_tpl->tpl_vars['x']->iteration === 1;$_smarty_tpl->tpl_vars['x']->last = $_smarty_tpl->tpl_vars['x']->iteration === $_smarty_tpl->tpl_vars['x']->total;?>
						<li class="page-item <?php if (($_smarty_tpl->tpl_vars['x']->value+1) == $_smarty_tpl->tpl_vars['p']->value) {?>active<?php }?>">
							<a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
?<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['url_get']) ? $_smarty_tpl->tpl_vars['url_get']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['p'] = ($_smarty_tpl->tpl_vars['x']->value+1);
$_smarty_tpl->_assignInScope('url_get', $_tmp_array);
echo http_build_query($_smarty_tpl->tpl_vars['url_get']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value+1;?>
</a>
						</li>
					<?php }
}
?>

					<li class="page-item <?php if ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['max_pages']->value) {?>disabled<?php }?>">
						<a class="page-link" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
?<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['url_get']) ? $_smarty_tpl->tpl_vars['url_get']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['p'] = ($_smarty_tpl->tpl_vars['p']->value+1);
$_smarty_tpl->_assignInScope('url_get', $_tmp_array);
echo http_build_query($_smarty_tpl->tpl_vars['url_get']->value);?>
">Próximo</a>
					</li>
				</ul>
			<?php }?>
		</div>
	</div>
</div><?php }
}
