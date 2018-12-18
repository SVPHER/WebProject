<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Admin management class.
class admin {
	
	// Private variables needed to create a new object of type 'admin' and needed in functions that follow.
	private $_db;
	private $_adValue;
	private $_adDescription;
	
	
	// Public functions to construct and destruct objects of type 'admin'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'admin'.
	public function getAdValue() {
		return $this->_adValue;
	}
	
	public function getAdDescirption() {
		return $this->_adDescription;
	}
	
	
	// Public function used to ensure website's full functionality and connectivity between front-end and back-end.
	public function adminPopulate() {
		$sqlQuery = "SELECT ad_value AS 'Value', ad_description AS 'Description' FROM admin;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of admin management class.
}

?>