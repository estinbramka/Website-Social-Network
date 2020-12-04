<?php

require_once "dbhandler.inc.php";
session_start();

$stmt = $conn->prepare("SELECT * FROM users WHERE user_id != ?;");
$stmt->bind_param("s", $_SESSION['user_id']);
$stmt->execute();
$resultData = $stmt->get_result();

$output = "";
while ($row = $resultData->fetch_assoc())
{
    $output .= 
    '
    <a class="btn btn-light rounded" href="#" style="text-align: left; width:100%;">
        <img src="/Images/user.jpg" class="rounded-circle" style="width:30px">
        <p class="d-inline align-middle ml-2"><b>' . $row["user_firstname"] . ' ' . $row["user_lastname"] . '</b></p>
    </a>
    '
    ;
}

$stmt->free_result();
$stmt->close();

echo $output;