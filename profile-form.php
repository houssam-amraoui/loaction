<?php 
include("include/connection.php");
include("include/msg.php");



if(!isset($_SESSION['admin_name']))
  {
    header("Location:login.php");
    exit;
  }


$qry="select * from users where iduser='".$_SESSION['iduser']."' limit 1;";
$result=mysqli_query($mysqli,$qry);		
$row=mysqli_fetch_assoc($result);
      




if(isset($_POST["submit"])){

    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
	$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $cin = filter_input(INPUT_POST, 'cin', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
	$new_pass = filter_input(INPUT_POST, 'new_pass', FILTER_SANITIZE_STRING);
    $number= filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);

	 if ($first_name!='' || $last_name!='' || $cin!='' || $email!='' || $pass!='' || $number!=''){
         if($row['password']==$pass){
		$qry="update users set  firstname = '$first_name',lastname = '$last_name',cin = '$cin',num = '$number' " ;
        if($new_pass != null)
            $qry .= ",password = '$new_pass'";
            $qry .= " where iduser = ".$_SESSION['iduser'].";";
         echo $qry;
		if(!mysqli_query($mysqli,$qry)){
            $_SESSION['msg'] = mysqli_error($mysqli);
            header( "Location:profile-form.php");
            exit();
            
        }else{
            $_SESSION['msg']= $client_msg['21'];
            
        }
             }else{
             $_SESSION['msg']= $client_msg['2'];
             
         }
		
		}else{
        $_SESSION['msg']= $client_msg['22'];
        }
		
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

 <style> 
display-flex, .display-flex, .display-flex-center, .signup-content,  .social-login, .socials {
  display: flex;
  display: -webkit-flex; }

input:focus, select:focus, textarea:focus {
  outline: none;
  box-shadow: none !important;
       }



img {
  max-width: 100%;
  height: auto; }

figure {
  margin: 0; }

p {
  margin-bottom: 0px;
  font-size: 15px;
  color: #777; }

h2 {
  line-height: 1.66;
  margin: 0;
  padding: 0;
  font-weight: bold;
  color: #222;
  font-family: Poppins;
  font-size: 36px; }

.main {
  background: #f8f8f8;
  padding: 150px 0; }

.clear {
  clear: both; }

body {
  font-size: 13px;
  line-height: 1.8;
  color: #222;
  background: #f8f8f8;
  font-weight: 400;
  font-family: Poppins; }

.container {
  width: 900px;
  background: #fff;
  margin: 0 auto;
  box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
  border-radius: 20px;
       }

.display-flex {
  justify-content: space-between;
  align-items: center;
  }

.display-flex-center {
  justify-content: center;
  align-items: center;
 }

.position-center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
 } 
       
.signup {
  margin-bottom: 150px; }

.signup-content {
  padding: 75px 0; }

.signup-form, .signup-image {
  width: 50%;
  overflow: hidden; }

.signup-image {
  margin: 0 55px; }

.form-title {
  margin-bottom: 33px; }

.signup-image {
  margin-top: 45px; }

figure {
  margin-bottom: 50px;
  text-align: center; }

.form-submit {
  display: inline-block;
  background: #6dabe4;
  color: #fff;
  border-bottom: none;
  width: auto;
  padding: 15px 39px;
  border-radius: 5px;
  margin-top: 25px;
  cursor: pointer; }
  .form-submit:hover {
    background: #4292dc; }


.signup-image-link {
  font-size: 14px;
  color: #222;
  display: block;
  text-align: center; }

.term-service {
  font-size: 13px;
  color: #222; }

.signup-form {
  margin-left: 75px;
  margin-right: 75px;
  padding-left: 34px; }

.register-form {
  width: 100%; }

.form-group {
  position: relative;
  margin-bottom: 25px;
  overflow: hidden; }
  .form-group:last-child {
    margin-bottom: 0px; }

input {
  width: 100%;
  display: block;
  border: none;
  border-bottom: 1px solid #999;
  padding: 6px 30px;
  font-family: Poppins;
  box-sizing: border-box; }



.agree-term {
  display: inline-block;
  width: auto; }

label {
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  color: #222; }

.label-has-error {
  top: 22%; }

label.error {
  position: relative;
  background: url("../images/unchecked.gif") no-repeat;
  background-position-y: 3px;
  padding-left: 20px;
  display: block;
  margin-top: 20px; }

label.valid {
  display: block;
  position: absolute;
  right: 0;
  left: auto;
  margin-top: -6px;
  width: 20px;
  height: 20px;
  background: transparent; }
  label.valid:after {
    font-family: 'Material-Design-Iconic-Font';
    content: '\f269';
    width: 100%;
    height: 100%;
    position: absolute;
    /* right: 0; */
    font-size: 16px;
    color: green; }

.label-agree-term {
  position: relative;
  top: 0%;
  transform: translateY(0);
 }

.material-icons-name {
  font-size: 18px; }



.social-login {
  align-items: center;

  margin-top: 80px; }

.social-label {
  display: inline-block;
  margin-right: 15px; }

.socials li {
  padding: 5px; }
  .socials li:last-child {
    margin-right: 0px; }
  .socials li a {
    text-decoration: none; }
    .socials li a i {
      width: 30px;
      height: 30px;
      color: #fff;
      font-size: 14px;
      border-radius: 5px;
     
      transform: translateZ(0);
     
      transition-duration: 0.3s;
      transition-property: transform;
      transition-timing-function: ease-out; }


@media screen and (max-width: 1200px) {
  .container {
    width: calc( 100% - 30px);
    max-width: 100%; } }
@media screen and (min-width: 1024px) {
  .container {
    max-width: 1200px; } }
@media screen and (max-width: 768px) {
  .signup-content {
    flex-direction: column;
    justify-content: center;
    }

  .signup-form {
    margin-left: 0px;
    margin-right: 0px;
    padding-left: 0px;
    /* box-sizing: border-box; */
    padding: 0 30px; }


  .signup-form, .signup-image{
    width: auto; }

  .social-login {
    justify-content: center;
    }

  .form-button {
    text-align: center; }



  .form-title {
    text-align: center; } }
@media screen and (max-width: 400px) {
  .social-login {
    flex-direction: column;
   }

  .social-label {
    margin-right: 0px;
    margin-bottom: 10px; } }


    
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">profil</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="first_name" placeholder="Your First Name" value="<?php echo $row['firstname']; ?>" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account-o material-icons-name"></i></label>
                                <input type="text" name="last_name" placeholder="Your Last Name" value="<?php echo $row['lastname']; ?>" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-balance material-icons-name"></i></label>
                                <input type="text" name="cin" placeholder="Your CIN" value="<?php echo $row['cin']; ?>" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" name="number" required placeholder="Your number" value="<?php echo $row['num']; ?>" />
                            </div>
                            
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email"  disabled value="<?php echo $row['email']; ?>" />
                            </div>
                            
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="new_pass" id="re_pass" placeholder="your new password  (optional)" />
                            </div>
                            
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="your Password to conferme change" required />
                            </div>
                            
                            <?php if(isset($_SESSION['msg'])){?>
                                <div class="msg"> <?php echo $_SESSION['msg']; ?></div>
                             <?php unset($_SESSION['msg']);}?>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="submit"  class="form-submit" value="save"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

        
    </div>

   
</body>
</html>