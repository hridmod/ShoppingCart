<?php
$conn = new mysqli("localhost", "root","", "akvi");
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
else
  {
    $uid = 1;
    $sql = "select * from saleslogin where uid=" . $uid;
    $r   = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($r))
      {
        $dbuname    = $row["username"];
        $dbpassword = $row["password"];
      }
    mysqli_close($conn);
  }
?>




<?php
if (isset($_POST['s']))
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $success  = 1;
    if ($success == 1)
      {

        if ($username == $dbuname && $password == $dbpassword)
          {
            echo "Success in login";
            echo "<form id='auth' action='IndexOrders.php' method='post' >
    <input type='hidden' name='logincheck' value=1>

</form>

<script>
document.getElementById('auth').submit();
</script>

";
          }
        else
          {

            echo "<script>location.href='http://localhost/task_2/saleslogin.php';</script>";
          }
      }
  }
?>
