<?php
class produtoController extends controller{

	public function index(){
		header("Location: ".BASE_URL);
	}

	public function open($id){

		$u = new Usuarios();
		$a = new Anuncios();
		$dados = array();

		if(empty($id) || !is_numeric($id)){
			header("Location: ".BASE_URL);
			exit;
		}

		$anuncio = $a->getAnuncio($id);
		$usuario = $u->getUsuario($anuncio['id_usuario']);
		$qtd_images = count($anuncio['imagens']);

		$dados['anuncio'] = $anuncio;
		$dados['usuario'] = $usuario;
		$dados['qtd_images'] = $qtd_images;
		$dados['base_url'] = BASE_URL;

		$this->loadTemplate("produto", $dados);

	}
}