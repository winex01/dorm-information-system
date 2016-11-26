<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['user_id'])){
	header('location: ../');
}

function getUserName(){
	$user = $_SESSION['user_name'];
	$user = ucfirst($user);
	echo $user;
}