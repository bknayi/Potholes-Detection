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

$name = $_POST["name"];
$num = $_POST["number"];
$email = $_POST["email"];


$sql = "INSERT INTO `userdata`(`name`, `number`, `email`) VALUES ('$name','$num','$email')";

if ($conn->query($sql) === TRUE) {
    echo "done";
} else {
    echo "Error";
}

$conn->close();