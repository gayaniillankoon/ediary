<?php 
session_start(); // start the session
    
    
    if (!isset($_SESSION ['uname'])){ // check the username 
      header("location:index.php");
      
    }
    
    else{//go to the logout.php page when clicking
      $lgout= "<a href=index.php>Logout </a>";
    }

   
             // echo $_SESSION['uname']; 
             // echo $lgout; 

?>

<!DOCTYPE html>
<html>

<head>
<link href="includes/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>

<script>

$(document).ready(function () {
    var user = '<?php echo $_SESSION['uname']?>';
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end + '&user=' + user,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>
body {
    text-align: center;
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}

#calendar {
    width: 700px;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
.fontsize {
    font-size: 16px;
}
</style>
</head>
<body background="includes/images/zx.jpg" style ="background-position: center;
                                                 background-repeat: no-repeat;
                                                 background-size: cover;">
<div class="container-fluid">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item fontsize">
      <a class="nav-link" href="home.php">My Home</a>
    </li>
    <li class="nav-item fontsize">
      <a class="nav-link" href="note.php">My Daily Notes</a>
    </li>
    <li class="nav-item fontsize">
      <a class="nav-link" href="contacts.php">My Contacts</a>
    </li>
    <li class="nav-item fontsize active">
      <a class="nav-link" href="indexcal.php">My Calendar</a>
    </li>
    <li class="nav-item fontsize">
      <a class="nav-link" href="gallery.php">My Gallery</a>
    </li>
    <li class="nav-item fontsize">
      <a class="nav-link" href="calculator.php">Calculator</a>
    </li>
    <li class="nav-item fontsize">
      <a class="nav-link" href="findlocation.php">My Location</a>
    </li>
    <li class="nav-item fontsize">
    <a class="navbar-brand" href="profile.php">
    <img src="includes/images/avatar.png" alt="Logo" style="width:40px;">
    </a>
    </li>
    <li class="nav-item fontsize">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
<br/>
</nav>
</div>
    

    <div class="response"></div>
    <div id='calendar'></div>
</body>


</html>