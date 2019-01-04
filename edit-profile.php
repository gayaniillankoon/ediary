<?php
session_start(); // start the session


if (!isset($_SESSION ['uname'])){ // check the username
    header("location:index.php");

}

else{//go to the logout.php page when clicking
    $lgout= "<a href=index.php>Logout </a>";
}

require_once 'db_access.php';
$db_acc=db_con::db_access();

if(isset($_POST['update_profile'])){
    $sql = "UPDATE users SET name='".$_POST['name']."',
                             address='".$_POST['address']."',
                             birth='".$_POST['birth']."',
                             tel='".$_POST['tel']."', 
                             mobile='".$_POST['mobile']."',
                             businessaddress='".$_POST['businessaddress']."', 
                             telb='".$_POST['telb']."',
                             fax='".$_POST['fax']."',
                             emailb='".$_POST['emailb']."', 
                             religion='".$_POST['religion']."', 
                             ID='".$_POST['ID']."',
                             dl='".$_POST['dl']."', 
                             passport='".$_POST['passport']."',
                             blood='".$_POST['blood']."',
                             bank='".$_POST['bank']."',
                             acc='".$_POST['acc']."' WHERE id = '".$_GET['id']."'";
    $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header("location:profile.php");
}


$user = $_SESSION['uname'];
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id' AND user='$user'";

$note_data = null;

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($rec = mysqli_fetch_assoc($result)) {
    $profile_data['name'] = $rec['name'];
    $profile_data['address'] = $rec['address'];
    $profile_data['birth'] = $rec['birth'];
    $profile_data['tel'] = $rec['tel'];
    $profile_data['mobile'] = $rec['mobile'];
    $profile_data['businessaddress'] = $rec['businessaddress'];
    $profile_data['telb'] = $rec['telb'];
    $profile_data['fax'] = $rec['fax'];
    $profile_data['emailb'] = $rec['emailb'];
    $profile_data['religion'] = $rec['religion'];
    $profile_data['ID'] = $rec['ID'];
    $profile_data['dl'] = $rec['dl'];
    $profile_data['passport'] = $rec['passport'];
    $profile_data['blood'] = $rec['blood'];
    $profile_data['bank'] = $rec['bank'];
    $profile_data['acc'] = $rec['acc'];
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EDIARY</title>
    <link href="includes/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
</head>



<body background="includes/images/i.jpg" style ="background-position: center;
                                                 background-repeat: no-repeat;
                                                 background-size: cover;">

<div class="container-fluid">
    <?php $page='contacts'; include_once 'includes/nav.php'?>
</div>
<br/>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">

        <br> 

        <form style="padding: 12px 15px;background-image:linear-gradient(#ADFF2F,#9ACD32,#ADFF2F);" method="post" action="edit-profile.php?id=<?php echo $_GET['id']; ?>">
            <div class="row">
            <div class="col-md-12">
            <label for="name"><b>Name</b></label>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="name" name="name" value="<?php echo $profile_data['name'];  ?>" required ><br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label for="name"><b>Address</b></label>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="address" name="address" value="<?php echo $profile_data['address'];  ?>" required ><br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            <label for="birth"><b>Date of birth</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="birth" name="birth" value="<?php echo $profile_data['birth'];  ?>" required><br>
            </div>
            <div class="col-md-4">
            <label for="ID"><b>I.D. No</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="ID" name="ID" value="<?php echo $profile_data['mob1'];  ?>" required><br>
            </div>
            <div class="col-md-4">
            <label for="blood"><b>Blood Group</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="blood" name="blood" value="<?php echo $profile_data['blood'];  ?>" required><br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <label for="tel"><b>Telephone</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="tel" name="tel" value="<?php echo $profile_data['tel'];  ?>" required><br>
            </div>
            <div class="col-md-6">
            <label for="mobile"><b>Mobile</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="mobile" name="mobile" value="<?php echo $profile_data['mobile'];  ?>" required><br>
             </div>
             </div>
            <div class="row">
            <div class="col-md-12">
            <label for="businessaddress"><b>Business Address</b></label>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="businessaddress" name="businessaddress" value="<?php echo $profile_data['businessaddress'];  ?>" required ><br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
            <label for="telb"><b>Telephone</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="telb" name="telb" value="<?php echo $profile_data['telb'];  ?>" required><br>
            </div>
            <div class="col-md-4">
            <label for="fax"><b>Fax</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="fax" name="fax" value="<?php echo $profile_data['fax'];  ?>" required><br>
            </div>
            <div class="col-md-4">
            <label for="emailb"><b>Email</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="emailb" name="emailb" value="<?php echo $profile_data['emailb'];  ?>" required><br>
            </div>
            </div>
              <div class="row">
            <div class="col-md-4">
            <label for="religion"><b>Religion</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="religion" name="religion" value="<?php echo $profile_data['religion'];  ?>" required><br>
            </div>
            <div class="col-md-4">
            <label for="dl"><b>D.L.No</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="dl" name="dl" value="<?php echo $profile_data['dl'];  ?>" required><br>
            </div>
            <div class="col-md-4">
            <label for="passport"><b>Passport No</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="passport" name="passport" value="<?php echo $profile_data['passport'];  ?>" required><br>
            </div>
            </div>
             <div class="row">
            <div class="col-md-6">
            <label for="bank"><b>Bank</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="bank" name="bank" value="<?php echo $profile_data['bank'];  ?>" required><br>
            </div>
            <div class="col-md-6">
            <label for="acc"><b>Acc. No.</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="acc" name="acc" value="<?php echo $profile_data['acc'];  ?>" required><br>
             </div>
             </div>
            <br>
            <br>
            <button type="submit" name="update_contact" class="btn btn-success"> Update Details</button>
        </form>

    </div>


    <div class="col-md-5"></div>

</div>
</div>
<div class="col-md-1"></div>
</div>


</body>

</html>
