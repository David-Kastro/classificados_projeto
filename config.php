<?php
require 'environment.php';
require 'assets/engines/smarty/smarty-3.1.32/libs/smarty.class.php';
$smarty = new Smarty();
global $smarty;

$config = array();

if(ENVIRONMENT == 'development'){
	//conexao com o banco de dados local
	define("BASE_URL", "http://projeto2.pc/");
	$config['dbname'] = 'teste';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}else{
	//conexao com o banco de dados externo (onde esta ou sera hospedado o site)
	define("BASE_URL", "http://meusite.com.br/");
	$config['dbname'] = 'teste';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;
try{
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
}catch(PDOException $e){
	echo "ERROR: ".$e->getMessage();
	exit;
}
?>