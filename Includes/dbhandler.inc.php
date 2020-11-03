<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "SocialNetworkDB";

// Create connection
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
