<?php
include "conn_cart.php";
$email = $_POST["e1"]; 
$name = $_POST["n1"]; 
$pass = $_POST["pwd"];
$mon = $_POST["mn"];
$insqu = "INSERT INTO new_table (E_mail, User_Name, Password, Mobile_No) VALUES ('$email','$name', '$pass', '$mon')";

if(!mysqli_query($conn1, $insqu))
{
	var_dump($conn1->error);
}
else{
	header("refresh:0.05;Login&Register.php");
}
?>