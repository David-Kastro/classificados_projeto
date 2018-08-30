<?php
class Anuncios extends model{

	public function qtdAnuncios($filtros = array()){

		if(!empty($filtros)){
			
			$sqlFiltros = array('1=1');
			if(!empty($filtros['categoria'])){
				$sqlFiltros[] = 'anuncios.id_categoria = :id_categoria';
			}
			if(!empty($filtros['valor'])){
				$sqlFiltros[] = 'anuncios.valor BETWEEN :valor1 AND :valor2';
			}
			if(!empty($filtros['estado'])){
				$sqlFiltros[] = 'anuncios.estado = :estado';
			}

			$sql = $this->db->prepare("SELECT COUNT(*) AS n FROM anuncios WHERE ".implode(" AND ", $sqlFiltros));

			if(!empty($filtros['categoria'])){
				$sql->bindValue(":id_categoria", addslashes($filtros['categoria']));
			}
			if(!empty($filtros['valor'])){
				$valor = explode("-", $filtros['valor']);
				$sql->bindValue(":valor1", addslashes($valor[0]));
				$sql->bindValue(":valor2", addslashes($valor[1]));
			}
			if(!empty($filtros['estado'])){
				$sql->bindValue(":estado", addslashes($filtros['estado']));
			}
			$sql->execute();

			return $sql->fetch()['n'];

		}else{

			$sql = $this->db->query("SELECT COUNT(*) AS n FROM anuncios");
			return $sql->fetch()['n'];
		}
	}
	
