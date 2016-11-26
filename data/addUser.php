<?php 
require_once('../class/Login.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
$user = new Login();
$username = '';
$password = '';
$result = '';
if(isset($_POST['username']) AND isset($_POST['password'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$result = $user->addUser($username, $password);
	echo $result;
}

$user->closeConnection();