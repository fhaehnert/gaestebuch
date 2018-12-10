<?php
	error_reporting(E_ALL & ~E_NOTICE);

	// URL-Parameter einlesen
	$error_msg = addslashes($_REQUEST['error_msg']);
	
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Guestbook</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="Bootstrap/js/bootstrap.min.js">
	</head>
	<body>
		<div class="container border p-0">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
				<a class="navbar-brand" href="index.php?<?php echo "page=1" ?>"><h2>G&aumlstebuch</h2></a>
				<div class="navbar-nav ml-auto">
					<div class="navbar-nav ml-auto">
					<a class="nav-item" href="index.php">
						<span class="navbar"><h5>Home</h5></span>
					</a>
				</div>
				</div>
			</nav>
			<div class="card m-3">
				<div class="card-header">
					<h3>Login</h3>
				</div>
				<div class="card-body">
					<form action="verify.php" method="get">
							<!-- Username -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Username</label>	
								<div class="col-sm-6">
									<input class="form-control" type="text" name="username" pattern="[a-zA-z_öaüÖÜAß]*"required>
								</div>		
							</div>
							
							<!-- Password -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Password</label>	
								<div class="col-sm-6">
									<input class="form-control" type="password" name="password" pattern="[^ ]*"required>
								</div>		
							</div>
							
							<!-- Login -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">&nbsp;</label>	
									<div class="col-sm-6">
											<input class="btn btn-primary pl-5 pr-5" type="submit" value="Login">
									</div>
							</div>
					 	</form>
					</div>
					<div class="card-footer">	
					<span class="text-danger font-weight-bold"><?=$error_msg?><span>
				</div>
			</div>
		</div>
	</body>
</html>
