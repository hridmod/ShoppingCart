<html>
	<head>
		<title>CUSTOMER INFO</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<title>VIEW ORDERS</title>
</head>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
<body style=background-color:lightgrey>
<?php
if(isset($_POST["s"]))
{
	$choice=$_POST["parameter"];
	switch($choice)
	{
		case 1: echo "<h1 class='h1s'>VIEW ORDERS BY : NAME</h1><br/><hr/>";
				$conn= new mysqli("localhost","root","","akvi");
				echo"<p style='color:black;font-size:20px;'>Select as Name(Customer ID)</p><br>";
				$sql="select customer_id,name from customer";
				echo"<form action=View_Orders_name.php method=post><select name=customer_id>";
				$r=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($r))
				{
					echo"<option  value=".$row["customer_id"].">".$row["name"]."(".$row["customer_id"].")";
				}
				echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
				echo"</option></select><input type=hidden name=clicked value=1></input><button type='submit' class='btn btn-primary' value='CLICK TO VIEW'>CLICK TO VIEW</button>";
				echo"</form>";
				break;
		case 2: echo "<h1 class='h1s'>VIEW ORDERS BY : DATE</h1><br/><hr/>";
				echo"<form action=\"View_Orders_date.php\" method=POST>
				<label>From
				<input type=date name=from></label>
				<label>To <input type=date name=to></label>
				<BR>
				<BR>
				<input type=hidden name=choice value=1></input>
				<input type=hidden name=s2 value=1></input>
				<input type=hidden name=clicked value=2>
				<input type=hidden name=logincheck value=".$_POST['logincheck'].">
				<button type='submit' class='btn btn-primary' value='CLICK TO VIEW'>CLICK TO VIEW</button>";
						break;

		case 3: echo "<h1 class='h1s'>VIEW ORDERS BY : AWB SHIPMENT NUMBER</h1><br/><hr/>";
				$conn= new mysqli("localhost","root","","akvi");
				echo"<p style='color:black;font-size:20px;'>Select AWB Shipment Number<br></p>";
				$sql="select awb,order_id from orders where awb!=''";
				echo"<form action=View_Orders_4.php method=post><select name=order_id>";
				$r=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($r))
				{
					echo"<option  value=".$row["order_id"].">".$row["awb"];
				}
				echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
				echo"</option></select><input type=hidden name=clicked value=1><button type='submit' class='btn btn-primary' value='CLICK TO VIEW'>CLICK TO VIEW</button>";
				echo"</form>";
								break;
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
