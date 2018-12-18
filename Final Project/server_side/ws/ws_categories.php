<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/category.class.php');

// Web service to manage all tasks related to categories data.
// Variables needed
$category = new category();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate categories table
			case 1:
				$result = $category->categoryPopulate();
				
				break;
				
			// Add category
			case 2:
				$result = $category->categoryAdd($_GET["category"]);
				
				break;
				
			// Update category
			case 3:
				$result = $category->categoryUpdate($_GET["id"], $_GET["category"], $_GET["active"]);
				
				break;
				
			// Set category as inactive
			case 4:
				$result = $category->categorySetInactive($_GET["id"]);
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of categories management web service.

?>