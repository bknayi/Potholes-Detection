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

// $username = $_POST["username"];

$username2 = $_GET["username"];

$sql = "SELECT `id` FROM `userdata` where number = '$username2'"; //$username'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$uid=$row["id"];

    	$sql = "SELECT * FROM `complain` WHERE uid = '$uid'";
    	//echo "$sql";
    	$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$str[] = array(
		    		'id' => $row["id"],
		    		'status' => $row["status"], 
		    		'timestamp' => $row["timestamp"],		    
		    		'addr' => $row["addr"],
		    	);
		    }
		    echo json_encode($str);
		}else{
			$str[] = array(
		    		'id' => "-1",
		    		'status' => "-1", 
		    		'timestamp' => "-1",
		    		'addr' => "-1",
		    	);
			echo json_encode($str);
		}

    }
}else {
	$str[] = array(
		    		'id' => "-1",
		    		'status' => "-1", 
		    		'timestamp' => "-1",
		    		'addr' => "-1",
		    	);
			echo json_encode($str);
    //echo "no";
}