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
    <style>
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a:link {
            color:#000;
            text-decoration: none;
        }
        a:visited {
            color:#000;
        }
        a:hover {
            color:#33F;
        }
        .button {
            background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
            border: 1px solid #076bd2;
            border-radius: 3px;
            color: #fff;
            display: none;
            font-size: 13px;
            font-weight: bold;
            line-height: 1.3;
            padding: 8px 25px;
            text-align: center;
            text-shadow: 1px 1px 1px #076bd2;
            letter-spacing: normal;
        }
        .center {
            padding: 10px;
            text-align: center;
        }
        .final {
            color: black;
            padding-right: 3px;
        }
        .interim {
            color: gray;
        }
        .info {
            font-size: 14px;
            text-align: center;
            color: #777;
            display: none;
        }
        .right {
            float: right;
        }
        .sidebyside {
            display: inline-block;
            width: 45%;
            min-height: 40px;
            text-align: left;
            vertical-align: top;
        }
        #headline {
            font-size: 40px;
            font-weight: 300;
        }
        #info {
            font-size: 20px;
            text-align: center;
            color: #777;
            visibility: hidden;
        }
        #results {
            font-size: 14px;
            font-weight: bold;
            border: 2px solid #4682b4;
            padding: 15px;
            text-align: left;
            min-height: 150px;
        }
        #start_button {
            border: 0;
            background-color:transparent;
            padding: 0;
        }
    </style>
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

        </div>
        <form method="post" action="edit-note.php?id=<?php echo $_GET['id']; ?>">
             <textarea name="note_content" cols="80" rows="7"><?php echo $note_data['content'];  ?></textarea>
            <input type="date" id="date" name="note_date" value="<?php echo $note_data['date'];  ?>" required>
            <br>
            <br>
            <button type="submit" name="update_note" class="btn btn-success"> Update Note</button>
        </form>



        <div class="center">
            <div class="sidebyside" style="text-align:right">
                <!--    <button id="copy_button" class="button" onclick="copyButton()">-->
                <!--      Copy and Paste</button>-->
                <div id="copy_info" class="info">
                    Press Control-C to copy text.<br>(Command-C on Mac.)
                </div>
            </div>
            <p>

        </div>
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
