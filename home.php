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
    
      <h2 style="text-align: center"><b><i>"ThE sAfEsT pLaCe FoR yOuR tHoUgHtS."</i></b></h2>
      <br>
      <h5><b> "Dear eDiary" is a place you can feel safe expressing yourself without judgment. You can write anything about any topic you decide, without worrying if someone else will see it. It is a place where your hopes and dreams can flow freely.</b></h5><br>
    
    </div>

    </div>
</div>

<div class="row">
	<div class="col-md-4" style="background-color:white; height:400px;">
   &nbsp;&nbsp;&nbsp;<h2><img src="includes/images/network.png" style="width:120px;height:120px;"><b><i>Connect</i></b></h2>
   &nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/"> <img src="includes/images/facebook.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://plus.google.com/discover"> <img src="includes/images/google-plus.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://www.linkedin.com/">  <img src="includes/images/linkedin.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://www.skype.com/en/"> <img src="includes/images/skype.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://www.tumblr.com/"> <img src="includes/images/tumblr.png" style="width:60px;height:60px;"></a> <br><br>
   &nbsp;&nbsp;&nbsp;<a href="https://twitter.com/login?lang=en"> <img src="includes/images/twitter.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://www.instagram.com/?hl=en">  <img src="includes/images/instagram.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://www.behance.net/"> <img src="includes/images/behance.png" style="width:60px;height:60px;"></a> &nbsp;
  <a href="https://github.com/"> <img src="includes/images/github.png" style="width:70px;height:70px;"></a> &nbsp;
  <a href="https://www.google.com/intl/si/gmail/about/#"> <img src="includes/images/gmail.png" style="width:60px;height:60px;"></a> 
  </div>
	<div class="col-md-8" style="text-align:center;color:black;background:url(includes/images/wood.jpg);">
		 <h2>.. Notifications ..</h2>
         <h3>
            <?php
            $currentDateTime = date('Y-m-d');
            echo $currentDateTime;
            ?>
         </h3>

        
         <form action="notes.php" method="GET">
           <input id="search" type="date">
           <input id="submit" type="submit" value="Search">
         </form>





	</div>
</div> 
</div>

</div> 

 </div>
 </body>
</html>
