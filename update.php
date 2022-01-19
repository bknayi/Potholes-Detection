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

$id = $_POST["id"];
$stat = $_POST["stat"];

$sql = "UPDATE `complain` SET `status`='$stat' WHERE `id`='$id'";

if ($conn->query($sql) === TRUE) {
    echo "done";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();