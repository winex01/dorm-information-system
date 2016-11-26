<?php
require_once('../database/Database.php');
require_once('../interface/iLogin.php');
class Login extends Database implements iLogin {
	public function __construct()
	{
		parent:: __construct();
	}

	public function checkUser($username, $password)
	{
		try {
			$sql = "SELECT * FROM user
					WHERE user_name = ?
					AND user_pass = ?
			";
			$result = $this->getRow($sql, [$username, $password]);
			return $result;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function changePass($password)
	{
		try {
			if(session_status() == PHP_SESSION_NONE){session_start();}
			$id = $_SESSION['user_id'];
			$sql = "UPDATE user
					SET user_pass = ?
					WHERE user_id = ?
			";
			$this->updateRow($sql, [$password, $id]);
			echo 'Password Change Successfully'; 
			
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function addUser($username, $password)
	{
		try {
			$checKUserName = "SELECT * FROM user
							  WHERE user_name = ?
			";
			$result = $this->getRow($checKUserName, [$username]);
			if($result > 0){
				echo '1';
			}else{
				$sql = "INSERT INTO user(user_name, user_pass)
						VALUES(?,?)
				";
				$this->insertRow($sql, [$username, $password]);
				echo 'User Added Successfully';
			}
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function closeConnection()
	{
		$this->Disconnect();
	}

}

/* End of file Login.php */
/* Location: .//D/xampp/htdocs/kalanggaman/class/Login.php */