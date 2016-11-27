<?php
interface iBoarder{
	public function addBoarder($fN, $mN, $lN, $telNum = '', $phoneNum, $homeAddress);
	public function deleteBoarder($id);
	public function showAllBoarders();
	public function closeConnection();
}