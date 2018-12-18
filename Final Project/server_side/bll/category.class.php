<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Categories management class.
class category {
	
	// Private variables needed to create a new object of type 'category' and needed in functions that follow.
	private $_db;
	private $_catId;
	private $_catName;
	private $_catActive;
	
	
	// Public functions to construct and destruct objects of type 'category'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'category'.
	public function getCatID() {
		return $this->_catId;
	}
	
	public function getCatName() {
		return $this->_catName;
	}
	
	public function getCatActive() {
		return $this->_catActive;
	}
	
	
	// Public functions used to ensure website's full functionality and connectivity between front-end and back-end.
	public function categoryPopulate() {
		$sqlQuery = "SELECT cat_id AS 'ID', cat_name AS 'Category', ac_description AS 'Status' FROM categories, active WHERE cat_active=ac_value;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function categoryAdd($category) {
		$sqlQuery = "INSERT INTO categories VALUES (NULL, '$category', 1);";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function categoryUpdate($id, $category, $active) {
		$sqlQuery = "UPDATE categories SET cat_name='$category', cat_active='$active' WHERE cat_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function categorySetInactive($id) {
		$sqlQuery = "UPDATE categories SET cat_name='$category', cat_active=0 WHERE cat_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of categories management class.
}

?>