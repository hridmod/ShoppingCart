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
echo "<form action=edit2_2.php method=POST>";
$oid=$_POST["oid"];
$cid=$_POST["cid"];
$conn= new mysqli("localhost","root","","akvi");
$sql="select * from customer where customer_id=".$cid;
$sql1="select * from orders where order_id=".$oid;
$r1=mysqli_query($conn,$sql1);
$r=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($r);
$row1=mysqli_fetch_assoc($r1);
if(isset($_POST["editadd"]))
{

	$sql="update orders set address='".$_POST["address"]."' where order_id=".$oid;
	mysqli_query($conn,$sql);
	echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
	echo "<input type=hidden name=oid value=".$_POST['oid'].">";
	echo "<input type=hidden name=cid value=".$_POST['cid'].">";
	echo "<label>Shipping Address</label> <textarea name=address style='margin:5px;'>".$_POST["address"]." </textarea><button type='submit' class='btn btn-primary btn-lg' name=editadd value=edit>EDIT</button><hr>";
}
else{
echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
echo "<input type=hidden name=oid value=".$_POST['oid'].">";
echo "<input type=hidden name=cid value=".$_POST['cid'].">";
echo "<label>Shipping Address</label> <textarea name=address style='margin:5px;'>".$row1["address"]." </textarea><button type='submit' class='btn btn-primary btn-lg' name=editadd value=edit>EDIT</button><hr>";

}


if(isset($_POST["editawb"]))
{
	$sql="update orders set awb='".$_POST["awb"]."' where order_id=".$oid;
	mysqli_query($conn,$sql);
	echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
	echo "<input type=hidden name=oid value=".$_POST['oid'].">";
	echo "<input type=hidden name=cid value=".$_POST['cid'].">";
	echo "<label>AWB Code</label><input  style='margin:5px;' type=text name=awb value=".$_POST["awb"]."><button type='submit' class='btn btn-primary btn-lg' name=editawb value=edit>EDIT</button><hr>";
}
else{
echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
echo "<input type=hidden name=oid value=".$_POST['oid'].">";
echo "<input type=hidden name=cid value=".$_POST['cid'].">";
echo "<label>AWB Code</label><input  style='margin:5px;' type=text name=awb value=".$row1["awb"]."><button type='submit' class='btn btn-primary btn-lg' name=editawb value=edit>EDIT</button><hr>";
}

