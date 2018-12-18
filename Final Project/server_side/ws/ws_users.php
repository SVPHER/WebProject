<?php

require_once('C:/wamp64/www/FinalProject/server_side/bll/user.class.php');

// Web service to manage all tasks related to users data.
// Variables needed
$user = new user();
$result;

try {
	if(isset($_GET["option"])) {
		$option = $_GET["option"];
		
		switch ($option) {
			// Login
			case 1:
				$result = $user->userLogin($_GET["credential"], $_GET["password"]);
				
				if(is_object($result)) {
					session_start();
					$_SESSION["uid"]=$result->getUID();
					$_SESSION["ufname"]=$result->getUFname();
					$result = 1;
				}
				
				break;
				
			// Check username
			case 2:
				$result = $user->userCheck($_GET["username"]);
				
				break;
				
			// Check email
			case 3:
				$result = $user->userEmailCheck($_GET["email"]);
				
				break;
				
			// Populate users table
			case 4:
				$result = $user->userPopulate();
				
				break;
				
			// Add user
			case 5:
				$result = $user->userAdd($_GET["firstName"], $_GET["lastName"], $_GET["phone"], $_GET["email"], $_GET["username"], $_GET["password"]);
				
				break;
				
			// Update user
			case 6:
				$result = $user->userUpdate($_GET["id"], $_GET["firstName"], $_GET["lastName"], $_GET["phone"], $_GET["email"], $_GET["username"], $_GET["admin"], $_GET["active"]);
				
				break;
				
			// Set user as inactive
			case 7:
				$result = $user->userSetInactive($_GET["id"]);
				
				break;
				
			// Logout
			case 8:
				session_start();
				session_unset(); 

				// Destroy the session 
				session_destroy();
					
				$result =1;
				
				break;
		}
	}
	
	header("Content-type:application/json"); 						
	echo json_encode($result);
}
catch(Exception $ex) {
	echo -1;
}

// End of users management web service.

?>