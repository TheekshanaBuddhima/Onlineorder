<?php
	class dbconnection{
		private $host = "localhost";
		private $un = "root";
		private $pd = "";
		private $db = "onlineorder";
		//private static $instence;

		/*public function connection(){
			$con = new PDO("mysql:host = $this->host; dbname = $this->db","$this->un", "$this->pd");

		//new PDO("DBMS:host=hostname;dbname=dbname", username, password)
			return $con;	
		}	*/

		public function connection(){
			$con = new mysqli($this->host, $this->un, $this->pd, $this->db);
			return $con;
		}
		//public static function getInstence(){
		//	if(self::instence == null){
		//		self::instence = $this->connection();
		//	}
		//	return self::instence;
		//}


	}

?>