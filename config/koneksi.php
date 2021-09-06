<?php  
$servername = "localhost";
$username = "u1438856_beedecal";
$password = "riswanboss9999";
$dbname = "u1438856_beedecal";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "beedecal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>