<?php

function passwordMatch($password, $passwordConfirm)
{
    $result;
    if ($password !== $passwordConfirm)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE usersEmail = ?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultData = $stmt->get_result();

    if ($row = $resultData->fetch_assoc())
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    $stmt->free_result();
    $stmt->close();
}

function createUser($conn, $firstName, $lastName, $email, $password)
{
    $stmt = $conn->prepare("INSERT INTO users (usersEmail, usersFirstname, usersLastname, usersPassword) VALUES (?, ?, ?, ?);");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $email, $firstName, $lastName, $hashed_password);
    $stmt->execute();
    $stmt->close();

    header("location: ../signup.php?error=none");
    exit();
}

function loginUser($conn, $email, $password)
{
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $hashed_password = $emailExists["usersPassword"];
    $check_password = password_verify($password, $hashed_password);
    
    if ($check_password === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    else if ($check_password === true)
    {
        session_start();
        $_SESSION["usersId"] = $emailExists["usersId"];
        $_SESSION["usersFirstname"] = $emailExists["usersFirstname"];
        $_SESSION["usersLastname"] = $emailExists["usersLastname"];

        header("location: ../home.php");
        exit();
    }
}