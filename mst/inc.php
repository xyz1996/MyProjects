<html>
<body>
<?php
session_start();
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
header("Location:trr.php");
if($uname && $pwd)
{
$conn=mysqli_connect("localhost","root","") or die("not connected");
mysqli_select_db($conn,"prakhar");
$query=mysqli_query($conn,"select * from login where uname='$uname'");
$numrows=mysqli_num_rows($query);
if($numrows!=0)
{
while($row=mysqli_fetch_assoc($query))
{
$dbu=$row['uname'];
$dbp=$row['pwd'];
}
if($uname==$dbu && $pwd==$dbp)
{

header("Location:trr.php");
$_SESSION['uname']=$uname;
}
else{echo "<font size='6' color='red'> incorrect username and password</font>";session_destroy();}
}
else{echo "<font size='6' color='red'> user name does not exist</font>";session_destroy();}
}
else{echo "<font size='6' color='red'> please write your username and password</font>";session_destroy();}


?>

</body>

</html>