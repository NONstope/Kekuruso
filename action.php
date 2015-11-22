<?php 
	include 'API.php';
	set_connection("localhost", "root", "", "kekuruso");
	
	$logi = htmlspecialchars($_POST['login'] );
	$pas = htmlspecialchars($_POST['password']); 
	
	if(is_user_exist($logi, $pas) == false){
		echo (file_get_contents("reg.html"));
	}
	else{
		login($logi, $pas);
		echo (file_get_contents("page.html"));
	}
 ?>