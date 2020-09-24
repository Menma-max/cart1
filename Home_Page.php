<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid row page-header">
<div class="col-sm-8">

<?php
session_start();
echo "<h2> Hi " . $_SESSION['uname'] . ", this is home page.</h2>"; 
?>

</div>
<div class="col-sm-4 text-right" >
<a href="CartReady.php" class="btn btn-default btn-lg" role="button"> Cart </a>
<a href="session_destroy.php" class="btn btn-default btn-lg" role="button"> Log Out </a>
</div>
</div>
<div class="container text-center"> <br>
<div class="row">

<?php
include "conn_cart.php"; 
$query1 = mysqli_query($conn1, "SELECT * FROM prot WHERE pro_id=1"); 
$query2 = mysqli_query($conn1, "SELECT * FROM prot WHERE pro_id=2");
$query3 = mysqli_query($conn1, "SELECT * FROM prot WHERE pro_id=3");

    while($row = mysqli_fetch_assoc($query1))
    {
?>

<div class="col-sm-4">
<h4 id="pro_name"> <?php echo $row['pro_name']; ?> </h4> <br>
<h4 id="pro_price"> Price: <?php echo $row['price']; ?> </h4> <br> 
<input type="text" name="count" style="width: 3rem;" value="1"/> <br> <br>
<button type="button" class="btn btn-default btn-lg cartclick" value='<?php echo $row["pro_id"];?>' >Add To Cart</button>
</div>

<?php
    }
while($row = mysqli_fetch_assoc($query2))
    {
?>

<div class="col-sm-4">
<h4 id="pro_name"> <?php echo $row['pro_name']; ?> </h4> <br>
<h4 id="pro_price"> Price: <?php echo $row['price']; ?> </h4> <br> 
<input type="text" name="count" style="width: 3rem;" required="required" value="1"/> <br> <br>
<button type="button" class="btn btn-default btn-lg cartclick" value='<?php echo $row["pro_id"];?>' >Add To Cart</button>
</div>

<?php
    }
while($row = mysqli_fetch_assoc($query3)) 
    {
?>

<div class="col-sm-4">
<h4 id="pro_name"> <?php echo $row['pro_name']; ?> </h4> <br>
<h4 id="pro_price"> Price: <?php echo $row['price']; ?> </h4> <br> 
<input type="text" name="count" style="width: 3rem;" required="required" value="1"/> <br> <br>
<button type="button" class="btn btn-default btn-lg cartclick" value='<?php echo $row["pro_id"]; }?>' >Add To Cart</button>
</div>
</div>
</div>

<script type="text/javascript">
$('.cartclick').on('click', function(){
var buttonpress = $(this);
var productid = buttonpress.val(); 
var productcount = $(buttonpress).siblings("input").val();

console.log(productid);
console.log(productcount);

$.ajax({
        url: "insert_cart.php",
        type: "POST",
        data: {pid:productid, pcount:productcount},
        success: function(){
          alert("Added to cart");
        }
    });
});
</script>
</body>
</html>