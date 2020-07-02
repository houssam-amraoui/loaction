<?php 

include("include/connection.php");
include("include/msg.php");

	$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
	$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $cin = filter_input(INPUT_POST, 'cin', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
	$re_pass = filter_input(INPUT_POST, 're_pass', FILTER_SANITIZE_STRING);
    $number= filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);

	if($pass!=$re_pass){
         $_SESSION['msg']=$client_msg['19']; 
		 header( "Location:registre.php");
		 exit();
    }
    else if ($first_name!='' || $last_name!='' || $cin!='' || $email!='' || $pass!='' || $re_pass!='' || $number!=''){
		$qry="insert into users (firstname,lastname,cin,num,email ,password)  values ('".$first_name."','".$last_name."','".$cin."','".$number."','".$email."','".$pass."');";
        
		if(!mysqli_query($mysqli,$qry)){
            $_SESSION['msg'] = mysqli_error($mysqli);
            header( "Location:registre.php");
            
        }else{
            $_SESSION['msg']= $client_msg['21'];
            header( "Location:login.php");
            exit();
        }	
		
		}else{
        $_SESSION['msg']= $client_msg['22'];
        header( "Location:registre.php");
        }
		
	


      
		 
		
        

?> 