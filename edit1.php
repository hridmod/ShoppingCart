<html>
	<head>
		<title>SELECT ORDER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
<h1 class="h1s">EDIT ORDERS </h1>
<?php
if(isset($_POST["s"]))
{
	echo "<form  action=edit1.php method=POST>";
	echo "<label style='white-space: nowrap;'>Select Name(Customer ID)</label><BR><select style='color:black' name=cid>";
$to=$_POST["to"];
$from=$_POST["from"];
$conn= new mysqli("localhost","root","","akvi");
$sql=" select distinct name,customer.customer_id from customer,orders where date>='".$from."' and date<='".$to."' and orders.customer_id=customer.customer_id";
$r=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($r))
{
	if(isset($_POST["cid"]) && $_POST["cid"]==$row["cid"])
		echo "<option selected value=".$row["customer_id"].">".$row["name"]."(".$row["customer_id"].")";
	else
		echo "<option  value=".$row["customer_id"].">".$row["name"]."(".$row["customer_id"].")";
}
echo "<input type=hidden name=to value=".$to.">";
echo "<input type=hidden name=from value=".$from.">";
echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
echo "<br><br><button type='submit' class='btn btn-primary btn-lg' name=submit value=show>SHOW</button></form>";
?><br><br><br><br><br><br>
	<form action='edit.php' method='POST'>
		<input type=hidden name=logincheck value=<?php echo $_POST['logincheck'];?>>
		<label>Click here to go back to the edit orders page </label>
		<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
	</form><?php
}
?>
<BR>
<?php
if(isset($_POST["submit"]))
{
	echo "
	<form action=edit2_2.php method=POST>
	<span style='font-size:200%; color:black;'>Select order to be editted:</span>
	<select name=oid style='margin:10px;font-size:200%;'>";
	$to=$_POST["to"];
	$from=$_POST["from"];
	$cid=$_POST["cid"];
	$conn= new mysqli("localhost","root","","akvi");
	$sql="select order_id from orders where date>='".$from."' and date<='".$to."' and customer_id=".$cid;
	$r=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($r))
	{
		if(isset($_POST["oid"]) && $_POST["oid"]==$row["oid"])
		echo "<option selected value=".$row["order_id"].">".$row["order_id"];
	else
		echo "<option  value=".$row["order_id"].">".$row["order_id"];
	}
	echo "<form action=edit2_2.php method=POST>";
echo "<input class='btn btn-primary btn-lg' type=submit name=showa value=SHOW>";
echo "<input type=hidden name='k' value=1>";
echo "<input type=hidden name=cid value=".$cid.">";
echo "<input type=hidden name=logincheck value=".$_POST['logincheck']."></form>";
?><br><br><br><br><br><br>
	<form action='edit.php' method='POST'>
		<input type=hidden name=logincheck value=<?php echo $_POST['logincheck'];?>>
		<label>Click here to go back to the edit orders page </label>
		<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
	</form><?php
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
