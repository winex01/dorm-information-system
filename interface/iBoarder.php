<?php
interface iBoarder{
	public function addBoarder($fN, $mN, $lN, $telNum = '', $phoneNum, $homeAddress);
	public function deleteBoarder($id);
	public function getBoarder($id);
	public function updateBoarder($id, $fN, $mN, $lN, $telNum = '', $phoneNum, $homeAddress);
	public function showAllBoarders();
	public function closeConnection();
}