<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	$error_msg = addslashes($_REQUEST['error_msg']);
	$succes_msg = addslashes($_REQUEST['succes_msg']);
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Guestbook</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container border p-0">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
				<a class="navbar-brand" href="index.php?<?php echo "page=1" ?>"><h2>G&aumlstebuch</h2></a>
				<div class="navbar-nav ml-auto">
					<a class="nav-item" href="index.php">
						<span class="navbar"><h5>Home</h5></span>
					</a>
				</div>
			</nav>
			<div class="card m-3">
				<div class="card-header">
					Formulieren Sie einen neuen Beitrag
				</div>
				<div class="card-body">
						<form action="senden.php" method="post">
							<!-- Username -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Name</label>	
								<div class="col-sm-6">
									<input class="form-control" type="text" name="name" pattern="[a-zA-z_]*"required>
								</div>		
							</div>
							
							<!-- e-Mail -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">E-Mail</label>	
								<div class="col-sm-6">
									<input class="form-control" type="email" name="email" required>
								</div>		
							</div>
							
							<!-- Nachricht -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nachricht</label>	
      					<textarea class="form-control col-sm-8 ml-3" rows="5" id="nachricht" name="nachricht"></textarea>
								</div>	
							</div>							
							<!-- Abschicken -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">&nbsp</label>	
									<div class="col-sm-6">
											<input class="btn btn-primary ml-3 pl-5 pr-5" type="submit" value="Senden">
									</div>
							</div>
						</form>
					<div class="card-footer">	
					<?php
					if($error_msg != ""){
						
					 ?><span class="text-danger font-weight-bold"><?=$error_msg?><span><?php
					}
					?>
					<?php
					if($succes_msg != ""){
						
					 ?><span class="text-success font-weight-bold"><?=$succes_msg?><span><?php
					}
							?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
