<?php
session_start();
include "conn_cart.php";
$pid_now = null;
$ptp_now = null;
$exist = null;

if(isset($_POST['pid'])&&$_POST['pcount']){
	$str=strval($_POST['pid']);
    if(!isset($_SESSION['cart'])){
		$_SESSION['cart'];
}
    $_SESSION['cart']->$str=$_POST['pcount'];
}
foreach($_SESSION['cart'] as $pid=>$tp){
	$pid_now = $pid;
    $ptp_now = $tp;
}

$checkq = mysqli_query($conn1, "SELECT * FROM tcart");
while($row = mysqli_fetch_assoc($checkq)) 
    {
        if($row['Pro_ID']==$pid_now)
        {
            $exist = "already added";
        }
    }

if(empty($exist)){
    $result =  mysqli_query($conn1, "SELECT * FROM prot WHERE pro_id = '$pid_now'");
    $row2 = mysqli_fetch_assoc($result);

    $pdtid = $row2['pro_id'];
    $pdtn = $row2['pro_name'];
    $pdtp = $row2['price'];
    $pdtfp =  $ptp_now * $row2['price'];
    
    mysqli_query($conn1, "INSERT INTO tcart (Pro_ID, Product_Name, Product_count, Price_per_product, Total_price) VALUES ('$pdtid', '$pdtn', '$ptp_now', '$pdtp', '$pdtfp')");

    unset($_SESSION['cart']);
    unset($pid_now);
    unset($ptp_now);
    unset($exist);
 }

   else{
    $result2 = mysqli_query($conn1, "SELECT * FROM tcart WHERE Pro_ID = '$pid_now'");
    $row3 = mysqli_fetch_assoc($result2);
    
     $pdtc =  $row3['Product_count'] + $ptp_now;
     $pdtfp2 = $row3['Total_price'] + ($row3['Price_per_product'] * $ptp_now);

     mysqli_query($conn1, "UPDATE tcart SET Product_count = '$pdtc', Total_price = '$pdtfp2' WHERE Pro_ID = '$pid_now'");
 
       unset($_SESSION['cart']);
       unset($pid_now);
       unset($ptp_now);
       unset($exist);
}
?>