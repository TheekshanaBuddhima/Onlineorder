<?php
	class usermodel{
		public function viewAllUsers($con){
			$sql = "SELECT * FROM user u, role r, login l WHERE u.role_id = r.role_id AND u.user_id = l.user_id";

			$r = $con->query($sql);

			return $r;
		}

		public function aordUser($con, $user_id, $value){
			$sql = "UPDATE user SET user_status = \"$value\" WHERE user_id = \"$user_id\" ";
			$con->query($sql);
		}
	}
?>