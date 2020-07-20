<html>
	<head>
		<title>CUSTOMER INFO</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<title>VIEW ORDERS</title>
	</head>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
if(isset($_POST["clicked"]) and $_POST["clicked"]==2)
{
	$i=0;
	$j='a';
	$to=$_POST["to"];
	$from=$_POST["from"];
	$sql="select * from customer,orders where date>='".$from."' and date<='".$to."' and orders.customer_id=customer.customer_id order by date desc";
	$conn= new mysqli("localhost","root","","akvi");
	$r=mysqli_query($conn,$sql);
	echo"<h2 class='h1s'>Orders wihtin this date range</h2><hr/><br>";
	echo"
		<form action='View_Orders.php' method='POST'>
			<input type=hidden name=logincheck value=".$_POST['logincheck'].">
			<label>Click here to go back to the view orders page </label>
			<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
		</form>
	";
	while($row=mysqli_fetch_assoc($r))
	{
		++$i;
		echo"$i) Name: ".$row["name"]."        Customer ID: ".$row["customer_id"]."<br>OrderId: ".$row["order_id"]."<br/>Date: ".$row["date"]."<br/>Shipping Address: ".$row["address"]."<br/>AWB Shipment Number: ".$row["awb"]."<br/>Total Amount: ".$row["total_price"]."<br/>Total quantity: ".$row["total_quantity"]."<br/><br/>Item details:<br/>";
		$order_id=$row["order_id"];
		$sql2="select * from barcodes,items where items.barcode=barcodes.barcode and order_id=$order_id";
		$r2=mysqli_query($conn,$sql2);
		while($row2=mysqli_fetch_assoc($r2))
		{

			echo"$j)Barcode: ".$row2["barcode"]."     PR Colour: ".$row2["pr_color"]."    PR Code: ".$row2["pr_code"]."   Quantity:".$row2["item_quantity"]."<br/>";
			$j++;
		}
		echo"<hr/>";
		$j='a';

	}


}
else
	echo"<p style='color:white;font-size:20px;'>Cannot access directly!<br><a href=View_Orders.php>click here to go back to view orders</a></p>";
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
