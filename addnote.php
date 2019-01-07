<?php
//ob_start();
session_start();

require_once('db_access.php');

$db_acc=db_con::db_access();



	$date=$_POST['date'];
	$note=$_POST['note'];
	$username=$_SESSION['uname'];
	
	
	
	//echo "hhh";

$sql = "INSERT INTO notes (date, note, user)
VALUES ('$date', '$note', '$username' )";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("location: ./note.php?");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("location: ./note.php?");
}

$conn->close();

//ob_flush();
?>