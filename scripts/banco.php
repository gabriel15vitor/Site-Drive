<?php
	class Database{
		// configurações do banco
		private $host = "localhost:3306";
		private $db_name = "drive";
		private $username = "root";
		private $password = "";
		
		// variável para conexão
		public $conn;
				
		//função para conectar
		public function getConnection(){
	  
	        $this->conn = null;
	  
	        try{
	            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
	        }catch(PDOException $exception){
	            echo "Connection error: " . $exception->getMessage();
	        }
	  
	        return $this->conn;
	    }
	}
?>