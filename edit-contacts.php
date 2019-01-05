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

if(isset($_POST['update_contact'])){

    $sql = "UPDATE tbl_contacts SET name='".$_POST['name']."', mobile1='".$_POST['mobile1']."', mobile2='".$_POST['mobile2']."',
    home='".$_POST['home']."', email='".$_POST['email']."' WHERE id = '".$_GET['id']."'";
    $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header("location:contacts.php");
}


$user = $_SESSION['uname'];
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_contacts WHERE id='$id' AND user='$user'";

$note_data = null;

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($rec = mysqli_fetch_assoc($result)) {
    $contact_data['name'] = $rec['name'];
    $contact_data['mob1'] = $rec['mobile1'];
    $contact_data['mob2'] = $rec['mobile2'];
    $contact_data['home'] = $rec['home'];
    $contact_data['email'] = $rec['email'];
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

        <form style="padding: 12px 15px;background-image:linear-gradient(#ADFF2F,#9ACD32,#ADFF2F);" method="post" action="edit-contacts.php?id=<?php echo $_GET['id']; ?>">
            <div class="row">
            <div class="col-md-12">
            <label for="name"><b>Name</b></label>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="name" name="name" type="number" value="<?php echo $contact_data['name'];  ?>" required ><br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <label for="mob1"><b>Mobile 1</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" id="mobile1" name="mobile1" type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="<?php echo $contact_data['mob1'];  ?>" required><br>
            </div>
            <div class="col-md-6">
            <label for="mob2"><b>Mobile 2</b></label>&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;"  id="mobile2" name="mobile2" type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="<?php echo $contact_data['mob2'];  ?>" required><br>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <label for="home"><b>Home</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;"  id="home" name="home" type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="<?php echo $contact_data['home'];  ?>" required><br>
            </div>
            <div class="col-md-6">
            <label for="email"><b>Email</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input style=" border: 2px solid green; border-radius: 4px;" type="text" id="email" name="email" value="<?php echo $contact_data['email'];  ?>" required><br>
             </div>
             </div>
            <br>
            <br>
            <button type="submit" name="update_contact" class="btn btn-success"> Update Details</button>
        </form>

    </div>


    <div class="col-md-5">
        
        
       
    <div class="row">

            <div class="col-sm-12">

                <?php
                require_once 'db_access.php';
                $db_acc=db_con::db_access();

                $user = $_SESSION['uname'];
                $sql = "SELECT id, name, mobile1,mobile2,home,email FROM tbl_contacts WHERE user='$user' ORDER BY id DESC";

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
                            echo("<td><a href='edit-contacts.php?id=".$rec['id']."' type='button' class='btn btn-success' > Edit </a></td>");
                            echo("<td><button type='button' class='btn btn-danger'> <a href=\"delcontact.php?note_id={$rec['id']}\" onclick=\"return confirm('Delete the Contact?');\">Delete</a> </button></td>");


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
</div>
<div class="col-md-1"></div>
</div>


</body>

</html>
