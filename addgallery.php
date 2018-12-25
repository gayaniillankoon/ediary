<?php
//ob_start();
session_start();

require_once('db_access.php');

$db_acc=db_con::db_access();

	
	$username=$_SESSION['uname'];
	

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   header("location: ./gallery.php?");
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
   header("location: ./gallery.php?");
}

$conn->close();




	
	
	
	
	
//ob_flush();
?>