	public function getAnuncios(){

		if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
			$sql = $this->db->prepare("SELECT *, (SELECT anuncio_imagens.url FROM anuncio_imagens WHERE anuncio_imagens.id_anuncio = anuncios.id LIMIT 1) AS url FROM anuncios WHERE id_usuario = :id_usuario");

			$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
			$sql->execute();

			if($sql->rowCount() > 0){
				return $sql->fetchAll();
			}else{
				return 0;
			}

		}else{
			return 0;
		}
	}

	public function getLastAnuncios($p, $anuncioPerPage, $filtros){
		
		$offset = ($p - 1) * $anuncioPerPage;

		$sqlFiltros = array('1=1');
		if(!empty($filtros['categoria'])){
			$sqlFiltros[] = 'anuncios.id_categoria = :id_categoria';
		}
		if(!empty($filtros['valor'])){
			$sqlFiltros[] = 'anuncios.valor BETWEEN :valor1 AND :valor2';
		}
		if(!empty($filtros['estado'])){
			$sqlFiltros[] = 'anuncios.estado = :estado';
		}

		$sql = $this->db->prepare("SELECT *, (SELECT categorias.nome FROM categorias WHERE anuncios.id_categoria = categorias.id) AS categoria, (SELECT anuncio_imagens.url FROM anuncio_imagens WHERE anuncio_imagens.id_anuncio = anuncios.id LIMIT 1) AS url FROM anuncios WHERE ".implode(" AND ", $sqlFiltros)." ORDER BY anuncios.id DESC LIMIT $offset, $anuncioPerPage");

		if(!empty($filtros['categoria'])){
			$sql->bindValue(":id_categoria", addslashes($filtros['categoria']));
		}
		if(!empty($filtros['valor'])){
			$valor = explode("-", $filtros['valor']);
			$sql->bindValue(":valor1", addslashes($valor[0]));
			$sql->bindValue(":valor2", addslashes($valor[1]));
		}
		if(!empty($filtros['estado'])){
			$sql->bindValue(":estado", addslashes($filtros['estado']));
		}
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetchAll();
		}else{
			return 0;
		}
	}

	public function getAnuncio($id){
		
		$array = array();
		if(is_numeric($id)){
			$sql = $this->db->prepare("SELECT *, (SELECT categorias.nome FROM categorias WHERE anuncios.id_categoria = categorias.id) AS categoria FROM anuncios WHERE id = :id");
			$sql->bindValue(":id", addslashes($id));
			$sql->execute();
			if($sql->rowCount() > 0){
				$array = $sql->fetch();
			}else{
				header("Location: ".BASE_URL."anuncios");
			}

			$sql = $this->db->prepare("SELECT id as id_imagem, url FROM anuncio_imagens WHERE id_anuncio = :id_anuncio");
			$sql->bindValue(":id_anuncio", addslashes($id));
			$sql->execute();
			if($sql->rowCount() > 0){
				$array["imagens"] = $sql->fetchAll();
			}else{
				$array["imagens"] = "";
			}

			return $array;
			
		}else{
			header("Location: ".BASE_URL."anuncios");
		}
	}

	public function setAnuncio($titulo, $categoria, $valor, $estado, $descricao){
		
		if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
			$sql = $this->db->prepare("INSERT INTO anuncios (id_usuario, id_categoria, titulo, descricao, valor, estado) VALUES (:id_usuario, :id_categoria, :titulo, :descricao, :valor, :estado)");
			$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
			$sql->bindValue(":id_categoria", $categoria);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":valor", $valor);
			$sql->bindValue(":estado", $estado);
			$sql->execute();


		}else{

			header("Location: ".BASE_URL."login");
		}
		
	}

	public function updateAnuncio($titulo, $categoria, $valor, $estado, $descricao, $imagens, $id){
		
		if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
			$sql = $this->db->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, valor = :valor, estado = :estado, descricao = :descricao WHERE id = :id");
			$sql->bindValue(":id_categoria", $categoria);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":valor", $valor);
			$sql->bindValue(":estado", $estado);
			$sql->bindValue(":id", $id);
			$sql->execute();

			if(!empty($imagens)){
				for($q=0;$q<count($imagens['name']);$q++){
					$type = $imagens['type'][$q];
					if(in_array($type, array("image/jpeg", "image/png"))){
						$tmpname = md5(time().rand(0, 999)).'.jpg';
						move_uploaded_file($imagens['tmp_name'][$q], BASE_URL.'assets/images/anuncios/'.$tmpname);

						list($width_real, $height_real) = getimagesize(BASE_URL.'assets/images/anuncios/'.$tmpname);
						$ratio = $width_real/$height_real;

						$width = 500;
						$height = 500;

						if($width/$height > $ratio){
							$width = $height*$ratio;
						}elseif($width/$height < $ratio){
							$height = $width/$ratio;
						}

						$img = imagecreatetruecolor($width, $height);

						if($type == "image/jpeg"){
							$real = imagecreatefromjpeg(BASE_URL.'assets/images/anuncios/'.$tmpname);
						}elseif($type == "image/png"){
							$real = imagecreatefrompng(BASE_URL.'assets/images/anuncios/'.$tmpname);
						}

						imagecopyresampled($img, $real, 0, 0, 0, 0, $width, $height, $width_real, $height_real);
						imagejpeg($img, BASE_URL.'assets/images/anuncios/'.$tmpname, 80);

						$sql = $this->db->prepare("INSERT INTO anuncio_imagens (id_anuncio, url) VALUES (:id_anuncio, :url)");
						$sql->bindValue(":id_anuncio", $id);
						$sql->bindValue(":url", $tmpname);
						$sql->execute();

					}
				}
			}

		}else{

			header("Location: ".BASE_URL."login");
		}

	}

	public function delAnuncio($id){
		
		if(is_numeric($id)){

			$sql = $this->db->prepare("SELECT * FROM anuncio_imagens WHERE id_anuncio = :id_anuncio");
			$sql->bindValue(":id_anuncio", addslashes($id));
			$sql->execute();

			if($sql->rowCount() > 0){
				foreach($sql->fetchAll() as $img){
					unlink(BASE_URL.'assets/images/anuncios/'.$img['url']);
				}
				$sql = $this->db->prepare("DELETE FROM anuncio_imagens WHERE id_anuncio = :id_anuncio");
			   	$sql->bindValue(":id_anuncio", addslashes($id));
				$sql->execute();
			}

			$sql = $this->db->prepare("DELETE FROM anuncios WHERE id = :id");
			$sql->bindValue(":id", addslashes($id));
			$sql->execute();

		}else{
			header("Location: ".BASE_URL."login");
		}
	}

	public function delAnuncioImg($id){
		
		if(is_numeric($id)){

			$sql = $this->db->prepare("SELECT * FROM anuncio_imagens WHERE id = :id");
			$sql->bindValue(":id", addslashes($id));
			$sql->execute();

			if($sql->rowCount() > 0){
				unlink(BASE_URL.'assets/images/anuncios/'.$sql->fetch()['url']);

				$sql = $this->db->prepare("DELETE FROM anuncio_imagens WHERE id = :id");
			   	$sql->bindValue(":id", addslashes($id));
				$sql->execute();
			}

		}else{
			header("Location: ".BASE_URL."login");
		}

	}
}