<?php 
require_once('../class/Boarder.php');
$boarder = new Boarder();
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$result = $boarder->deleteBoarder($id);
	echo $result;
}

$boarder->closeConnection();
