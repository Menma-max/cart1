<?php
session_start();
include "conn_cart.php";

$prmid = null;

if(isset($_POST['rid'])){
    $str=strval($_POST['rid']);
    if(!isset($_SESSION['removritm'])){
		$_SESSION['removritm'];
}
$_SESSION['removritm']->$str=$_POST['rid'];
}

foreach($_SESSION['removritm'] as $rid=>$rmtp){
	$prmid = $rid;
}

mysqli_query($conn1, "DELETE FROM tcart WHERE Pro_ID = '$prmid'");

unset($_SESSION['removritm']);

?>