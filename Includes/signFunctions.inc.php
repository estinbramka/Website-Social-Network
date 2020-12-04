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
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?;");
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
    $stmt = $conn->prepare("INSERT INTO users (user_email, user_firstname, user_lastname, user_password) VALUES (?, ?, ?, ?);");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $email, $firstName, $lastName, $hashed_password);
    $stmt->execute();
    $stmt->close();

    header("location: ../signup.php?error=none");
    exit();
}

function getLoginDetails($conn, $user_id)
{
    $stmt = $conn->prepare("INSERT INTO login_details (user_id) VALUES (?);");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $last_id = $stmt->insert_id;
    $stmt->close();

    return $last_id;
}

function loginUser($conn, $email, $password)
{
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $hashed_password = $emailExists["user_password"];
    $check_password = password_verify($password, $hashed_password);
    
    if ($check_password === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    else if ($check_password === true)
    {
        session_start();
        $_SESSION["user_id"] = $emailExists["user_id"];
        $_SESSION["user_firstname"] = $emailExists["user_firstname"];
        $_SESSION["user_lastname"] = $emailExists["user_lastname"];
        $_SESSION['login_details_id'] = getLoginDetails($conn, $emailExists["user_id"]);

        header("location: ../home.php");
        exit();
    }
}