<?php 
	include 'API.php';
	set_connection("localhost", "root", "", "kekuruso");
	
	if(isset($_POST['login']) && isset($_POST['password']))
	{
		$logi = htmlspecialchars($_POST['login']);
		$pas = htmlspecialchars($_POST['password']);
		
		if(is_user_exist($logi, $pas) == false){
			header("Location: reg.html");
		}
		else{
			login($logi, $pas);
			header("Location: action3.php");
		}
	}
	
 ?>

<html>
	<head>
		<title>login</title>
		<link rel="stylesheet" href="login.css">
	</head>
	<body>
	<div class ="div_a">
		<a href ="index.php" class = "a1">log in</a>
		<a href ="reg.html" class = "a2">registration</a>
	</div>
	<div class= "formachka">
		<form action="" method="post">
			<p class ="ppp"> login: <br> <input type="text" name="login" maxlength="10"/></p>
			<p class ="ppp"> password: <br> <input type="password" name="password" maxlength="10"/></p>
			<p class ="pp"><input type="submit" value="Login in" class = "mysubmit"/></p>
		</form>
	</div>
	</body>
</html>