<?php
$conn = mysqli_connect(
    "your_mysql_host",
    "your_mysql_username",
    "your_mysql_password",
    "your_database_name"
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
