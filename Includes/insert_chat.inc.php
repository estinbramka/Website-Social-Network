<?php

require_once "dbhandler.inc.php";
require_once "chatFunctions.inc.php";
session_start();

$data = array(
    ':to_user_id'   => $_POST['to_user_id'],
    ':from_user_id' => $_SESSION['user_id'],
    ':chat_message' => $_POST['chat_message'],
    ':status'       => '1'
);

$stmt = $conn->prepare("INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES (?, ?, ?, ?);");
$stmt->bind_param("ssss", $data[':to_user_id'], $data[':from_user_id'], $data[':chat_message'], $data[':status']);
if($stmt->execute())
{
    $stmt->free_result();
    $stmt->close();
    echo Fetch_user_chat_history($data[':from_user_id'], $data[':to_user_id'], $conn);
}