<?php 
	include 'API.php';
	set_connection("localhost", "root", "", "kekuruso");
	
	if(isset($_POST['usermsgg']))
	{
		$msg = htmlspecialchars($_POST['usermsgg']); 
		write_msg($msg);
	}
	//echo (file_get_contents("page.html"));
 ?>
 
 <head>
	<title>chat</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="page.css">
	
</head>
<body>
	<table width="95%" >
		<tr>
			<div id="wrapper">
				<div id="menu">
					<p class="welcome">Welcome <?php echo "<b>".$_COOKIE['nick']."</b>"; ?></p>
					<p class="logout"><a id="exit" href="index.php">logout</a></p>
				<div style="clear:both"></div>
			</div>
     
			<div id="chatbox">
			<?php
			$arr = get_last_messages(50);
			for($i = 0; $i < 50; $i++)
			{
				if(isset($arr[$i]['msg_author']))
				{
					echo ("<b>".$arr[$i]['msg_author']."</b>:<i>". $arr[$i]['msg_text']."</i><br>\n");
				}
			}
			?>
			 </div>
				<form name="message" action="action3.php" method = "post">
					<input name="usermsgg" type="text" id="usermsg" size="63" autofocus/>
					<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
				</form>
			</div>
		</tr>
		<tr>
			<img src= "img.jpg" alt="jpg was heare" usemap="#links">
			<map id ="links">
				<area shape="rect" coords="0,90,120,200" href="https://vk.com" alt="vk.com" />
				<area shape="rect" coords="121,90,240,200" href="https://twitter.com/" alt="twitter.com" />
				<area shape="rect" coords="241,90,360,200" href="https://uk-ua.facebook.com/" alt="facebook.com" />
				<area shape="rect" coords="361,90,480,200" href="http://ok.ru/" alt="ok.ru" />
			</map>
		</tr>
	</table>
</body>