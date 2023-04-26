<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>
	<center>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">
    	<a href="index.php">LOGOUT</a>
    	<a href="home.php">HOME</a>
    	<a href="profile.php">MY PROFILE</a>
    </span>

  </div>
</nav>
</center>
<?php 
include 'connect.php';
$total_inc = 0;
$total_exp = 0;
$email = $_SESSION['email'];

$fetch = mysqli_query($conn, "SELECT * FROM `income` WHERE `email` = '$email';");
$count = mysqli_num_rows($fetch);
if($count == 0){
	echo "No data in the table";
}
else{ ?>
	<div class="container text-center">
  <div class="row">
	<div class="col-12 border">
		<h2>INCOME</h2><br>
<table class="table table-bordered border-primary">
       	<tr>
       		<th>SL NO</th>
       		
       		
       		<th>DATE</th>
       		<th>REMARKS</th>
       		<th>AMOUNT</th>
       	</tr>

       	<?php 
       	$i = 1;
       	while($row = mysqli_fetch_assoc($fetch)){
		$total_inc = intval ($row['amount']) + $total_inc;


       	 ?>
 		<tr>
 			<td><?php echo $i; $i = $i+1; ?> </td>
 			
 			
 			<td><?php echo $row['date']; ?></td>
 			<td><?php echo $row['remarks']; ?></td>
 			<td><?php echo $row['amount']; ?></td>
 		</tr>
 	<?php }
 	?>
       	
<tfoot>
	<th colspan="3">
		Total income
	</th>
	<th colspan="2">
		<?php echo $total_inc;
		?>
	</th>
</tfoot>
       </table></div>
   <?php }



   $fetch = mysqli_query($conn, "SELECT * FROM `expenses` WHERE `email` = '$email';");
$count = mysqli_num_rows($fetch);
if($count == 0){
	echo "No data in the table";
}
else{ ?>
	
	<div class="col-12 border">
		<h2>EXPENSES</h2><br>
<table class="table table-bordered border-primary">

       	<tr>
       		<th>SL NO</th>
       		
       		
       		<th>DATE</th>
       		<th>REMARKS</th>
       		<th>AMOUNT</th>
       	</tr>

       	<?php 
       	$i = 1;
       	while($row = mysqli_fetch_assoc($fetch)){ 
       		$total_exp = intval ($row['amount']) + $total_exp;
       		?>
 		<tr>
 			<td><?php echo $i; $i = $i+1; ?> </td>
 			
 			
 			<td><?php echo $row['date']; ?></td>
 			<td><?php echo $row['remarks']; ?></td>
 			<td><?php echo $row['amount']; ?></td>
 		</tr>
 	<?php }
 	?>
       	<tfoot>
	<th colspan="3">
		Total expenses
	</th>
	<th colspan="2">
		<?php echo $total_exp;
		?>
	</th>
</tfoot>
       </table>
   <?php }
   ?>
</div></div></div>


<table class="table table-bordered border-primary">
 <tr>
 	<th>TOTAL INCOME:</th>
 	<TH>TOTAL EXPENSES:</TH>
 	<TH>TOTAL BALANCE:</TH>
 </tr>
 <?php
$total_bal = $total_inc - $total_exp;
 ?>
 <TR>
 	<TD><?php echo $total_inc; ?></TD>
 	<td><?php echo $total_exp; ?></td>
 	<td><?php echo $total_bal; ?></td>
 </TR>

</table>

<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>
</html>