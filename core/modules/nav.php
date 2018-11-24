<div class="topnav" id="myTopnav">
    <a href="../home.php">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Social
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="../users_online.php">Users Online</a>
            <a href="#">Find Player</a>
            <a href="#">Send Message</a>
            <a href="#">Inbox</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Crimes
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Petty</a>
            <a href="#">GTA</a>
        </div>
    </div>
    <a style="float:right" href="../logout.php">Logout</a>
    <?php if ($u_staff >= 1): ?>
        <a style="float:right" href="../staff.php">Staff Panel</a>
    <?php endif; ?>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
