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
        $status = 'chat_box_user_status_online';
    }
    else
    {
        $status = 'chat_box_user_status_offline';
    }
    $output .= 
    '
    <a class="btn btn-light rounded chat_box_user start_chat" href="#" data-touserid="' . $row["user_id"] . '"data-touserfirstname="' . $row["user_firstname"] . '"data-touserlastname="' . $row["user_lastname"] . '">
        <div class="chat_box_user_statusicon">
            <img src="/Images/user.jpg" class="rounded-circle chat_box_user_icon">
            <div class="chat_box_user_status ' . $status . '"></div>
        </div>
        <p class="d-inline align-middle ml-2"><b>' . $row["user_firstname"] . ' ' . $row["user_lastname"] . '</b></p>
    </a>
    '
    ;
}

echo $output;