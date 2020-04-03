<?php 
	include("include/connection.php");
	 

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

	  
	if($username=="")
	{
		 $_SESSION['msg']="1"; 
		 header( "Location:index.php");
		 exit;
		 
	}
	else if($password=="")
	{
		$_SESSION['msg']="2"; 
		header( "Location:index.php");
		exit;		 
	}	 
	else
	{
		$qry="select * from users where email='".$username."' and password='".$password."'";
		 
		$result=mysqli_query($mysqli,$qry);		
		
		if(mysqli_num_rows($result) > 0)
		{ 
			$row=mysqli_fetch_assoc($result);

			$_SESSION['id']=$row['iduser'];
		    $_SESSION['admin_name']=$row['firstname']." ".$row['lastname'];
			  
			header( "Location:home.php");
			exit;
				
		}
		else
		{
			$_SESSION['msg']="4"; 
			header( "Location:index.php");
			exit;
			 
		}
	}
	
	
	


?> 