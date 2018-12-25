<?php
//ob_start();
session_start();

require_once('db_access.php');

$db_acc=db_con::db_access();

	$name=$_POST['name'];
	$mob1=$_POST['mob1'];
	$mob2=$_POST['mob2'];
	$home=$_POST['home'];
	$email=$_POST['email'];
	$username=$_SESSION['uname'];
	
	//echo "hhh";

$sql = "INSERT INTO tbl_contacts (name, mobile1, mobile2, home, email, user)
VALUES ('$name', '$mob1', '$mob2', '$home', '$email', '$username' )";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("location: ./contacts.php?");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("location: ./contacts.php?");
}

$conn->close();




	
	
	
	
	
//ob_flush();
?>