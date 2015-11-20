<?php

$MYSQL_HANDLE = "";
$SALT = "sm_salt";

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
	global $MYSQL_HANDLE, $SALT;
	$answer = mysqli_query($MYSQL_HANDLE, "select * from `users` where `login`='$login' and `password`='".md5($password.$SALT)."';");
	$arr = mysqli_fetch_array($answer);
	if(count($arr) == 8 && count(mysqli_fetch_array($answer)) == 0)
	{
		return $arr;
	}
	return false;
}


function login($login, $password)
{
	global $MYSQL_HANDLE, $SALT;
	if(($arr = is_user_exist($login, $password)) != false)
	{
		setcookie("login",$arr['login']);
		setcookie("id",$arr['id']);
		setcookie("nick",$arr['nickname']);
		return true;
	}
	else
	{
		return false;
	}
}

function register($login, $password, $nick)
{
	global $MYSQL_HANDLE, $SALT;
	$password = md5($password.$SALT);
	if(is_user_exist($login, $password) == false)
	{
		mysqli_query($MYSQL_HANDLE, "insert into `users` set `login`='$login', `password`='$password', `nickname`='$nick';");
		return true;
	}
	else 
	{
		return false;
	}
}

function is_logined()
{
	if(isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['nick']))
	{
		return true;
	}
	return false;
}


?>