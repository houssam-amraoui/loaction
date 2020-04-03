<?php
include("include/connection.php");
include("include/msg.php");
if(isset($_SESSION['admin_name']))
  {
    header("Location:home.php");
    exit;
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
            
			 <?php if(isset($_SESSION['msg'])){?>
                <div  role="alert"> <?php echo $client_msg[$_SESSION['msg']]; ?> </div>
                <?php unset($_SESSION['msg']);}?>
				
                        <form action="login_db.php" class="login" method="post">
                            <input type="text" placeholder="Username"  autofocus autocomplete="off" required name="username"/>
                            <input type="password" placeholder="Password" required name="password" />
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
