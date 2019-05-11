<?php

	class controllerlogin{
		public function invoke(){
			if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
				$uri = 'https://';
			} else {
				$uri = 'http://';
			}
			$uri .= $_SERVER['HTTP_HOST'];

			header('Location: '. $uri .'/onlineorder/apps/view/login.php');
		}
	}

?>