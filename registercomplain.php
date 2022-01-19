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

//$num = $_POST["number"];

$username = $_POST["username"];
$imgname ="-1";
if (isset($_POST["imgname"])) {
    $imgname = $_POST["imgname"];   
}
$lat = $_POST["lat"];
$log = $_POST["log"];
$addr = "-1";
if (isset($_POST["addrr"])) {
    $addr = $_POST["addrr"];
}

$sql = "SELECT `id` FROM `userdata` where number = '$username'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo $row["id"];

        $uid=$row["id"];
		$sql = "INSERT INTO `complain`(`uid`, `photo`, `latitude`, `longitude`,`addr`) VALUES ('$uid','$imgname','$lat','$log','$addr')";

		if ($conn->query($sql) === TRUE) {
			echo "done";
		}else{
			echo "error";
		}
        break;
    }
} else {
    echo "failed $sql";
}
$conn->close();