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

$uid = $_POST["uid"];
$email = $_POST["email"];
$pno = $_POST["pno"];

$sql = "UPDATE `userdata` SET `number`= '$pno',`email`='$email' WHERE `id`='$uid'";

if ($conn->query($sql) === TRUE) {
    echo "done";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();