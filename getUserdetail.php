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

$sql = "SELECT `id`, `name`, `number`, `email` FROM `userdata` where number = '$username2'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$str[] = array(
    		'id' => $row["id"],
    		'name' => $row["name"], 
    		'number' => $row["number"],		    
    		'email' => $row["email"],
    	);
    }
}else{
	$str[] = array(
		'id' => "-1",
		'name' => "-1", 
		'number' => "-1",		    
		'email' => "-1",
	);
}
echo json_encode($str);

