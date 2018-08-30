<?php
class homeController extends controller{

	public function index(){
		
		$u = new Usuarios();
		$a = new Anuncios();
		$c = new Categorias();
		$dados = array();

		$filtros = array('categoria' => '', 'valor' => '', 'estado' => '');
		if(isset($_GET['filtros']) && !empty($_GET['filtros'])){
			$filtros = $_GET['filtros'];
		}

		$qtd_usuarios = $u->qtdUsuarios();
		$qtd_anuncios = $a->qtdAnuncios($filtros);

		$p = 1;
		$anuncioPerPage = 2;
		$max_pages = ceil($qtd_anuncios/$anuncioPerPage);

		if(isset($_GET['p']) && !empty($_GET['p']) && is_numeric($_GET['p'])){
			if($_GET['p'] > ($max_pages)){
				$p = addslashes($max_pages);
			}else{
				$p = addslashes($_GET['p']);
			}	
		}

		$anuncios = $a->getLastAnuncios($p, $anuncioPerPage, $filtros);

		$dados['total_anuncios'] = $a->qtdAnuncios();
		$dados['qtd_usuarios'] = $qtd_usuarios;
		$dados['categorias'] = $c->getCategories();
		$dados['filtros'] = $filtros;
		$dados['anuncios'] = $anuncios;
		$dados['qtd_anuncios'] = $qtd_anuncios;
		$dados['anuncio_page'] = $anuncioPerPage;
		$dados['max_pages'] = $max_pages;
		$dados['p'] = $p;

		$this->loadTemplate('home', $dados);

	}

}