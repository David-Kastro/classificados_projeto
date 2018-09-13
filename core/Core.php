<?php
class Core{

	public function run(){

		$url = '/'.(isset($_GET['url'])?$_GET['url']:'');
		$url = $this->checkRoutes($url);

		$params = array();

		if(!empty($url) && $url != '/'){
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && $url[0] != ''){
				$currentAction = $url[0];
				array_shift($url);
			}else{
				$currentAction = 'index';
			}

			if(count($url) > 0 && $url[0] != ''){
				$params = $url;
			}

		}else{
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)){
			$currentController = 'notFoundController';
			$currentAction = 'index';
		}

		/*echo $currentController.'<br><br>';
		echo $currentAction;
		exit;*/

		$controller = new $currentController();

		call_user_func_array(array($controller, $currentAction), $params);

	}

	public function checkRoutes($url){
		global $routes;

		foreach ($routes as $route => $std_url) {
			
			$pattern = preg_replace('(\{[a-z0-9_]{1,}\})', '([a-z0-9-]{1,})', $route);

			if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1){
				array_shift($matches);
				array_shift($matches);

				if(preg_match_all('(\{[a-z0-9_]{1,}\})', $route, $m)){
					$itens = preg_replace('(\{|\})', '', $m[0]);
				}

				$arg = array();
				foreach($matches as $key => $value){
					$arg[$itens[$key]] = $value;
				}

				foreach ($arg as $argkey => $argvalue){
					$std_url = str_replace(':'.$argkey, $argvalue, $std_url);
				}

				$url = $std_url;

				break;
			}

		}

		return $url;
	}

}