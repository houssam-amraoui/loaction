<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "location";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
