<?php
if(isset($_POST['logincheck']) and $_POST['logincheck']==1){
	if(isset($_POST["hidden"]))
	{
		$p_name=$_POST["preset"];
		$c1=$_POST["choice1"];
		$c2=$_POST["choice2"];
		$c3=$_POST["choice3"];
		$c4=$_POST["choice4"];
		$c5=$_POST["choice5"];
		$c6=$_POST["choice6"];
		$c7=$_POST["choice7"];
		$c8=$_POST["choice8"];
		$c9=$_POST["choice9"];
		$c10=$_POST["choice10"];
		$c11=$_POST["choice11"];
		$c12=$_POST["choice12"];
		$c13=$_POST["choice13"];

	$conn = new mysqli("localhost", "root","", "akvi");//Use your own databse details
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
	else
	{
		$sql="insert into presets values('".$p_name."',".$c1.",".$c2.",".$c3.",".$c4.",".$c5.",".$c6.",".$c7.",".$c8.",".$c9.",".$c10.",".$c11.",".$c12.",".$c13.")";
		$r=mysqli_query($conn,$sql);
		if($r==1)
				echo "<br /><br /><span style='color:white;width:100%;'>New Preset created successfully.Return to home page.<br></span>";
			else
				echo "<br /><br /><span style='color:white;'>Problem<br></span>";
			mysqli_close($conn);
	}

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="dropdown.css">
	<title>New Preset</title>
</head>
<body>


	<div class='head'>
            <span id='ul'>New Preset</span>
    </div>
			<form action='loaddata.php' method='POST'>
				<input type=hidden name=logincheck value=<?php echo $_POST['logincheck'];  ?>>
				<label style='color:white;'>Click here to go back </label>
				<input type='submit' class='btn btn-primary btn-lg' value='GO BACK'>
			</form>





<?php
	if(isset($_POST["filename"]))
	{
?>
<?php
	$file=$_POST["filename"];
	$myfile = fopen("C:/xampp/htdocs/task_2/load/$file", "r") or die("Unable to open file!");
	$headings=fgetcsv($myfile);
?>

<div class="form">



<form method=POST action=dropdown.php>

<span id='message'> Enter name of Preset : </span> <br><br>
	<input type=text name=preset value="Preset 1">
	<br><br>
	<span id='message'>Please select the correct Column Name for the following <br> (Do not select anything if column is not present): </span><br><br>
	<table align=center class="table">

	<tr>
		<td><span id='message'>AWB </span></td>
		<td>
			<select name=choice1><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
					{
						echo "<option value=".($i+1).">".$headings[$i]."<br>";
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>Customer name </span></td>
		<td>
			<select name=choice2><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
					{
						echo "<option value=".($i+1).">".$headings[$i]."<br>";
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>Customer contact no. </span></td>
		<td>
			<select name=choice3><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
					{
						echo "<option value=".($i+1).">".$headings[$i]."<br>";
					}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td><span id='message'>Address line 1 </span></td>
		<td>
			<select name=choice4><option value=0>
				<?php for($i=0;$i<=count($headings)-1;$i++)
					{
						echo "<option value=".($i+1).">".$headings[$i]."<br>";
					}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td><span id='message'>Address line 2 </span></td>
		<td>
			<select name=choice5><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td><span id='message'>Address line 3 </span></td>
		<td>
			<select name=choice6><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td><span id='message'>City	 </span></td>
		<td>
			<select name=choice7><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>State </span></td>
		<td>
			<select name=choice8><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td><span id='message'>Pincode </span></td>
		<td>
			<select name=choice9><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>Order Date </span></td>
		<td>
			<select name=choice10><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>Quantity	 </span></td>
		<td>
			<select name=choice11><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>Total Price </span></td>
		<td>
			<select name=choice12><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><span id='message'>Courier </span></td>
		<td>
			<select name=choice13><option value=0>
				<?php
					for($i=0;$i<=count($headings)-1;$i++)
						{
							echo "<option value=".($i+1).">".$headings[$i]."<br>";
						}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
		<td colspan="2"><input type=submit value='Send'></td>
	</tr>
	<input type=hidden name=hidden value=1>


	</table>

</form>

</div>
<?php
	}
?>
</body>
</html>
<?php
}
else
  {
		?>
		<meta http-equiv="refresh" content="5;URL=saleslogin.php" />
		<p class="timer" style='color:black;'>Cannot access this page directly. You will be redirected in <span class="timer" id="countdowntimer">5 </span> Seconds</p>
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
