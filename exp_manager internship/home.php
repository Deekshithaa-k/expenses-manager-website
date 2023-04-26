<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/home.css">

</head>
<body>
  <a href="income_report.php">REPORT GENERATE</a>
	<?php
	include 'connect.php';
  

        if(isset($_POST['save_inc'])){
        $amount = trim($_POST['amount']);
        $date = trim($_POST['date']);
         $remarks = trim($_POST['remarks']);
     	$save = mysqli_query($conn, "INSERT INTO `income` (`email`,`amount`, `date`, `remarks`) VALUES ('$email','$amount', '$date', '$remarks');");

     if($save){
     	header("Location: income_report.php?msg=SAVED SUCCESFFULY");
     	     }
     	     else{
     	     	echo "Not Saved Successfully";
     	     }
     }
 
  
        if(isset($_POST['save_exp'])){
        
        $date = trim($_POST['date']);
         $remarks = trim($_POST['remarks']);
     $amount = trim($_POST['amount']);

         
     	$save = mysqli_query($conn, "INSERT INTO `expenses` (`email`,`amount`, `date`, `remarks`) VALUES ('$email','$amount', '$date', '$remarks');");

     if($save){
     	echo "Saved Successfully";
     	     }
     	     else{
     	     	echo "Not Saved Successfully";
     	     }
     }
 
	?>
	
	<div class="container text-center">
  <div class="row">
	<div class="col-lg-6 col-12 border">
 <h2>INCOME</h2>
 <form method="post">
  
		
        <label>DATE</label>
        <input type="date" name="date" class="form-control" placeholder="DATE">
          <br><br>
        <label>REMARKS</label>
        <input type="text" name="remarks" class="form-control" placeholder="REMARKS">
          <br><br>
          <label>AMOUNT</label>
        <input type="number" name="amount" class="form-control" placeholder="AMOUNT">
        <br><br>
        <input type="submit" name="save_inc" value="submit"><br><br><br>

	</form>
    </div>

<div class="col-lg-6 col-12 border">
 <H2>EXPENSES</H2>
 <form method="post">
  
		
        <label>DATE</label>
        <input type="date" name="date" class="form-control" placeholder="DATE">
          <br><br>
        <label>REMARKS</label>
        <input type="text" name="remarks" class="form-control" placeholder="REMARKS">
          <br><br>
          <label>AMOUNT</label>
        <input type="number" name="amount" class="form-control" placeholder="AMOUNT">
        <br><br>
        <input type="submit" name="save_exp" value="submit"><br><br><br>

	</form>
    </div>
</div>

</div>

<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>

</html>