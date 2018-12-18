<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Sales management class.
class sale {
	
	// Private variables needed to create a new object of type 'sale' and needed in functions that follow.
	private $_db;
	private $_sId;
	private $_sCId;
	private $_sUId;
	private $_sDate;
	
	
	// Public functions to construct and destruct objects of type 'sale'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'sale'.
	public function getSID() {
		return $this->_sId;
	}
	
	public function getSCID() {
		return $this->_sCId;
	}
	
	public function getSUID() {
		return $this->_sUId;
	}
	
	public function getSDate() {
		return $this->_sDate;
	}
	
	
	// Public functions used to ensure website's full functionality and connectivity between front-end and back-end.
	public function salePopulate() {
		$sqlQuery = "SELECT s_id AS 'ID', concat(u_fname, ' ', u_lname) AS 'Buyer', c_name AS 'Name', c_description AS 'Description', c_year AS 'Year', c_color AS 'Color', c_price AS 'Price' FROM sales, users, cars WHERE s_u_id=u_id AND s_c_id=c_id;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function saleAdd($carId, $userId) {
		$sqlQuery = "INSERT INTO sales VALUES (NULL, '$carId', '$userId', CURRENT_DATE);";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
}

?>