<?php
class loginController extends controller{

	public function index(){

		$u = new Usuarios();
		$dados = array();

		$dados['u'] = $u;

		$this->loadTemplate("login", $dados);

	}

	public function sair(){

		unset($_SESSION['cLogin']);
		header("Location: ".BASE_URL);

	}

}