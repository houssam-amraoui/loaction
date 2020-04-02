<?php
include 'include/controller.php';
if(isset($_SESSION['user_name'])){
    header("location:inventory.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CRUD Login</title>
    </head>
    <body>
        <div class="container">
            
                        <form action="" class="login" method="post">
                            <input type="text" placeholder="Username"  autofocus autocomplete="off" required name="username"/>
                            <input type="password" placeholder="Password" required name="txtpassword" />
                            <input type="submit" name="login" value="Sign In" class="btn btn-success btn-sm" />
                            <div class="remember-forgot">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" />
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

    </body>
</html>
