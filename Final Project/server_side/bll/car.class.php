<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/DAL.class.php');

// Cars management class.
class car {
	
	// Private variables needed to create a new object of type 'car' and needed in functions that follow.
	private $_db;
	private $_cId;
	private $_cName;
	private $_cDescription;
	private $_cBId;
	private $_cCatId;
	private $_cYear;
	private $_cColor;
	private $_cSeats;
	private $_cPrice;
	private $_cAvailable;
	
	
	// Public functions to construct and destruct objects of type 'car'.
	public function __construct() {
		$this->_db = new DAL();
	}
	
	public function __destruct() {
		$this->_db = null;
	}
	
	
	// Public functions to return specific variables from the object of type 'car'.
	public function getCID() {
		return $this->_cId;
	}
	
	public function getCname() {
		return $this->_cName;
	}
	
	public function getCDescription() {
		return $this->_cDescription;
	}
	
	public function getCBId() {
		return $this->_cBId;
	}
	
	public function getCCatId() {
		return $this->_cCatId;
	}
	
	public function getCYear() {
		return $this->_cYear;
	}
	
	public function getCColor() {
		return $this->_cColor;
	}
	
	public function getCSeats() {
		return $this->_cSeats;
	}
	
	public function getCPrice() {
		return $this->_cPrice;
	}
	
	public function getCAvailable() {
		return $this->_cAvailable;
	}
	
	
	// Public functions used to ensure website's full functionality and connectivity between front-end and back-end.
	public function carPopulate() {
		$sqlQuery = "SELECT c_id AS 'ID', b_name AS 'Brand', cat_name AS 'Category', c_name AS 'Name', c_description AS 'Description', c_year AS 'Year', c_color AS 'Color', c_seats AS 'Number of Seats', c_price AS 'Price', av_description AS 'Status' FROM brands, categories, cars, available WHERE c_b_id=b_id AND c_cat_id=cat_id AND c_available=av_value;";
		
		try {		
			$data = $this->_db->getData($sqlQuery);

			return $data;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function carAdd($name, $description, $brand, $category, $year, $color, $seats, $price) {
		$sqlQuery = "INSERT INTO cars VALUES (NULL, '$name', '$description', '$brand', '$category', '$year', '$color', '$seats', '$price', 1);";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function carUpdate($id, $name, $description, $brand, $category, $year, $color, $seats, $price, $active) {
		$sqlQuery = "UPDATE cars SET c_name='$name', c_description='$description', c_b_id='$brand', c_cat_id='$category', c_year='$year', c_color='$color', c_seats='$seats', c_price='$price', c_available='$available' WHERE c_id='$id';";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	public function carSetSold($id) {
		$sqlQuery = "UPDATE cars SET c_available=0 WHERE c_id=$id;";
		
		try {		
			$data = $this->_db->executeQuery($sqlQuery);

			return 1;
		}
		catch(Exception $ex) {	
			throw $ex;
		}
	}
	
	// End of cars management class.
}

?>