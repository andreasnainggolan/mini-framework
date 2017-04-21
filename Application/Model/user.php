<?php

class User{

	private $_db;

	public function __construct()
	{
		$this->_db = Database::getInstance();		
	}

	public function read($table)
	{
		return $this->_db->read($table);
	}
}