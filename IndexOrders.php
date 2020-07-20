<html>
	<head>
		<title>INDEX-ORDERS</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
<div class="container">
<h1 id="header"> SELECT TO ACCESS FUNCTION </h1><br><br><br>
<table>
	<tr>
		<form action="LogOrder.php" method="post">
		<td><label>CLICK HERE TO LOG A NEW ORDER</label></td>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
		<td><input type="submit" class="btn btn-primary btn-lg" value="LOG ORDER"></td>
		</form>
	</tr>
	<tr>
		<form action="edit.php" method="post">
		<td><label>CLICK HERE TO EDIT AN EXISTING ORDER</label></td>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
		<td><input type="submit" class="btn btn-primary btn-lg" value="EDIT ORDER"></td>
		</form>
	</tr>
	<tr>
		<form action="awb_addition.php" method="post">
		<td><label>CLICK HERE TO ADD AWB NUMBERS TO ORDERS</label></td>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
		<td><input type="submit" class="btn btn-primary btn-lg" value="ADD AWB"></td>
		</form>
	</tr>
	<tr>
		<form action="view_edit_customer.php" method="post">
		<td><label>CLICK HERE TO EDIT CUSTOMER DETAILS</label></td>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
		<td><input type="submit" class="btn btn-primary btn-lg" value="EDIT CUSTOMER"></td>
		</form>
	</tr>
	<tr>
		<form action="View_Orders.php" method="post">
		<td><label>CLICK HERE TO VIEW ORDERS</label></td>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
		<td><input type="submit" class="btn btn-primary btn-lg" value="VIEW ORDERS"></td>
		</form>
	</tr>
	<tr>
		<form action='loaddata.php' method='post'>
			<td><label>CLICK HERE TO LOAD SHIPPING DATA</label></td>
			<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
			<td><input type="submit" class="btn btn-primary btn-lg" value="LOAD DATA"></td>
		</form>
	</tr>
	<tr>
		<form action='/task_2/saleschangepassword.php' method='post'>
			<td><label>CLICK HERE TO CHANGE PASSWORD</label></td>
			<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
			<td><input type='submit' class='btn btn-lg btn-primary' value='CHANGE PASSWORD' href='/admission/changepassword.php' ></td>
		</form>
	</tr>
</table>




</div>
</body>
</html>
<?php
}
else
  {
		?>
		<meta http-equiv="refresh" content="5;URL=saleslogin.php" />
		<p class="timer">Cannot access this page directly. You will be redirected in <span class="timer" id="countdowntimer">5 </span> Seconds</p>
		<script type="text/javascript">
	    var timeleft = 5;
	    var downloadTimer = setInterval(function(){
	    timeleft--;
	    document.getElementById("countdowntimer").textContent = timeleft;
	    if(timeleft <= 0)
	        clearInterval(downloadTimer);
	    },1000);
	</script>
	<?php
  }
?>
