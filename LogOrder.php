<HTML>
	<head><title>Log a New Order</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="main.css">
	</head>
<?php
	if (isset($_POST['logincheck']) and $_POST['logincheck']==1){
?>

	<body class="full">
	<h1 class="h1s">LOG A NEW ORDER. <br/>YOU MAY LOG AN ORDER FOR A NEW CUSTOMER OR FOR AN EXISTING CUSTOMER. <br/><hr/></h1>
	<table cellspacing=5 align="center" width=45%>
	<tr>
		<td><b>Order for a new customer</b></td>
		<!-- <td><button type="button" class="btn btn-light btn-lg"><a href="CustomerInfo1.php" style=color:red>Click Here!</a></button></td> -->
		<form action="CustomerInfo1.php" method="post">
			<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck'] ?>>
			<td><input type='submit' value='NEW CUSTOMER' class='btn btn-lg btn-primary'></td>
		</form>
	</tr>
	<tr>
		<td><b>Order for an existing customer</b></td>
		<!-- <td><button type="button" class="btn btn-light btn-lg"><a href="CustomerInfo2.php" style=color:red>Click Here!</a></button></td> -->
		<form action="CustomerInfo2.php" method="post">
			<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck'] ?>>
			<td><input type='submit' value='EXISTING CUSTOMER' class='btn btn-lg btn-primary'></td>
		</form>
	</tr>
	<tr>
		<td><b>Click here to go back to the index page</b></td>
		<form action='IndexOrders.php' method='POST'>
			<input type=hidden name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
			<td><input type='submit' class='btn btn-primary btn-lg' value='GO BACK'></td>
		</form>
	</tr>
	</table>
	</body>
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
