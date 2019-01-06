<?php
session_start();
require_once('db_access.php');

$db_acc=db_con::db_access();


//if the register button is clicked
if (isset($_POST['register'])) {

    if($_POST['fullname'] == '' || $_POST['username'] == '' || $_POST['password_1'] == '' || $_POST['password_2'] == ''){
        $_SESSION['errors'][] = "Please fill the required fields";
        header("location:./register.php?input_er=1");
        die();

    }elseif($_POST['password_1'] !=  $_POST['password_2']){
        $_SESSION['errors'][] = "Passwords do not match!";
        $_SESSION['field_vals']['name'] = $_POST['fullname'];
        $_SESSION['field_vals']['username'] = $_POST['username'];
        header("location:./register.php?input_er=1");
        die();
    }


   $fullname = $_POST['fullname'];
   $email =$_POST['username'];
   $password_1 = $_POST['password_1'];
   $password_2 = $_POST['password_2'];

      $password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt password before storing in database(security)
      $sql = "INSERT INTO users (fullname, username, password, user)
                      VALUES('$fullname','$email', '$password','$email')";
      mysqli_query($conn, $sql)or die(mysqli_error($conn));   
      header('location:home.php');//redirect to home page

}

?>