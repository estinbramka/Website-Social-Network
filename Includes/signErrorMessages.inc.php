<?php

if (isset($_GET["error"]))
{
    if ($_GET["error"] == "nopasswordmatch")
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        Passwords don't Match!
        </div>";
    }
    else if ($_GET["error"] == "emailtaken")
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        Email is Already taken!
        </div>";
    }
    else if ($_GET["error"] == "none")
    {
        echo "<div class=\"alert alert-success\" role=\"alert\">
        You have Signed up!
        </div>";
    }
    else if ($_GET["error"] == "wronglogin")
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        Wrong Email or Password!
        </div>";
    }
}
