<?php
class cadastroController extends controller{

	public function index(){

		$u = new Usuarios();
		$dados = array();
		$dados['u'] = $u;

		$this->loadTemplate("cadastro", $dados);

	}

}