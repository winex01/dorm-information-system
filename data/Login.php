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
	$password = $_POST['password'];
	$password = md5($password);
	$result = $user->checkUser($username, $password);
	if($result > 0){
		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['user_name'] = $result['user_name'];
		$result = 'admin/';
	}else{
		$result = 0;
	}	
	// echo json_encode($result);
	echo $result;
}

$user->closeConnection();