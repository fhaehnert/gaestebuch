<?php
	error_reporting(E_ALL & ~E_NOTICE);
	// Parameter einlesen
	$name = $_POST["name"];
	$email = $_POST["email"];
	$nachricht = $_POST["nachricht"];
	
	// Parameter pr�fen
	if($name == " " or $email == " " or $nachricht == " "){
		echo "Du hast die Felder nicht korrekt ausgef&uuml;llt";
	}
	else
	{
		$connection = new PDO('mysql:host=localhost;dbname=gbook','root', 'root');
    
		$timestamp = time();
		$datum = date("d.m.Y", $timestamp);
		
		$nachricht = str_replace("�", "&auml;", $nachricht);
		$nachricht = str_replace("�", "&Auml;", $nachricht);
		$nachricht = str_replace("�", "&ouml;", $nachricht);
		$nachricht = str_replace("�", "&Ouml;", $nachricht);
		$nachricht = str_replace("�", "&uuml;", $nachricht);
		$nachricht = str_replace("�", "&Uuml;", $nachricht);
		$nachricht = str_replace("�", "&szlig;", $nachricht);
		$nachricht = str_replace("<", "<&nbsp;", $nachricht);
		$nachricht = str_replace(">", ">&nbsp;", $nachricht);
		$nachricht = str_replace("\r\n", "<br />", $nachricht); 
		
		$eintrag = "INSERT INTO layout (name, mail, nachricht, datum)
		VALUES ('$name', '$email', '$nachricht', '$datum')";
		
    $stmt = $connection->prepare($eintrag); 
    $stmt->execute();
		
		$succes_msg = "";
		$error_msg = "";
		
		if($eintragen = true){		
		  $succes_msg = "Erfolgreich gespeichert";
			header("location:schreiben.php?succes_msg=$succes_msg");	
		} else {
			$error_msg="Speichern nicht erfolgreich!";
			header("location:schreiben.php?error_msg=$error_msg");	
		}
	
		$connection->connection = null;
	}

?>
