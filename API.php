<?php

$MYSQL_HANDLE = "";

/*
 * set connection to base
 */
function set_connection($host,$user,$pass,$bd_name)
{
	global $MYSQL_HANDLE;
	$MYSQL_HANDLE = mysqli_connect($host, $user, $pass, $bd_name);	
}

/*
 * check if user already registered!
 */
function is_user_exist($login, $password)
{
	global $MYSQL_HANDLE;
	$answer = mysqli_query($MYSQL_HANDLE, "select * from `users` where `login`='".$login."' and `password`='".$password."';");
	$arr = mysqli_fetch_array($answer);
	if(count($arr) == 8 && count(mysqli_fetch_array($answer)) == 0)
	{
		return true;
	}
	return false;
}

?>