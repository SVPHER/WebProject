<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/brand.class.php');

// Web service to manage all tasks related to brands data.
// Variables needed
$brand = new brand();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate brands table
			case 1:
				$result = $brand->brandPopulate();
				
				break;
				
			// Add brand
			case 2:
				$result = $brand->brandAdd($_GET["brand"]);
				
				break;
				
			// Update brand
			case 3:
				$result = $brand->brandUpdate($_GET["id"], $_GET["brand"], $_GET["active"]);
				
				break;
				
			// Set brand as inactive
			case 4:
				$result = $brand->brandSetInactive($_GET["id"]);
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of brands management web service.

?>