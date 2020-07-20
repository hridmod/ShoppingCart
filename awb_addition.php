<html>
	<head>
		<title>AWB</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
	</head>
	<body>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
	if(isset($_POST['login']))
	{
	  $conn = new mysqli("localhost", "root","", "akvi");
	  if ($conn->connect_error)
	    die("Connection failed: " . $conn->connect_error);
	  else
	  $sql="select * from orders where awb is null";
	  $r=mysqli_query($conn,$sql);
	  while($row = mysqli_fetch_assoc($r))
	  {
	    if ($_POST[$row["order_id"]] != "")
	    {
	      $sql_query = "update orders set awb='".$_POST[$row["order_id"]]."' where order_id=".$row["order_id"];
	      $request =mysqli_query($conn,$sql_query);
	    }
	  }
	  mysqli_close($conn);
	}
	?>
	<h2 class="h1s">Add AWB number to orders</h2>
	<form action="awb_addition.php" method="post">
	<?php
	$conn = new mysqli("localhost", "root","", "akvi");
	if ($conn->connect_error)
	  die("Connection failed: " . $conn->connect_error);
	else
	  $sql="select * from orders where awb is null";
	  $r=mysqli_query($conn,$sql);
	  $entered=false;
	  while($row = mysqli_fetch_assoc($r))
	  {
	    $entered = true;
	    echo "<label>Order ID ".$row["order_id"]." </label> <input type=text name=".$row["order_id"]."><br /><br />";
	  }
	  mysqli_close($conn);
	echo "<input type='hidden' name='login'>";
	echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck'].">";
	if($entered)
	{
	echo "<input type='submit' class='btn btn-primary btn-lg'value='Click to add awb numbers'>";
	}
	else
	{
	  echo "<h2 class='message'>All orders have an AWB number</h2>";
	}
	echo "</form>";
	?>
	<form class="" action="IndexOrders.php" method="post">
		<label for="">Click here to return to the index page</label>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
		<input type="submit" class="btn btn-primary btn-lg" value="GO BACK">
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
