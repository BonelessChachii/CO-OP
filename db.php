<?php
$host = ""; //check .env file
$user = ""; //check .env file
$pass = ""; //check .env file
$dbname = ""; //check .env file

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

