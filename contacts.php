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
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="home.php">My Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="note.php">My Daily Notes</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="contacts.php">My Contacts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="calculator.php">Calculator</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="findlocation.php">My Location</a>
    </li>
    <li class="nav-item">
    <a class="navbar-brand" href="profile.php">
    <img src="includes/images/avatar.png" alt="Logo" style="width:40px;">
    </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
<br/>

<div class="row">
<div class="col-md-2"></div>

<div class="col-md-8">
<div class="row">
<div class="col-sm-12">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nwcontact">
  Add New Contact
</button>


<!-- The Modal -->
<div class="modal" id="nwcontact">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="addcontacts.php" method="post">
       <div class="form-group">
            <label for="name" style="color: black">Name :</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label for="mob1" style="color: black">Mobile 1 :</label>
            <input type="text" class="form-control" id="mob1" placeholder="Mobile 1" name="mob1">
        </div>
        <div class="form-group">
            <label for="mob2" style="color: black">Mobile 2 :</label>
            <input type="text" class="form-control" id="mob2" placeholder="Mobile 2" name="mob2">
        </div>
        <div class="form-group">
            <label for="home" style="color: black">Home :</label>
            <input type="text" class="form-control" id="home" placeholder="Home" name="home">
        </div>
        <div class="form-group">
            <label for="email" style="color: black">Email :</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
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
</form>
<br/>


  <div class="row">

    <div class="col-sm-12">
       
       <?php
require_once 'db_access.php';
$db_acc=db_con::db_access();

$user = $_SESSION['uname'];
$sql = "SELECT id, name, mobile1, mobile2, home,email FROM tbl_contacts WHERE user='$user' ORDER BY id DESC";

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

$nor = mysqli_num_rows($result);
if($nor>0)
{
?>



<table class="table table-striped"  align="center">
<tr>
	
    <th>Name</th>
    <th>Mobile 1</th>
    <th>Mobile 2</th>
    <th>Home</th>
    <th>Email</th>
    <th></th>
    <th></th>
    
    
</tr>

<?php
	
	while($rec = mysqli_fetch_assoc($result))
	{
		echo('<tr>');
				echo("<td>".$rec["name"]."</td>");
				echo("<td>".$rec["mobile1"]."</td>");
				echo("<td>".$rec["mobile2"]."</td>");
				echo("<td>".$rec["home"]."</td>");
				echo("<td>".$rec["email"]."</td>");
      echo("<td><button type='button' class='btn btn-success'> Edit </button></td>");
      echo("<td><button type='button' class='btn btn-danger'> <a href=\"delcontact.php?conid={$rec['id']}\" onclick=\"return confirm('Delete the Contact?');\">Delete</a> </button></td>");
				
				
		echo("</tr>");
	}
?>
</table>
<?php
}
?>



    </div>
  </div>
</div>

</div>
<div class="col-md-2"></div>
</div>


</body>
</html>
