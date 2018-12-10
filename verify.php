<?php
error_reporting(E_ALL & ~E_NOTICE);
	
	// Einbinden Logindaten
require "private/pw_safe.php";
	
	// URL-Parameter einlesen
$username = addslashes($_REQUEST['username']);
$password = addslashes($_REQUEST['password']);
	
$password = spice($password, $salt);
	
		
if($username == $user && $password == $passwd){
	session_start();
	
	// Session Variable angelegen#
	$_SESSION['login']= 1;
	$_SESSION['username'] = $username;
	
	
	header("location:admin.php");
}
else{
	$error_msg="Wrong username or password";
	header("location:login.php?error_msg=$error_msg");
	exit();
}
?>