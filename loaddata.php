<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap">
  <link rel="stylesheet" href="loaddata.css">
  <title>Load Data</title>
</head>
<?php if(isset($_POST['logincheck']) and $_POST['logincheck']==1){ ?>
    <body>


      <?php
      if(isset($_POST["t"]))
      {
          $preset=$_POST["preset"];
          $file_name=$_POST["file_name"];

          $conn=new mysqli("localhost","root","","akvi"); //use name of your database where presets table is stored.
          $query= "select * from presets where preset_name='$preset'";
          $p=mysqli_query($conn,$query);

          $row=mysqli_fetch_assoc($p);

          //assigning numbers from preset table to variables.
          $awb_in=$row["awb"];
          $name_in=$row["name"];
          $phone_in=$row["phone"];
          $address_1_in=$row["address_1"];
          $address_2_in=$row["address_2"];
          $address_3_in=$row["address_3"];
          $city_in=$row["city"];
          $state_in=$row["state"];
          $pincode_in=$row["pincode"];
          $date_in=$row["date"];
          $quantity_in=$row["quantity"];
          $price_in=$row["price"];
          $courier_in=$row["courier"];
          mysqli_close($conn);


          $myfile = fopen("C:/xampp/htdocs/task_2/load/$file_name", "r") or die("Unable to open file!");
          $details=[];
          while (($data = fgetcsv($myfile, 1000, ",")) != FALSE)
          {
            $details[] = $data;
          }
          $conn=new mysqli("localhost","root","","akvi"); //use name of your database where presets table is stored.
          for($i=1; $i<count($details); $i+=1)
          {
            if ($awb_in==0)
            {
              $awb='';
            }
            else
            {
              $awb=$details[$i][$awb_in-1];
            }
            if ($name_in==0)
            {
              $name='';
            }
            else
            {
              $name=$details[$i][$name_in-1];
            }
            if ($phone_in==0)
            {
              $phone='';
            }
            else
            {
              $phone=$details[$i][$phone_in-1];
            }
            if ($address_1_in==0)
            {
              $address_1='';
            }
            else
            {
              $address_1=$details[$i][$address_1_in-1];
            }
            if ($address_2_in==0)
            {
              $address_2='';
            }
            else
            {
              $address_2=$details[$i][$address_2_in-1];
            }
            if ($address_3_in==0)
            {
              $address_3='';
            }
            else
            {
              $address_3=$details[$i][$address_2_in-1];
            }
            if ($city_in==0)
            {
              $city='';
            }
            else
            {
              $city=$details[$i][$city_in-1];
            }
            if ($state_in==0)
            {
              $state='';
            }
            else
            {
              $state=$details[$i][$state_in-1];
            }
            if ($pincode_in==0)
            {
              $pincode='';
            }
            else
            {
              $pincode=$details[$i][$pincode_in-1];
            }
            if ($date_in==0)
            {
              $date='';
            }
            else
            {
              $date=$details[$i][$date_in-1];
            }
            if ($quantity_in==0)
            {
              $quantity='';
            }
            else
            {
              $quantity=$details[$i][$quantity_in-1];
            }
            if ($price_in==0)
            {
              $price='';
            }
            else
            {
              $price=$details[$i][$price_in-1];
            }
            if ($courier_in==0)
            {
              $courier='';
            }
            else
            {
              $courier=$details[$i][$courier_in-1];
            }
            $query="insert into details values('".$awb."', '".$name."', '".$phone."', '".$address_1."', '".$address_2."', '".$address_3."', '".$city."', '".$state."', '".$pincode."', '".$date."', ".$quantity.", ".$price.", '".$courier."')";
            $p=mysqli_query($conn,$query);
          }
          mysqli_close($conn);
          rename("load\\".$file_name, "loaded\\".$file_name);//mke sure you have a loaded folder on the same level as the load folder
          echo "<span style='color:white;'>Uploaded file ".$file_name."</span>";


      } ?>

        <?php
            if(isset($_POST["s"]))
            {
                $file_name=$_POST["file_name"];
            }
        ?>

<div class="loadform">
        <form action="loaddata.php" method="POST">
        <?php

            $dir = 'C:/xampp/htdocs/task_2/load';  //use your load directory path.

            $files=array_values(array_diff(scandir($dir), array('..', '.')));
            echo "<div class='head'>
            <span id='ul'>Load AKVI Files</span>
            <br><br>
        </div>";
            echo "<select name=file_name>";
            for($i=0;$i<count($files);$i++)
            {
                if(isset($file_name))
                {
                    if(strcmp($file_name,$files[$i])==0)
                    {
                        echo "<option value='".$files[$i]."' selected>".$files[$i]."<br>";
                    }
                    else{
                        echo "<option value='".$files[$i]."'>".$files[$i]."<br>";
                    }
                }
            else{
                echo "<option value='".$files[$i]."'>".$files[$i]."<br>";
            }
            }
            echo "</select>";
        ?>
        <input type="hidden" name="s"><br><br>
        <input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
        <input type="submit" value="Choose file"> <br><br><br>
        <?php
            if(isset($file_name))
            {
                echo "<span id='message'> Current file chosen: ".$file_name."</span>";
            }
        ?>
        <br><br>
        </form>
</div>










        <div class="presets">

        <div class="new">
          <?php
          if(isset($file_name))
          {


            echo"<form action='dropdown.php' method=POST>";



            echo "<input type=hidden name=filename value='".$file_name."'>";
            echo "<input type='hidden' name='logincheck' value=".$_POST['logincheck'].">";
            echo"<input type=submit value='create new preset'>";
            echo "</form>";

        ?>
          </div>


        <div class="old">
        <form action="loaddata.php" method="POST">
        <select name=preset>


        <?php

            echo "<h3>Choose Preset:</h3>";
            $conn=new mysqli("localhost","root","","akvi");  //use name of your database where presets table is stored.
            $sql="select * from presets";
            $r=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($r))
            {
                echo "<option value='".$row["preset_name"]."'>".$row["preset_name"];
            }
            echo "</select>";
            mysqli_close($conn);
        ?>
        <input type="hidden" name=file_name value=<?php echo "'".$file_name."'"; ?>>

        <input type="hidden" name="t"><br>
        <input type='hidden' name='logincheck' value=<?php echo $_POST['logincheck']; ?>>
        <input type="submit" value="Upload">


        </form>
        </div>


        </div>

        <?php
          }

?>

</div>
</div>
</body>
<?php
}
else
  {
		?>
		<meta http-equiv="refresh" content="5;URL=saleslogin.php" />
		<p class="timer" style='color:white;'>Cannot access this page directly. You will be redirected in <span class="timer" id="countdowntimer">5 </span> Seconds</p>
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

</html>
