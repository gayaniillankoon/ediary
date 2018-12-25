<?php
require_once('db_access.php');

$db_acc=db_con::db_access();

if (isset($_GET['profile_id']))
{
    $noteid=$_GET['profile_id'];

    $sql="DELETE FROM users WHERE users.id=$usersid";
    
    mysqli_query($conn,$sql)or die(mysqli_error($conn));
    header('Location:profile.php');
    }
    
?>