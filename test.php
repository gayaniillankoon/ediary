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

<!DOCTYPE html>
<html lang="en">
	<head>
         <meta http-equiv="content-type" content="text/html; charset=UTF-8">
         <meta charset="utf-8">
         <title>EDIARY</title>
         <link href="includes/css/bootstrap.css" rel="stylesheet" type="text/css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
		 <script src="mapdata.js"></script>
		 <script src="worldmap.js"></script>
  </head>
	<body background="includes/images/i.jpg" style ="background-position: center;
                                                 background-repeat: no-repeat;
                                                 background-size: cover;">


        <div class="container-fluid">
             <?php $page='findlocation'; include_once 'includes/nav.php'?>
        </div> 

        <br>
        <div class="row">
        <div class="col-md-4"></div> 
        <div class="col-md-4">
           <h1 style="color:#4682b4;">World Map</h1>
        </div>
        <div class="col-md-4"></div>
        </div> 

        <br>

        <div class="row">
        <div class="col-md-1"></div> 
        <div class="col-md-8">
           <div id="map"></div>
        </div>
        <div class="col-md-3"></div>
        </div> 

	</body>
</html>
      
    
