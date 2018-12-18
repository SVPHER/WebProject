<?php

require_once('C:/wamp64/www/FinalProject/server_side/dal_util/UTILITIES.class.php');

// Data Access Layer: used as an intermediate layer between web services and the server.
// This layer is useful to avoid writing the essential data retrieval/query execution functions in every web service.
class DAL {
	
	// Private variables containing all of the necessary information to establish a new connection to database's server.
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "car_sales";
	
	// Function used to retrieve data from the database located on the server.
	public function getData($sqlQuery) {
		
		$connection = @new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		if ($connection->connect_error) {		    
			UTILITIES::writeToLog(mysqli_connect_error());
		    throw new Exception("");
		}
		else {
			$result =$connection->query($sqlQuery);
			if(!$result) {
				$error = "Data could not be retrieved using the following query: " . $sqlQuery;
				UTILITIES::writeToLog($error);
				throw new Exception("");
			}
			else {					
				$rows = array();
				if($result->num_rows > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						$rows[] = $row;
					}
					return $rows;
				}		
			}
		}
		
	}
	
	// Function used to execute queries (update, delete, etc...) in the database located on the server. 
	function executeQuery($sqlQuery) {
		
		$connection = @new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		if ($connection->connect_error) {		    
			UTILITIES::writeToLog(mysqli_connect_error());
		    throw new Exception("");
		}
		else {
			$result = $connection->query($sqlQuery);
			if(!$result){
				$error = "The following query could not be executed: " . $sqlQuery;
   			    UTILITIES::writeToLog($error);
				throw new Exception("");
			
			}
			else
				$connection->insert_id;
		}
		
	}
	
}

?>