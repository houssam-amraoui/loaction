<?php
include("include/connection.php");
include("include/msg.php");

    $idpost = $_GET['idpost'];
	$idreserver = $_GET['reserver'] ;
echo $idpost ;
echo $idreserver ;

		$qry="select iduser from maisan where idmaisan ='$idpost';";
		$row=mysqli_fetch_assoc(mysqli_query($mysqli,$qry));
        if($_SESSION['iduser'] == $row['iduser']){
        $sqladd="UPDATE reserver SET date_fin = now() WHERE idres =".$idreserver.";";
            
        if(!mysqli_query($mysqli,$sqladd)){
            $_SESSION['msg'] = mysqli_error($mysqli);
            
            }
            else
            {
            $_SESSION['msg']= $client_msg['21'];
            }
        }
    header( "Location:home.php");
	
	

?>
