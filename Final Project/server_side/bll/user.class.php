<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Users management class.
class user {
	
	// Private variables needed to create a new object of type 'user' and needed in functions that follow.
	private $_db;
	private $_uId;
	private $_uFname;
	private $_uLname;
	private $_uPhone;
	private $_uEmail;
	private $_uUsername;
	private $_uPassword;
	private $_uAdmin;
	private $_uActive;
	
	
	// Public functions to construct and destruct objects of type 'user'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'user'.
	public function getUID() {
		return $this->_uId;
	}
	
	public function getUFname() {
		return $this->_uFname;
	}
	
	public function getULname() {
		return $this->_uLname;
	}
	
	public function getUPhone() {
		return $this->_uPhone;
	}
	
	public function getUEmail() {
		return $this->_uEmail;
	}
	
	public function getUUsername() {
		return $this->_uUsername;
	}
	
	public function getUPassword() {
		return $this->_uPassword;
	}
	
	public function getUAdmin() {
		return $this->_uAdmin;
	}
	
	public function getUActive() {
		return $this->_uActive;
	}
	
	
	// Public functions used to ensure website's full functionality and connectivity between front-end and back-end.
	public function userLogin($credential, $password) {
		$sqlQuery = "SELECT * FROM users WHERE (u_email='$credential' AND u_password='$password' AND u_active=1) OR (u_username='$credential' AND u_password='$password' AND u_active=1);";
		
		try {		
			$data = $this->_db->getData($sqlQuery);
			
			if(count($data) == 1) {
				$user = new user();
				$user->_uId = $data[0]["u_id"];
				$user->_uFname = $data[0]["u_fname"];
				return $user;
			}
			else
				return 0;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function userCheck($username) {
		$sqlQuery = "SELECT * FROM users WHERE u_username='$username';";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			$result = count($data) == 1 ? 1 : 0;
			return $result;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function userEmailCheck($email) {
		$sqlQuery = "SELECT * FROM users WHERE u_email='$email';";
		
		try {		
			$data = $this->_db->getData($sqlQuery);
			
			$result = count($data) == 1 ? 1 : 0;
			return $result;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function userPopulate() {
		$sqlQuery = "SELECT u_id AS 'ID', CONCAT(u_fname, ' ', u_lname) AS 'Full Name', u_phone AS 'Phone', u_email AS 'Email', u_username AS 'Username', ad_description AS 'Position', ac_description AS 'Status' FROM users, admin, active WHERE u_admin=ad_value AND u_active=ac_value;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function userAdd($firstName, $lastName, $phone, $email, $username, $password) {
		$sqlQuery = "INSERT INTO users VALUES (NULL, '$firstName', '$lastName', '$phone', '$email', '$username', '$password', 0, 1);";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);
			
			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function userUpdate($id, $firstName, $lastName, $phone, $email, $username, $admin, $active) {
		$sqlQuery = "UPDATE users SET u_fname='$firstName', u_lname='$lastName', u_phone='$phone', u_email='$email', u_username='$username', u_admin='$admin', u_active='$active' WHERE u_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);
			
			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function userSetInactive($id) {
		$sqlQuery = "UPDATE users SET u_active=0 WHERE u_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);
			
			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of users management class.
}

?>