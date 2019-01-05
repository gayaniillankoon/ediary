<?php
$user = $_GET['user'];

require_once '../db_access.php';
require_once 'functions.php';

$db_acc=db_con::db_access();

$sql1 = "SELECT * FROM users WHERE user_id = {$user}";
$result1= mysqli_query($conn,$sql1) or die(mysqli_error($conn));
$saved_user = null;
if($rec = mysqli_fetch_assoc($result1)){
    $saved_user = $rec;
}
$nor = mysqli_num_rows($result1);

if($nor>0)
{


    echo createAPIResponse($saved_user, 'true', '200');

}else{
    echo createAPIResponse('', 'false', '404');
}

?>