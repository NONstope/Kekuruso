<?php 
	include 'API.php';
	set_connection("localhost", "root", "", "kekuruso");
	
	$logi = htmlspecialchars($_POST['login']);
	$pas = htmlspecialchars($_POST['password']); 
	$nick = htmlspecialchars($_POST['nick']); 
	register($logi, $pas, $nick);
	header("Location: index.php");
 ?>