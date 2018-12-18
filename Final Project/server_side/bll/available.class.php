<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Available management class.
class available {
	
	// Private variables needed to create a new object of type 'available' and needed in functions that follow.
	private $_db;
	private $_avValue;
	private $_avDescription;
	
	
	// Public functions to construct and destruct objects of type 'available'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'available'.
	public function getAvValue() {
		return $this->_avValue;
	}
	
	public function getAvDescirption() {
		return $this->_avDescription;
	}
	
	
	// Public function used to ensure website's full functionality and connectivity between front-end and back-end.
	public function availablePopulate() {
		$sqlQuery = "SELECT av_value AS 'Value', av_description AS 'Description' FROM available;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of available management class.
}

?>