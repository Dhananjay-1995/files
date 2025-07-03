<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id5523467_userlogin";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "dhananjay1khu";


$api_key = $disid = $side = $rate = $kg = $rs = $electtot = $fmtot = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
		$disid= test_input($_POST["disid"]);
        $side = test_input($_POST["side"]);
        $rate = test_input($_POST["rate"]);
        $kg = test_input($_POST["kg"]);
        $rs = test_input($_POST["rs"]);
        $electtot = test_input($_POST["electtot"]);
		$fmtot = test_input($_POST["fmtot"]);
		$error = test_input($_POST["error"]);
        
		// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check if table already exists
		$stmt =$conn->query("SELECT `electtot` FROM `$disid` WHERE `electtot` = '$electtot'");
		if($stmt->num_rows > 0){		
		echo "record already found in DB.";
		}
		
		else{
        // Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			
			$sql = "INSERT INTO `$disid`(`side`, `rate`, `kg`, `rs`, `electtot`, `fmtot`, `error`) 
					SELECT '$side', '$rate', '$kg', '$rs', '$electtot', '$fmtot', '$error'
					WHERE NOT EXISTS (SELECT `electtot` FROM `$disid` WHERE `electtot` = '$electtot' );";
			
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
