<?php 
require_once('../class/boarder.php');
$boarder = new Boarder();
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$result = $boarder->getBoarder($id);
	echo json_encode($result);
}