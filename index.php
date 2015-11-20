<?php 
include 'API.php';
set_connection("localhost", "root", "", "kekuruso");
if(isset($_POST['login']) && isset($_POST['password']) && login($_POST['login'], $_POST['password']) !== false)
{
	//
}
if(is_logined())
{
	echo "Logined!";
}
?>
<html>
	<head>
		<title>progect</title>
	</head>
	<body >
		<form action="" method="post" class= "form1">
			Login: <input type="text" name="login">
			Password: <input type="text" name="password">
			Nickname: <input type="text" name="nick">
			<input type="submit">
		</form>
		<?php 
		//$text = file_get_contents("login.ext");
		//echo($text);
		?>
	</body>
</html>