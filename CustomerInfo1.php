<html>
	<head>
		<title>CUSTOMER INFO</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
	</head>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
?>
	<body>
	<H1 class="h1s">CUSTOMER INFORMATION:NEW CUSTOMER</H1>
	<?php

	$name="";
	$pnum1="";
	$pnum2="";
	$address="";
	$email="";
	$city="";
	$pincode="";
	$state="";
	$flag=0;
	$continue=0;
	if(isset($_POST["s"]))
	{
		$continue=1;
		if($_POST["name"]=="")
		{
			echo"<p style=color:red>Please enter name!</p>";
			$flag=1;
		}
		else $name=$_POST["name"];
		if($_POST["pnum1"]=="")
		{
			echo"<p style=color:red>Please enter phone number!</p>";
			$flag=1;
		}
		else $pnum1=$_POST["pnum1"];
		if($_POST["pincode"]=="")
		{
			echo"<p style=color:red>Please enter pincode #!</p>";
			$flag=1;
		}
		else $pincode=$_POST["pincode"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$pnum2=$_POST["pnum2"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		if($flag)echo"<p style=color:darkgreen>Cannot continue</p><br/>";
	}

		?>
	<body style="background-color:lightgrey">
	<hr/>
	<br>
	<h1>Please fill the given form.</h1>
	<br><br>
	<form method=post action>
	  <div class="form-group">
	    <label>NAME: </label>
	<input type="text" style="width: 250px;" class="form-control" name=name value=<?php echo $name;?>></input><br/><br>
	  </div>
	  <div class="form-group">
	    <label>PHONE NUMBER 1: </label>
	    <input type="text"  style="width: 250px;" class="form-control" name=pnum1 value=<?php echo $pnum1;?>></input><br/><br>
	  </div>
	<div class="form-group">
	    <label>PHONE NUMBER 2: </label>
	    <input type="text" style="width: 250px;" class="form-control" name=pnum2 value=<?php echo $pnum2;?>></input><br/><br>
	  </div>
	<div class="form-group">
	    <label>EMAIL ID: </label>
	<input type="text"  style="width: 250px;" class="form-control" name=email value=<?php echo $email;?>></input><br/><br>
	  </div>
	<div class="form-group">
	    <label>ADDRESS: </label>
	<input type="text" style="width: 450px;" class="form-control" name=address value=<?php echo $address;?>></input><br/><br>
	  </div>
	<div class="form-group">
	    <label>CITY/TOWN: </label>
	<input type="text"  style="width: 250px;" class="form-control" name=city value=<?php echo $city;?>></input><br/><br>
	  </div>
	<div class="form-group">
	    <label>PINCODE: </label>
	<input type="text" style="width: 250px;" name=pincode class="form-control"  value=<?php echo $pincode;?>></input><br/><br>
	  </div>
	<div class="form-group">
	    <label>STATE: </label>
	<input type="text" style="width: 250px;" name=state class="form-control"  value=<?php echo $state;?>></input><br/><br>
	  </div>

	<hr/>
	<input type="hidden" name=s value=1>
	<input type="hidden" name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
	<button type="submit" class="btn btn-primary" value="SAVE INFORMATION">SAVE INFORMATION</button>
	</form>
	<hr>
	<br/>
	<?php
	if(!$flag and $continue)
		{
		$conn = new mysqli("localhost", "root","", "akvi");
		if ($conn->connect_error)
		die("False connection " . $conn->connect_error);
		else
		{
			$date = date("Ym");
			$sql="select count(*) from customer where customer_id like '".$date."%'";
			$r=mysqli_query($conn,$sql);
			if($r)
			{
				echo "<p style='color: whitesmoke;
	    font-size: medium;'>Successful query</p>";
				$row=mysqli_fetch_assoc($r);
				$new_customer_id=($date*10000)+(1+$row["count(*)"]);
				echo "<p style='color: whitesmoke;
	    font-size:x-large;'>We have assigned this new customer id = $new_customer_id</p>";
				$sql="insert into customer values($new_customer_id,'$name','$address','$city','$state','$pincode','$pnum1','$pnum2','$email')";
				$r=mysqli_query($conn,$sql);
				if($r)echo"<p style='color: whitesmoke;
	    font-size: medium;'>Database entry made!</p>";
				else echo"Error";
				echo "
					<form action='selectorder.php' method='POST'>
						<input type='hidden' name='id' value=".$new_customer_id." />
						<input type='hidden' name='logincheck' value=".$_POST['logincheck']." />
						<button type='submit' class='btn btn-primary' value='continue'>Continue</button>
					</form>";
			}
			else
				echo"wrong!<br>";
		}
	}

	?>
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
