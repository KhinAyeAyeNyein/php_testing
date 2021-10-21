<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE newdb";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully <br>";
} else {
  echo "Error creating database: " . $conn->error;
}
$dbname = "newdb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// sql to create table
$sql = "CREATE TABLE Data1 (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  login_time INT(8),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table Data1 created successfully <br>";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  //Adding or inserting users
  $sql = "INSERT INTO Data1 (firstname, lastname, email, login_time)
  VALUES ('Khin', 'Aye', 'KA@gmail.com', 12),('person', 'one', 'one@gmail.com', 8),('Khin','two', 'two@gmail.com', 15);";

  if ($conn->query($sql) === TRUE) {
    echo "New records created successfully. <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
  }
  $sql = "INSERT INTO Data1 (firstname, lastname, email, login_time)
  VALUES ('person', 'three', 'three@gmail.com', 20),('person','four','four@gmail.com', 10),('person','five','five@gmail.com', 11);";
  if ($conn->query($sql) === TRUE) {
      echo "New records created successfully. <br>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
    }
  $sql = "UPDATE Data1 SET lastname='Nyein', email, login_time = 'kaan@gmail.com' WHERE id=3";

if ($conn->query($sql) === TRUE) {
  echo "Records updated successfully. <br>";
} else {
  echo "Error updating record: " . $conn->error;
}

// // sql to delete a record
// $sql = "DELETE FROM Data1 WHERE id>=5";

// if ($conn->query($sql) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }

$conn->close();
?>