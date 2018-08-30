<?php
class editController extends controller{
	private $id;

	public function index($id){

		if(empty($_SESSION['cLogin'])){
			header("Location: ".BASE_URL."login");
			exit;
		}elseif(empty($id)){
			header("Location: ".BASE_URL."anuncios");
			exit;
		}

		$a = new Anuncios();
		$c = new Categorias();
		$dados = array();

		if($a->getAnuncio($id)['id_usuario'] !== $_SESSION['cLogin']){
			header("Location: ".BASE_URL."anuncios");
			exit;
		}

		$dados['anuncio'] = $a->getAnuncio($id);
		$dados['categorias'] = $c->getCategories();
		$dados['a'] = $a;

		$this->id = $id;
		$this->loadTemplate("edit", $dados);

	}

	public function delete($id_i, $id_a){

		if(empty($_SESSION['cLogin'])){
			header("Location: ".BASE_URL."login");
			exit;
		}

		$a = new Anuncios();
		if($a->getAnuncio($id_a)['id_usuario'] == $_SESSION['cLogin']){
			if(isset($id_i, $id_a) && !empty($id_i) && !empty($id_a)){
				$a->delAnuncioImg($id_i);
			}
		}

		header("Location: ".BASE_URL."edit/index/".$id_a);

	}

}