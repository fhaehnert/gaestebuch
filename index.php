<?php
	error_reporting(E_ALL & ~E_NOTICE);

	// URL-Parameter einlesen
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
		<link rel="stylesheet" href="Bootstrap/js/bootstrap.min.js">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container border p-0">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
				<a class="navbar-brand" href="index.php?<?php echo "page=1" ?>"><h2>G&aumlstebuch</h2></a>
				<div class="navbar-nav ml-auto">
					<a class="nav-item" href="schreiben.php">
						<span class="navbar"><h5>Neuer Eintrag</h5></span>
					</a>
					<a class="nav-item" href="login.php">
						<span class="navbar"><h5>Login</h5></span>
					</a>
				</div>
			</nav>
			<div class="card m-3">
				<div class="card-header">
					<h3>Eintr&aumlge</h3>
				</div>
				<div class="card-body">
				<?php
					$conn= new PDO('mysql:host=localhost;dbname=gbook','root', 'root');
					
					$pagesuche = 0;
					$url = $_SERVER["REQUEST_URI"];
					$pagesuche = strpos($url, "?page=");
					
					if($pagesuche == "") {
						$page = 1;
					} else {
						$page = $_GET["page"];
					}
					
					$wo = ($page * 5) - 5;
					$wo++;
					
					$zahl = 1;
					$pos = 1;
					
					$abfrage = "SELECT id FROM layout ORDER BY id DESC";
					$stmt = $conn->prepare($abfrage); 
   				$stmt->execute();
   				
   				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						if($zahl == $wo)
						{
							$pos = $row->id;
						}
						$zahl++;
					}
					
					$abfrage = "SELECT * FROM layout WHERE id <= '$pos' ORDER BY id DESC LIMIT 5";
					$stmt = $conn->prepare($abfrage); 
   				$stmt->execute();
   				while($row = $stmt->fetch(PDO::FETCH_OBJ))
   				{
						?>
							<h4><?php echo $row->name; ?>&nbsp;<small style="color:grey;">schrieb:</small></h4>
							<p>
								<?php echo $row->nachricht; ?>
							</p>
							<h6 style="color:grey;"><?php echo $row->datum; ?></h6>
							<hr />
						<?php
					}
					
								
				?>
				</div>
				<div class="card-footer pb-0">	
					<ul class="pagination">
							<?php
							if($page > 1){
								?>
								<li class="page-item">
								<a class="page-link" href="index.php?page=<?php echo ($page - 1); ?>">Zur&uuml;ck</a>
								</li>
								<?php
							}

							$anzahlseite = ceil(($zahl-1) / 5);
							$weiterfrage = $anzahlseite - $page;
							
							if($weiterfrage > 0){
								?>
								<li class="page-item">
								<a class="page-link" href="index.php?page=<?php echo ($page + 1); ?>">Weiter</a>
							  </li>
								<?php
							}
							?>

					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
