<?php
session_start();
require 'connection.php';

print_r($_SESSION);
echo "<br>";
print_r($_SERVER);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = clean($_POST["username"]);
    }

    if (empty($_POST["txtpassword"])) {
        $passwordErr = "password is required";
    } else {
        $txtpassword = clean($_POST["txtpassword"]);
    }



function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>