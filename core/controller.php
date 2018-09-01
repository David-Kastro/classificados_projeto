<?php
class controller{

	public function loadView($viewName, $viewData = array()){
		extract($viewData);
		require './views/'.$viewName.'.php';

	}

	public function loadTemplate($viewName, $viewData = array()){
		require './views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()){
		if($viewName == 'home'){
			global $smarty;
			foreach ($viewData as $key => $value) {
				$smarty->assign($key, $value);
			}
			$smarty->display('./views/'.$viewName.'.php');

		}else{

			extract($viewData);
			require './views/'.$viewName.'.php';
		}
	}

}