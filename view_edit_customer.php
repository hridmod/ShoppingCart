<html>
	<head>
		<title>EDIT CUSTOMER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
 ?>
<H1 class="h1s">CUSTOMER INFORMATION:EXISTING CUSTOMER</H1>
<p style="font-family:'Raleway';font-size:xx-large;" >This page lets you view customer details and/or edit information of the same.</p>
<body>
<br><hr/>
<FORM ACTION="View_Edit_Customer.php" METHOD=POST>
<label style="font-family:'Krona One'">Choose Customer: </label>
	<select name='id'>
		<?php
			if($_SERVER['REQUEST_METHOD']=="POST")
			{
				$id=$_POST['id'];
			}
			$conn = new mysqli("localhost", "root","", "akvi");
			$sql="select * from customer";
			$r=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($r))
			{
			echo"<option value=".$row["customer_id"];
			if($_SERVER['REQUEST_METHOD']=="POST" AND $id==$row["customer_id"])
			{
				echo" selected";
			}
			echo ">".$row["name"]." (ID=".$row["customer_id"].")</option>";
			}
		?>
	</select>
	<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
<button type="submit" class="btn btn-primary btn-lg"  value="click here" name=sub>CLICK HERE</button>
</form>
<?php
	if(isset($_POST['sub']))
	{?>
		 <h2 style="font-family:'Krona One'">Details of the customer are:</h2>
<?php
		$conn = new mysqli("localhost", "root","", "akvi");
		$sql="select * from customer where customer_id=".$id;
		$r=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($r))
		{
			echo "<span style='color:black;'>
			Phone number 1=".$row["phone_1"]." <br />
			Phone number 2=".$row["phone_2"]."<br />
			Email=".$row["email"]."<br />
			Address=".$row["address"]."<br />
			City=".$row["city"]."<br />
			State=".$row["state"]."<br />
			Pincode=".$row["pincode"]."<br /></span>";
		}
		mysqli_close($conn);

	?>

	<form action="edit_details_2.php" method="POST">
		<p style="font-family:'Krona One'; font-size:large;">Click here to edit details:
		<button type="submit" class="btn btn-primary"  value=EditDetails>EDIT</button></p>
		<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
		<input type=hidden name=id value=<?php echo $_POST["id"]; ?>>
	</form>
</body>
<?php
}
?><br><br><br><br><br><br>
<form action='IndexOrders.php' method='POST'>
	<input type=hidden name=logincheck value=<?php echo $_POST['logincheck'];?>>
	<label>Click here to go back to the index page </label>
	<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
</form><?php
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
