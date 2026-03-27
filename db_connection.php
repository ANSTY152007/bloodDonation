<?php

function dbconnect()
{
    // Retrieve credentials from environment variables (for Render deployment)
    // or fallback to default values (for local XAMPP development)
    $hostname = getenv('DB_HOST') ?: "localhost";
    $username = getenv('DB_USER') ?: "root";
    $userpassword = getenv('DB_PASS') ?: "";
    $dbname = getenv('DB_NAME') ?: "blooddonor";
    $port = getenv('DB_PORT') ?: 3306; // Support for custom ports like on Railway

    $conn = mysqli_connect($hostname, $username, $userpassword, $dbname, $port);
    
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
