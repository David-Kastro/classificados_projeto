<?php 

class Usuarios extends model{

	public function getUsuario($id){
		
		$sql = $this->db->prepare("SELECT nome, email, telefone FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", addslashes($id));
		$sql->execute();
		return $sql->fetch();

	}

	public function qtdUsuarios(){
		
		$sql = $this->db->query("SELECT COUNT(*) AS n FROM usuarios");
		return $sql->fetch()['n'];
	}

	public function cadastrar($nome, $email, $senha, $tel){
		
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0){
			$sql = $this->db->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :tel)");
		 	$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":tel", $tel);
			$sql->execute();

			return true;

		}else{

			return false;
		}
	}

	public function login($email, $senha){
		
		$sql = $this->db->prepare("SELECT id, nome, email, telefone FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){
			$dados = $sql->fetch();
			$_SESSION['cLogin'] = $dados['id'];
			return true;
		}else{
			return false;
		}
	}

	public function getId(){

		return $this->dados['id'];

	}

}
