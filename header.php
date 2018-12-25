<?php 
session_start(); // start the session
		
		
		if (!isset($_SESSION ['uname'])){ // check the username 
			header("location:login.php");
			
		}
		
		else{//go to the logout.php page when clicking
			$lgout= "<a href=logout.php>Logout </a>";
		}
							
							?>
<html>
<head>
<title>Eco Green International</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
  ul {list-style: none;padding: 0px;margin: 0px;}
  ul li {display: block;position: relative;float: left;border:1px solid #98bf21}
  li ul {display: none;}
  ul li a {display: block;background: #98bf21;padding: 5px 10px 5px 10px;text-decoration: none;
           white-space: nowrap;color: #fff;}
  ul li a:hover {background: #7A991A;}
  li:hover ul {display: block; position: absolute;}
  li:hover li {float: none;}
  li:hover a {background: #7A991A;}
  li:hover li a:hover {background: #98bf21;}
  #drop-nav li ul li {border-top: 0px;}



div#d1{
	position:absolute; 
	left:185px;
	font-weight: bold;
	text-transform: uppercase;
	font: Arial, sans-serif;
	display: block;
    width: 180px;
    color: #FFFFFF;
	background-color: #98bf21;
	text-align: center;
    padding: 4px;
	display:none;
	}

	
@media print{
.noprint {
	display:none;
	}
}

table, th{
height:40px;
}

table#t01 tr:nth-child(even) {
    background-color: #E6F8AD;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th	{
    background-color: 616409;
    color: white;
}
table#t01 td{
	
	padding:15px;
	}

</style>
<script src="./scripts/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
	$("#e1").hover(function() {
		$("#d1").toggle();
        
    });
    
});
</script>
</head>
<body bgcolor="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!--#DAE475-->
<!-- Save for Web Slices (Untitled-1.psd) -->
<table id="Table_01" width="1280" height="238" border="0" cellpadding="0" cellspacing="0">
	<tr height="194">
		<td  background="include/images/new_01.jpg" colspan="2">
			<div align="right-top" class="noprint">  <?php echo $lgout; echo $_SESSION['uname']; ?> </div>
            </td>
	</tr>
	<tr height="44"> </td>
		<td width="50"  bgcolor="616409" align="right">&nbsp;</td>
		<td   bgcolor="616409" align="right">
 <ul  id="menu"> 
  
   <li class="horizontal"> <a class="noprint" href=# > HR Management </a>
     <ul>
     		<li <?php if($_SESSION['user_type']=="Office Staff"){echo "style='display:none;'"; } ?>><a class="noprint" id="e1" href="./employee.php">Employees</a></li>
            <li <?php if(($_SESSION['user_type']=="Office Staff")||($_SESSION['user_type']=="Manager")){echo "style='display:none;'"; } ?>><a class="noprint" href="./loan.php">Add Loans</a></li>
            <li <?php if(($_SESSION['user_type']=="Office Staff")||($_SESSION['user_type']=="Manager")){echo "style='display:none;'"; } ?>><a class="noprint" href="./loanrepayment.php">Repay Loans</a></li>
     </ul>
     		</li>
   <li class="horizontal"> <a class="noprint" class="noprint" href=# > Payroll Management </a>
   	 <ul>
     		<li <?php if(($_SESSION['user_type']=="Account Staff")||($_SESSION['user_type']=="Manager")){echo "style='display:none;'"; } ?>><a class="noprint" href="./attendance1.php">Attendance</a></li>       
    		 <li <?php if($_SESSION['user_type']=="Office Staff"){echo "style='display:none;'"; } ?>><a href="./salde.php">Payroll</a></li>
    		 <li <?php if(($_SESSION['user_type']=="Account Staff")||($_SESSION['user_type']=="Office Staff")){echo "style='display:none;'"; } ?>><a class="noprint" href="./salary.php">Jobs</a></li>
     </ul>
     		 </li>
   <li class="horizontal"> <a class="noprint" href=# > Product Management </a>
    <ul>
    		<li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./stock.php">Stock</a></li>
  			<li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./product.php">Products</a></li>
   			<li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./materials.php">Materials</a></li>        
    </ul>
    		</li>
   <li class="horizontal"> <a class="noprint" href=# > Purchases </a>
     <ul>   
            <li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./purchases.php">Purchase Invoice</a></li>
            <li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./purReturns.php">Purchase Returns</a></li>
            <li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./supplieradd.php">Add Supplier</a></li> 
      </ul>
      		 </li>
    <li class="horizontal"> <a class="noprint" href=# > Sales </a>
      <ul>
       		<li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./sales.php">Sales Invoice</a></li>
  			<li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./salesReturns.php">Sales returns</a></li>
            <li <?php if($_SESSION['user_type']=="Account Staff"){echo "style='display:none;'"; } ?>><a class="noprint" href="./addcus.php">Add Customer</a></li>
  	  </ul>
      		 </li>  
    <li><a class="noprint" href="./reports.php">Reports</a></li>
    
  	<li class="horizontal"> <a class="noprint" href=# >Users</a>
      <ul>
    <li <?php if(($_SESSION['user_type']=="Account Staff")||($_SESSION['user_type']=="Office Staff")||($_SESSION['user_type']=="Manager")){echo "style='display:none;'"; } ?>><a class="noprint" href="./useradd.php">Add Users</a></li>
   <?php /*?><!-- <li <?php if(($_SESSION['user_type']=="Account Staff")||($_SESSION['user_type']=="Office Staff")||($_SESSION['user_type']=="Manager")){echo "style='display:none;'"; } ?>><a class="noprint" href="./chngpw.php">Change Password</a></li>--><?php */?>
      </ul>
    		 </li> 
   	<li <?php if(($_SESSION['user_type']=="Manager")||($_SESSION['user_type']=="Office Staff")||($_SESSION['user_type']=="Account Staff")){echo "style='display:none;'"; } ?>><a class="noprint" href="./backup.php">Back up</a></li>
  	<li <?php if(($_SESSION['user_type']=="Manager")||($_SESSION['user_type']=="Office Staff")||($_SESSION['user_type']=="Account Staff")){echo "style='display:none;'"; } ?>><a class="noprint" href="./restore.php">Restore</a></li>
</ul>
			
	</tr> 
	

</table>

<!-- End Save for Web Slices -->
</body>
</html>