<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Active management class.
class active {
	
	// Private variables needed to create a new object of type 'active' and needed in functions that follow.
	private $_db;
	private $_acValue;
	private $_acDescription;
	
	
	// Public functions to construct and destruct objects of type 'active'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'active'.
	public function getAcValue() {
		return $this->_acValue;
	}
	
	public function getAcDescirption() {
		return $this->_acDescription;
	}
	
	
	// Public function used to ensure website's full functionality and connectivity between front-end and back-end.
	public function activePopulate() {
		$sqlQuery = "SELECT ac_value AS 'Value', ac_description AS 'Description' FROM active;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of active management class.
}

?>