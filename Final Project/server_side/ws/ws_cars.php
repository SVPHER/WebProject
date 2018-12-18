<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/car.class.php');

// Web service to manage all tasks related to cars data.
// Variables needed
$car = new car();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate cars table
			case 1:
				$result = $car->carPopulate();
				
				break;
				
			// Add car
			case 2:
				$result = $car->carAdd($_GET["car"]);
				
				break;
				
			// Update car
			case 3:
				$result = $car->carUpdate($_GET["id"], $_GET["car"], $_GET["active"]);
				
				break;
				
			// Set car as inactive
			case 4:
				$result = $car->carSetSold($_GET["id"]);
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of cars management web service.

?>