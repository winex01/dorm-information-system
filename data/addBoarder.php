<?php 
require_once('../class/boarder.php');
$boarder = new Boarder();
if(isset($_POST['firstName'])){
	$fN = $_POST['firstName'];
	$mN = $_POST['middleName'];
	$lN = $_POST['lastName'];
	$telNum = $_POST['telNumber'];
	$phoneNum = $_POST['phoneNumber'];
	$homeAddress = $_POST['homeAddress'];
	echo $boarder->addBoarder($fN, $mN, $lN, $telNum, $phoneNum, $homeAddress);
}
$boarder->closeConnection();
