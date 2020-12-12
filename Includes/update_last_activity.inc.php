<?php

require_once "dbhandler.inc.php";
session_start();

$stmt = $conn->prepare("UPDATE login_details SET last_activity = now() WHERE login_details_id = ?;");
$stmt->bind_param("s", $_SESSION['login_details_id']);
$stmt->execute();
$stmt->free_result();
$stmt->close();
