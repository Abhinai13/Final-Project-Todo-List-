<?php
session_start();

if(isset($_SESSION['user'])!="")
{
	$user = $_SESSION['user'];
	//echo "session found ...". $user;
	header("Location: view/home.php");
	//require_once 'todolist.php';
}else{
	//echo "session not found redirecting to login";
	require_once './view/login.php';
}
?>