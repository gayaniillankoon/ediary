<?php
require_once('db_access.php');

$db_acc=db_con::db_access();

if (isset($_GET['note_id']))
{
    $noteid=$_GET['note_id'];

    $sql="DELETE FROM notes WHERE notes.id=$noteid";
    
    mysqli_query($conn,$sql)or die(mysqli_error($conn));
    header('Location:note.php');
    }
    
?>