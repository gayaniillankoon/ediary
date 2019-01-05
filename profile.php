<?php 
session_start(); // start the session
require_once('db_access.php');

$db_acc=db_con::db_access();
    
    if (!isset($_SESSION ['uname'])){ // check the username 
      header("location:index.php");
      
    }else{
      $lgout= "<a href=index.php>Logout </a>";
    }


    function uploadImages()
    {
        $ds = DIRECTORY_SEPARATOR;  //1
        $storeFolder = 'uploads';   //2
        if (!empty($_FILES)) {
            $tempFile = $_FILES['files']['tmp_name'];
            $file_name = $_FILES['files']['name'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            if (filesize($tempFile) > 5000000) {
                echo 'FAILED';
                die();
            }

            if ($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG') {
                $new_file_name = time() . '.' . $ext;
                $targetPath = 'includes' . $ds . $storeFolder . $ds;  //4
                $targetFile = $targetPath . $new_file_name;  //5

                if ($img = @imagecreatefromstring(file_get_contents($tempFile))) {
                    $upload_result = move_uploaded_file($tempFile, $targetFile); //6
                    echo $new_file_name;
                } else {
                    echo 'FAILED';
                }
            } else {
                echo 'FAILED';
            }
        }

    }

    if(isset($_POST['save_picture'])){



        $profile_image = $_POST['profile_image'];

        $username=$_SESSION['uname'];


        $sql2 = "UPDATE users SET 
		avatar = '$profile_image'
		WHERE username = '$username'";

        if ($conn->query($sql2) === TRUE) {
            //echo "New record created successfully";
            header("location: ./profile.php");
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
            header("location: ./profile.php");
        }

        $conn->close();

    }


    if(isset($_GET['f'])){
        if(function_exists($_GET['f'])) {
            $_GET['f']();
        }
    }

$username=$_SESSION['uname'];

$sql = "SELECT * FROM users WHERE username='$username'";

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

//$user_details = [];

if($rec = mysqli_fetch_assoc($result))
{
    $user_details = $rec;

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

    <link rel="stylesheet" href="includes/image-uploader/css/style.css">
    <link rel="stylesheet" href="includes/image-uploader/css/jquery.fileupload.css">
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
            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php if(isset($user_details)){echo $user_details['name'];}  ?>">
        </div>
      </div>
      </div>

      <div class="row">
      <div class="col-md-12">  
        <div class="form-group">
            <label for="address" style="color: black">Address :</label>
            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php if(isset($user_details)){echo $user_details['address'];}  ?>">
        </div>
      </div>  
      </div>
      
      <div class="row">
      <div class="col-md-4"> 
       <div class="form-group">
            <label for="birth" style="color: black">Date of birth :</label>
            <input type="date" class="form-control" id="birth" placeholder="Date of birth" name="birth" value="<?php if(isset($user_details)){echo $user_details['birth'];}  ?>">
       </div>
      </div> 
      <div class="col-md-4">
       <div class="form-group">
            <label for="IDP" style="color: black">I.D. No :</label>
            <input type="text" class="form-control" id="ID" placeholder="I.D.No" name="IDP" value="<?php if(isset($user_details)){echo $user_details['ID'];}  ?>">
        </div> 
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="blood" style="color: black">Blood Group :</label>
            <input type="text" class="form-control" id="blood" placeholder="Blood Group" name="blood" value="<?php if(isset($user_details)){echo $user_details['blood'];}  ?>">
        </div> 
      </div> 
      </div>


      <div class="row">
      <div class="col-md-6"> 
       <div class="form-group">
            <label for="tel" style="color: black">Telephone:</label>
            <input type="text" class="form-control" id="tel" placeholder="Telephone" name="tel" value="<?php if(isset($user_details)){echo $user_details['tel'];}  ?>">
        </div>
      </div> 
      <div class="col-md-6">
        <div class="form-group">
            <label for="mobile" style="color: black">Mobile :</label>
            <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?php if(isset($user_details)){echo $user_details['mobile'];}  ?>">
        </div> 
      </div>
      </div>  

      <div class="row"> 
      <div class="col-md-12"> 
      <div class="form-group">
            <label for="businessaddress" style="color: black">Business Address :</label>
            <input type="text" class="form-control" id="businessaddress" placeholder="Business Address" name="businessaddress" value="<?php if(isset($user_details)){echo $user_details['businessaddress'];}  ?>">
        </div>
      </div>
      </div> 

      <div class="row"> 
      <div class="col-md-4"> 
       <div class="form-group">
            <label for="telb" style="color: black">Telephone:</label>
            <input type="text" class="form-control" id="telb" placeholder="Telephone" name="telb" value="<?php if(isset($user_details)){echo $user_details['telb'];}  ?>">
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="fax" style="color: black">Fax :</label>
            <input type="text" class="form-control" id="fax" placeholder="Fax" name="fax" value="<?php if(isset($user_details)){echo $user_details['fax'];}  ?>">
        </div> 
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <label for="emailb" style="color: black">Email :</label>
            <input type="email" class="form-control" id="emailb" placeholder="Email" name="emailb" value="<?php if(isset($user_details)){echo $user_details['emailb'];}  ?>">
        </div>
      </div>
      </div>

        
      <div class="row"> 
      <div class="col-md-4"> 
       <div class="form-group">
            <label for="religion" style="color: black">Religion :</label>
            <input type="text" class="form-control" id="religion" placeholder="Religion" name="religion" value="<?php if(isset($user_details)){echo $user_details['religion'];}  ?>">
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="dl" style="color: black">D.L. No:</label>
            <input type="text" class="form-control" id="dl" placeholder="D.L.No" name="dl" value="<?php if(isset($user_details)){echo $user_details['dl'];}  ?>">
        </div>
      </div>
      <div class="col-md-4">
       <div class="form-group">
            <label for="passport" style="color: black">Passport no:</label>
            <input type="text" class="form-control" id="passport" placeholder="Passport no" name="passport" value="<?php if(isset($user_details)){echo $user_details['passport'];}  ?>">
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
            <input type="text" class="form-control" id="bank" placeholder="Bank" name="bank" value="<?php if(isset($user_details)){echo $user_details['bank'];}  ?>">
       </div>       
      </div>
      <div class="col-md-6">
       <div class="form-group">
            <label for="acc" style="color: black">Acc.No:</label>
            <input type="text" class="form-control" id="acc" placeholder="Acc. No" name="acc" value="<?php if(isset($user_details)){echo $user_details['acc'];}  ?>">
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
  <div class="col-sm-1"></div>
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
	
	while($rec = mysqli_fetch_assoc($result))
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

      <div class="row">

          <div class="col-md-11">
              <div class="form-group">
                  <label><b>Update Profile Picture</b></label>
                  <br>
                  <br>
                  <div id="img_prev_sec1" style="height: 150px; width:100%; background: url('includes/uploads/<?php if(isset($user_details['avatar'])){echo $user_details['avatar']; } ?>'); background-size: cover;"></div>
              <br>
                  <form action="profile.php" method="post">
                      <div class="form-group">
                          <!-- The fileinput-button span is used to style the file input field as button -->
                          <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Select file...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload_sec1" type="file" name="files" multiple>
                        </span>
                          <br>
                          <br>
                          <!-- The global progress bar -->
                          <div id="progress_sec1" class="progress">
                              <div class="progress-bar progress-bar-success"></div>
                          </div>
                          <!-- The container for the uploaded files -->
                          <div id="files_sec1" class="files"></div>
                          <input type="text" name="profile_image" id="section1_image" value="<?php if(isset($user_details['avatar'])){echo $user_details['avatar']; } ?>" hidden>
                          <br>
                      </div>
                      <button type="submit" name="save_picture" class="btn btn-success">Save</button>
                  </form>
              <script>
                  /*jslint unparam: true */
                  /*global window, $ */
                  $(function () {
                      'use strict';
                      // Change this to the location of your server-side upload handler:
                      var url = 'profile.php?f=uploadImages';
                      $('#fileupload_sec1').fileupload({
                          url: url,
                          dataType: 'html',
                          done: function (e, data) {

                              var fileNameNew = data['result'].substring(0, data['result'].indexOf("<"));

                              console.log(fileNameNew);

                              $('#section1_image').val(fileNameNew);

                              $('#img_prev_sec1').css("background-image", "url(includes/uploads/" +fileNameNew+  ")");


                              $.each(data.result.files, function (index, file) {
                                  $('<p/>').text(file.name).appendTo('#files');
                              });
                          },
                          progressall: function (e, data) {
                              var progress = parseInt(data.loaded / data.total * 100, 10);
                              $('#progress_sec1 .progress-bar').css(
                                  'width',
                                  progress + '%'
                              );
                          }
                      }).prop('disabled', !$.support.fileInput)
                          .parent().addClass($.support.fileInput ? undefined : 'disabled');
                  });
              </script>

           </div>

           <br><br><br>
           <div class="row">
           	<div class="col-md-12">
           	  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nwdetails">
                  Update Profile
              </button>
              <button type="button" class="btn btn-danger"><a href="delprofile.php?profile_id={$rec['id']}\" onclick=\"return confirm('Delete the details?');\">Delete</a> 
              </button>
           </div>
          </div>
          </div>
          <div class="col-md-1"></div>

      
      </div>

<script src="includes/image-uploader/js/vendor/jquery.ui.widget.js"></script>
<script src="includes/image-uploader/js/jquery.iframe-transport.js"></script>
<script src="includes/image-uploader/js/jquery.fileupload.js"></script>
</body>
</html>