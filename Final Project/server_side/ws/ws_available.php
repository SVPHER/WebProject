<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/available.class.php');

// Web service to manage all tasks related to available data.
// Variables needed
$available = new available();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate available drop-down
			case 1:
				$result = $available->availablePopulate();
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of available management web service.

?>