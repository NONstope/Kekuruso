<html>
	<head>
		<title>progect</title>
		
	</head>
	<body >
		<form action="" method="post" class= "form1">
			Login: <input type="text" name="login">
			Password: <input type="text" name="password">
			<input type="submit">
		</form>
		<?php 
		include 'API.php';
		set_connection("localhost", "root", "", "kekuruso");
		if(is_user_exist($_POST['login'], $_POST['password']))
		{
			echo 'Succed!';
		}
		else
		{
			echo "<br>Fail(<br>";
		}
		?>
	</body>
</html>