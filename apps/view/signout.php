<?php 
	include'../controller/controller.php';
	//To handling errors
	error_reporting(E_WARNING || E_ALL);

	$ob = new controllerLogout();
	$ob->getOut();
?>
<html>
	<head>
		<title>Login - Online Order</title>
		<link rel="stylesheet" href="../resources/css/layout1.css">
		<link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
	</head>

	<body>
		<div id="main">
				<div id="header">
					<?php include'../common/header.php'; ?>
				</div>
				<div id="navi">Navi</div>
				<div id="content">
					<div class="row">
						<div class="col-md-4">&nbsp</div>
						<div class="col-md-4">
							<h3 class="text-success" align="center">User has successfully logout</h3>
							<p align="center">Page will redirect to <a href = "login.php">Login page</a> with 5 seconds</p>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				<div id="footer">
					<?php include'../common/footer.php'; ?>
				</div>

		</div>
	</body>
</html>