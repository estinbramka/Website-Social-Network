<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
    $passwordConfirm = $_POST["inputPasswordConfirm"];
    //echo $firstName . " " . $lastName . " " . $email . " " . $password . " " . $passwordConfirm . " ";
    require_once "dbhandler.inc.php";
    require_once "signFunctions.inc.php";
    
    if (emailExists($conn, $email) !== false)
    {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }
    if (passwordMatch($password, $passwordConfirm) !== false)
    {
        header("location: ../signup.php?error=nopasswordmatch");
        exit();
    }

    createUser($conn, $firstName, $lastName, $email, $password);

}
else
{
    header("location: ../signup.php");
    exit();
}