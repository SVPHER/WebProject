<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/sale.class.php');

// Web service to manage all tasks related to sales data.
// Variables needed
$sale = new sale();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate sales table
			case 1:
				$result = $sale->salePopulate();
				
				break;
				
			// Add sale
			case 2:
				$result = $sale->saleAdd($_GET["carId"], $_GET["userId"]);
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of sales management web service.

?>