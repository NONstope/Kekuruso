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
	if((strlen($login) <= 10)&&(strlen($password) <= 10)&&($arr = is_user_exist(protect_string($login), protect_string($password))) != false)
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
	$login = protect_string($login);
	$nick = protect_string($nick);
	$passwd = md5($password.$SALT);
	if((strlen($login) <= 10)&&(strlen($password) <= 10)&&(strlen($nick) <= 15)&&(is_user_exist($login, $password) == false))
	{
		mysqli_query($MYSQL_HANDLE, "insert into `users` set `login`='$login', `password`='$passwd', `nickname`='$nick';");
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

function write_msg($msg)
{
	global $MYSQL_HANDLE;
	$msg = protect_string($msg);
	if(is_logined())
	{
		mysqli_query($MYSQL_HANDLE, "insert into `messages` set `msg_author`='".protect_string($_COOKIE['nick'])."', `msg_text`='$msg';");
	}
}

function get_last_messages($amount)
{
	global $MYSQL_HANDLE;
	$max = mysqli_query($MYSQL_HANDLE, "select max(`msg_id`) as `max` from `messages`;");
	$max = mysqli_fetch_array($max);
	$request = mysqli_query($MYSQL_HANDLE, "select * from `messages` where `msg_id` > ".($max['max']-$amount).";");
	for($i = $amount-1;$i >= 0;--$i)
	{
		$tmp[$i] = mysqli_fetch_array($request);
	}
	return $tmp;
}

function protect_string($string)
{
	return str_replace("'", "\'", $string);
}
?>