<?php
	include '../common/session_handling.php';
	include '../common/dbconnection.php';
	include '../model/modulemodel.php';
	$ob = new dbconnection();
	$con = $ob->connection();
	$role_id = $userinfo['role_id'];

	//to get modues based on role_id
	$obm = new modulemodel();
	$resultm = $obm->getUserModules($role_id, $con);

?>
<html>
	<head>
		<title>Online Order</title>
		<link rel="stylesheet" href="../resources/css/layout1.css">
        <link rel="stylesheet" href="../resources/css/res@media.css">
		<link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
	</head>

	<body>
		<div id="main">
				<div id="header">
					<div class="row">
						<div class="col-md-6">
							<div class="hea1">Online Ordering System</div>
						</div>
						<div class="col-md-6">
							<div class="prof">
								<?php echo $userinfo['user_fname'] . " " . $userinfo['user_lname'] . " | " . $userinfo['role_name'] ; ?>
								| <a class="signout" href="signout.php">SignOut</a>
							</div>
						</div>
					</div>
				</div>
				<div id="content">
					<div class="row">
						<div class="col-md-2">
							<div class="pad1">
								<ul class = "list1">
									<?php
									while($row = $resultm->fetch_assoc()){
										//converting to lower case
										$lm_name = strtolower($row['m_name']);
										$url = $lm_name.".php";
									?>
									<li>
										<a href="<?php echo $url; ?>">
											<?php echo $row['m_name']; ?>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-md-10">
							<div class="pad1">
								<ul class="breadcrumb">
									<li>Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="footer">
					<?php include'../common/footer.php'; ?>
				</div>

		</div>
	</body>
</html>
