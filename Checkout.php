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
include "conn_cart.php";
echo "<h2> Hi " . $_SESSION['uname'] . ", this is Checkout.</a></h2>"; 
$finalamt = null;
$result =  mysqli_query($conn1, "SELECT * FROM tcart");
while($row = mysqli_fetch_assoc($result))
{
  $finalamt = $finalamt + $row['Total_price'];
}
?>

</div>
<div class="col-sm-4 text-right" >
<a href="Home_Page.php" class="btn btn-default btn-lg" role="button"> Home </a>
<a href="session_destroy.php" class="btn btn-default btn-lg" role="button"> Log Out </a>
</div>
</div>

<div class="container table-responsive">
<form id="checkf" action="#" type="POST">
<table class="table">
<thead>
<tr>
<th> Customer Name </th>
<th> Total Amount </th>
<th> Payment Style </th>
<th> Address </th>
</tr>
</thead>
<tbody>
<tr>
<td><input type="text" id="cun" name="cun" required readonly value="<?php echo $_SESSION['uname']; ?>"> </td>
<td><input type="text" id="cuta" name="cuta" required readonly value=" <?php echo $finalamt; ?>"></td>
<td> <input type="text" id="ccod" name="ccod" required readonly value="Cash on delivery"> </td>
<td> <textarea rows="3" form="checkf" name="cadd" required>  </textarea> </td>
</tr>
</tbody>
</table>
<div class="text-center">
<input type="submit" class="btn btn-default btn-lg" value="Complete Order">
</div>
</form>
</div>
</body>
</html>