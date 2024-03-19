<?php

$env = parse_ini_file('.env');
$host = $env["DB_HOST"];
$dbname = $env["DB_NAME"];
$username = $env["DB_USER"];
$password = $env["DB_PASSWORD"];

$conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Check the connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}