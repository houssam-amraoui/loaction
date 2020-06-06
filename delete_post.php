<?php 
include("include/connection.php");

$sql = 'SELECT * FROM maisan WHERE idmaisan ='.$_GET["id"].' ;';
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
if($row["iduser"]==$_SESSION["iduser"])
{
    $sql = 'delete FROM maisan WHERE idmaisan ='.$_GET["id"].' ;';
    $result = mysqli_query($mysqli, $sql);
    header("Location:home.php");
}

?>