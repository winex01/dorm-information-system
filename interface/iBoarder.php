<?php
interface iBoarder{
	public function addBoarder($fN, $mN, $lN, $telNum = '', $phoneNum, $homeAddress);
	public function showAllBoarders();
	public function closeConnection();
}