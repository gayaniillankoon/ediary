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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>EDIARY</title>
        <link href="includes/css/bootstrap.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <style>
        form{
            width: 300px;
            background: #4682b4;
            padding: 30px 15px 15px 15px;
            -webkit-box-shadow: 0 2px 5px 2px rgba(0,0,0,.6);
            box-shadow: 0 2px 5px 2px rgba(0,0,0,.6);
        }
        input[type="text"]{
            font-family: sans-serif;
            width: 100%;
            font-size: 36px;
            padding: 5px 5px;
            box-sizing: border-box;
            text-align: right;
        }
        input[type="button"]{
            width: 58px;
            font-size: 55px;
            background: #aaa;
            color: #fff;
            font-size: 24px;
            margin-bottom: 5px;
        }
        hr{
            margin: 15px 0;
        }
        </style>
    </head>
<body background="includes/images/i.jpg" style ="background-position: center;
                                                 background-repeat: no-repeat;
                                                 background-size: cover;">
<div class="container-fluid">
    <?php $page='calculator'; include_once 'includes/nav.php'?></div>

<div class="row"><div class="col-md-12"></div></div>
<br><br><br>
<div class="row"><div class="col-md-12"></div></div>
<div class="row"><div class="col-md-12"></div></div>
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6" align="center">
    <form action="" name="calculator">
        <input type="text" name="screen" disabled>
        <hr>
        <input type="button" value="&radic;" onclick="calculator.screen.value = Math.sqrt(calculator.screen.value)">
        <input type="button" value="CE" onclick="calculator.screen.value = ''">
        <input type="button" value="C" onclick="calculator.screen.value = ''">
        <input type="button" value="&larr;" onclick="calculator.screen.value = calculator.screen.value.slice(0,-1)"><br>

        <input type="button" value="7" onclick="calculator.screen.value +='7'">
        <input type="button" value="8" onclick="calculator.screen.value +='8'">
        <input type="button" value="9" onclick="calculator.screen.value +='9'">
        <input type="button" value="+" onclick="calculator.screen.value +='+'"><br>

        <input type="button" value="4" onclick="calculator.screen.value +='4'">
        <input type="button" value="5" onclick="calculator.screen.value +='5'">
        <input type="button" value="6" onclick="calculator.screen.value +='6'">
        <input type="button" value="-" onclick="calculator.screen.value +='-'"><br>

        <input type="button" value="1" onclick="calculator.screen.value +='1'">
        <input type="button" value="2" onclick="calculator.screen.value +='2'">
        <input type="button" value="3" onclick="calculator.screen.value +='3'">
        <input type="button" value="*" onclick="calculator.screen.value +='*'"><br>

        <input type="button" value="0" onclick="calculator.screen.value +='0'">
        <input type="button" value="." onclick="calculator.screen.value +='.'">
        <input type="button" value="=" onclick="calculator.screen.value = eval(calculator.screen.value)">
        <input type="button" value="/" onclick="calculator.screen.value +='/'"><br>
        
        
    </form>
</div>
<div class="col-md-3">
</div>
</div>
      
</body>
</html>