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

$num = $_POST["number"];

$sql = "SELECT u.number,p.type FROM `userdata` as u,`userprivilege` as p WHERE u.number = '$num' and p.username=u.number";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($num == $row["number"] && "user" == $row["type"]){
        	echo "done";
			break;
        }elseif ($num == $row["number"] && "admin" == $row["type"]) {
        	echo "admin";
        	break;
        }
    }
} else {
    echo "failed";
}
$conn->close();