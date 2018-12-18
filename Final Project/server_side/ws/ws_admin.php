<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/admin.class.php');

// Web service to manage all tasks related to admin data.
// Variables needed
$admin = new admin();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch($option) {
			// Populate admin drop-down
			case 1:
				$result = $admin->adminPopulate();
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of admin management web service.

?>