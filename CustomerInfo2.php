<html>
	<head>
		<title>CUSTOMER_INFO2</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
	<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
		<h1 class="h1s">CUSTOMER INFORMATION:EXISTING CUSTOMER</H1>
		<body>
		<br><hr/>
		<FORM ACTION="CustomerInfo2.php" METHOD=POST>
		<label  class="cust">Choose Customer: </label>
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
		<br><br>
		<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck'] ?>>
		<input type="hidden" name="second_load" value="1">
		<button type="submit" class="btn btn-primary btn-lg"  value="click here" name=sub>CLICK HERE</button>
		</form>
		<?php
			if(isset($_POST['second_load']))
			{
				echo "<h2 class='h1' style=font-family:'Kronos-One';font-size:xx-large;>Details of the customer are:</h2>";
				$conn = new mysqli("localhost", "root","", "akvi");
				$sql="select * from customer where customer_id=".$id;
				$r=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($r))
				{
					echo "<span style='color:black;'>
					phone number 1=".$row["phone_1"]." <br />
					phone number 2=".$row["phone_2"]."<br />
					email=".$row["email"]."<br />
					address=".$row["address"]."<br />
					city=".$row["city"]."<br />
					state=".$row["state"]."<br />
					pincode=".$row["pincode"]."<br /><span>";
				}
				mysqli_close($conn);

			?>
			<form action="selectorder.php" method="POST">
				<p class="cust" style="display: inline; color:black;">Click here to select items:</p>
				<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck'] ?>>
				<button type="submit" class="btn btn-primary btn-lg"  value=Proceed with order>PROCEED</button></p>
				<input type=hidden name=id value=<?php echo $_POST["id"]; ?>>
			</form>
			<form action="edit_details.php" method="POST">
				<p class="cust" style="display: inline; color:black;">Click here to edit details:</p>
				<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck'] ?>>
				<button type="submit" class="btn btn-primary btn-lg"  value="Edit Details">EDIT</button></p>
				<input type=hidden name='id' value=<?php echo $_POST["id"]; ?>>
			</form>
		</body>
	<?php }
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
