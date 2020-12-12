<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "1234";
$dbName = "SocialNetworkDB";

// Create connection
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Europe/Athens');
