<?php
$servername = "localhost";
$username = "root";
$password = "root";


$dbname = "newdb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  //updating the data
  $sql = "UPDATE PersonData SET age='16' WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully. <br>";
} else {
  echo "Error updating record: " . $conn->error;
}
