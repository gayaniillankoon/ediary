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

if(isset($_POST['update_note'])){
    $sql = "UPDATE notes SET note = '".mysqli_real_escape_string($conn,($_POST['note_content']))."', date = '".$_POST['note_date']."' WHERE id = '".$_GET['id']."'";
    $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header("location:note.php");
}


$user = $_SESSION['uname'];
$note_id = $_GET['id'];
$sql = "SELECT * FROM notes WHERE id='$note_id' AND user='$user'";

$note_data = null;

$result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($rec = mysqli_fetch_assoc($result)) {
    $note_data['content'] = $rec['note'];
    $note_data['date'] = $rec['date'];
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
    <?php $page='note'; include_once 'includes/nav.php'?>
</div>
<br/>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">

        <br>

        <div class="right">
           <img src="includes/images/edit.png" width="70px" height="60px"><br><br>
        </div>
        <form method="post" action="edit-note.php?id=<?php echo $_GET['id']; ?>">
             <textarea name="note_content" cols="60" rows="7"><?php echo $note_data['content'];  ?></textarea>
            <input type="date" id="date" name="note_date" value="<?php echo $note_data['date'];  ?>" required>
            <br>
            <br>
            <button type="submit" name="update_note" class="btn btn-success"> Update Note</button>
        </form>
    </div>

    <div class="col-md-5">
        <div class="row">
            <div class="col-sm-12">
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
                $sql = "SELECT id, date, note FROM notes WHERE user='$user' ORDER BY id DESC";

                $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

                $nor = mysqli_num_rows($result);
                if($nor>0)
                {
                    ?>



                    <table class="table table-striped"  align="center">
                        <tr>

                            <th>Date</th>
                            <th>Note</th>
                            <th></th>
                            <th></th>


                        </tr>

                        <?php

                        while($rec = mysqli_fetch_assoc($result))
                        {
                            echo('<tr>');
                            echo("<td>".$rec["date"]."</td>");
                            echo("<td>".$rec["note"]."</td>");
                            echo("<td><a href='edit-note.php?id=".$rec["id"]."' type='button' class='btn btn-success' > Edit </a></td>");
                            echo("<td><button type='button' class='btn btn-danger'> <a href=\"delnote.php?note_id={$rec['id']}\" onclick=\"return confirm('Delete the Contact?');\">Delete</a> </button></td>");


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
