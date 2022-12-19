<?php
	class DB
	{
		private $host;
		private $database;
		private $user;
		private $password;
		private $charset;

		public function __construct()
		{
			$this->host = "localhost";
			$this->database = "pruebatecnica";
			$this->user = "root";
			$this->password = "Nasuligi01*";
			$this->charset = "utf8mb4";
		}

		function connect()
		{
			try{
				$connection = "mysql:host=".$this->host.";dbname=".$this->database.";charset=".$this->charset;
				$pdo = new PDO($connection,$this->user,$this->password);
				return $pdo;
			}
			catch(PDOException $e){
				print_r("Error de conecion: ".$e->getMessage());
			}
		}
	}

?>