if(isset($_POST["editprc"]))
{
	$sql="update orders set total_price=".$_POST["tp"]." where order_id=".$oid;
	mysqli_query($conn,$sql);
	echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
	echo "<input type=hidden name=oid value=".$_POST['oid'].">";
	echo "<input type=hidden name=cid value=".$_POST['cid'].">";
	echo "<label>Total Price</label><input style='margin:5px;' type=text name=tp value=".$_POST["tp"]."><button type='submit' class='btn btn-primary btn-lg' name=editprc value=edit>EDIT</button><hr>";
}
else{
echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
echo "<input type=hidden name=oid value=".$_POST['oid'].">";
echo "<input type=hidden name=cid value=".$_POST['cid'].">";
echo "<label>Total Price</label><input style='margin:5px;' type=text name=tp value=".$row1["total_price"]."><button type='submit' class='btn btn-primary btn-lg' name=editprc value=edit>EDIT</button><hr>";
}
//
//
// echo "<label style='color:black;'>Select Items to Edit</label><hr><select name=items>";
// if(isset($_POST["edit"]))
// {
// 	$barcode=$_POST["barcode"];
// 	$cid=$_POST["cid"];
// 	$oid=$_POST["oid"];
// 	$iq=$_POST["iq"];#what was entered
// 	$current_quantity=$_POST["current_quantity"];#the quantity displayed on text box
// 	$conn= new mysqli("localhost","root","","akvi");
// 	$sql="select * from stocks where barcode='".$barcode."'";
// 	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
// 	$stocksleft=$row["tot_qty"];
// 	$sqli="select * from orders where order_id=".$oid;
// 	$row1=mysqli_fetch_assoc(mysqli_query($conn,$sqli));
// 	$total_quantity=$row1["total_quantity"];
// 	if($current_quantity>$iq)
// 		{
// 			$difference=$current_quantity-$iq;
// 			$new_quantity=$total_quantity-$difference;
// 			$sql1="update orders set total_quantity=".$new_quantity." where order_id=".$oid;
// 			mysqli_query($conn,$sql1);
// 			$sql="update items set item_quantity=".$iq." where order_id=".$oid." and barcode='".$barcode."'";
// 			mysqli_query($conn,$sql);
// 			$set=$current_quantity-$iq;
// 			$set=$stocksleft+$set;
// 			$sqli="update stocks set tot_qty=".$set." where barcode='".$barcode."'";
// 			mysqli_query($conn,$sqli);
// 		}
// 		if($current_quantity<$iq)
// 		{
// 			$difference=$iq-$current_quantity;
// 			$new_quantity=$total_quantity+$difference;
// 			$sql1="update orders set total_quantity=".$new_quantity." where order_id=".$oid;
// 			mysqli_query($conn,$sql1);
// 			$sql="update items set item_quantity=".$iq." where order_id=".$oid." and barcode='".$barcode."'";
// 			mysqli_query($conn,$sql);
// 			$set=$iq-$current_quantity;
// 			$set=$stocksleft-$set;
// 			$sqli="update stocks set tot_qty=".$set." where barcode='".$barcode."'";
// 			mysqli_query($conn,$sqli);
// 		}
// }
//
//
//
//
// $sql4="select barcode from items where order_id=".$oid;
// $r4=mysqli_query($conn,$sql4);
// while($row4=mysqli_fetch_assoc($r4))
// {
// 	$sql6="select * from stocks where barcode='".$row4["barcode"]."'";
// 	$r6=mysqli_query($conn,$sql6);
// 	$row6=mysqli_fetch_assoc($r6);
// 	$sql3="select * from barcodes where barcode='".$row4["barcode"]."'";
// 	$r3=mysqli_query($conn,$sql3);
// 	$sql5="select * from items where barcode='".$row4["barcode"]."'";
// 	$r5=mysqli_query($conn,$sql5);
// 	$row3=mysqli_fetch_assoc($r3);
// 	$row5=mysqli_fetch_assoc($r5);
// 	if(isset($_POST["items"]) && $_POST["items"]==$row5["barcode"])
// 		echo "<option selected value='".$row5["barcode"]."'>".$row3["pr_code"].", ".$row3["pr_color"].", ".$row5["barcode"].", Available Quantity=".$row6["tot_qty"];
// 	else
// 		echo "<option  value='".$row5["barcode"]."'>".$row3["pr_code"].", ".$row3["pr_color"].", ".$row5["barcode"].", Available Quantity=".$row6["tot_qty"];
// }
// echo "<input class='btn btn-primary btn-lg' type=submit name=submit value='SUBMIT'><hr><input type=hidden name=cid value=".$cid."><input type=hidden name=oid value=".$oid.">";
// if(isset($_POST["submit"]))
// {
// 	$barcode=$_POST["items"];
// 	$oid=$_POST["oid"];
// 	$cid=$_POST["cid"];
// 	$sqli="select * from items where order_id=".$oid." and barcode='".$barcode."'";
// 	$conn= new mysqli("localhost","root","","akvi");
// 	$r=mysqli_query($conn,$sqli);
// 	$row=mysqli_fetch_assoc($r);
// 	echo"<hr>Item Quantity<input type=text name=iq value='".$row["item_quantity"]."'><hr>";
// 	echo "<input type=submit name=edit value='Edit'><input type=hidden name=cid value=".$cid."><input type=hidden name=oid value=".$oid.">";
// 	echo "<input type=hidden name=barcode value=".$barcode.">";
// 	echo "<input type=hidden name=current_quantity value=".$row["item_quantity"].">";
// }

echo "</form>";
echo "<form action='edit_items.php' method='POST'>";
echo "<input type='hidden' name='id' value=".$oid.">";
$sql="select * from items where order_id=".$oid;
$result=mysqli_query($conn,$sql);
$i=1;
while($row = mysqli_fetch_assoc($result))
{
	echo "<input type='hidden' name=".$i." value=".$row['barcode'].">";
	echo "<input type='hidden' name=".-$i." value=".$row['item_quantity'].">";
	$i+=1;
}
echo "<input type='hidden' name='range' value=".$i.">";
echo "<input type='hidden' name='item_nums' value=".($i-1).">";
$sql="select * from orders where order_id=".$oid;
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo "<input type='hidden' name='price' value=".$row['total_price'].">";
echo "<input type=hidden name=logincheck value=".$_POST['logincheck'].">";
echo "<button type='submit' class='btn btn-primary btn-lg' value=Add items>EDIT ITEMS</button>";
echo "</form>";

?><br><br><br><br><br><br>
	<form action='edit.php' method='POST'>
		<input type=hidden name=logincheck value=<?php echo $_POST['logincheck'];?>>
		<label>Click here to go back to the edit orders page </label>
		<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
	</form>
	<br><br>
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
