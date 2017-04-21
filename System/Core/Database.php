<?php

class Database{

	public static $INSTANCE = null;
	private $mysqli,
			$HOST	=	'localhost',
			$USER	=	'root',
			$PASS	=	'',
			$DBNAME	=	'db_emailfuture';

	public function __construct()
	{
		$this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
		if(mysqli_connect_error())
		{
			die('KONEKSI BERMASALAH');
		}
	}

	public static function getInstance()
	{
		if(!isset(self::$INSTANCE)){
			self::$INSTANCE = new Database();
		}

		return self::$INSTANCE;		
	}
	public function read($database)
	{
		$query 	= "SELECT * FROM $database";
		$result = $this->mysqli->query($query);
		while($row = $result->fetch_assoc())
		{
			$results[] = $row;
		}

		return $results;
	}
}