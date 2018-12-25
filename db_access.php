<?php
class db_con
{
	STATIC function db_access()
	{
		global  $servername,$username,$password,$db,$conn;
$servername = "localhost";
$username = "root";
$password = "";
$db = "ediary";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
}
function db_close()
	{
		global  $user_name,$password,$database,$server,$connection;	
		mysqli_close($conn);
	}
}
//mysqli_close($conn);
?>