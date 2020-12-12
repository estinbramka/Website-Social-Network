<?php

require_once "dbhandler.inc.php";
require_once "chatFunctions.inc.php";
session_start();

$stmt = $conn->prepare("SELECT * FROM users WHERE user_id != ?;");
$stmt->bind_param("s", $_SESSION['user_id']);
$stmt->execute();
$resultData = $stmt->get_result();
$stmt->free_result();
$stmt->close();

$output = "";
while ($row = $resultData->fetch_assoc())
{
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = Fetch_user_last_activity($row['user_id'], $conn);
    if($user_last_activity > $current_timestamp)
    {
        $status = '<span class="label label-success">Online</span> <br>';
    }
    else
    {
        $status = '<span class="label label-danger">Offline</span> <br>';
    }
    $output .= 
    '
    <a class="btn btn-light rounded" href="#" style="text-align: left; width:100%;">
        <img src="/Images/user.jpg" class="rounded-circle" style="width:30px">
        <p class="d-inline align-middle ml-2"><b>' . $row["user_firstname"] . ' ' . $row["user_lastname"] . '</b></p>
        '
        . $status . $user_last_activity . '<br>' . $current_timestamp .
        '
    </a>
    '
    ;
}

echo $output;