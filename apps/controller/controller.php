<?php

session_start();

class controller{

	public $conn;

	function __construct(){
		include '../common/dbconnection.php';
		$obj = new dbconnection();
		$this->conn = $obj->connection();
		var_dump($this->conn); //for testing purpose //show the object created or not
	}

	public function logincontroller($email, $pwd){
		include '../model/login.php';
		include '../model/logmodel.php';
		$obj = new login();

		$r = $obj->userlogin($email, $pwd, $this->conn);
		//echo $r->rowCount();

		if($r->num_rows){
			//get user data to array
			$row = $r->fetch_assoc();

			//////log status//////
			$ob = new logmodel();
			$log_status = "login";
			$log_ip = $_SERVER['REMOTE_ADDR']; //to get ip address of the client pc
			$user_id = $row['user_id'];
			$session_id = $user_id."_".$log_ip."_".time(); //userid, ip add and time stamp use for the session id
			$ob->logIn($log_ip, $log_status, $user_id, $session_id, $this->conn);//create a log
			$lastid = $this->con->insert_id;

			array_push($row, $session_id);//push session id to row array 0th index

			$_SESSION['userinfo'] = $row;//create session

			//Redirect to dashboard
			header("location:../view/dashboard.php");
		}else{
			$err = base64_encode("Invalid email or password"); //any browser can decode this code
			header("location:../view/login.php?err=$err");
		}

	}

	public function aordcontroller($user_id, $value){
		include '../model/usermodel.php';
		$obu = new usermodel();
		$obu->aordUser($this->conn, $user_id, $value);
		header("Location: ../view/user.php");
	}
}

class controllerLogout{

	public $conn;

	function __construct(){
		include '../common/dbconnection.php';
		$obj = new dbconnection();
		$this->conn = $obj->connection();
		//var_dump($this->conn); //for testing purpose //show the object created or not
	}

	public function getOut(){

		include '../model/logmodel.php';
		$ob = new logmodel();

		$row = $_SESSION['userinfo'];
		$session = $row[0]; //get session_id from session
		$ob->logOut("logout", $session, $this->conn);

		unset($_SESSION['userinfo']);
		header('refresh:5,url=login.php');
	}
}


?>
