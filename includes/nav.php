<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <ul class="navbar-nav">
        <li class="<?php if($page=='home'){echo 'active';}?>">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="<?php if($page=='note'){echo 'active';}?>">
            <a class="nav-link" href="note.php">Daily Notes</a>
        </li>
        <li class="<?php if($page=='contacts'){echo 'active';}?>">
            <a class="nav-link" href="contacts.php">Contacts</a>
        </li>
        <li class="<?php if($page=='calculator'){echo 'active';}?>">
            <a class="nav-link" href="calculator.php">Calculator</a>
        </li>
        <li class="<?php if($page=='findlocation'){echo 'active';}?>">
            <a class="nav-link" href="findlocation.php">Location</a>
        </li>
        <li class="<?php if($page=='profile'){echo 'active';}?>">
            <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="<?php if($page=='logout'){echo 'active';}?>">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>