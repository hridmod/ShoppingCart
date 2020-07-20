<html>
	<head>
		<title>EDIT CUSTOMER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
<body>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1)
{
  if(isset($_POST['PLACED']))
  {
    $conn=new mysqli("localhost","root","","akvi");
    if($conn -> connect_error)
    {
      die("Connection Failed :" . $conn -> connect_error);
    }
    $sql="SELECT count(*) from orders";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $order_id=$row['count(*)']+1;
    $sql="select * from customer where customer_id=".$_POST['id'];
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $address="name=".$row['name'].", address=".$row['address'].",".$row['city'].", ".$row['state'].", ".$row['pincode'].", phone number=".$row['phone_1'].", alt number=".$row['phone_2'];
    $sql="insert into orders(order_id, customer_id, date, total_price, total_quantity, address) values(".$order_id.", ".$_POST['id'].", '".date("Y-m-d")."', ".$_POST['price'].", ".array_sum($_POST['quantities']).", '".$address."')";
    $result=mysqli_query($conn,$sql);
    for($item=0; $item<count($_POST['items']); $item+=1)
    {
      $sql="insert into items values(".$order_id.", ".$_POST['quantities'][$item].", '".$_POST['items'][$item]."')";
      $result=mysqli_query($conn,$sql);
      $sql="update stocks set tot_qty = tot_qty-".$_POST['quantities'][$item]." where barcode='".$_POST['items'][$item]."'";
      $result=mysqli_query($conn,$sql);
    }
    mysqli_close($conn);
    echo "<br /><p style='color:black; font-size:300%;'>Order Placed successfully!<br />Click here to return to the index page</p>";?>
		<form class="" action="IndexOrders.php" method="post">
			<input type="hidden" name="logincheck" value=<?php echo $_POST['logincheck']; ?>>
			<input type="submit" class="btn btn-primary btn-lg" value="RETURN">
		</form>
<!-- <p class="timer"> You will be redirected in <span class="timer" id="countdowntimer">5 </span> Seconds</p>

<script type="text/javascript">
    var timeleft = 5;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
</script> -->
<?php
    //Hriday do you know how to display a 5 second countdown using js? Not important just looks cool. Do it if you have extra time.
    //echo "<meta http-equiv='refresh' content='5; URL=IndexOrders.php' />";
  }

  else{
    echo "<h1 class='h1s'>ORDER SUMMARY</h1><hr /><h3>Your selections are as follows:</h3>";
    echo "<table border>";
    echo "<tr>
      <th>
      BARCODE
      </th>
      <th>
        QUANTITY
      </th>
    </tr>";
    for($item=0; $item<count($_POST['items']); $item+=1)
    {
      echo "<tr>
        <td>
          ".$_POST['items'][$item]."
        </td>
        <td>
          ".$_POST['quantities'][$item]."
        </td>
      </tr>";
    }
    echo "</table><hr />";
    echo "<p style='color:white; font-size:3em; color:black;'>The total order price is ".$_POST['price']."</p>";
    ?>
    <!--FORM TO SUBMIT ORDER-->
    <form action=ordersummary.php method='POST'>
      <?php
      for ($item=0; $item<count($_POST['items']); $item+=1)
      {
        echo "<input type='hidden' name='items[]' value=".$_POST['items'][$item].">";
        echo "<input type='hidden' name='quantities[]' value=".$_POST['quantities'][$item].">";
      }
      echo "<input type='hidden' name='id' value=".$_POST['id'].">";
			echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck']." />";
      echo "<input type='hidden' name='price' value=".$_POST['price'].">";
      ?>
      <label  style="white-space: nowrap;"><br /><br />Click here to place order</label>
      <input type="hidden" name="PLACED" value="1">
   <button type='submit' class='btn btn-primary' name='proceed'>PLACE ORDER</button>
    </form>
    <!--FORM TO EDIT ORDER-->
    <form action=selectorder.php method='POST'>
      <label style="white-space: nowrap;">Click here to edit order</label>
      <input type="hidden" name="id" value=<?php echo $_POST['id']; ?>>
      <input type="hidden" name="item_nums" value=<?php echo count($_POST['items']); ?>>
      <input type="hidden" name="range" value=<?php echo count($_POST['items'])+1; ?>>
      <?php
      for ($item=1; $item<count($_POST['items'])+1; $item+=1)
      {
        echo "<input type='hidden' name=".$item." value=".$_POST['items'][$item-1].">";
        echo "<input type='hidden' name=".-$item." value=".$_POST['quantities'][$item-1].">";
      }
			echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck']." />";
      ?>
      <input type="hidden" name="price" value='<?php echo $_POST['price']; ?>'>
     <button type='submit' class='btn btn-primary' name='proceed'>EDIT ORDER</button>
    </form>
    <?php
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
