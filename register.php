<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>EDIARY</title>
<link href="includes/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body  background="includes/images/i.jpg" style ="background-position: center;
                                                 background-repeat: no-repeat;
                                                 background-size: cover;" >

<div class="container">
  <div class="row">
  <div class="col-sm-6">
  <br><br><br>
  <h1><img src="includes/images/WW.png" style="width:150px;height:150px;">Dear eDiary</h1><br><br>
  </div>
  </div>
  <div class="row">
  <div class="col-sm-4">
  </div>
  </div>

   <div class="row"> 
    <div class="col-sm-4" style="background-image:linear-gradient(#CD853F,#FFFF00)">
     
  
    <div class="header">
    	<h2>Register</h2>
    </div>

    <form method="post" action="reg_pros.php">
      
            
            <div class="form-group">
                <label for="exampleInputName" style="color: black">Full Name</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Full Name" name="fullname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: black">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"style="color: black">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_1">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1" style="color:black"> Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_2">
            </div>
            <div class="input-group">
    		<button type="submit" name="register" class="btn btn-primary">Register</button>
    	    </div>
            <p>
            <br>
    	    Already a member?&nbsp;<a href="index.php">Sign in</a>
           </p>
    </form>

	</p>
      
    </div>
    <div class="col-sm-6">
    <img src="includes/images/yy.png" style="width:950px;height:500px;">
    </div>
  </div>
</div>
<div class="row" >
      <div class="col-md-3">
      <div class="costomDiv" style="margin:40px;main-height:300px;text-align:center;font-size:large;color:black;">
      <br>
      <img src="includes/images/o.png" style="width:100px;height:100px;">
      <h3>Keep a Journal</h3>
      <h6><b>You want to keep your thoughts in a place where no one can find them? Dear eDiary offers you a safe place for your very personal topics.</b></h6>
      </div>
      </div>
      <div class="col-md-3">
      <div class="costomDiv" style="margin:40px;main-height:300px;text-align:center;font-size:large;color:black;">
      <br>
      <img src="includes/images/m.png" style="width:100px;height:100px;">
      <h3>Event calendar</h3>
      <h6><b>Mark your important and memorable events.</b></h6>
      </div>
      </div>
      <div class="col-md-3">
      <div class="costomDiv" style="margin:40px;main-height:300px;text-align:center;font-size:large;color:black;">
      <br>
      <img src="includes/images/s.png" style="width:100px;height:100px;">
      <h3>Secure & private</h3>
      <h6><b>This ensures that your secret diary remains safe from others.</b></h6>
      </div>
      </div>
      <div class="col-md-3">
      <div class="costomDiv" style="margin:40px;main-height:300px;text-align:center;font-size:large;color:black;">
      <br>
      <img src="includes/images/w.png" style="width:100px;height:100px;">
      <h3>Access via Internet</h3>
      <h6><b>To use Dear eDiary all you need is a computer or any other device with internet access.</b></h6>
      </div>
      </div>
      </div> 

    </div>

</body>
</html>
