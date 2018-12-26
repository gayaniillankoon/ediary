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

<link rel="stylesheet" media="screen, print, handheld" type="text/css" href="calendar.css" />
<script type="text/javascript" src="calendar.js"></script>

<link href="includes/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body  background="includes/images/i.jpg" style ="background-position: center;
                                                 background-repeat: no-repeat;
                                                 background-size: cover;">

<div class="container-fluid">
    <?php $page='home'; include_once 'includes/nav.php'?>

<div class="container-fluid">
<div class="row">
	<div class="col-md-4" style="background-image:linear-gradient(#4682B4,#7B68EE,#4169E1,#1E90FF); text-align:center">
		<br><br><br>
		<script type="text/javascript">
            calendar();
        </script>
	</div>

	<div class="col-md-8">	
    <div class="container">
    <br>
    <h1><img src="includes/images/WW.png" style="width:150px;height:150px;">Dear eDiary</h1><br>
    
      <h1 style="text-align: center"><b><i>"ThE sAfEsT pLaCe FoR yOuR tHoUgHtS."</i></b></h1>
      <br><br>
      <h4><b> "Dear eDiary" is a place you can feel safe expressing yourself without judgment. You can write anything about any topic you decide, without worrying if someone else will see it. It is a place where your hopes and dreams can flow freely.</b></h4><br>
    
    </div>

    </div>
</div>

<div class="row">
	<div class="col-md-4" style="background-image:linear-gradient(#1E90FF,#4169E1,#7B68EE,#4682B4); height:400px;"></div>
	<div class="col-md-8" style="text-align:center;color:black;background:url(includes/images/wood.jpg);">
		 <h2>.. Notifications ..</h2>
         <h3>
            <?php
            $currentDateTime = date('Y-m-d');
            echo $currentDateTime;
            ?>
         </h3>
	</div>
</div> 
</div>

</div> 

 </div>
 </body>
</html>
