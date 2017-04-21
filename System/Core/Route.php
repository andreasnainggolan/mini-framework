<?php
class Route{

	protected $controller	=	'welcome';
	protected $method		=	'index';
	protected $params		=	[];

	public function __construct(){
		global $index_page;
		if($index_page != ''){
			$this->controller = $index_page;
		}

		
		if(isset($_GET['url'])){
			$url = explode('/', filter_var(trim($_GET['url']), FILTER_SANITIZE_URL));
			$url[0] = $url[0];
		}else{
			$url[0] = $this->controller;
		}

		if(file_exists('Application/Controller/' . $url[0] . '.php')){
			$this->controller = $url[0];
		}else{
			return require_once 'Application/View/Errors/404.php';
		}

		require_once 'Application/Controller/' . $this->controller. '.php';
		$this->controller = new $this->controller;

		if(isset($url[1])){
			if($url[1] != ''){
				if(method_exists($this->controller, $url[1]))
					$this->method = $url[1];
				else
					return require_once 'Application/View/Errors/404.php';				
			}else{
				$this->method = $this->method;
				if(!method_exists($this->controller, $this->method))
					return require_once 'Application/View/Errors/404.php';				
			}
		}else{
			$this->method = $this->method;
			if(!method_exists($this->controller, $this->method))
				return require_once 'Application/View/Errors/404.php';				
		}


		unset($url[0]);
		unset($url[1]);
		$this->params = $url;

		call_user_func_array([$this->controller, $this->method], $this->params);
	}
}