<?php
class addController extends controller{

	public function index(){

		if(empty($_SESSION['cLogin'])){

			header("Location: ".BASE_URL."login");
			exit;
		}

		$a = new Anuncios();
		$c = new Categorias();
		$dados = array();

		$dados['categorias'] = $c->getCategories();
		$dados['a'] = $a;

		$this->loadTemplate("add", $dados);

	}

}