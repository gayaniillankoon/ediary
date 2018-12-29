<?php
//ob_start();
session_start();

require_once('db_access.php');

$db_acc=db_con::db_access();

	$name=$_POST['name'];
	$address=$_POST['address'];
	$birth=$_POST['birth'];
	$tel=$_POST['tel'];
	$mobile=$_POST['mobile'];
    $businessaddress=$_POST['businessaddress'];
    $telb=$_POST['telb'];
	$fax=$_POST['fax'];
	$emailb=$_POST['emailb'];
	$religion=$_POST['religion'];
    $ID=$_POST['ID'];
    $dl=$_POST['dl'];
	$passport=$_POST['passport'];
	$blood=$_POST['blood'];
	$bank=$_POST['bank'];
	$acc=$_POST['acc'];
	$username=$_SESSION['uname'];
	
	//echo "hhh";

//$sql = "INSERT INTO users(name, address,birth, tel, mobile, businessaddress, telb, fax, emailb, religion, ID, dl, passport, blood, bank, acc, user)VALUES ('$name', '$address', '$birth', '$tel', '$mobile', '$businessaddress', '$telb', '$fax', '$emailb', '$religion', '$ID', '$dl', '$passport', '$blood','$bank', '$acc', '$username' )";

$sql2 = "UPDATE users SET 
		name = '$name',
		address = '$address',
		birth = '$birth',
		tel = '$tel',
		mobile = '$mobile',
		businessaddress = '$businessaddress',
		telb = '$telb',
		fax = '$fax',
		emailb = '$emailb', 
		religion = '$religion',
		ID = '$ID',
		dl = '$dl',
		passport = '$passport',
		blood = '$blood',
		bank = '$bank',
		acc = '$acc',
		user = '$username'
		WHERE username = '$username'";

if ($conn->query($sql2) === TRUE) {
    //echo "New record created successfully";
    header("location: ./profile.php?");
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
    header("location: ./profile.php?");
}

$conn->close();


//ob_flush();
?>