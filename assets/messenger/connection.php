<?php
$servername = "localhost";
$username = "id3473025_vsocial2017";
$password = "password";
$dbname="id3473025_main";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
