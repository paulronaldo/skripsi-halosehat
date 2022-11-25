<?php
$servername = "localhost";
$username = "root";
$password = "";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=skripsi", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// //   echo "Connected successfully";
// } 
// catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

$conn = new mysqli($servername,$username,$password,"skripsi");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>