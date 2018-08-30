<?php
class Categorias extends model{

	public function getCategories(){

		$sql = $this->db->query("SELECT * FROM categorias");
		if ($sql->rowCount() > 0){
			
			return $sql->fetchAll();
		}
	}
}
?>