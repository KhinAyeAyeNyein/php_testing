<?php
$servername = "localhost";
$username = "root";
$password = "root";

// // Create connection
// $conn = new mysqli($servername, $username, $password);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Create database
// $sql = "CREATE DATABASE db";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully <br>";
// } else {
//   echo "Error creating database: " . $conn->error;
// }
$dbname = "newdb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  //Adding or inserting 1 user
  $sql = "INSERT INTO Data1 (firstname, lastname, email, login_time)
  VALUES ('abc', 'one', 'abc1@gmail.com', 22),('abc', 'two', 'abc2@gmail.com', 6);";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

//   //updating the data
//   $sql = "UPDATE Data1 SET lastname='Nyein', email = 'kaan@gmail.com' WHERE id=3";

// if ($conn->query($sql) === TRUE) {
//   echo "Record updated successfully. <br>";
// } else {
//   echo "Error updating record: " . $conn->error;
// }


$conn->close();
?>