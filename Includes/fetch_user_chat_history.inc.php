<?php

require_once "dbhandler.inc.php";
require_once "chatFunctions.inc.php";
session_start();

echo Fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $conn);