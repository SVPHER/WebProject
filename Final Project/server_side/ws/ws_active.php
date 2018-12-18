<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/active.class.php');

// Web service to manage all tasks related to active data.
// Variables needed
$active = new active();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate active drop-down
			case 1:
				$result = $active->activePopulate();
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of active management web service.

?>