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

$sql = "SELECT * FROM tbl_contacts WHERE user = '".$saved_user['user']."'";

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

$nor = mysqli_num_rows($result);

$contacts = array();

if($nor>0)
{
    while($rec = mysqli_fetch_assoc($result))
    {
        $contacts[] = $rec;
    }

    echo createAPIResponse($contacts, 'true', '200');

}else{
    echo createAPIResponse('', 'false', '404');
}

?>


