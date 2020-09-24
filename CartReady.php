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
echo "<h2> Hi " . $_SESSION['uname'] . ", this is cart.</h2>"; 
?>

</div>
<div class="col-sm-4 text-right" >
<a href="Home_Page.php" class="btn btn-default btn-lg" role="button"> Home </a>
<a href="session_destroy.php" class="btn btn-default btn-lg" role="button"> Log Out </a>
</div>
</div>

<div class="container table-responsive">
<table class="table">
<thead>
<tr>
<th> Product No. </th>
<th> Product Name </th>
<th> Product Qty. </th>
<th> Price Per Unit </th>
<th> Total Price </th>
<th> Remove Item </th>
</tr>
</thead>
<tbody>
<?php
include "conn_cart.php";
$result =  mysqli_query($conn1, "SELECT * FROM tcart");
while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>
    <td class='prodt_id'>". $row['Pro_ID'] ."</td>
    <td>". $row['Product_Name'] ."</td>
    <td>". $row['Product_count'] ."</td>
    <td>". $row['Price_per_product'] ."</td>
    <td>". $row['Total_price'] ."</td>
    <td class='retd'>  <button type='button' class='btn btn-default btn-sm rembtn'>
    <span class='glyphicon glyphicon-remove'></span> Remove 
  </button> </td>
    </tr>";
}
?>
</tbody>
</table>
</div> <br> <br>
<div class="container-fluid text-center">
<a href="Checkout.php" class="btn btn-default btn-lg" role="button"> Checkout </a>
</div>

<script type="text/javascript">
$('.rembtn').on('click', function(){
var buttonpress = $(this).closest("tr");
var removeitm = buttonpress.find("td:eq(0)").html();

console.log(removeitm);

 $.ajax({
        url: "Remove_cart.php",
        type: "POST",
        data: {rid:removeitm},
    });

    location.reload();
}); 
</script>
</body>
</html>