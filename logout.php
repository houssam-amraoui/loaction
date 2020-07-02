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
    setcookie("emaile", "", time() - 300 , "/");
    setcookie("passworde", "", time() - 300, "/");
    
  header('location:login.php');
?>

</body>
</html>