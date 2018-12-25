<?php
    //session_start();

     //$fullname = "";
     //$email = "";
     //$errors = array();

//connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'ediary');

require_once('db_access.php');

$db_acc=db_con::db_access();


//if the register button is clicked
if (isset($_POST['register'])) {
   $fullname = $_POST['fullname'];
   $email =$_POST['username'];
   $password_1 = $_POST['password_1'];
   $password_2 = $_POST['password_2'];

//if there are no errors, save user to database
   if (count($errors)==0) {
      //$password = md5($password_1);//encrypt password before storing in database(security)
      $sql = "INSERT INTO users (fullname, username, password)
                      VALUES('$fullname','$email', '$password_2')";
      mysqli_query($conn, $sql)or die(mysqli_error($conn));   
      header('location:home.php');//redirect to home page             
   }
}

?>