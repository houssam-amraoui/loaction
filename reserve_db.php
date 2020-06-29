<?php
include("include/connection.php");
print_r($_POST);
include("include/msg.php");


	$date_debut = filter_input(INPUT_POST, 'date_debut', FILTER_SANITIZE_STRING);
	$date_fin = filter_input(INPUT_POST, 'date_fin', FILTER_SANITIZE_STRING);
    $idpost = filter_input(INPUT_POST, 'idpost', FILTER_SANITIZE_STRING);
	

if(date($date_debut) <= date($date_fin)){
		$qry="select iduser from maisan where idmaisan ='$idpost';";
		$row=mysqli_fetch_assoc(mysqli_query($mysqli,$qry));
        if($_SESSION['iduser'] == $row['iduser']){
        $sqladd="insert into reserver (idmaisan, iduser, date_debut , date_fin)  values (".$idpost.",".$_SESSION['iduser'].",'".$date_debut."','".$date_fin."');";
            
        if(!mysqli_query($mysqli,$sqladd)){
            $_SESSION['msg'] = mysqli_error($mysqli);
            
            }
            else
            {
            $_SESSION['msg']= $client_msg['21'];
            }
        }
    }else{
    $_SESSION['msg'] =" date_debut >= date_fin";
}

header( "Location:home.php");
	
	

?>
