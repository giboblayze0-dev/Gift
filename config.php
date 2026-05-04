<?php
$servername = "sqlXXX.infinityfree.com"; // your DB host from InfinityFree
$username   = "if0_XXXXXXXX";           // your DB username
$password   = "your_db_password";       // your DB password
$dbname     = "if0_XXXXXXXX_music";     // your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
