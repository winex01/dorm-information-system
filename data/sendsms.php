<?php
/**
 * This file will show a simple implementation on how to send SMS using Chikka API
 * @author Ronald Allan Mojica
 * 
 */
require_once('../class/ChikkaSMS.php');
$clientId = 'bde18bd74d3c5575f33e8c85657b78f90845e8da6c2637f8dc9f45f46cc74851';
$secretKey = '7af447a2b35902c3a8e4fbe7699dca779765667db898c8287d75b0c5483bf9f6';
$shortCode = '29290989337';
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);

$msgID = uniqid();
$phoneNum = '';
$msg = '';
if(isset($_POST['phoneNum']) && isset($_POST['smsMessage']))
{
	$phoneNum = $_POST['phoneNum'];
	$msg = $_POST['smsMessage'].' , from winnie';

	$response = $chikkaAPI->sendText($msgID, $phoneNum, $msg);
	echo json_encode($response);
}


// header("HTTP/1.1 " . $response->status . " " . $response->message);
// exit($response->description);

// echo '<pre>';
// print_r($response);
// echo '</pre>';