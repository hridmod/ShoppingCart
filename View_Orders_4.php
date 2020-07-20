<html>
	<head>
		<title>CUSTOMER INFO</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
	</head><title>VIEW ORDERS</title>
<title>VIEW ORDERS</title>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
echo "<h1 class='h1s'>ORDER DETAILS<hr/></h1>";
echo"
	<form action='View_Orders.php' method='POST'>
		<input type=hidden name=logincheck value=".$_POST['logincheck'].">
		<label>Click here to go back to the view orders page </label>
		<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
	</form>
";

						$success=1;
						$conn= new mysqli("localhost","root","","akvi");
						$order_id=$_POST["order_id"];
						$sql="select orders.order_id,name,orders.customer_id,orders.address,orders.awb,date,total_price from orders,customer where customer.customer_id=orders.customer_id and orders.order_id=$order_id";
						$r=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($r))
						{
							echo "<p style='color:black;font-size:20px;'><br>Name : ".$row["name"]."<br>OrderID : ".$row["order_id"]."<br>CustomerID : ".$row["customer_id"]."<br>Shipping Address : ".$row["address"]."<br>Date : ".$row["date"]."<br>Amount : ".$row["total_price"]."<br>Item details:<br><hr></p>";
		                }
						$sq1="select * from items,barcodes where items.order_id=$order_id and items.barcode=barcodes.barcode";
						$r=mysqli_query($conn,$sq1);
						$i=0;
						while($row=mysqli_fetch_assoc($r))
						{
							++$i;
							echo "$i<br>Barcode: ".$row["barcode"]."<br>PR Code : ".$row["pr_code"]."<br>PR colour : ".$row["pr_color"]."<br>Item Quantity:".$row["item_quantity"]."<br/><br/>";
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
