<?php 
session_start(); // start the session
    
    
    if (!isset($_SESSION ['uname'])){ // check the username 
      header("location:index.php");
      
    }
    
    else{//go to the logout.php page when clicking
      $lgout= "<a href=index.php>Logout </a>";
    }

   
              //echo $_SESSION['uname']; 
              //echo $lgout; 

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
    <?php $page='profile'; include_once 'includes/nav.php'?>
<br/>

<div class="row">
<div class="col-sm-12">
  


<!-- The Modal -->
<div class="modal" id="nwdetails">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="addprofile.php" method="post">
      
      <div class="row">
      <div class="col-md-12">
        <div class="form-group">
            <label for="name" style="color: black">Name :</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
      </div>  
      </div>

      <div class="row">
      <div class="col-md-12">  
        <div class="form-group">
            <label for="address" style="color: black">Address :</label>
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        </div>
      </div>  
      </div>
      
      <div class="row">
      <div class="col-md-4"> 
       <div class="form-group">
            <label for="birth" style="color: black">Date of birth :</label>
            <input type="date" class="form-control" id="birth" placeholder="Date of birth" name="birth">
       </div>
      </div> 
      <div class="col-md-4">
       <div class="form-group">
            <label for="IDP" style="color: black">I.D. No :</label>
            <input type="text" class="form-control" id="ID" placeholder="I.D.No" name="IDP">
        </div> 
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="blood" style="color: black">Blood Group :</label>
            <input type="text" class="form-control" id="blood" placeholder="Blood Group" name="blood">
        </div> 
      </div> 
      </div>


      <div class="row">
      <div class="col-md-6"> 
       <div class="form-group">
            <label for="tel" style="color: black">Telephone:</label>
            <input type="text" class="form-control" id="tel" placeholder="Telephone" name="tel">
        </div>
      </div> 
      <div class="col-md-6">
        <div class="form-group">
            <label for="mobile" style="color: black">Mobile :</label>
            <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile">
        </div> 
      </div>
      </div>  

      <div class="row"> 
      <div class="col-md-12"> 
      <div class="form-group">
            <label for="businessaddress" style="color: black">Business Address :</label>
            <input type="text" class="form-control" id="businessaddress" placeholder="Business Address" name="businessaddress">
        </div>
      </div>
      </div> 

      <div class="row"> 
      <div class="col-md-4"> 
       <div class="form-group">
            <label for="telb" style="color: black">Telephone:</label>
            <input type="text" class="form-control" id="telb" placeholder="Telephone" name="telb">
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="fax" style="color: black">Fax :</label>
            <input type="text" class="form-control" id="fax" placeholder="Fax" name="fax">
        </div> 
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <label for="emailb" style="color: black">Email :</label>
            <input type="email" class="form-control" id="emailb" placeholder="Email" name="emailb">
        </div>
      </div>
      </div>

        
      <div class="row"> 
      <div class="col-md-4"> 
       <div class="form-group">
            <label for="religion" style="color: black">Religion :</label>
            <input type="text" class="form-control" id="religion" placeholder="Religion" name="religion">
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="dl" style="color: black">D.L. No:</label>
            <input type="text" class="form-control" id="dl" placeholder="D.L.No" name="dl">
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="passport" style="color: black">Passport no:</label>
            <input type="text" class="form-control" id="passport" placeholder="Passport no" name="passport">
        </div>
      </div>
      </div>


      <div class="row"> 
      <div class="col-md-12"> 
       <div class="form-group">
            <label  style="color: black"><b>Banking Information</b></label><br>
        </div>
       </div> 
      </div> 
      <div class="row"> 
      <div class="col-md-6"> 
       <div class="form-group"> 
            <label for="bank" style="color: black">Bank :</label>
            <input type="text" class="form-control" id="bank" placeholder="Bank" name="bank">
       </div>       
      </div>
      <div class="col-md-6">
       <div class="form-group">
            <label for="acc" style="color: black">Acc.No:</label>
            <input type="text" class="form-control" id="acc" placeholder="Acc. No" name="acc">
       </div>   
      </div>
      </div> 
        
      

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Add</button></form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<br/>
   

  <div class="row">
  <div class="col-sm-1">
    
    </div>
 <div class="col-sm-6">
       
       <?php
require_once 'db_access.php';
$db_acc=db_con::db_access();

$user = $_SESSION['uname'];
$sql = "SELECT id, name, address,birth, tel, mobile, businessaddress, telb, fax, emailb, religion, ID, dl, passport, blood, bank, acc  FROM users WHERE user='$user' ORDER BY id DESC";

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

$nor = mysqli_num_rows($result);
if($nor>0)
{
?>

<?php
	
	while($rec = mysqli_fetch_array($result, MYSQL_ASSOC))
	{
    $name=$rec['name'];
    $address=$rec['address'];
    $birth=$rec['birth'];
    $tel=$rec['tel'];
    $mobile=$rec['mobile'];
    $businessaddress=$rec['businessaddress'];
    $telb=$rec['telb'];
    $fax=$rec['fax'];
    $emailb=$rec['emailb'];
    $religion=$rec['religion'];
    $ID=$rec['ID'];
    $dl=$rec['dl'];
    $passport=$rec['passport'];
    $blood=$rec['blood'];
    $bank=$rec['bank'];
    $acc=$rec['acc'];
      
	}
?>

<h1 style="color:#4682B4;"><b>Profile</b></h1><br>

<table class="table table-borderless table-sm table-responsive"  align="center">



 <tr><th>Name :</th><td><?php echo $name;?></td></tr>
 <tr><th>Address : </th><td><?php echo $address;?></td></tr>
 <tr><th>Date of birth :</th><td><?php echo $birth;?></td></tr>
 <tr><th>Telephone no. :</th><td><?php echo $tel;?></td><th>Mobile no. :</th><td><?php echo $mobile;?></td></tr> 
 <tr><th>Religion :</th><td><?php echo $religion;?></td></tr>
 <tr><th>I.D. no. :</th><td><?php echo $ID;?></td></tr>
 <tr><th>D.L. no. :</th><td><?php echo $dl;?></td></tr>
 <tr><th>Passport no. :</th><td><?php echo $passport;?></td></tr>
 <tr><th>Blood group :</th><td><?php echo $blood;?></td></tr>
 
 <tr class="break"><td colspan="6"></td></tr>
 <tr class="break"><td colspan="6"></td></tr>
 <tr class="break"><td colspan="6"></td></tr>
 
 <tr><th>Business address :</th><td><?php echo $businessaddress;?></td></tr>
 <tr><th>Telephone no. :</th><td><?php echo $telb;?></td><th>Fax :</th><td><?php echo $fax;?></td><th>Email :</th><td><?php echo $emailb;?></td></tr>
 <tr class="break"><td colspan="6"></td></tr>
 <tr class="break"><td colspan="6"></td></tr>
 <tr class="break"><td colspan="6"></td></tr>
 
 <tr><th>Bank :</th><td><?php echo $bank;?></td></tr>
 <tr><th>Account no. :</th><td><?php echo $acc;?></td></tr>
</table>
<?php
}
?>



    </div>
    <div class="col-sm-5">
       <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nwdetails">
        Add Details
       </button>
       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nwdetails">
        Edit Details
       </button>
       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#nwdetails">
        Delete Details
       </button>   
  
    </div>
  </div>
</div>


</body>
</html>