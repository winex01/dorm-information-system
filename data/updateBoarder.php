<?php 
require_once('../class/Boarder.php');
$boarder = new Boarder();
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$fN = $_POST['fN'];
	$mN = $_POST['mN'];
	$lN = $_POST['lN'];
	$tN = $_POST['tN'];
	$pN = $_POST['pN'];
	$hA = $_POST['hA'];
	$result = $boarder->updateBoarder($id, $fN, $mN, $lN, $tN, $pN, $hA);
	echo $result;

}
$boarder->closeConnection();