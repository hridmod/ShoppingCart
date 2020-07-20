<?php
$password="";

if(isset($_POST["s"]))
{
 $password=$_POST["password"] ;

$conn = new mysqli("localhost", "root","", "akvi");
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
    else
    {
        $sql = " UPDATE saleslogin SET password ='".$password."' where
        uid='1' ";
        if ($conn->query($sql) === TRUE) {
            echo "PASSWORD updated successfully";
            echo "<script>location.href='http://localhost/task_2/saleslogin.php';</script>";




          } else {
            echo "Error updating record: " . $conn->error;
          }

        mysqli_close($conn);

            }

        }

        ?>


<?php
$check = $_POST['logincheck'];
if ( $check == 1)

{

?>





<form method=POST action=saleschangepassword.php>
<h1 align=center> <B>CHANGE PASSWORD</B></h1>
<table border=7 align=center>

        <tr>

            <td><B>CHANGE PASSWORD</B><input type=text name="password" >
            <td>
            <td><input type=submit value='UPDATE'>
    </table>
<input type=hidden name=s value=1>
<input type=hidden name=logincheck value=1>
</form>
<?php
}
else
echo "<script>location.href='http://localhost/task_2/saleslogin.php';</script>";



?>
