<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
    //echo $email . " " . $password;
    require_once "dbhandler.inc.php";
    require_once "signFunctions.inc.php";

    loginUser($conn, $email, $password);
}
else
{
    header("location: ../index.php");
    exit();
}