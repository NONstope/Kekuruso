<?php 
	include 'API.php';
	set_connection("localhost", "root", "", "kekuruso");
	
	if(isset($_POST['usermsgg'])){
	$msg = htmlspecialchars($_POST['usermsgg']); 
	write_msg($msg);
	}
	echo (file_get_contents("page.html"));
 ?>