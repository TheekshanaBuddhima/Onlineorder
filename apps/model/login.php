<?php
	class login{
		private $login_email;
		private $login_pwd;

		function userlogin($email, $pwd, $con){
			//var_dump($con);
			//$r=mysqli_query("SELECT * FROM login",$con);
			$sql = "SELECT * FROM login l, user u, role r WHERE l.user_id = u.user_id AND r.role_id = u.role_id AND l.login_email = \"$email\" AND l.login_pwd = \"$pwd\" AND u.user_status = \"Active\"";
			$r = $con->query($sql);


			//$r->execute(array($email, $pwd));
			//return $r;
			//var_dump($r);
			//echo $email;
			//echo $pwd;
			//echo mysqli_numrows($r);

			/*if($r->errorCode() != 0){
				$errors = $r->errorInfo();
				echo $errors[2];
			}
			*/
			return $r;
		}
	}

?>