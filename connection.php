<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "blog_cms";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// if ($conn) {
//     echo "Database Connected Successfully!";
// }

?>