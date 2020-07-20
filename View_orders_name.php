<html>
	<head>
		<title>CUSTOMER INFO</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
	</head><title>VIEW ORDERS</title>
<title>VIEW ORDERS</title>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1 and isset($_POST["clicked"]) and $_POST["clicked"]==1)
{
	$customer_id=$_POST["customer_id"];
	$i=0;$j='a';

	$sql="Select name,customer_id from customer where customer_id=$customer_id";
	echo"<h2 class='h1s'>Showing all orders for:</h2><br/>";
	echo"
		<form action='View_Orders.php' method='POST'>
			<input type=hidden name=logincheck value=".$_POST['logincheck'].">
			<label>Click here to go back to the view orders page </label>
			<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
		</form>
	";
	$conn= new mysqli("localhost","root","","akvi");
	$r=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($r))
	{
		echo"Name: ".$row["name"]."             Customer ID: ".$row["customer_id"];
	}
	echo"<HR/>";
	$sql="select * from orders where orders.customer_id=$customer_id order by date desc";
	$r=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($r))
	{
		++$i;
		echo"<br>$i) OrderId ".$row["order_id"]."<br/>Date: ".$row["date"]."<br/>Shipping Address: ".$row["address"]."<br/>AWB Shipment Number: ".$row["awb"]."<br/>Total Amount: ".$row["total_price"]."<br/>Total quantity: ".$row["total_quantity"]."<br/>";
		$order_id=$row["order_id"];
		echo"Item details of this order:<br/>";
		$sql2="select * from barcodes,items where items.barcode=barcodes.barcode and order_id=$order_id";
		$r2=mysqli_query($conn,$sql2);
		while($row2=mysqli_fetch_assoc($r2))
		{

			echo"$j)Barcode: ".$row2["barcode"]."      PR Colour: ".$row2["pr_color"]."      PR Code: ".$row2["pr_code"]."     Quantity:".$row2["item_quantity"]."<br/>";
			$j++;
		}
		echo"<hr/>";
		$j='a';
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
