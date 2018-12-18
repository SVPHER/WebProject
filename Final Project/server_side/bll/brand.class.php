<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Brands management class.
class brand {
	
	// Private variables needed to create a new object of type 'brand' and needed in functions that follow.
	private $_db;
	private $_bId;
	private $_bName;
	private $_bActive;
	
	
	// Public functions to construct and destruct objects of type 'brand'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'brand'.
	public function getBID() {
		return $this->_bId;
	}
	
	public function getBName() {
		return $this->_bName;
	}
	
	public function getBActive() {
		return $this->_bActive;
	}
	
	
	// Public functions used to ensure website's full functionality and connectivity between front-end and back-end.
	public function brandPopulate() {
		$sqlQuery = "SELECT b_id AS 'ID', b_name AS 'Name', ac_description AS 'Status' FROM brands, active WHERE b_active=ac_value;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function brandAdd($brand) {
		$sqlQuery = "INSERT INTO brands VALUES (NULL, '$brand', 1);";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function brandUpdate($id, $brand, $active) {
		$sqlQuery = "UPDATE brands SET b_name='$brand', b_active='$active' WHERE b_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function brandSetInactive($id) {
		$sqlQuery = "UPDATE brands SET b_active=0 WHERE b_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of brands management class.
}

?>