<?php
session_start();
if(isset($_SESSION['name'])){
$name=$_SESSION['name'];
$_SESSION['name']=$name;
header("location:loginPage.php");
die();
}
else 
echo "wtf";
?>

