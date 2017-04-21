<?php

class Controller extends Core{

	public function __construct()
	{
		$this->load = $this->load();
		$this->uri 	= $this->uri();
	}

	public function view($locate, $data = [])
	{
		return require_once 'Application/View/' . $locate . '.php';
	}

	public function model($file)
	{
		require_once 'Application/Model/' . $file . '.php';
		return new $file;
	}

	public function segment($string){
		$URL = $_SERVER['REQUEST_URI'];
		$uri = explode("/",$URL);
		$rows = 3 + $string;
		if(isset($uri[$rows])){
			return $uri[$rows];
		}
	}

}

