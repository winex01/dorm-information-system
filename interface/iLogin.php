<?php
interface iLogin{
	public function checkUser($username, $password);
	public function changePass($password);
	public function addUser($username, $password);
	public function closeConnection();
}