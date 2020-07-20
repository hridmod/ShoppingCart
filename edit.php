<html>
	<head>
		<title>SELECT ORDER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
	<h1 class="h1s" >EDIT ORDERS </h1>
	<form action=edit1.php method=POST>
	<label>From
	<input style="color:black;" type=date name=from>&emsp; &emsp; &emsp;&emsp;</label>
	<label>To <input style="color:black;" type=date name=to></label>
	<BR>
	<BR>
	<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
	<button type='submit' class='btn btn-primary btn-lg' name=s value=show>SHOW</button>
</form>
	<br><br><br><br><br><br>
		<form action='IndexOrders.php' method='POST'>
			<input type=hidden name=logincheck value=<?php echo $_POST['logincheck']; ?>>
			<label>Click here to go back to the index page </label>
			<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
		</form>
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
