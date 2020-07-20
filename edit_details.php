<html>
	<head>
		<title>CUSTOMER_INFO2</title>
    <link rel="stylesheet" type="text/css" href="main.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
<?php
	$pass_condition = false;
	$r=false;
	if (isset($_POST["check"]))
	{
	  $pass_condition=true;
	  if ($_POST["pnum1"] == "" or $_POST["email"] == "" or $_POST["name"] == "" or $_POST["address"] == "" or $_POST["city"] == "" or $_POST["pincode"] == "" or $_POST["state"] == "")
	  {
	    $pass_condition = false;
	    echo("Fields with * cannot be left blank! Changes will not be saved<br />");
	  }
	  if ($pass_condition)
	  {
	    $id=$_POST["id"];
	    $name=$_POST["name"];
	  	$pnum1=$_POST["pnum1"];
	  	$pnum2=$_POST["pnum2"];
	  	$email=$_POST["email"];
	  	$address=$_POST["address"];
	  	$city=$_POST["city"];
	  	$state=$_POST["state"];
	  	$pincode=$_POST["pincode"];
	    $conn = new mysqli("localhost", "root","", "akvi");
	    $sql="update customer set name='".$name."', phone_1='".$pnum1."', phone_2='".$pnum2."', email='".$email."', address='".$address."', city='".$city."', pincode='".$pincode."', state='".$state."' where customer_id=".$id;
	    $r=mysqli_query($conn,$sql);
	    mysqli_close($conn);

	  }
	}
	if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
	  $id=$_POST["id"];
	  $conn = new mysqli("localhost", "root","", "akvi");
		$sql="select * from customer where customer_id=".$id;
		$r=mysqli_query($conn,$sql);
	  $row=mysqli_fetch_assoc($r);
	  $name = $row["name"];
		$pnum1=$row["phone_1"];
		$pnum2=$row["phone_2"];
		$email=$row["email"];
		$address=$row["address"];
		$city=$row["city"];
		$state=$row["state"];
		$pincode=$row["pincode"];
	  mysqli_close($conn);
		echo "<br><br>
		<form method=post action=\"edit_details.php\">
		<h1 class='h1s'>EDIT DETAILS</h1>
	  <label>NAME:* </label><br>
		<input type=text name=name value='".$name."'></input><br/><br>
		<label>PHONE NUMBER 1:* </label>
		<input type=text name=pnum1 value='".$pnum1."'></input><br/><br>
		<label>PHONE NUMBER 2:* </label>
		<input type=text name=pnum2 value='".$pnum2."'></input><br/><br>
		<label>EMAIL ID:* </label>
		<input type=text name=email value='".$email."'></input><br/><br>
		<label>ADDRESS:* </label>
		<input type=text name=address value='".$address."'></input><br/><br>
		<label>CITY/TOWN:* </label>
		<input type=text name=city value='".$city."'></input><br/><br>
		<label>PINCODE:* </label>
		<input type=text name=pincode value='".$pincode."'></input><br/><br>
		<label>STATE:* </label>
		<input type=text name=state value='".$state."'></input><br><br>
		<hr/>
	  <input type=hidden name=check value=1>
	  <input type=hidden name='id' value=".$id.">
		<input type='hidden' name='logincheck' value=".$_POST['logincheck'].">
		Click here to save changes : <input type=submit class='btn btn-primary btn-lg' value='save'></input>
		</form>
		<hr>
		</form>";
	  if($pass_condition && $r)
	  {
	    echo "Changes saved succesfully!";
	    echo "
	    <form action='selectorder.php' method='POST'>
	    <br />Proceed to product selection
	      <input type='submit' class='btn btn-primary btn-lg' value='proceed'>
	      <input type='hidden' name='id' value=".$id.">
				<input type='hidden' name='logincheck' value=".$_POST['logincheck'].">
	    </form>";
	  }
	  else
	   {
	    if(isset($_POST["check"]))
	    {
	      echo "failed!";
	    }
	  }
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
