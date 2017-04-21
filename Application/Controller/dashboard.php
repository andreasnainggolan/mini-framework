<?php

class Dashboard extends Controller{

	public function index()
	{
		$user = $this->model('user')->read('users');
		return $this->view('tampilan',['user' => $user]);
	}
}


