<?php

	if(isset($_GET['user_id']) && isset($_GET['value'])){
		include '../controller/controller.php';
		$user_id = $_GET['user_id'];
		$value = $_GET['value'];
		$ob = new controller();
		$ob->aordcontroller($user_id, $value);
	}else{



	include '../common/session_handling.php';
	include '../common/dbconnection.php';
	include '../model/modulemodel.php';
	include '../model/usermodel.php';
	$ob = new dbconnection();
	$con = $ob->connection();
	$role_id = $userinfo['role_id'];

	$user_id = $userinfo['user_id'];

	//to get modues based on role_id
	$obm = new modulemodel();
	$resultm = $obm->getUserModules($role_id, $con);

	$obusermodel = new usermodel();
	$resultum = $obusermodel->viewAllUsers($con);


?>
<html>
	<head>
		<title>Online Order</title>
		<link rel="stylesheet" href="../resources/css/layout1.css">
		<link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
	</head>

	<body>
		<div id="main">
				<div id="header">
					<div class="row">
						<div class="col-md-8">
							<div class="hea1" align="center">Online Ordering System</div>
						</div>
						<div class="col-md-4">
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
						<div class="col-sm-10">
							<div class="pad1">
								<ul class="breadcrumb">
									<li>
										<a href = "dashboard.php">Dashboard</a>
									</li>
									<li>User</li>
								</ul>
							</div>

							<!--///////////////ADD button/////////////////-->
							<div>
								<a href="adduser.php">
									<button type="button" class="btn btn-primary">
										<span class="glyphicon glyphicon-plus"></span> ADD
									</button>
								</a>
							</div>

							<!--for space-->
							<div class="clearfix">&nbsp;</div>

							<!--///////////////table start/////////////////////-->
							<div>
								<table class="table table-bordered table-condensed">
									<tr>
										<th>&nbsp;</th>
										<th>User ID</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Role</th>
										<th>Status</th>
										<th>&nbsp;</th>
									</tr>

									<?php
										while($rowu=$resultum->fetch_assoc()){
											if($rowu['user_image'] == ""){
												$iname = "Emma.jpg";
												$path = "../resources/images/" . $iname;
											}else{
												$iname = $rowu['user_image'];
												$path = "../resources/images/user images/" . $iname;
											}

											if($rowu['user_status'] == "Active"){
												$label = "Deactivate";
												$style = "danger";
												$value = "Deactive";
											}else{
												$label = "Activate";
												$style = "success";
												$value = "Active";
											}
									?>

										<tr>
											<td align="center"><img src="<?php echo $path;  ?>" width="50" /></td>
											<td><?php echo $rowu['user_id']; ?></td>
											<td><?php echo $rowu['user_fname']; ?></td>
											<td><?php echo $rowu['user_lname']; ?></td>
											<td><?php echo $rowu['role_name']; ?></td>
											<td><?php echo $rowu['user_status']; ?></td>
											<td>
												<a href="viewuser.php?user_id=<?php echo $rowu['user_id']; ?>">
													<button type="button" class="btn btn-info sm">View</button>
												</a>

												<a href="updateuser.php?user_id=<?php echo $rowu['user_id']; ?>">
													<button type="button" class="btn btn-primary sm">Update</button>
												</a>

												<?php
												if($user_id == $rowu['user_id']){ ?>
													<button type="button" class="btn btn-danger" disabled>Deactivate</button>
												<?php }else{ ?>
												<a href="user.php?user_id=<?php echo $rowu['user_id']; ?>&value=<?php echo $value; ?>">
													<button type="button" class="btn btn-<?php echo $style; ?> sm" onclick="return confirmation('<?php echo $label; ?>')"><?php echo $label ?></button>
												</a>
												<?php } ?>
											</td>
										</tr>

									<?php
										}
									?>
								</table>

							</div>
							<!--////////////////table end//////////////////////////-->

						</div>
					</div>
				</div>
				<div id="footer">
					<?php include'../common/footer.php'; ?>
				</div>

		</div>
	</body>


	<script type="text/javascript">
		function confirmation(status){
			var r = confirm("Do you want to " + status + " user");
			if(r){
				return true;
			}else{
				return false;
			}
		}
	</script>

</html>

<?php
	}
?>
