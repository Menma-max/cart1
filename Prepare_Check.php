<?php
session_start(); // starts the session 
include "conn_cart.php"; // includes connect_DB document incurrent document

$name = $_POST["n1"]; // name variable that has same value as n1 name field in form
$pass = $_POST["pwd"]; // pass variable that has same value as pwd name field in form
$query = $conn1->prepare("SELECT * FROM new_table WHERE User_Name = ?"); // query variable has sql query string as value with prepare statement
$query->bind_param("s", $name); // this function gives value for ? in sql for query variable
$query->execute(); //here query is executed
$result = $query->get_result(); //get the result of execution of query
$row = $result->fetch_array(MYSQLI_BOTH); // this function fetches a resuit row as an both associative array and a numeric array

//with out prepare statement
//$query = "SELECT * FROM new_table WHERE User_Name = '$name'"; // query variable has sql query string as value
//$check = mysqli_query($conn, $query); // this function performs query
//$row = mysqli_fetch_array($check); // this function fetches a resuit row as an associative array, a numeric array or both

if(is_null($row)) // it checks whether variable is null or not
{
	echo "Wrong Username...";
}
else
{
	if($row["Password"] != $pass) // it describes if data of Password in database is not equle to variable pass than following output will occur
	{
		echo "Wrong Password...";
	}
	else
	{
		$_SESSION["uname"] = $name; // this statement assigns value of name variable to session variable
		$_SESSION["uid"] = $row["User_ID"];
        header("refresh:0.05;Home_Page.php"); //it decribes that page will be refreshed in 0.05 seconds and it will redirect to Home Page
	}
}
?>