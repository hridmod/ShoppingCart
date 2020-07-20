<html>
	<head>
		<title>CUSTOMER INFO</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
	</head><title>VIEW ORDERS</title>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
<body style=background-color:lightgrey>
<h1 class="h1s">VIEW ORDERS BY :</h1>
<form action="View_Orders_2.php" method=POST>

<br>
<label><h3> Click on desired option: </h3> <hr/>
<select name=parameter>
<option value=1 selected>NAME OF CUSTOMER</option>
<option value=2>DATE RANGE</option>
<option value=3>AWB SHIPMENT NUMBER </option>
<input type=hidden name=s value=1></input>
<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
<input type=submit class='btn btn-primary btn-lg'>
</form>
<?php
echo"
<br><br><br><br><br><br><br><br><br>
	<form action='IndexOrders.php' method='POST'>
		<input type=hidden name=logincheck value=".$_POST['logincheck'].">
		<label>Click here to go back to the index page </label>
		<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
	</form>
";
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
