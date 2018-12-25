<?php
require_once('db_access.php');

$db_acc=db_con::db_access();

if (isset($_GET['conid']))
{
    $eid=$_GET['conid'];

    $sql="DELETE FROM tbl_contacts WHERE tbl_contacts.id=$eid";
    
    mysqli_query($conn,$sql)or die(mysqli_error($conn));
    header('Location:contacts.php');
    }
    
?>