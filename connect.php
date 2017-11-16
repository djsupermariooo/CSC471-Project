<?php
// DB variables
$host = "localhost";
$user = "root";
$pass = "";
$db = "csc471";

// Connect to database
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>