<html>
	<head>
		<title>SELECT ORDER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
	</head>
<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
	echo "<h1 class='h1s'> SELECT YOUR ORDER </h1>";
  if (isset($_POST['range']))
  {
    $range=$_POST['range'];
  }
  else
  {
    $range=1;
  }
  echo "<form action=selectorder.php method='POST'>";
  $conn=new mysqli("localhost","root","","akvi");
  $sql="SELECT count(*) from stocks where tot_qty>0";
  $result=mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $max=$row['count(*)'];
  mysqli_close($conn);
  if($conn -> connect_error)
  {
      die("Connection Failed :" . $conn -> connect_error);
  }
  echo "<br /><label>Enter the price: </label>";
  echo "<input type='text' name='price'";
  if (isset($_POST['price']))
  {
    echo " value=".$_POST['price'];
  }
  echo " ><br><br>";
  echo "<table>";
  for($x=1; $x<$range+1; $x+=1)//////////////////////////////////////////////////////////
  {
    if($x <= $max)
    {
      $conn=new mysqli("localhost","root","","akvi");
      if($conn -> connect_error)
      {
      		die("Connection Failed :" . $conn -> connect_error);
      }
      $sql="SELECT * from stocks where tot_qty>0";
      $result=mysqli_query($conn,$sql);
			if($x==$range)
			{
	      echo "<tr><td>";
	      echo "<select  style='font-size:23px' name=".$x.">";
	      while($row = mysqli_fetch_assoc($result))//////////////////////////////////////////////////////////
	      {
	        $not_chosen=true;
	          for($i=1; $i<$x; $i+=1)
	          {
	            echo $_POST[$i];
	            if($_POST[$i]==$row['barcode'])
	            {
	              $not_chosen=false;
	            }
	          }
	        if($not_chosen)
	        {
	          echo "<option style='font-size:20px' value='".$row['barcode']."' ";
	          if (isset($_POST[$x]) and $_POST[$x]==$row['barcode'])
	          {
	            echo "selected";
	          }
	          echo " >";
	          $conn2=new mysqli("localhost","root","","akvi");
	          if($conn2 -> connect_error)
	          {
	          		die("Connection Failed :" . $conn2 -> connect_error);
	          }
	          $sql2="SELECT * from barcodes where barcode='".$row['barcode']."'";
	          $result2=mysqli_query($conn2,$sql2);
	          $row2 = mysqli_fetch_assoc($result2);
	          echo $row2['pr_code'].", ".$row2['pr_color'].", ".$row2['barcode'].", AVAILABLE QUANTITY =".$row['tot_qty'];
	          mysqli_close($conn2);
	          echo "</option>";
	        }
	      }
	      echo "</select>";
	      echo "</td>";
			}
			else
			{
				echo "<tr><td>";
				$conn2=new mysqli("localhost","root","","akvi");
				if($conn2 -> connect_error)
				{
						die("Connection Failed :" . $conn2 -> connect_error);
				}
				$sql2="SELECT * from barcodes where barcode='".$_POST[$x]."'";
				$result2=mysqli_query($conn2,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$conn=new mysqli("localhost","root","","akvi");
				if($conn -> connect_error)
				{
						die("Connection Failed :" . $conn -> connect_error);
				}
				$sql2="SELECT * from stocks where barcode='".$_POST[$x]."'";
				$result=mysqli_query($conn2,$sql2);
				$row = mysqli_fetch_assoc($result);
				echo $row2['pr_code'].", ".$row2['pr_color'].", ".$row2['barcode'].", AVAILABLE QUANTITY =".$row['tot_qty'];
				echo "<input type='hidden' name='".$x."' value=".$_POST[$x].">";
				mysqli_close($conn2);
				mysqli_close($conn);
				echo "</td>";
			}
      echo "<td>";
      echo "<input  style='border:1px solid white;
    background-color:#FFCBA4;' type='number' name=".-$x." value=";
      if (isset($_POST[-$x]))
      {
        echo $_POST[-$x];
      }
      else
      {
        echo "0";
      }
      echo " min='0' step='1'>";
      echo "</td>";
      echo "</tr>";
    }///////////////////////////////////////////////////////////////////////////////////////////
  }
  echo "</table><br>";
  if($range<=$max){
		echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck']." />";
    echo "<button type='submit' class='btn btn-primary btn-lg' value='add to cart'>ADD TO CART</button>";
    echo "<input type='hidden' name='item_nums' value=".$range.">";
  }
  else
  {
		echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck']." />";
    echo "<button type='submit' class='btn btn-primary btn-lg' value='update price'>UPDATE PRICE</button>";
    echo "<input type='hidden' name='item_nums' value=".$max.">";
  }

  echo "<input type='hidden' name='id' value=".$_POST['id'].">";
  echo "<input type='hidden' name='range' value=".($range+1).">";
  echo "</form>";
  if(isset($_POST["price"]) and $_POST['price']!='')
  {
    echo "<br />";
    $pass=true;
    for($i=1; $i<=$_POST['item_nums']; $i+=1)
    {
      $conn=new mysqli("localhost","root","","akvi");
      $sql="SELECT * from stocks where barcode='".$_POST[$i]."'";
      $result=mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      if ($_POST[-$i] > $row['tot_qty'])
      {
        $pass=false;
        echo "<h4 >CANNOT SELECT GREATER QUANTITY THAN IS AVAILABLE FOR ANY PRODUCT</h4>";
      }
    }
    if($pass)
    {
      echo "<form action='ordersummary.php' method='POST'>";
      echo "<input type='hidden' name='id' value=".$_POST['id'].">";
      echo "<input type='hidden' name='price' value=".$_POST['price'].">";
      for($i=1; $i<=$_POST['item_nums']; $i+=1)
      {
        if($_POST[-$i]>0)
        {
        echo "<input type='hidden' name='items[]' value='".$_POST[$i]."' />";
        echo "<input type='hidden' name='quantities[]' value='".$_POST[-$i]."' />";
        }
      }
			echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck']." />";
      echo "<label style='white-space: nowrap;'>CLICK HERE TO PROCEED TO ORDER SUMMARY PAGE:</label>
      <button type='submit' class='btn btn-primary btn-lg'  value='proceed' name='proceed'>PROCEED</button>";
      echo "</form>";
    }
  }
  else
  {
    echo "<br /><br /><p style='white-space: nowrap;color:black; font-size:3em;'>Make sure price is entered to proceed</p>";
  }
	echo"
	<br><br><br><br><br><br><br><br><br>
		<form action='IndexOrders.php' method='POST'>
			<input type=hidden name=logincheck value=".$_POST['logincheck'].">
			<label>Click here to go back to the index page </label>
			<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
		</form>
	";
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
