<?php
		$id = addslashes($_REQUEST['id']);
		$page = addslashes($_REQUEST['page']);
		$succes_msg = "";
		$error_msg = "";
	
		$conn= new PDO('mysql:host=localhost;dbname=gbook','root', 'root');
		
		$delete = "DELETE FROM layout WHERE id = $id";
					$stmt = $conn->prepare($delete); 
   				$stmt->execute();
   				
   	if($delete == true) {
   		$succes_msg= "Der Eintrag wurde erfolgreich gelöscht";
   		header("location:admin.php?page=$page&succes_msg=$succes_msg");
   	} else {
   		$error_msg = "Ein Fehler ist aufgetreten, versuchen Sie es erneut!";
   		header("location:admin.php?page=$page&error_msg=$error_msg");
   	}
?>