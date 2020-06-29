<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();
    setcookie("email", "", time() - 300 , "/");
    setcookie("password", "", time() - 300, "/");
    
  header('location:login.php');
?>

</body>
</html>