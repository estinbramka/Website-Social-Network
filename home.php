<?php
session_start();

echo "Hi " . $_SESSION["usersFirstname"] . " " . $_SESSION["usersLastname"];
?>
<br>
<br>
<br>
<a href="/Includes/logout.inc.php" class="btn btn-lg btn-secondary btn-block" style="margin-top:7px">Log Out</a>