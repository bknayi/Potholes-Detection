<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pothole";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `complain` WHERE status = 'pending'";
//echo "$sql";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$str[] = array(
    		'id' => $row["id"],
    		'photo' => $row["photo"], 
    		'latitude' => $row["latitude"],		    
    		'longitude' => $row["longitude"],	
    		'addr' => $row["addr"],
    		'timestamp' => $row["timestamp"],
    	);
    }
    echo json_encode($str);
}else{
	$str[] = array(
    		'id' => "-1",
    		'photo' => "-1", 
    		'latitude' => "-1",
    		'longitude' => "-1",
    		'addr' => "-1",
    		'timestamp' => "-1",
    	);
	echo json_encode($str);
}