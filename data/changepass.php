<?php 
require_once('../class/Login.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
$user = new Login();
$password = '';
if(isset($_POST['password'])){
	$password = md5($_POST['password']);
	$result = $user->changePass($password);
	return $result;
}

$user->closeConnection();