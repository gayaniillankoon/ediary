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

$sql = "SELECT id, date, note FROM notes WHERE user='".$saved_user['user']."' ORDER BY id DESC";

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

$nor = mysqli_num_rows($result);

$notes = array();

if($nor>0)
{
    while($rec = mysqli_fetch_assoc($result))
    {
        $notes[] = $rec;
    }

    echo createAPIResponse($notes, 'true', '200');

}else{
    echo createAPIResponse('', 'false', '404');
}

?>


