<?php
ob_start();
session_start();
require_once('db_access.php');

$db_acc=db_con::db_access();
	$username=$_POST['email'];
	$password=$_POST['password'];
	
	//$password=md5($password);
	
	
	$sql="SELECT password FROM users WHERE username='$username'";
	$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$array = mysqli_fetch_array($result);
	
	
	if (($username=="") && ($password==""))
	{
	    $_SESSION['errors'][] = "Please fill the required fields";
		header("location:./index.php?input_er=1");
	}
	else
	{
		if (mysqli_num_rows($result)==0)
		{
            $_SESSION['errors'][] = "Invalid Username or Password";
            $_SESSION['field_vals']['email'] = $_POST['email'];
			header("location:./index.php?input_er=2");
		}
		elseif (!password_verify ( $password ,  $array['password'] ))
		{
            $_SESSION['errors'][] = "Invalid Username or Password";
            $_SESSION['field_vals']['email'] = $_POST['email'];
			header("location:./index.php?input_er=3");
		}
		
		else
		{
			$_SESSION['uname']=$username;
	
			
				header("location: ./home.php?user=".$username."");
			
		}	
	}	
	
ob_flush();
?>