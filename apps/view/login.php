<?php
	include'../controller/controller.php';
	//To handling errors
	error_reporting(E_WARNING || E_ALL);

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$pwd = sha1($_POST['pwd']); //encrypt the password using hash function  --  sha1 encryption machenism
		$obl = new controller();
		$obl->logincontroller($email, $pwd);
	}
?>
<html>
	<head>
		<title>Login - Online Order</title>
		<link rel="stylesheet" href="../resources/css/layout1.css">
        <link rel="stylesheet" type="text/css" href="screen.css" media="screen">
        <link rel="stylesheet" type="text/css" href="print.css"  media="print">
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
							<form method="post" action="">

								<?php
									if(isset($_GET['err'])){
								?>
									<div class = "alert alert-danger">
										<?php
											echo "<b>".base64_decode($_GET['err'])."</b>";
										?>
									</div>
								<?php
									}
								?>

								<div>Email</div>
								<div><input type="email" id="email" name="email" class="form-control" /></div>
								<div id="emailerr" style="height: 20px; color: #aa0000; font-weight: bold;"></div>

								<div class="clearfix">&nbsp</div>

								<div>Password</div>
								<div><input type="password" id="pwd" name="pwd" class="form-control"></div>
								<div id="pwderr" style="height: 20px; color: #aa0000; font-weight: bold;"></div>

								<div class="clearfix">&nbsp</div>

								<div><button type="submit" name="login" class="btn-primary">LOGIN</button></div>
							</form>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				<div id="footer">
					<?php include'../common/footer.php'; ?>
				</div>

		</div>
	</body>

	<script src="../resources/jquery/jquery-3.2.1.js"></script>
	<script>
		$(document).ready(function(){
			$('form').submit(function(){
				var email = $('#email').val();
				var pwd = $('#pwd').val();

				if(email == "" && pwd == ""){
					$('#emailerr').text("Please fill the Email field");
					$('#pwderr').text("Please fill the Password field");
					$('#email').focus();
					return false;
				}else if(pwd == "" && email != ""){
					$('#pwderr').text("Please fill the Password field");
					$('#pwd').focus();
					return false;
				}else if(email == "" && pwd != ""){
					$('#emailerr').text("Please fill the Email field");
					$('#email').focus();
					return false;
				}

			});

			$('#email').keydown(function(){
				$('#emailerr').text("");
			});

			$('#pwd').keydown(function(){
				$('#pwderr').text("");
			});
		});
	</script>
</html>
