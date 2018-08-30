<?php
class anunciosController extends controller{

	public function index(){
		
		if(empty($_SESSION['cLogin'])){
			header("Location: ".BASE_URL);
			exit;
		}

		$a = new Anuncios();
		$anuncios = $a->getAnuncios();
		$dados = array();
		$dados['anuncios'] = $anuncios;

		$this->loadTemplate("anuncios", $dados);

	}

	public function delete($id){

		if(empty($_SESSION['cLogin'])){
			header("Location: ".BASE_URL."login");
			exit;
		}

		$a = new Anuncios();
		if($a->getAnuncio($id)['id_usuario'] == $_SESSION['cLogin']){
			if(isset($id) && !empty($id)){
				$a->delAnuncio($id);
			}

		}

		header("Location: ".BASE_URL."anuncios");
	}

}