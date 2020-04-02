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

if(isset($_POST['login'])){
    $sql = "SELECT * FROM tbl_user WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['password'] == $txtpassword){
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                header("location:inventory.php");
            } else {
                $passwordErr = '<div class="alert alert-warning">
                        <strong>Login!</strong> Failed.
                        </div>';
                $username = $row['username'];
            }
        }
    } else {
        $usernameErr = '<div class="alert alert-danger">
  <strong>Username</strong> Not Found.
</div>';
        $username = "";
    }
}

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>