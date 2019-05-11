<?php
	class logmodel{
		public $session_id;

		function logIn($log_ip, $log_status, $user_id, $session_id, $con){

			$sql = "INSERT INTO log (log_in, log_ip, log_status, user_id, session_id) VALUES
			 (NOW(), \"$log_ip\", \"$log_status\", \"$user_id\", \"$session_id\")";
			$con->query($sql);
		}

		function logOut($log_status, $session_id, $con){

			$sql = "UPDATE log SET log_out = NOW(), log_status = \"$log_status\" WHERE session_id = \"$session_id\" ";
			$con->query($sql);
		}
	}

?>